<?php

class SiteTreeSubsitesTest extends BaseSubsiteTest
{
    public static $fixture_file = 'subsites/tests/SubsiteTest.yml';

    protected $extraDataObjects = array(
        'SiteTreeSubsitesTest_ClassA',
        'SiteTreeSubsitesTest_ClassB'
    );

    protected $illegalExtensions = array(
        'SiteTree' => array('Translatable')
    );

    public function testPagesInDifferentSubsitesCanShareURLSegment()
    {
        $subsiteMain = $this->objFromFixture('Subsite', 'main');
        $subsite1 = $this->objFromFixture('Subsite', 'subsite1');

        $pageMain = new SiteTree();
        $pageMain->URLSegment = 'testpage';
        $pageMain->write();
        $pageMain->publish('Stage', 'Live');

        $pageMainOther = new SiteTree();
        $pageMainOther->URLSegment = 'testpage';
        $pageMainOther->write();
        $pageMainOther->publish('Stage', 'Live');

        $this->assertNotEquals($pageMain->URLSegment, $pageMainOther->URLSegment,
            'Pages in same subsite cant share the same URL'
        );

        Subsite::changeSubsite($subsite1->ID);

        $pageSubsite1 = new SiteTree();
        $pageSubsite1->URLSegment = 'testpage';
        $pageSubsite1->write();
        $pageSubsite1->publish('Stage', 'Live');

        $this->assertEquals($pageMain->URLSegment, $pageSubsite1->URLSegment,
            'Pages in different subsites can share the same URL'
        );
    }

    public function testBasicSanity()
    {
        $this->assertTrue(singleton('SiteTree')->getSiteConfig() instanceof SiteConfig);
        // The following assert is breaking in Translatable.
        $this->assertTrue(singleton('SiteTree')->getCMSFields() instanceof FieldList);
        $this->assertTrue(singleton('SubsitesVirtualPage')->getCMSFields() instanceof FieldList);
        $this->assertTrue(is_array(singleton('SiteTreeSubsites')->extraStatics()));
    }

    public function testErrorPageLocations()
    {
        $subsite1 = $this->objFromFixture('Subsite', 'domaintest1');

        Subsite::changeSubsite($subsite1->ID);
        $path = ErrorPage::get_filepath_for_errorcode(500);

        $static_path = Config::inst()->get('ErrorPage', 'static_filepath');
        $expected_path = $static_path . '/error-500-'.$subsite1->domain().'.html';
        $this->assertEquals($expected_path, $path);
    }

    public function testCanEditSiteTree()
    {
        $admin = $this->objFromFixture('Member', 'admin');
        $subsite1member = $this->objFromFixture('Member', 'subsite1member');
        $subsite2member = $this->objFromFixture('Member', 'subsite2member');
        $mainpage = $this->objFromFixture('Page', 'home');
        $subsite1page = $this->objFromFixture('Page', 'subsite1_home');
        $subsite2page = $this->objFromFixture('Page', 'subsite2_home');
        $subsite1 = $this->objFromFixture('Subsite', 'subsite1');
        $subsite2 = $this->objFromFixture('Subsite', 'subsite2');

        // Cant pass member as arguments to canEdit() because of GroupSubsites
        Session::set("loggedInAs", $admin->ID);
        $this->assertTrue(
            (bool)$subsite1page->canEdit(),
            'Administrators can edit all subsites'
        );

        // @todo: Workaround because GroupSubsites->augmentSQL() is relying on session state
        Subsite::changeSubsite($subsite1);

        Session::set("loggedInAs", $subsite1member->ID);
        $this->assertTrue(
            (bool)$subsite1page->canEdit(),
            'Members can edit pages on a subsite if they are in a group belonging to this subsite'
        );

        Session::set("loggedInAs", $subsite2member->ID);
        $this->assertFalse(
            (bool)$subsite1page->canEdit(),
            'Members cant edit pages on a subsite if they are not in a group belonging to this subsite'
        );

        // @todo: Workaround because GroupSubsites->augmentSQL() is relying on session state
        Subsite::changeSubsite(0);
        $this->assertFalse(
            $mainpage->canEdit(),
            'Members cant edit pages on the main site if they are not in a group allowing this'
        );
    }

    /**
     * Similar to {@link SubsitesVirtualPageTest->testSubsiteVirtualPageCanHaveSameUrlsegmentAsOtherSubsite()}.
     */
    public function testTwoPagesWithSameURLOnDifferentSubsites()
    {
        // Set up a couple of pages with the same URL on different subsites
        $s1 = $this->objFromFixture('Subsite', 'domaintest1');
        $s2 = $this->objFromFixture('Subsite', 'domaintest2');

        $p1 = new SiteTree();
        $p1->Title = $p1->URLSegment = "test-page";
        $p1->SubsiteID = $s1->ID;
        $p1->write();

        $p2 = new SiteTree();
        $p2->Title = $p1->URLSegment = "test-page";
        $p2->SubsiteID = $s2->ID;
        $p2->write();

        // Check that the URLs weren't modified in our set-up
        $this->assertEquals($p1->URLSegment, 'test-page');
        $this->assertEquals($p2->URLSegment, 'test-page');

        // Check that if we switch between the different subsites, we receive the correct pages
        Subsite::changeSubsite($s1);
        $this->assertEquals($p1->ID, SiteTree::get_by_link('test-page')->ID);

        Subsite::changeSubsite($s2);
        $this->assertEquals($p2->ID, SiteTree::get_by_link('test-page')->ID);
    }

    public function testPageTypesBlacklistInClassDropdown()
    {
        $editor = $this->objFromFixture('Member', 'editor');
        Session::set("loggedInAs", $editor->ID);

        $s1 = $this->objFromFixture('Subsite', 'domaintest1');
        $s2 = $this->objFromFixture('Subsite', 'domaintest2');
        $page = singleton('SiteTree');

        $s1->PageTypeBlacklist = 'SiteTreeSubsitesTest_ClassA,ErrorPage';
        $s1->write();

        Subsite::changeSubsite($s1);
        $settingsFields = $page->getSettingsFields()->dataFieldByName('ClassName')->getSource();

        $this->assertArrayNotHasKey('ErrorPage',
            $settingsFields
        );
        $this->assertArrayNotHasKey('SiteTreeSubsitesTest_ClassA',
            $settingsFields
        );
        $this->assertArrayHasKey('SiteTreeSubsitesTest_ClassB',
            $settingsFields
        );

        Subsite::changeSubsite($s2);
        $settingsFields = $page->getSettingsFields()->dataFieldByName('ClassName')->getSource();
        $this->assertArrayHasKey('ErrorPage',
            $settingsFields
        );
        $this->assertArrayHasKey('SiteTreeSubsitesTest_ClassA',
            $settingsFields
        );
        $this->assertArrayHasKey('SiteTreeSubsitesTest_ClassB',
            $settingsFields
        );
    }

	public function testCopyToSubsite() {
		// Remove baseurl if testing in subdir
		Config::inst()->update('Director', 'alternate_base_url', '/');

		/** @var Subsite $otherSubsite */
		$otherSubsite = $this->objFromFixture('Subsite', 'subsite1');
		$staffPage = $this->objFromFixture('Page', 'staff'); // nested page
		$contactPage = $this->objFromFixture('Page', 'contact'); // top level page

		$staffPage2 = $staffPage->duplicateToSubsite($otherSubsite->ID);
		$contactPage2 = $contactPage->duplicateToSubsite($otherSubsite->ID);

		$this->assertNotEquals($staffPage->ID, $staffPage2->ID);
		$this->assertNotEquals($staffPage->SubsiteID, $staffPage2->SubsiteID);
		$this->assertNotEquals($contactPage->ID, $contactPage2->ID);
		$this->assertNotEquals($contactPage->SubsiteID, $contactPage2->SubsiteID);
		$this->assertEmpty($staffPage2->ParentID);
		$this->assertEmpty($contactPage2->ParentID);
		$this->assertNotEmpty($staffPage->ParentID);
		$this->assertEmpty($contactPage->ParentID);

		// Staff is shifted to top level and given a unique url segment
		$domain = $otherSubsite->domain();
		$this->assertEquals('http://'.$domain.'/staff-2/', $staffPage2->AbsoluteLink());
		$this->assertEquals('http://'.$domain.'/contact-us-2/', $contactPage2->AbsoluteLink());
	}

    public function testPageTypesBlacklistInCMSMain()
    {
        $editor = $this->objFromFixture('Member', 'editor');
        Session::set("loggedInAs", $editor->ID);

        $cmsmain = new CMSMain();

        $s1 = $this->objFromFixture('Subsite', 'domaintest1');
        $s2 = $this->objFromFixture('Subsite', 'domaintest2');

        $s1->PageTypeBlacklist = 'SiteTreeSubsitesTest_ClassA,ErrorPage';
        $s1->write();

        Subsite::changeSubsite($s1);
        $hints = Convert::json2array($cmsmain->SiteTreeHints());
        $classes = $hints['Root']['disallowedChildren'];
        $this->assertContains('ErrorPage', $classes);
        $this->assertContains('SiteTreeSubsitesTest_ClassA', $classes);
        $this->assertNotContains('SiteTreeSubsitesTest_ClassB', $classes);

        Subsite::changeSubsite($s2);
        $hints = Convert::json2array($cmsmain->SiteTreeHints());
        $classes = $hints['Root']['disallowedChildren'];
        $this->assertNotContains('ErrorPage', $classes);
        $this->assertNotContains('SiteTreeSubsitesTest_ClassA', $classes);
        $this->assertNotContains('SiteTreeSubsitesTest_ClassB', $classes);
    }

	/**
	 * Tests that url segments between subsites don't conflict, but do conflict within them
	 */
	public function testValidateURLSegment() {
		$this->logInWithPermission('ADMIN');
		// Saving existing page in the same subsite doesn't change urls
		$mainHome = $this->objFromFixture('Page', 'home');
		$mainSubsiteID = $this->idFromFixture('Subsite', 'main');
		Subsite::changeSubsite($mainSubsiteID);
		$mainHome->Content = '<p>Some new content</p>';
		$mainHome->write();
		$this->assertEquals('home', $mainHome->URLSegment);
		$mainHome->doPublish();
		$mainHomeLive = Versioned::get_one_by_stage('Page', 'Live', sprintf('"SiteTree"."ID" = \'%d\'', $mainHome->ID));
		$this->assertEquals('home', $mainHomeLive->URLSegment);

		// Saving existing page in another subsite doesn't change urls
		Subsite::changeSubsite($mainSubsiteID);
		$subsite1Home = $this->objFromFixture('Page', 'subsite1_home');
		$subsite1Home->Content = '<p>In subsite 1</p>';
		$subsite1Home->write();
		$this->assertEquals('home', $subsite1Home->URLSegment);
		$subsite1Home->doPublish();
		$subsite1HomeLive = Versioned::get_one_by_stage('Page', 'Live', sprintf('"SiteTree"."ID" = \'%d\'', $subsite1Home->ID));
		$this->assertEquals('home', $subsite1HomeLive->URLSegment);

		// Creating a new page in a subsite doesn't conflict with urls in other subsites
        $subsite1ID = $this->idFromFixture('Subsite', 'subsite1');
		Subsite::changeSubsite($subsite1ID);
		$subsite1NewPage = new Page();
		$subsite1NewPage->SubsiteID = $subsite1ID;
		$subsite1NewPage->Title = 'Important Page (Subsite 1)';
		$subsite1NewPage->URLSegment = 'important-page'; // Also exists in main subsite
		$subsite1NewPage->write();
		$this->assertEquals('important-page', $subsite1NewPage->URLSegment);
		$subsite1NewPage->doPublish();
		$subsite1NewPageLive = Versioned::get_one_by_stage('Page', 'Live', sprintf('"SiteTree"."ID" = \'%d\'', $subsite1NewPage->ID));
		$this->assertEquals('important-page', $subsite1NewPageLive->URLSegment);

		// Creating a new page in a subsite DOES conflict with urls in the same subsite
		$subsite1NewPage2 = new Page();
		$subsite1NewPage2->SubsiteID = $subsite1ID;
		$subsite1NewPage2->Title = 'Important Page (Subsite 1)';
		$subsite1NewPage2->URLSegment = 'important-page'; // Also exists in main subsite
		$subsite1NewPage2->write();
		$this->assertEquals('important-page-2', $subsite1NewPage2->URLSegment);
		$subsite1NewPage2->doPublish();
		$subsite1NewPage2Live = Versioned::get_one_by_stage('Page', 'Live', sprintf('"SiteTree"."ID" = \'%d\'', $subsite1NewPage2->ID));
		$this->assertEquals('important-page-2', $subsite1NewPage2Live->URLSegment);

		// Original page is left un-modified
		$mainSubsiteImportantPageID = $this->idFromFixture('Page', 'importantpage');
		$mainSubsiteImportantPage = Page::get()->byID($mainSubsiteImportantPageID);
		$this->assertEquals('important-page', $mainSubsiteImportantPage->URLSegment);
		$mainSubsiteImportantPage->Content = '<p>New Important Page Content</p>';
		$mainSubsiteImportantPage->write();
		$this->assertEquals('important-page', $mainSubsiteImportantPage->URLSegment);
	}

	function testCopySubsiteWithChildren() {
		$page = $this->objFromFixture('Page', 'about');
		$newSubsite = $this->objFromFixture('Subsite', 'subsite1');

		$moved = $page->duplicateToSubsite($newSubsite->ID, true);
		$this->assertEquals($moved->SubsiteID, $newSubsite->ID, 'Ensure returned records are on new subsite');
		$this->assertEquals($moved->AllChildren()->count(), $page->AllChildren()->count(), 'All pages are copied across');
	}

	function testCopySubsiteWithoutChildren() {
		$page = $this->objFromFixture('Page', 'about');
		$newSubsite = $this->objFromFixture('Subsite', 'subsite2');

		$moved = $page->duplicateToSubsite($newSubsite->ID, false);
		$this->assertEquals($moved->SubsiteID, $newSubsite->ID, 'Ensure returned records are on new subsite');
		$this->assertEquals($moved->AllChildren()->count(), 0, 'All pages are copied across');
	}
}

class SiteTreeSubsitesTest_ClassA extends SiteTree implements TestOnly
{
}

class SiteTreeSubsitesTest_ClassB extends SiteTree implements TestOnly
{
}

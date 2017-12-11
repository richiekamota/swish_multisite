<?php
class CustomSiteConfig extends DataExtension {
// http://docs.silverstripe.org/en/developer_guides/configuration/siteconfig
// http://fake-media.com/2014/01/18/extending-silverstripe-3-site-settings/ (Using the variables in the template)

    public static $db = array(
        'SiteFooter' => 'HTMLText'
    );

    public function updateCMSFields(FieldList $fields) {

        $fields->addFieldToTab('Root.Main', new HtmlEditorField('SiteFooter', 'Site Footer'));

    }
}
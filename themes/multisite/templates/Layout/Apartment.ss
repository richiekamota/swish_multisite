<div class="banner" <% if $Image.URL %>style="background-image: url($Image.URL)" <% end_if %>>
    <div class="container">
        <h1>$Title</h1>
        <div class="bannerScroll"><a href="#bannerBottom">SCROLL<br/><i class="fa fa-chevron-down"
                                                                        aria-hidden="true"></i></a></div>
    </div>

</div>
<div id="property-summary">
    <div class="container" name="bannerBottom" id="bannerBottom">

        <article>


            <div class="content-block">
                <div class="row">
                    <div class="col-lg-4">
                        <h2>$Heading
                            <span>$Subheading</span></h2>
                    </div>
                    <div class="col-lg-8">
                        <div class="contentBody">$Body</div>
                    </div>
                </div>

            </div>
        </article>

    </div>
    <div class="property-caption">
        <div class="container">
            <div class="property-plan">
                <div class="price-info">
                    <p>&copy;<br/>
                        HOVER OVER THE INDIVIDUAL FLOORS TO HIGHLIGHT<br/>
                        THE LEVEL AND GET A DETAILED VIEW.</p>
                    <a href="javascript:;" onclick="javascript: priceSignUp($FirstFloor);" class="price-button">View Pricing
                        Info</a>
                </div>
                <img src="{$ThemeDir}/images/site{$SubsiteID}/property.png" class="property-plan"/>
            </div>
        </div>
        <div class="top">
        </div>
        <div class="bottom">
            <div class="container">

                <div class="row">

                    <div class="caption-wrap">
                        <div class="col-lg-4">
                            <h2>$CaptionHeading</h2>
                        </div>
                        <div class="col-lg-8">
                            <div class="contentBody">$CaptionText</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

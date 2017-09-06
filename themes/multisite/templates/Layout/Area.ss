<div class="banner" <% if $Banner.URL %>style="background-image: url($Banner.URL)" <% end_if %>>
    <div class="container">
        <h1>$Title</h1>
        <div class="bannerScroll"><a href="#bannerBottom">SCROLL<br/><i class="fa fa-chevron-down" aria-hidden="true"></i></a></div>
    </div>
</div>
<div class="container" name="bannerBottom" id="bannerBottom">

    <article>

        <% if ContentBlocks %>
            <% loop ContentBlocks %>
                <div class="content-block">
                    <div class="row">
                        <div class="col-lg-4">
                            <h2>$Title
                                <span>$Subtitle</span></h2>
                        </div>
                        <div class="col-lg-8">
                            <div class="contentBody">$Body</div>
                        </div>
                    </div>
                    <% if Image1 && Image2 %>
                        <div class="row images">
                            <div class="col-lg-6">
                                $Image1
                            </div>
                            <div class="col-lg-6">
                                $Image2
                            </div>
                        </div>
                    <% end_if %>
                </div>

            <% end_loop %>

        <% end_if %>
    </article>

</div>

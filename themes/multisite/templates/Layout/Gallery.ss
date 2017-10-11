<div class="banner" <% if $Banner.URL %>style="background-image: url($Banner.URL)" <% end_if %>>
    <div class="container">
        <h1>$Title</h1>
        <div class="bannerScroll"><a href="#bannerBottom">SCROLL<br/><i class="fa fa-chevron-down"
                                                                        aria-hidden="true"></i></a></div>
    </div>
</div>
<div class="container galleries" name="bannerBottom" id="bannerBottom">

    <article>

        <div class="row">
            <% if Gallery_Categories %>
                <% loop Gallery_Categories %>
                    <div class="col-lg-12">
                        <div class="content-block">
                            <h2>$Name</h2>
                            $Description
                            <div class="gallery_images">
                                <% if GalleryImages %>
                                    <% loop GalleryImages %>
                                        <a href="javascript:;" onClick="showImage('$absoluteBaseURL' + '$URL', '$Title')"><img src="$URL" alt="$Title"/></a>
                                    <% end_loop %>
                                <% end_if %>
                            </div>
                        </div>
                    </div>

                <% end_loop %>
            <% end_if %>
        </div>
    </article>

</div>

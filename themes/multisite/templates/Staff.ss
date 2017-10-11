<div class="banner" <% if $Banner.URL %>style="background-image: url($Banner.URL)" <% end_if %>>
    <div class="container">
        <h1>$Title</h1>
        <div class="bannerScroll"><a href="#bannerBottom">SCROLL<br/><i class="fa fa-chevron-down"
                                                                        aria-hidden="true"></i></a></div>
    </div>
</div>
<div class="container staff_members" name="bannerBottom" id="bannerBottom">

    <article>

        <div class="row">
            <% if Staff_Members %>
                <% loop Staff_Members %>
                    <div class="col-lg-4">
                        <div class="content-block">
                            <span>$ProfilePic</span>
                            <h2>$Name</h2>
                            <p><strong>$JobTitle</strong></p>
                        </div>
                    </div>
                <% end_loop %>
            <% end_if %>
        </div>
    </article>

</div>

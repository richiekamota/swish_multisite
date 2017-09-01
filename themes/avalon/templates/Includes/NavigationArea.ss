<nav class="navbar navbar-static-top" role="navigation">
    <div class="container">


        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse"
                    data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>

            <a class="navbar-brand" href="">

                <strong>$SiteConfig.Title</strong>
                <% if $SiteConfig.Tagline %>
                    <span>$SiteConfig.Tagline</span>
                <% end_if %>

            </a>


        </div>

        <div class="navbar-collapse collapse" id="bs-example-navbar-collapse-1" aria-expanded="false"
             style="height: 1px;">

            <% include Navigation %>

        </div>
        <!-- /.navbar-collapse -->
    </div>
    <!-- /.container -->
</nav>
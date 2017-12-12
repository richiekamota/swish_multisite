<footer>
    <div class="container">
        <div class="row">
            <div class="col-lg-6">
                <p><a href="/"><img src="{$ThemeDir}/images/swish-footer.png" class="footer-logo"/></a></p>
                <% if $SiteConfig.PropertyLocation %>
                <div class="address">
                    $SiteConfig.PropertyLocation
                </div>
                <% end_if %>
            </div>
            <div class="col-lg-6">
                <p><a href="#top" class="toTop">To Top &uarr;</a></p>
                <% if $SiteConfig.FooterAddress %>
                <div class="contact">
                    $SiteConfig.FooterAddress
                </div>
                <% end_if %>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-6">
                <div class="copyright">&copy; 2017 Swish Properties. All rights reserved.</div>
            </div>
            <div class="col-lg-6">
                <div class="legal">
                    <a href="/terms-of-use">Terms of Use</a>
                    <a href="/privacy-statement">Privacy Statement</a>
                </div>
            </div>
        </div>
        <!-- /.row -->
    </div>
</footer>
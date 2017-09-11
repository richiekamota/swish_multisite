<footer>
    <div class="container">
        <div class="row">
            <div class="col-lg-6">
                <p><a href="/"><img src="{$ThemeDir}/images/logo.svg" class="footer-logo"/></a></p>
                <p class="address">
                    <% if $SiteConfig.Title == 'Akapelo' %>
                        Akapelo<br/>
                        <u><a href="/contact">15 Pepper Street,<br/>
                            Cape Town</a></u>
                    <% end_if %>
                    <% if $SiteConfig.Title == 'The Avalon' %>
                        The Avalon<br/>
                        <u><a href="/contact">123 Hope Street,<br/>
                            Cape Town</a></u>
                    <% end_if %>
                    <% if $SiteConfig.Title == 'The Petals' %>
                        The Petals<br/>
                        <u><a href="/contact">183 Sir Lowry Road,<br/>
                            Cape Town</a></u>
                    <% end_if %>

                </p>
            </div>
            <div class="col-lg-6">
                <p><a href="#top" class="toTop">To Top &uarr;</a></p>
                <div class="contact">
                    <h3>Craig Getz<br/>
                        +27 (0)83 518 2129<br/>
                        <u><a href="mailto:craig@swishproperties.co.za">craig@swishproperties.co.za</a></u>
                    </h3>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-6">
                <div class="copyright">&copy; 2017 Swish Properties. All rights reserved.</div>
            </div>
            <div class="col-lg-6">
                <div class="legal">
                    <a href="/terms-of-use">Terms of Use</a>
                    <a href="/privacy-statement">Privacy
                        Statement</a>
                </div>
            </div>
        </div>
        <!-- /.row -->
    </div>
</footer>
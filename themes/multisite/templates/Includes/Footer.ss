<footer>
    <div class="container">
        <div class="row">
            <div class="col-lg-6">
                <p><a href="/"><img src="{$ThemeDir}/images/logo.svg" class="footer-logo"/></a></p>
                <p class="address">
                    <% if $SiteConfig.Title == 'Akapelo' %>
                        Akapelo<br/>
                        <u><a href="/contact">15 Pepper Street,<br/> Cape Town</a></u>
                    <% end_if %>
                    <% if $SiteConfig.Title == 'The Avalon' %>
                        The Avalon<br/>
                        <u><a href="/contact">123 Hope Street,<br/> Cape Town</a></u>
                    <% end_if %>
                    <% if $SiteConfig.Title == 'The Petals' %>
                        The Petals<br/>
                        <u><a href="/contact">183 Sir Lowry Road,<br/> Cape Town</a></u>
                    <% end_if %>

                </p>
            </div>
            <div class="col-lg-6">
                <p><a href="#top" class="toTop">To Top &uarr;</a></p>
                <div class="contact">
                    <h3>
                        <u>
                            <a href="https://www.google.co.za/maps/place/Swish+Properties/@-33.919659,18.4181434,17z/data=!4m12!1m6!3m5!1s0x1dcc6766c1866c89:0x95fc4917aaf92976!2sSwish+Properties!8m2!3d-33.919659!4d18.4203321!3m4!1s0x1dcc6766c1866c89:0x95fc4917aaf92976!8m2!3d-33.919659!4d18.4203321">
                            Head office: 27 (0) 21 447 72 44<br/>
                            80 Strand Street<br/> 8th Floor<br/> Cape Town, 8000<br/>
                            </a>
                        </u>
                        <u><a href="mailto:info@swishproperties.co.za">info@swishproperties.co.za</a></u>
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
                    <a href="/privacy-statement">Privacy Statement</a>
                </div>
            </div>
        </div>
        <!-- /.row -->
    </div>
</footer>
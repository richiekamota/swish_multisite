<!DOCTYPE html> 

<!--[if !IE]><!-->
<html lang="$ContentLocale">
<!--<![endif]-->
<!--[if IE 6 ]>
<html lang="$ContentLocale" class="ie ie6"><![endif]-->
<!--[if IE 7 ]>
<html lang="$ContentLocale" class="ie ie7"><![endif]-->
<!--[if IE 8 ]>
<html lang="$ContentLocale" class="ie ie8"><![endif]-->
<head>
    <% base_tag %>
    <title><% if $MetaTitle %>$MetaTitle<% else %>$Title<% end_if %> &raquo; $SiteConfig.Title</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">

    $MetaTags(false)

    <% require themedCSS('bootstrap.min') %>
    <% require themedCSS('font-awesome.min') %>
    <% require themedCSS('custom') %>
    <% if $SiteConfig.GoogleAnalyticsTrackingID %>
    <!-- Global site tag (gtag.js) - Google Analytics -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=$SiteConfig.GoogleAnalyticsTrackingID"></script>
    <script>
      window.dataLayer = window.dataLayer || [];
      function gtag(){dataLayer.push(arguments);}
      gtag('js', new Date());
      gtag('config', '$SiteConfig.GoogleAnalyticsTrackingID');
    </script>
    <% end_if %>


</head>
<body class="$ClassName" id="Page{$ID}">
<div class="fade-overlay">
    <div class="overlay">
        <img src="{$ThemeDir}/images/swish-orange-float.png" class="overlay-logo"/>
    </div>
</div>


<% include NavigationArea %>



<div class="home-banner" data-slides='["{$ThemeDir}/images/site{$SubsiteID}/banner1.jpg","{$ThemeDir}/images/site{$SubsiteID}/banner2.jpg","{$ThemeDir}/images/site{$SubsiteID}/banner3.jpg","{$ThemeDir}/images/site{$SubsiteID}/banner4.jpg"]'>
    <div class="container"></div>
</div>


<div class="main-area home">

    <div class="container">
        <h1>$Title</h1>

        <% if Social_Media %>
        <ul class="social-container">
            <% loop Social_Media %>
             <li class="social-link">
                 <a href="$URL">$SocialMediaIcon</a>
             </li>
            <% end_loop %>
        </ul>
        <% end_if %>

        <% if Site_Link %>
        <ul class="site-links">
        <% loop Site_Link %>
            <li class="site-link">
                <a href="$URL" target="_blank">
                    $Title
                </a>
            </li> 
        <% end_loop %>
        </ul>
        <% end_if %>
        
    </div>

    <script type="text/javascript" src="{$ThemeDir}/javascript/jquery-2.1.4.min.js"></script>
    <script type="text/javascript" src="{$ThemeDir}/javascript/bootstrap.min.js"></script>
    <script type="text/javascript" src="{$ThemeDir}/javascript/page.js"></script>   
    <script>
        $(document).ready(function () {
            $(".fade-overlay").delay(2000).fadeOut(2000);

            ! function ($) {
                "use strict";
                var slide = $("[data-slides]"),
                        count = 0,
                        slides = slide.data("slides"),
                        len = slides.length,
                        n = function () {
                            if (count >= len) {
                                count = 0
                            }
                            slide.css("background-image", 'url("' + slides[count] + '")').show(0, function () {
                                setTimeout(n, 5e3)
                            });
                            count++;
                        };
                n()
            }(jQuery);

        });


    </script>

</div>
<div class="preload">
    <img src="{$ThemeDir}/images/site{$SubsiteID}/banner1.jpg"/>
    <img src="{$ThemeDir}/images/site{$SubsiteID}/banner2.jpg"/>
    <img src="{$ThemeDir}/images/site{$SubsiteID}/banner3.jpg"/>
    <img src="{$ThemeDir}/images/site{$SubsiteID}/banner4.jpg"/>
</div>
</body>
</html>
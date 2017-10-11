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


</head>
<body class="$ClassName" id="Page{$ID}">
<div class="fade-overlay">
    <div class="overlay">
        <img src="{$ThemeDir}/images/logo-white.svg" class="overlay-logo"/>
    </div>
</div>


    <% include NavigationArea %>



<div class="home-banner" data-slides='["{$ThemeDir}/images/site{$SubsiteID}/banner1.jpg","{$ThemeDir}/images/site{$SubsiteID}/banner2.jpg","{$ThemeDir}/images/site{$SubsiteID}/banner3.jpg","{$ThemeDir}/images/site{$SubsiteID}/banner4.jpg"]'>
    <div class="container">

    </div>
</div>


<div class="main-area home">

    <div class="container">
        <h1>$Title</h1>

         <article> 
                     <% if Social_Media %>
                     <% loop Social_Media %>             
             <div class="row">
               <div class="col-lg-4">
                 <div class="social-block">                           
                    <h4>$Title</h4>                                
                    <p>$SocialMediaIcon</p>                                                            
                   </div>                    
                  </div> 
                </div> 
                <% end_loop %>
               <% end_if %>     
        </article>     
        
         <%-- <article style="float:left">
         <% if Site_Link %>
            <% loop Site_Link %>                
                    <div class="row">
                        <div class="col-lg-4">
                            <div class="content-block">
                            <h2>$Title</h2>                                
                                <p>$SiteLinksImage</p>
                            </div>                        
                    </div>
                    
                </div>

            <% end_loop %>

        <% end_if %>
    </article> --%>
    <article>
        <% if Site_Link %>
           <% loop Site_Link %>
        <div class="col-lg-4">
         <div class="thumbnail">
        <!-- Place the anchor tag here to cover both your caption and image -->
        <a href="#" class="">
            <div class="caption">
                <h4>$Title</h4>
                <p></p>
            </div> 
            <p>$SiteLinksImage</p>           
        </a> 
      </div>
    </div>
     <% end_loop %>
        <% end_if %>
  </article>
    
        
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
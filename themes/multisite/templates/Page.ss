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
    <!-- Global site tag (gtag.js) - Google Analytics -->

    <script async src="https://www.googletagmanager.com/gtag/js?id=$SiteConfig.GoogleAnalyticsTrackingID"></script>
    <script>
      window.dataLayer = window.dataLayer || [];
      function gtag(){dataLayer.push(arguments);}
      gtag('js', new Date());
      gtag('config', '$SiteConfig.GoogleAnalyticsTrackingID');
    </script>

</head>
<body class="$ClassName" id="Page{$ID}">


    <% include Header %>



    <% include NavigationArea %>



    <% if $URLSegment == 'home' %>
        <% include Banner %>
    <% end_if %>


<div class="main-area">

    $Layout


    <% include Footer %>


    <script type="text/javascript" src="{$ThemeDir}/javascript/jquery-2.1.4.min.js"></script>
    <script type="text/javascript" src="{$ThemeDir}/javascript/bootstrap.min.js"></script>
   <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/6.11.0/sweetalert2.all.min.js"></script>
    <script type="text/javascript" src="{$ThemeDir}/javascript/page.js"></script>

</div>
<script async defer
        src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDSZV6K0liKsEk6o8hk3oBDZn4LAZlj9rE&callback=initMap">
</script>
</body>
</html>

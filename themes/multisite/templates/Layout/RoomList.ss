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
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.16/css/jquery.dataTables.min.css">


</head>
<body class="$ClassName" id="Page{$ID}">


    <% include Header %>



    <% include NavigationArea %>



    <% if $URLSegment == 'home' %>
        <% include Banner %>
    <% end_if %>


<div class="main-area">

    <% include Rooms %>


    <% include Footer %>


    <script type="text/javascript" src="{$ThemeDir}/javascript/jquery-2.1.4.min.js"></script>
    <script type="text/javascript" src="{$ThemeDir}/javascript/bootstrap.min.js"></script>
    <script type="text/javascript" src="{$ThemeDir}/javascript/page.js"></script>
   <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/6.11.0/sweetalert2.all.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/6.11.0/sweetalert2.min.css"></link>
    <script type="text/javascript" src=" https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>

    <script>
        $(document).ready(function () {
            var datatable = $('#roomDataTable').DataTable({
                "columnDefs": [
                    {
                        "targets": [ 0 ],
                        "visible": false,
                        "searchable": false
                    }
                ]
            });

            $('#roomDataTable').on('click', 'tr', function (event) {
                var data = datatable.row( this ).data()
                console.log(data);
            });


        });
    </script>

</div>

</body>
</html>

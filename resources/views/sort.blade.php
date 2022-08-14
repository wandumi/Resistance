<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <!-- ✅ Load CSS file for jQuery ui  -->
    <link
      href="https://code.jquery.com/ui/1.12.1/themes/ui-lightness/jquery-ui.css"
      rel="stylesheet"
    />

    <style>
      #sortable {
        list-style-type: none;
        margin: 0;
        padding: 0;
        width: 60%;
      }
      #sortable li {
        margin: 0 3px 3px 3px;
        padding: 0.4em;
        padding-left: 1.5em;
        font-size: 1.4em;
        height: 18px;
      }
      #sortable li span {
        position: absolute;
        margin-left: -1.3em;
      }
    </style>
  </head>

  <body>
    <ul id="sortable" class="menus">
      <li class="ui-state-default">
        <span class="ui-icon ui-icon-arrowthick-2-n-s"></span>Item 1
      </li>
      <li class="ui-state-default">
        <span class="ui-icon ui-icon-arrowthick-2-n-s"></span>Item 2
      </li>
      <li class="ui-state-default">
        <span class="ui-icon ui-icon-arrowthick-2-n-s"></span>Item 3
      </li>
    </ul>

    <!-- ✅ load jQuery ✅ -->
    <script
      src="https://code.jquery.com/jquery-3.6.0.min.js"
      integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4="
      crossorigin="anonymous"
    ></script>

    <!-- ✅ load jQuery UI ✅ -->
    <script
      src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"
      integrity="sha512-uto9mlQzrs59VwILcLiRYeLKPPbS/bT71da/OEBYEwcdNUk8jYIy+D176RYoop1Da+f9mvkYrmj5MCLZWEtQuA=="
      crossorigin="anonymous"
      referrerpolicy="no-referrer"
    ></script>

    <script>
        $(document).ready(function () {
            console.log("Logo me");
            $('#sortable').sortable({
                items: 'menus'
            });
            // $('#sortable').insertAfter('<li class="ui-state-default">'+
            //                             '<span class="ui-icon ui-icon-arrowthick-2-n-s"></span>Item 3'+
            //                             '</li>');
            });
    </script>
  </body>
</html>

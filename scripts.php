<!--Import Google Icon Font-->
<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
<!-- Materialize -->
<link rel="stylesheet" href="css/materialize/css/materialize.min.css">
<!-- Bootstrap -->
<link rel="stylesheet" href="css/bootstrap/css/bootstrap.min.css">
<!-- Font Awesome -->
<link href="css/fontawesome/css/all.min.css" rel="stylesheet">
<!-- NProgress -->
<link href="css/nprogress/nprogress.css" rel="stylesheet">
<!-- iCheck -->
<link href="css/iCheck/skins/flat/green.css" rel="stylesheet">
<!-- Animate.css -->
<link href="css/animate.css/animate.min.css" rel="stylesheet">
<!-- Datatables -->
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/bs4/jszip-2.5.0/dt-1.10.18/af-2.3.3/b-1.5.6/b-colvis-1.5.6/b-flash-1.5.6/b-html5-1.5.6/b-print-1.5.6/cr-1.5.0/fc-3.2.5/fh-3.1.4/kt-2.5.0/r-2.2.2/rg-1.1.0/rr-1.2.4/sc-2.0.0/sl-1.3.0/datatables.min.css" />
<!-- jQuery custom content scroller -->
<link href="css/malihu-custom-scrollbar-plugin/jquery.mCustomScrollbar.min.css" rel="stylesheet" />

<!-- bootstrap-daterangepicker -->
<!-- <link href="css/bootstrap-daterangepicker/daterangepicker.css" rel="stylesheet"> -->

<!-- Custom Theme Style -->
<link href="css/custom.css" rel="stylesheet">

<!-- MICSS button[type="file"] -->
<link rel="stylesheet" href="css/micss.css">

<script src="js/jquery/dist/jquery-2.2.4.min.js"></script>
<!-- <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
 -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<!-- Bootstrap -->
<script src="css/bootstrap/js/bootstrap.min.js"></script>
<!-- Materialize -->
<script src="css/materialize/js/materialize.min.js"></script>
<!-- FastClick -->
<script src="js/fastclick/lib/fastclick.js"></script>
<!-- NProgress -->
<script src="css/nprogress/nprogress.js"></script>
<!-- iCheck -->
<script src="css/iCheck/icheck.min.js"></script>
<!-- jQuery custom content scroller -->
<script src="css/malihu-custom-scrollbar-plugin/jquery.mCustomScrollbar.concat.min.js"></script>
<!-- ChartsJS -->
<script src="https://cdn.jsdelivr.net/npm/chart.js@2.8.0/dist/Chart.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.bundle.min.js" integrity="sha256-xKeoJ50pzbUGkpQxDYHD7o7hxe0LaOGeguUidbq6vis=" crossorigin="anonymous"></script>

<!-- Datatables -->
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/pdfmake.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/vfs_fonts.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/v/bs4/jszip-2.5.0/dt-1.10.18/af-2.3.3/b-1.5.6/b-colvis-1.5.6/b-flash-1.5.6/b-html5-1.5.6/b-print-1.5.6/cr-1.5.0/fc-3.2.5/fh-3.1.4/kt-2.5.0/r-2.2.2/rg-1.1.0/rr-1.2.4/sc-2.0.0/sl-1.3.0/datatables.min.js"></script>


<!-- Custom Theme Scripts -->
<script src="js/custom.min.js"></script>

<!-- DateJS -->
<!-- <script src="js/DateJS/build/date.js"></script> -->
<!-- bootstrap-daterangepicker -->
<script src="js/moment/min/moment.min.js"></script>
<!-- <script src="css/bootstrap-daterangepicker/daterangepicker.js"></script> -->

<script>
    document.addEventListener('DOMContentLoaded', function() {
        var elems = document.querySelectorAll('.sidenav');
        var instances = M.Sidenav.init(elems, options);
    });

    // Initialize collapsible (uncomment the lines below if you use the dropdown variation)
    // var collapsibleElem = document.querySelector('.collapsible');
    // var collapsibleInstance = M.Collapsible.init(collapsibleElem, options);

    // Or with jQuery

    $(document).ready(function() {
        $('.sidenav').sidenav();
    });

    // Or with jQuery

    $(document).ready(function() {
        $('.select_ok').formSelect();
        $(".dropdown-trigger").dropdown();
    });

    $('#textarea2').val('New Text');
    M.textareaAutoResize($('#textarea2'));

    $('#description').val('New Text');
    M.textareaAutoResize($('#description'));

    $('#mod_description').val('New Text');
    M.textareaAutoResize($('#mod_description'));
</script>
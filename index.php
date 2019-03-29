<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Cryptocurrency Rate</title>
    <link rel="stylesheet" href="assets/vendor/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/vendor/font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="assets/vendor/linearicons/style.css">
    <link rel="stylesheet" href="assets/vendor/metisMenu/metisMenu.css">
    <link rel="stylesheet" href="assets/vendor/bootstrap-progressbar/css/bootstrap-progressbar-3.3.4.min.css">
    <link rel="stylesheet" href="assets/vendor/chartist/css/chartist.min.css">
    <link rel="stylesheet" href="assets/vendor/chartist-plugin-tooltip/chartist-plugin-tooltip.css">
    <link rel="stylesheet" href="assets/vendor/toastr/toastr.min.css">
    <link rel="stylesheet" href="assets/css/main.css">
    <link rel="stylesheet" href="assets/css/demo.css">
</head>

<body class="layout-fullwidth">
<div id="wrapper">
    <div id="main-content" style="padding-top: 0px">
        <h1>Cryptocurrency Rate Viewer</h1>
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12" style="padding-bottom: 15px">

                    <div class="col-md-4">
                        <div class="input-group">
                            <input class="form-control" type="text" id="dtinput">
                            <span class="input-group-btn"><a id="dtclick" class="btn btn-primary" href="#">Search</a></span>
                        </div>
                    </div>
                </div>

                <div id="datatable"></div>

            </div>
        </div>
    </div>
</div>

<script src="assets/vendor/jquery/jquery.min.js"></script>
<script src="assets/vendor/bootstrap/js/bootstrap.min.js"></script>
<script src="assets/vendor/metisMenu/metisMenu.js"></script>
<script src="assets/vendor/jquery-slimscroll/jquery.slimscroll.min.js"></script>
<script src="assets/vendor/jquery-sparkline/js/jquery.sparkline.min.js"></script>
<script src="assets/vendor/bootstrap-progressbar/js/bootstrap-progressbar.min.js"></script>
<script src="assets/vendor/chartist/js/chartist.min.js"></script>
<script src="assets/vendor/chartist-plugin-tooltip/chartist-plugin-tooltip.min.js"></script>
<script src="assets/vendor/chartist-plugin-axistitle/chartist-plugin-axistitle.min.js"></script>
<script src="assets/vendor/chartist-plugin-legend-latest/chartist-plugin-legend.js"></script>
<script src="assets/vendor/toastr/toastr.js"></script>
<script src="assets/scripts/common.js"></script>

<script type="text/javascript">
    $(function () {
        $.get("data-table.php").done(function (data) {
            $("#datatable").html(data);
        });
    });

    $(function () {
        $('#dtclick').click(function () {
            var x = $("#dtinput").val();
            $.get("data-table.php", {search:x}).done(function (data) {
                $("#datatable").html(data);
            });
        });
    });
</script>

</body>
</html>

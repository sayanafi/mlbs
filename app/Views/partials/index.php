<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Skydash Admin</title>
    <!-- plugins:css -->
    <link rel="stylesheet" href="<?= base_url(); ?>/assets/vendors/feather/feather.css">
    <link rel="stylesheet" href="<?= base_url(); ?>/assets/vendors/ti-icons/css/themify-icons.css">
    <link rel="stylesheet" href="<?= base_url(); ?>/assets/vendors/css/vendor.bundle.base.css">
    <!-- endinject -->
    <!-- Plugin css for this page -->
    <!-- DataTable -->
    <link rel="stylesheet" href="https://cdn.datatables.net/1.12.1/css/dataTables.bootstrap4.min.css">
    <!-- <link rel="stylesheet" href="assets/vendors/datatables.net-bs4/dataTables.bootstrap4.css"> -->
    <link rel="stylesheet" href="<?= base_url(); ?>/assets/vendors/ti-icons/css/themify-icons.css">
    <link rel="stylesheet" type="text/css" href="<?= base_url(); ?>/assets/js/select.dataTables.min.css">
    <!-- End plugin css for this page -->
    <!-- inject:css -->
    <link rel="stylesheet" href="<?= base_url(); ?>/assets/css/vertical-layout-light/style.css">
    <!-- endinject -->
    <link rel="shortcut icon" href="<?= base_url(); ?>/assets/images/favicon.png" />
</head>

<body class="sidebar-dark">
    <div class="container-scroller">
        <!-- partial:partials/_navbar.html -->
        <?= $this->include('partials/navbar'); ?>
        <!-- partial -->
        <div class="container-fluid page-body-wrapper">
            <!-- partial:partials/_sidebar.html -->
            <?= $this->include('partials/sidebar'); ?>
            <!-- partial -->
            <div class="main-panel">
                <!-- Content -->
                <?= $this->renderSection('content'); ?>
                <!-- content-wrapper ends -->
                <!-- partial:partials/_footer.html -->
                <?= $this->include('partials/footer'); ?>
                <!-- partial -->
            </div>
            <!-- main-panel ends -->
        </div>
        <!-- page-body-wrapper ends -->
    </div>
    <!-- container-scroller -->

    <!-- plugins:js -->
    <script src="<?= base_url(); ?>/assets/vendors/js/vendor.bundle.base.js"></script>
    <!-- endinject -->

    <!-- Font Awesome -->
    <script defer src="https://use.fontawesome.com/releases/v5.15.4/js/all.js" integrity="sha384-rOA1PnstxnOBLzCLMcre8ybwbTmemjzdNlILg8O7z1lUkLXozs4DHonlDtnE7fpc" crossorigin="anonymous"></script>

    <!-- SweetAlert2 -->
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <!-- DataTable -->
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.12.1/js/dataTables.bootstrap4.min.js"></script>
    <script src="<?= base_url(); ?>/assets/js/myscript.js"></script>
    <!-- Plugin js for this page -->
    <script src="<?= base_url(); ?>/assets/vendors/chart.js/Chart.min.js"></script>
    <!-- <script src="assets/vendors/datatables.net/jquery.dataTables.js"></script>
    <script src="assets/vendors/datatables.net-bs4/dataTables.bootstrap4.js"></script>
    <script src="assets/js/dataTables.select.min.js"></script> -->

    <!-- End plugin js for this page -->
    <!-- inject:js -->
    <script src="<?= base_url(); ?>/assets/js/off-canvas.js"></script>
    <script src="<?= base_url(); ?>/assets/js/hoverable-collapse.js"></script>
    <script src="<?= base_url(); ?>/assets/js/template.js"></script>
    <script src="<?= base_url(); ?>/assets/js/settings.js"></script>
    <script src="<?= base_url(); ?>/assets/js/todolist.js"></script>
    <!-- endinject -->
    <!-- Custom js for this page-->
    <script src="<?= base_url(); ?>/assets/js/dashboard.js"></script>
    <script src="<?= base_url(); ?>/assets/js/Chart.roundedBarCharts.js"></script>
    <!-- End custom js for this page-->
</body>

</html>
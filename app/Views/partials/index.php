<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title><?= $title; ?></title>
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

    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />


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
    <!-- Select 2 -->
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>


    <script>
        // FUNGSI FUNGSI AJAX

        //Tombol Add User
        $('.tombol-add-user').on('click', function() {
            //Ambil Inputan User
            let nama = $('#nama').val();
            let username = $('#username').val();
            let password = $('#password').val();
            let email = $('#email').val();
            let role = $('#role').val();
            let units = $('#units').val();

            //Cek Apakah Data nya ada
            if (nama == '') {
                Swal.fire({
                    title: 'Data User ',
                    text: 'Nama User Tidak Boleh Kosong !',
                    icon: 'error'
                })
            } else if (username == '') {
                Swal.fire({
                    title: 'Data Username ',
                    text: 'Username Tidak Boleh Kosong !',
                    icon: 'error'
                })
            } else if (password == '') {
                Swal.fire({
                    title: 'Data Password ',
                    text: 'Password Tidak Boleh Kosong !',
                    icon: 'error'
                })
            } else if (email == '') {
                Swal.fire({
                    title: 'Data Email ',
                    text: 'Email Tidak Boleh Kosong !',
                    icon: 'error'
                })
            } else if (role == '') {
                Swal.fire({
                    title: 'Data Role ',
                    text: 'Role Tidak Boleh Kosong !',
                    icon: 'error'
                })
            } else if (units == '') {
                Swal.fire({
                    title: 'Data Units ',
                    text: 'Units Tidak Boleh Kosong !',
                    icon: 'error'
                })
            } else {

                //Ajax
                $.ajax({
                    method: "POST",
                    url: "<?= base_url(); ?>/usermanagement/addUser",
                    data: {
                        nama: nama,
                        username: username,
                        email: email,
                        password: password,
                        role: role,
                        units: units

                    },
                    success: function(data) {
                        if (data == "berhasil") {
                            Swal.fire({
                                title: 'Data User',
                                text: 'Berhasil Add User !',
                                icon: 'success'
                            }).then((result) => {
                                if (result.isConfirmed) {
                                    window.location.href = "<?= base_url(); ?>/usermanagement";
                                }
                            })
                        }

                    }
                });


            }
        });
        //Akhir Tombol Add User

        //Tombol Add Staff
        $('.tombol-add-staff').on('click', function() {
            //Ambil Inputan Staff
            let nama = $('#nama').val();
            let username = $('#username').val();
            let password = $('#password').val();
            let email = $('#email').val();
            let units = $('#units').val();

            //Cek Apakah Data nya ada
            if (nama == '') {
                Swal.fire({
                    title: 'Data User ',
                    text: 'Nama User Tidak Boleh Kosong !',
                    icon: 'error'
                })
            } else if (username == '') {
                Swal.fire({
                    title: 'Data Username ',
                    text: 'Username Tidak Boleh Kosong !',
                    icon: 'error'
                })
            } else if (password == '') {
                Swal.fire({
                    title: 'Data Password ',
                    text: 'Password Tidak Boleh Kosong !',
                    icon: 'error'
                })
            } else if (email == '') {
                Swal.fire({
                    title: 'Data Email ',
                    text: 'Email Tidak Boleh Kosong !',
                    icon: 'error'
                })
            } else if (units == '') {
                Swal.fire({
                    title: 'Data Units ',
                    text: 'Units Tidak Boleh Kosong !',
                    icon: 'error'
                })
            } else {

                //Ajax
                $.ajax({
                    method: "POST",
                    url: "<?= base_url(); ?>/staffmanagement/addUser",
                    data: {
                        nama: nama,
                        username: username,
                        email: email,
                        password: password,
                        units: units

                    },
                    success: function(data) {
                        if (data == "berhasil") {
                            Swal.fire({
                                title: 'Data User',
                                text: 'Berhasil Add User !',
                                icon: 'success'
                            }).then((result) => {
                                if (result.isConfirmed) {
                                    window.location.href = "<?= base_url(); ?>/staffmanagement";
                                }
                            })
                        }

                    }
                });


            }
        });
        //Akhir Tombol Add Staff

        //Tombol Add Unit
        $('.tombol-add-unit').on('click', function() {
            //Ambil Inputan Staff
            let namaunit = $('#namaunit').val();

            //Cek Apakah Data nya ada
            if (namaunit == '') {
                Swal.fire({
                    title: 'Data Unit ',
                    text: 'Nama Unit Tidak Boleh Kosong !',
                    icon: 'error'
                })
            } else {

                //Ajax
                $.ajax({
                    method: "POST",
                    url: "<?= base_url(); ?>/unit/addUnit",
                    data: {
                        namaunit: namaunit

                    },
                    success: function(data) {
                        if (data == "berhasil") {
                            Swal.fire({
                                title: 'Data Unit',
                                text: 'Berhasil Add Unit !',
                                icon: 'success'
                            }).then((result) => {
                                if (result.isConfirmed) {
                                    window.location.href = "<?= base_url(); ?>/unit";
                                }
                            })
                        }

                    }
                });


            }
        });
        //Akhir Tombol Add Staff

        //Tombol Add inventaris
        $('.tombol-add-inventaris').on('click', function() {
            //Ambil Inputan Staff
            let namabarang = $('#namabarang').val();
            let kodebarang = $('#kodebarang').val();
            let merk = $('#merk').val();
            let bahan = $('#bahan').val();
            let jumlah = $('#jumlah').val();
            let score = $('#score').val();
            let units = $('#units').val();

            //Cek Apakah Data nya ada
            if (namabarang == '') {
                Swal.fire({
                    title: 'Data Inventaris ',
                    text: 'Nama Barang Tidak Boleh Kosong !',
                    icon: 'error'
                })
            } else if (kodebarang == '') {
                Swal.fire({
                    title: 'Data Inventaris ',
                    text: 'Kode Barang Tidak Boleh Kosong !',
                    icon: 'error'
                })
            } else if (merk == '') {
                Swal.fire({
                    title: 'Data Inventaris ',
                    text: 'Merk Tidak Boleh Kosong !',
                    icon: 'error'
                })
            } else if (bahan == '') {
                Swal.fire({
                    title: 'Data Inventaris ',
                    text: 'Bahan Tidak Boleh Kosong !',
                    icon: 'error'
                })
            } else if (jumlah == '') {
                Swal.fire({
                    title: 'Data Inventaris ',
                    text: 'Jumlah Tidak Boleh Kosong !',
                    icon: 'error'
                })
            } else if (score == '') {
                Swal.fire({
                    title: 'Data Inventaris ',
                    text: 'Score Tidak Boleh Kosong !',
                    icon: 'error'
                })
            } else if (units == '') {
                Swal.fire({
                    title: 'Data Inventaris ',
                    text: 'Units Tidak Boleh Kosong !',
                    icon: 'error'
                })
            } else {

                //Ajax
                $.ajax({
                    method: "POST",
                    url: "<?= base_url(); ?>/inventaris/addInventaris",
                    data: {
                        namabarang: namabarang,
                        kodebarang: kodebarang,
                        merk: merk,
                        bahan: bahan,
                        jumlah: jumlah,
                        score: score,
                        units: units

                    },
                    success: function(data) {
                        if (data == "berhasil") {
                            Swal.fire({
                                title: 'Data Inventaris',
                                text: 'Berhasil Add Inventaris !',
                                icon: 'success'
                            }).then((result) => {
                                if (result.isConfirmed) {
                                    window.location.href = "<?= base_url(); ?>/inventaris";
                                }
                            })
                        }

                    }
                });


            }
        });
        //Akhir Tombol Add Inventaris

        //Tombol Add Standar Pelayanan
        $('.tombol-add-spo').on('click', function() {
            //Ambil Inputan Pelayanan
            let namaspo = $('#namaspo').val();
            let nospo = $('#nospo').val();
            let units = $('#units').val();


            //Cek Apakah Data nya ada
            if (namaspo == '') {
                Swal.fire({
                    title: 'Data SPO ',
                    text: 'Nama SPO Tidak Boleh Kosong !',
                    icon: 'error'
                })
            } else if (nospo == '') {
                Swal.fire({
                    title: 'Data SPO ',
                    text: 'No SPO Tidak Boleh Kosong !',
                    icon: 'error'
                })
            } else if (units == '') {
                Swal.fire({
                    title: 'Data SPO ',
                    text: 'Units Tidak Boleh Kosong !',
                    icon: 'error'
                })
            } else {

                //Ajax
                $.ajax({
                    method: "POST",
                    url: "<?= base_url(); ?>/spo/addspo",
                    data: {
                        namaspo: namaspo,
                        nospo: nospo,
                        units: units
                    },
                    success: function(data) {
                        if (data == "berhasil") {
                            Swal.fire({
                                title: 'Data SPO',
                                text: 'Berhasil Add SPO !',
                                icon: 'success'
                            }).then((result) => {
                                if (result.isConfirmed) {
                                    window.location.href = "<?= base_url(); ?>/spo";
                                }
                            })
                        }

                    }
                });


            }
        });
        //Akhir Tombol Add Standar Pelayanan

        //Tombol Add Standar Pelayanan
        $('.tombol-update-profile').on('click', function() {
            //Ambil Inputan Pelayanan
            let nama = $('#nama').val();
            let username = $('#username').val();
            let email = $('#email').val();


            //Cek Apakah Data nya ada
            if (nama == '') {
                Swal.fire({
                    title: 'Data Profile ',
                    text: 'Nama  Tidak Boleh Kosong !',
                    icon: 'error'
                })
            } else if (username == '') {
                Swal.fire({
                    title: 'Data Profile ',
                    text: 'Username Tidak Boleh Kosong !',
                    icon: 'error'
                })
            } else if (email == '') {
                Swal.fire({
                    title: 'Data Profile ',
                    text: 'Email Tidak Boleh Kosong !',
                    icon: 'error'
                })
            } else {

                //Ajax
                $.ajax({
                    method: "POST",
                    url: "<?= base_url(); ?>/auth/updateProfile",
                    data: {
                        nama: nama,
                        username: username,
                        email: email
                    },
                    success: function(data) {
                        if (data == "berhasil") {
                            Swal.fire({
                                title: 'Data Profile',
                                text: 'Berhasil Update Profile, Silahkan Login Ulang !',
                                icon: 'success'
                            }).then((result) => {
                                if (result.isConfirmed) {
                                    window.location.href = "<?= base_url(); ?>/auth/logout";
                                }
                            })
                        }

                    }
                });


            }
        });
        //Akhir Tombol Add Standar Pelayanan

        $('.tombol-reset-password').on('click', function() {
            //Ambil Inputan Pelayanan
            let passwordlama = $('#passwordlama').val();
            let passwordbaru = $('#passwordbaru').val();
            let konfirmasipassword = $('#konfirmasipassword').val();

            //Cek Apakah Data nya ada
            if (passwordlama == '') {
                Swal.fire({
                    title: 'Data Password ',
                    text: 'Password Tidak Boleh Kosong !',
                    icon: 'error'
                })
            } else if (passwordbaru == '') {
                Swal.fire({
                    title: 'Data Password ',
                    text: 'New Password Tidak Boleh Kosong !',
                    icon: 'error'
                })
            } else if (konfirmasipassword == '') {
                Swal.fire({
                    title: 'Data Password ',
                    text: 'Re Password Tidak Boleh Kosong !',
                    icon: 'error'
                })
            } else if (passwordbaru != konfirmasipassword) {
                Swal.fire({
                    title: 'Data Password ',
                    text: 'New Password Dengan Re Password Tidak Sama !',
                    icon: 'error'
                })
            } else {

                //Ajax
                $.ajax({
                    method: "POST",
                    url: "<?= base_url(); ?>/auth/resetPassword",
                    data: {
                        passwordlama: passwordlama,
                        passwordbaru: passwordbaru,
                        konfirmasipassword: konfirmasipassword
                    },
                    success: function(data) {
                        if (data == "berhasil") {
                            Swal.fire({
                                title: 'Data Password',
                                text: 'Berhasil Update Profile, Silahkan Login Ulang !',
                                icon: 'success'
                            }).then((result) => {
                                if (result.isConfirmed) {
                                    window.location.href = "<?= base_url(); ?>/auth/logout";
                                }
                            })
                        } else if (data == "gagal") {
                            Swal.fire({
                                title: 'Data Password',
                                text: 'Password Salah !',
                                icon: 'error'
                            })
                        }

                    }
                });


            }
        });
    </script>

</body>

</html>
<?= $this->extend('partials/index'); ?>
<?= $this->section('content'); ?>

<div class="content-wrapper">

    <div class="user" data-user="<?= session()->getFlashdata('user'); ?>"></div>
    <div class="row">
        <div class="col-lg-11 col-xl-10">
            <div class="page-header">
                <h2>User Management </h2>
                <button class="btn btn-danger btn-sm" data-toggle="modal" data-target="#tambahuser"><i class="fas fa-user-plus"></i> Add User</button>
                <p class="lead"></p>

            </div>

        </div>
        <div class="col-md-12 grid-margin">
            <div class="card">
                <div class="card-body">
                    <div class="table-responsive">
                        <table id="datatable" class="table table-striped" style="width:100%">
                            <thead>
                                <tr>
                                    <th>Nama</th>
                                    <th>Email</th>
                                    <th>Role</th>
                                    <th>Status</th>
                                    <th>Bergabung</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($datausers as $u) : ?>
                                    <tr>
                                        <td><?= $u['nama']; ?></td>
                                        <td><?= $u['email']; ?></td>
                                        <td>
                                            <?php
                                            if ($u['role_id'] == 1) {
                                                echo '<span class="badge badge-pill badge-primary font-size-12"> Admin </span>';
                                            } else if ($u['role_id'] == 2) {
                                                echo '<span class="badge badge-pill badge-danger font-size-12"> Manajemen </span>';
                                            } else if ($u['role_id'] == 3) {
                                                echo '<span class="badge badge-pill badge-dark font-size-12"> Staff </span>';
                                            } else if ($u['role_id'] == 4) {
                                                echo '<span class="badge badge-pill badge-success font-size-12"> Konsultan </span>';
                                            }
                                            ?>
                                        </td>
                                        <td>
                                            <?php
                                            if ($u['is_active'] == 1) {
                                                echo '<span class="badge badge-pill badge-success font-size-12"> Aktif </span>';
                                            } else {
                                                echo '<span class="badge badge-pill badge-danger font-size-12"> Tidak Aktif </span>';
                                            }
                                            ?>
                                        </td>
                                        <td>
                                            <?= date('d-M-Y', strtotime($u['created_at'])); ?>
                                        </td>
                                        <td>
                                            <a href="<?= base_url(); ?>/usermanagement/updateUser/<?= $u['id']; ?>" class="badge badge-info" data-toggle="modal" data-target="#UbahDataUser<?= $u['id']; ?>"><i class="fa fas fa-edit"></i></a>
                                            <a href="<?= base_url(); ?>/usermanagement/deleteUser/<?= $u['id']; ?>" class="badge badge-danger tombol-hapus"><i class="fa fas fa-trash"></i></a>
                                        </td>
                                    </tr>

                            </tbody>
                        <?php endforeach; ?>
                        </table>
                    </div>
                </div>

            </div>
        </div>
    </div>


</div>

<!-- Add User -->
<div class="modal fade" id="tambahuser" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="nama">Nama</label>
                        <input type="text" class="form-control" id="nama" placeholder="Masukkan Nama...">
                    </div>
                    <div class="form-group col-md-6">
                        <label for="username">Username</label>
                        <input type="text" class="form-control" id="username" placeholder="Masukkan Username...">
                    </div>

                </div>
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="password">Password</label>
                        <input type="password" class="form-control" id="password" placeholder="Masukkan Password...">
                    </div>
                    <div class="form-group col-md-6">
                        <label for="email">Email</label>
                        <input type="email" class="form-control" id="email" placeholder="Masukkan Email...">
                    </div>

                </div>
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label>Pilih Role...</label>
                        <select class="form-control" aria-label="Default select example" id="role">
                            <?php foreach ($datarole as $dr) : ?>
                                <option value="<?= $dr['id']; ?>"><?= $dr['role']; ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <div class="form-group col-md-6">
                        <label>Pilih Units...</label>
                        <select class="form-control" aria-label="Default select example" id="units">
                            <?php foreach ($dataunits as $du) : ?>
                                <option value="<?= $du['id']; ?>"><?= $du['units']; ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>

                </div>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary tombol-add-user">Save changes</button>
            </div>
        </div>
    </div>
</div>
<!-- End Add User -->

<!-- Update User -->
<?php foreach ($datausers as $du) : ?>
    <div class="modal fade" id="UbahDataUser<?= $du['id']; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <form action="<?= base_url(); ?>/usermanagement/updateUser/<?= $du['id']; ?>" method="post">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="nama">Nama</label>
                                <input type="text" class="form-control" name="nama" id="nama" value="<?= $du['nama']; ?>" required>

                            </div>
                            <div class="form-group col-md-6">
                                <label for="username">Username</label>
                                <input type="text" class="form-control" name="username" id="username" value="<?= $du['username']; ?>" required>
                            </div>

                        </div>
                        <div class="form-row">

                            <div class="form-group col-md-12">
                                <label for="email">Email</label>
                                <input type="email" class="form-control" name="email" id="email" value="<?= $du['email']; ?>" required>
                            </div>

                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label>Pilih Role...</label>
                                <select class="form-control" aria-label="Default select example" id="role" name="role" required>
                                    <option selected value="<?= $du['role_id']; ?>"><?= $du['role']; ?></option>
                                    <?php foreach ($datarole as $dr) : ?>
                                        <option value="<?= $dr['id']; ?>"><?= $dr['role']; ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                            <div class="form-group col-md-6">
                                <label>Pilih Units...</label>
                                <select class="form-control" aria-label="Default select example" id="units" name="units" required>
                                    <option selected value="<?= $du['unit_id']; ?>"><?= $du['units']; ?></option>
                                    <?php foreach ($dataunits as $u) : ?>
                                        <option value="<?= $u['id']; ?>"><?= $u['units']; ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>

                        </div>

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Save changes</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
<?php endforeach; ?>
<!-- End Update User -->


<?= $this->endSection(); ?>
<?= $this->extend('partials/index'); ?>
<?= $this->section('content'); ?>
<div class="content-wrapper">
    <div class="row">
        <div class="col-md-6 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Edit Information Profile</h4>

                    <form class="forms-sample">
                        <div class="form-group">
                            <label for="exampleInputUsername1">Nama</label>
                            <input type="text" class="form-control" name="nama" id="nama" value="<?= $users['nama']; ?>">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputUsername1">Username</label>
                            <input type="text" class="form-control" name="username" id="username" value="<?= $users['username']; ?>">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Email address</label>
                            <input type="email" class="form-control" name="email" id="email" value="<?= $users['email']; ?>">
                        </div>
                        <button type="button" class="btn btn-primary mr-2 tombol-update-profile">Update</button>
                    </form>
                </div>
            </div>
        </div>
        <div class="col-md-6 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Reset Password</h4>
                    <form class="forms-sample">
                        <div class="form-group row">
                            <label for="exampleInputPassword2" class="col-sm-3 col-form-label">Password</label>
                            <div class="col-sm-9">
                                <input type="password" class="form-control" name="passwordlama" id="passwordlama" placeholder="Password">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="exampleInputPassword2" class="col-sm-3 col-form-label">New Password</label>
                            <div class="col-sm-9">
                                <input type="password" class="form-control" name="passwordbaru" id="passwordbaru" placeholder="Password">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="exampleInputConfirmPassword2" class="col-sm-3 col-form-label">Re Password</label>
                            <div class="col-sm-9">
                                <input type="password" class="form-control" name="konfirmasipassword" id="konfirmasipassword" placeholder="Password">
                            </div>
                        </div>

                        <button type="button" class="btn btn-primary mr-2 tombol-reset-password">Reset Password</button>
                    </form>
                </div>
            </div>
        </div>
    </div>


</div>
<?= $this->endSection(); ?>
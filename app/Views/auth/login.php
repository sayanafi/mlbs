<?= $this->extend('auth/templates/index'); ?>
<?= $this->section('content'); ?>

<div class="container-fluid page-body-wrapper full-page-wrapper">
    <div class="content-wrapper d-flex align-items-center auth px-0">
        <div class="row w-100 mx-0">
            <div class="col-lg-4 mx-auto">
                <div class="auth-form-light text-left py-5 px-4 px-sm-5">
                    <div class="brand-logo">
                        <img src="<?= base_url(); ?>/assets/images/logo.svg" alt="logo">
                    </div>
                    <h4>Hello! let's get started</h4>
                    <h6 class="font-weight-light">Sign in to continue.</h6>
                    <?php if (session()->getFlashdata('login')) { ?>
                        <div class="alert alert-danger solid alert-dismissible fade show">
                            <svg viewBox="0 0 24 24" width="24 " height="24" stroke="currentColor" stroke-width="2" fill="none" stroke-linecap="round" stroke-linejoin="round" class="mr-2">
                                <polygon points="7.86 2 16.14 2 22 7.86 22 16.14 16.14 22 7.86 22 2 16.14 2 7.86 7.86 2"></polygon>
                                <line x1="15" y1="9" x2="9" y2="15"></line>
                                <line x1="9" y1="9" x2="15" y2="15"></line>
                            </svg>
                            <strong>Error!</strong> <?= session()->getFlashdata('login'); ?> <button type="button" class="close h-100" data-dismiss="alert" aria-label="Close"><span><i class="mdi mdi-close"></i></span>
                            </button>
                        </div>
                    <?php } ?>
                    <form class="pt-3" action="<?= base_url(); ?>/auth/loginSave" method="post">
                        <div class="form-group">
                            <input type="text" name="username" class="form-control form-control-lg <?= ($validation->hasError('username') ? 'is-invalid' : ''); ?>" placeholder="Username">
                            <div class="invalid-feedback text-left">
                                <?= $validation->getError('username'); ?>
                            </div>
                        </div>
                        <div class="form-group">
                            <input type="password" name="password" class="form-control form-control-lg <?= ($validation->hasError('password') ? 'is-invalid' : ''); ?>" placeholder="Password">
                            <div class="invalid-feedback text-left">
                                <?= $validation->getError('password'); ?>
                            </div>
                        </div>
                        <div class="mt-3">
                            <button class="btn btn-block btn-primary btn-lg font-weight-medium auth-form-btn" type="submit">SIGN IN</button>

                        </div>
                        <div class="my-2 d-flex justify-content-between align-items-center">
                            <div class="form-check">
                                <label class="form-check-label text-muted">
                                    <input type="checkbox" class="form-check-input">
                                    Keep me signed in
                                </label>
                            </div>
                            <a href="#" class="auth-link text-black">Forgot password?</a>
                        </div>

                        <!-- <div class="text-center mt-4 font-weight-light">
                            Don't have an account? <a href="#" class="text-primary">Create</a>
                        </div> -->
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- content-wrapper ends -->
</div>
<?= $this->endSection(); ?>
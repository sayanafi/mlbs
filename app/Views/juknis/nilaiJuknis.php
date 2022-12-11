<?= $this->extend('partials/index'); ?>
<?= $this->section('content'); ?>

<div class="content-wrapper">

    <div class="user" data-user="<?= session()->getFlashdata('user'); ?>"></div>
    <div class="row">
        <div class="col-lg-11 col-xl-10">
            <div class="page-header">
                <h2>List Juknis </h2>

            </div>

        </div>
        <div class="col-md-12 grid-margin">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <?php foreach ($dataunits as $du) : ?>
                            <div class="col-sm-3">
                                <div class="card">
                                    <div class="card-body">
                                        <a href="<?= base_url(); ?>/juknis/nilaiActionJuknis/<?= $du['id']; ?>" class="btn btn-<?php if ($du['id'] == 1) {
                                                                                                                                    echo 'primary';
                                                                                                                                } else if ($du['id'] == 2) {
                                                                                                                                    echo 'danger';
                                                                                                                                } else if ($du['id'] == 3) {
                                                                                                                                    echo 'warning';
                                                                                                                                } else if ($du['id'] == 4) {
                                                                                                                                    echo 'info';
                                                                                                                                } else if ($du['id'] == 5) {
                                                                                                                                    echo 'dark';
                                                                                                                                } else {
                                                                                                                                    echo 'black';
                                                                                                                                } ?>"><?= $du['units']; ?></a>
                                    </div>
                                </div>
                            </div>
                        <?php endforeach; ?>


                    </div>



                </div>

            </div>
        </div>
    </div>


</div>



<?= $this->endSection(); ?>
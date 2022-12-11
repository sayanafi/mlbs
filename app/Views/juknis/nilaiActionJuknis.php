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
                    <div class="table-responsive">
                        <table id="datatable" class="table table-bordered table-striped" style="width:100%">
                            <thead>
                                <tr>
                                    <th>Nama Juknis</th>
                                    <th>Unit</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($juknis as $dj) : ?>
                                    <tr>
                                        <td>
                                            <?= $dj['nama_juknis']; ?>

                                        </td>

                                        <td>
                                            <button class="badge badge-dark"><?= $dj['units']; ?></button>
                                        </td>
                                        <td>


                                            <a href="<?= base_url(); ?>/juknis/viewNilaiJuknis/<?= $dj['id']; ?>" class="badge badge-primary"><i class="fa fas fa-edit"></i> Nilai</a>

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


<?php foreach ($juknis as $dj) : ?>
    <div class="modal fade show" id="nilaiJuknis<?= $dj['id']; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-xl" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title"></h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <form action="<?= base_url(); ?>/addNilaiJuknis" method="post">
                    <div class="modal-body">
                        <table class="table table-striped table-bordered table-hover">
                            <tbody>
                                <tr>
                                    <td colspan="9" align="center"><label>Petunjuk Teknis</label></td>
                                </tr>
                                <tr>
                                    <td colspan="2" align="center">RSNU TUBAN</td>
                                    <td colspan="7" align="center">ASUHAN PERSALINAN NORMAL TANPA PENYULIT</td>
                                </tr>
                                <tr>
                                    <td colspan="2" align="center">Unit/Divisi : </td>
                                    <td colspan="4" align="center">No Dokumen : 008.01/KABER/JUKNIS/VII/2020</td>
                                    <td colspan="3" align="center">Tanggal disahkan : 31-07-2020</td>
                                </tr>
                                <tr>
                                    <td colspan="2" align="center">KAMAR BERSALIN</td>
                                    <td colspan="4" align="center">Tanggal dibuat : 31-07-2020</td>
                                    <td colspan="3" rowspan="2" align="center"><img height="100 px" weight="70 px" src="http://112.78.44.246:3333/mlbs/assets/img/ttd_direktur.jpg"></td>
                                </tr>
                                <tr>
                                    <td colspan="2" align="center"></td>
                                    <td colspan="4" align="center">Tanggal Revisi : - </td>
                                </tr>
                                <tr>
                                    <td colspan="9"></td>
                                </tr>
                                <tr>
                                    <td colspan="2" align="center">
                                        <select class="form-control" name="minggu" id="minggu" required="">
                                            <option value="">Minggu Ke</option>
                                            <option value="1">Minggu Ke 1</option>
                                            <option value="2">Minggu Ke 2</option>
                                            <option value="3">Minggu Ke 3</option>
                                            <option value="4">Minggu Ke 4</option>
                                        </select>
                                    </td>
                                    <td colspan="2">
                                        <select class="form-control" name="bulan" id="bulan" required="">
                                            <option value="">Bulan </option>
                                            <option value="1">Januari</option>
                                            <option value="2">Februari</option>
                                            <option value="3">Maret</option>
                                            <option value="4">April</option>
                                            <option value="5">Mei</option>
                                            <option value="6">Juni</option>
                                            <option value="7">Juli</option>
                                            <option value="8">Agustus</option>
                                            <option value="9">September</option>
                                            <option value="10">Oktober</option>
                                            <option value="11">November</option>
                                            <option value="12">Desember</option>
                                        </select>
                                    </td>
                                    <td colspan="2">
                                        <select class="form-control" name="tahun" id="tahun" required="">
                                            <option value="">Tahun </option>
                                            <option value="3">2021</option>
                                            <option value="4">2022</option>
                                            <option value="5">2023</option>
                                            <option value="6">2024</option>
                                            <option value="7">2025</option>
                                        </select>
                                    </td>
                                    <td colspan="3">
                                    </td>
                                </tr>
                                <tr>
                                    <td colspan="9"></td>
                                </tr>
                                <tr>
                                    <td rowspan="2" align="center"><b>No</b></td>
                                    <td rowspan="2" align="center"><b>Prosedur Tetap</b></td>
                                    <td rowspan="2" align="center"><b>Penilaian</b></td>
                                    <td rowspan="2" align="center"><b>Sikap</b></td>
                                    <td rowspan="2" align="center"><b>Ucapan</b></td>
                                    <td rowspan="2" align="center"><b>Pelaksana</b></td>
                                    <td colspan="3" align="center"><b>Catatan Mutu Baku</b></td>
                                </tr>
                                <tr>
                                    <td align="center"><b>Persyaratan</b></td>
                                    <td align="center"><b>Waktu</b></td>
                                    <td align="center"><b>Output</b></td>
                                </tr>
                                <tr>
                                    <td>1</td>
                                    <td>asdasd</td>
                                    <td>
                                        <select class="form-control" name="n1" required="">
                                            <option selected="selected">0</option>
                                            <option>1</option>
                                            <option>2</option>
                                            <option>3</option>
                                            <option>4</option>
                                        </select>
                                    </td>
                                    <td>asdasd</td>
                                    <td>asdasd</td>
                                    <td>asdasd</td>
                                    <td>asdasd</td>
                                    <td>asdasd</td>
                                    <td>asdasd</td>
                                </tr>


                            </tbody>
                        </table>
                    </div>
                    <div class="modal-footer justify-content-between">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Save </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
<?php endforeach; ?>

<?= $this->endSection(); ?>
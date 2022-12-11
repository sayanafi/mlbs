<?= $this->extend('partials/index'); ?>
<?= $this->section('content'); ?>

<div class="content-wrapper">

    <div class="user" data-user="<?= session()->getFlashdata('user'); ?>"></div>
    <div class="row">
        <!-- <div class="col-lg-11 col-xl-10">
            <div class="page-header">
                <h2>Nilai Juknis </h2>
            </div>

        </div>
        <div class="col-md-12 grid-margin"> -->
        <div class="card">
            <div class="card-body">
                <form action="<?= base_url(); ?>/juknis/addNilaiJuknis" method="POST">
                    <table class="table table-striped table-bordered table-hover">
                        <tbody>

                            <tr>
                                <td colspan="9" align="center"><label>Petunjuk Teknis</label></td>
                            </tr>
                            <tr>
                                <td colspan="2" align="center">MLBS</td>
                                <td colspan="7" align="center"><?= $juknis['nama_juknis']; ?></td>
                            </tr>
                            <tr>
                                <td colspan="2" align="center">Unit/Divisi : </td>
                                <td colspan="4" align="center">No Dokumen : 008.01/KABER/JUKNIS/VII/2020</td>
                                <td colspan="3" align="center">Tanggal disahkan : <?= $juknis['tanggal_disahkan']; ?></td>
                            </tr>
                            <tr>
                                <td colspan="2" align="center"><?= $juknis['units']; ?></td>
                                <td colspan="4" align="center">Tanggal dibuat : <?= $juknis['tanggal_dibuat']; ?></td>
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
                                        <option value="2021">2021</option>
                                        <option value="2022">2022</option>
                                        <option value="2023">2023</option>
                                        <option value="2024">2024</option>
                                        <option value="2025">2025</option>
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
                            <?php $no = 1; ?>
                            <?php foreach ($detailjuknis as $dj) : ?>
                                <tr>
                                    <input type="hidden" name="idInputanJuknis[]" value="<?= $dj['id']; ?>">
                                    <td><?= $no++; ?></td>
                                    <td><?= $dj['prosedur_tetap']; ?></td>
                                    <input type="hidden" name="prosedurtetap[]" value="<?= $dj['prosedur_tetap']; ?>">
                                    <td>
                                        <select class="form-control" required="" name="penilaian[]">
                                            <option selected="selected">0</option>
                                            <option>1</option>
                                            <option>2</option>
                                            <option>3</option>
                                            <option>4</option>
                                        </select>
                                    </td>

                                    <td><?= $dj['sikap']; ?></td>
                                    <td><?= $dj['ucapan']; ?></td>
                                    <td><?= $dj['pelaksana']; ?></td>
                                    <td><?= $dj['persyaratan_perlengkapan']; ?></td>
                                    <td><?= $dj['waktu']; ?></td>
                                    <td><?= $dj['output']; ?></td>
                                </tr>
                            <?php endforeach; ?>

                        </tbody>
                    </table>
                    <br>
                    <button type="submit" class="btn btn-primary">Save Nilai Juknis</button>
                </form>
            </div>

        </div>
    </div>
</div>


</div>



<?= $this->endSection(); ?>
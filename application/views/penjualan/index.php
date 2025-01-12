<div class="container-fluid py-4">
    <div class="row">
        <div class="col-12">
            <div class="card my-4">
                <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
                    <div class="bg-gradient-primary shadow-primary border-radius-lg pt-4 pb-3">
                        <h6 class="text-white text-capitalize ps-3"><?= $title; ?></h6>
                    </div>
                </div>
                <!-- Button trigger modal -->


                <div class="card-body px-3 pb-2">
                    <div class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModalTambah">Tambah
                    </div>
                    <div class="table-responsive p-0">
                        <table class="table align-items-center mb-0">
                            <thead>
                                <tr>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder ms-0 ">
                                        Nomor</th>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder ms-0 ">
                                        Bulan Penjualan</th>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder ms-0  ">
                                        Jumlah</th>
                                    <th
                                        class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                        Aksi</th>
                                </tr>
                            </thead>
                            <tbody class="px-3">
                                <?php 
                                $no=1;
                                foreach($penjualan as $row):
                                ?>
                                <tr>
                                    <td>
                                        <h6 class="mb-0 text-sm ps-3 "> <?= $no++; ?></h6>
                                    </td>
                                    <td>
                                        <h6 class="mb-0 text-sm ps-3 ">
                                            <?= date('M Y',strtotime($row->tanggal_penjualan)); ?></h6>
                                    </td>
                                    <td>
                                        <h6 class="mb-0 text-sm ps-3 "> <?= $row->jumlah; ?></h6>
                                    </td>
                                    <td class="align-middle text-center">
                                        <a href="javascript:;"
                                            class="text-secondary text-center font-weight-bold text-xs"
                                            data-original-title="Edit user" data-bs-toggle="modal"
                                            data-bs-target="#exampleModal<?= $row->id_penjualan; ?>">
                                            Edit |
                                        </a>
                                        <a href="javascript:;"
                                            class="text-secondary text-center font-weight-bold text-xs"
                                            data-original-title="Edit user" data-bs-toggle="modal"
                                            data-bs-target="#exampleModalHapus<?= $row->id_penjualan; ?>">
                                            Hapus
                                        </a>
                                    </td>
                                    <!-- Modal Ubah-->
                                    <div class="modal fade" id="exampleModal<?= $row->id_penjualan; ?>" tabindex="-1"
                                        aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h1 class="modal-title fs-5" id="exampleModalLabel">Ubah Data
                                                        <?= date('M Y',strtotime($row->tanggal_penjualan)); ?></h1>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                        aria-label="Close"></button>
                                                </div>
                                                <form action="<?= base_url('penjualan/ubah/'.$row->id_penjualan); ?>"
                                                    method="post">
                                                    <div class="modal-body">
                                                        <div class="input-group input-group-outline">
                                                            <label for="bulan" class="form-label">Bulan Penjualan
                                                            </label>
                                                            <input required type="month" class="form-control "
                                                                id="bulan" name="bulan">
                                                        </div>
                                                        <br>
                                                        <div class="input-group input-group-outline">
                                                            <label for="jumlah" class="form-label">Jumlah Penjualan
                                                                (<?= $row->jumlah; ?>)</label>
                                                            <input required type="number" class="form-control "
                                                                id="jumlah" name="jumlah">
                                                        </div>
                                                        <br>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary"
                                                            data-bs-dismiss="modal">Close</button>
                                                        <button type="submit" class="btn btn-success">Ubah</button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- Modal Hapus-->
                                    <div class="modal fade" id="exampleModalHapus<?= $row->id_penjualan; ?>"
                                        tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h1 class="modal-title fs-5" id="exampleModalLabel">Hapus Data</h1>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                        aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">
                                                    <p class="text-danger">Apakah Kamu Yakin Ingin Menghapus Penjualan
                                                        Bulan <?= date('M Y',strtotime($row->tanggal_penjualan)); ?>
                                                        Dengan Jumlah Penjualan Rp <?= $row->jumlah; ?>
                                                    </p>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary"
                                                        data-bs-dismiss="modal">Close</button>
                                                    <a type="button"
                                                        href="<?= base_url('penjualan/hapus/'.$row->id_penjualan); ?>"
                                                        class="btn btn-danger">Hapus</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="exampleModalTambah" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Tambah Data</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="<?= base_url('penjualan/tambah'); ?>" method="post">
                <div class="modal-body">
                    <div class="input-group input-group-outline">
                        <label for="bulan" class="form-label">Bulan Penjualan</label>
                        <input required type="month" class="form-control " id="bulan" name="bulan">
                    </div><br>
                    <div class="input-group input-group-outline">
                        <label for="jumlah" class="form-label">Jumlah Penjualan</label>
                        <input required type="number" class="form-control " id="jumlah" name="jumlah">
                    </div>
                    <br>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-success">Tambah</button>
                </div>
            </form>
        </div>
    </div>
</div>

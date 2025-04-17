<div class="container-fluid py-4">
    <div class="row">
        <div class="col-12">
            <div class="card my-4">
                <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
                    <div class="bg-gradient-success shadow-success border-radius-lg pt-4 pb-3">
                        <h6 class="text-white text-capitalize ps-3"><?= $title; ?></h6>
                    </div>
                </div>
                <!-- Button trigger modal -->


                <div class="card-body px-4 pb-2">
                    <div class="btn btn-success" data-bs-toggle="modal" data-bs-target="#exampleModalTambah">Tambah
                    </div>
                    <div class="table-responsive p-0">
                        <table class="table align-items-center mb-0">
                            <thead>
                                <tr>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                        Nomor</th>
                                    <th
                                        class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                                        Nama Motor</th>
                                    <th
                                        class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                        Aksi</th>
                                </tr>
                            </thead>
                            <tbody class="px-3">
                                <?php
                                $no = 1;
                                foreach ($sepeda_motor as $row):
                                ?>
                                    <tr>
                                        <td>
                                            <h6 class="mb-0 text-sm ps-4"> <?= $no++; ?></h6>
                                        </td>
                                        <td>
                                            <p class="text-xs font-weight-bold mb-0"><?= $row->nama_motor; ?></p>
                                        </td>
                                        <td class="align-middle text-center">
                                            <a href="javascript:;"
                                                class="text-secondary text-center font-weight-bold text-xs"
                                                data-original-title="Edit user" data-bs-toggle="modal"
                                                data-bs-target="#exampleModal">
                                                Edit |
                                            </a>
                                            <a href="javascript:;"
                                                class="text-secondary text-center font-weight-bold text-xs"
                                                data-original-title="Edit user" data-bs-toggle="modal"
                                                data-bs-target="#exampleModalHapus">
                                                Hapus
                                            </a>
                                        </td>
                                        <!-- Modal Ubah-->
                                        <div class="modal fade" id="exampleModal" tabindex="-1"
                                            aria-labelledby="exampleModalLabel" aria-hidden="true">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h1 class="modal-title fs-5" id="exampleModalLabel">Ubah Data</h1>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                            aria-label="Close"></button>
                                                    </div>
                                                    <form action="<?= base_url('dataSepedaMotor/ubah/' . $row->id_motor); ?>"
                                                        method="post">
                                                        <div class="modal-body">
                                                            <label for="">Nama Motor</label>
                                                            <input type="text" class="form-control" name="nama_sepeda"
                                                                placeholder="<?= $row->nama_motor; ?>">
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-secondary"
                                                                data-bs-dismiss="modal">Close</button>
                                                            <button type="submit" class="btn btn-success">Simpan
                                                                Perubahan</button>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- Modal Ubah-->
                                        <div class="modal fade" id="exampleModalHapus" tabindex="-1"
                                            aria-labelledby="exampleModalLabel" aria-hidden="true">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h1 class="modal-title fs-5" id="exampleModalLabel">Hapus Data</h1>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                            aria-label="Close"></button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <p class="text-danger">Apakah Kamu Yakin Ingin Menghapus
                                                            <?= $row->nama_motor; ?></p>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary"
                                                            data-bs-dismiss="modal">Close</button>
                                                        <a type="button"
                                                            href="<?= base_url('dataSepedaMotor/hapus/' . $row->id_motor); ?>"
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
            <form action="<?= base_url('dataSepedaMotor/tambah'); ?>" method="post">
                <div class="modal-body">
                    <label for="">Nama Motor</label>
                    <input type="text" class="form-control " name="nama_sepeda" placeholder="Masukan di sini">
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-success">Tambah</button>
                </div>
            </form>
        </div>
    </div>
</div>
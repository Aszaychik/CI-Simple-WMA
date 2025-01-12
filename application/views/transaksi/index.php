<div class="container-fluid py-4">
    <div class="row">
        <div class="col-12">
            <div class="card my-4">
                <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
                    <div class="bg-gradient-primary shadow-primary border-radius-lg pt-4 pb-3">
                        <h6 class="text-white text-capitalize ps-3">Harga Perbaikan Kerusakan</h6>
                    </div>
                </div>
                <!-- Button trigger modal -->
                <div class="card-body px-0 pb-2">
                    <div class="table-responsive p-0">
                        <table class="table align-items-center mb-0">
                            <thead>
                                <tr class="text-center">
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                        Kode Kerusakan</th>
                                    <th
                                        class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                                        Keterangan</th>
                                    <th
                                        class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                    </th>
                                    <th class="text-secondary opacity-7"></th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php 
                                
                                foreach($motor as $row) :
                                    $dm=$row->id_motor;
                                ?>
                                <tr class="text-center">
                                    <td>
                                        <p class="text-xs font-weight-bold mb-0 "><?= $row->kode_kerusakan; ?></p>
                                    </td>
                                    <td class="align-middle text-center text-sm">
                                        <p class="text-xs font-weight-bold mb-0 "><?= $row->keterangan; ?></p>
                                    </td>
                                    <!-- <td class="align-middle text-center">
                                        <span class="text-secondary text-xs font-weight-bold"><?= $row->harga; ?></span>
                                    </td> -->
                                    <td class="align-middle">
                                        <a href="javascript:;" class="text-secondary font-weight-bold text-xs"
                                            data-original-title="Edit user" data-bs-toggle="modal"
                                            data-bs-target="#exampleModal<?= $row->id_kode; ?>">
                                            Detail |
                                        </a>
                                        <!-- <a href="<?= base_url('dataTransaksi/tambah/'.$row->id_kode.'/'.$row->id_motor); ?>"
                                            class="text-secondary font-weight-bold text-xs">
                                            <span class="badge badge-sm bg-gradient-success">Tambahkan</span>
                                        </a> -->
                                    </td>
                                    <!-- Modal Ubah-->
                                    <div class="modal fade" id="exampleModal<?= $row->id_kode; ?>" tabindex="-1"
                                        aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h1 class="modal-title fs-5" id="exampleModalLabel">Detail Kode</h1>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                        aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">
                                                    <h6 class="font-weight-bold text-secondary">Kode Kerusakan : <span
                                                            class="text-primary"><?= $row->kode_kerusakan; ?></span>
                                                    </h6>
                                                    <h6 class="font-weight-bold text-secondary">Keterangan : <span
                                                            class="text-primary"><?= $row->keterangan; ?></span></h6>
                                                    <h6 class="font-weight-bold text-secondary">Harga : <span
                                                            class="text-primary"><?= $row->harga; ?></span></h6>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary"
                                                        data-bs-dismiss="modal">Close</button>
                                                    <!-- <a type="button"
                                                        href="<?= base_url('dataTransaksi/tambah/'.$row->id_kode.'/'.$row->id_motor); ?>"
                                                        class="btn btn-success">Tambahkan</a> -->
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
        <!-- <div class="col-5">
            <div class="card my-4">
                <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
                    <div class="bg-gradient-primary shadow-primary border-radius-lg pt-4 pb-3">
                        <h6 class="text-white text-capitalize ps-3">Nota Transaksi</h6>
                    </div>
                </div>
                <div class="card-body px-5 pb-2">
                    <h6 class="text-center">Nota Transaksi</h6>
                    <p class="text-sm text-secondary text-center">Alamat : Jln Guci-Maduran No 56 Lamongan 62267</p>
                    <hr class="horizontal light mt-0 mb-2">
                    <div class="row text-center">
                        <div class="col-2"></div>
                        <div class="col-4">Kode Rusak</div>
                        <div class="col-6">Harga</div>
                    </div>
                    <hr class="horizontal light mt-0 mb-2">
                    <div class="row text-center">
                        <?php
                        $total=0;
                        foreach($keranjang as $row): ?>
                        <div class="col-2"><a href="<?= base_url('dataTransaksi/hapus/'.$row->id_keranjang.'/'.$dm); ?>"
                                class="text-danger cursor-pointer">X</a></div>
                        <div class="col-4"><?php
                        $detail=$this->db->query("SELECT * FROM tabel_kode WHERE id_kode=$row->id_kode")->row();
                        echo $detail->kode_kerusakan;?></div>
                        <div class="col-6 text-start">Rp <?= $detail->harga;?></div>
                        <?php
                    $total+=$detail->harga;
                    endforeach; ?>
                    </div>
                    <div class="row ">
                        <div class="col-6 text-center">Total</div>
                        <div class="col-6 text-start">Rp <?= $total; ?></div>
                    </div>
                </div>
            </div>
        </div> -->
    </div>
</div>
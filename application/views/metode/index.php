<div class="container-fluid py-4">
    <div class="row">
        <div class="col-12">
            <div class="card my-4">
                <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
                    <div class="bg-gradient-primary shadow-primary border-radius-lg pt-4 pb-3">
                        <h6 class="text-white text-capitalize ps-3">Prediksi Kerusakan</h6>
                    </div>
                </div>
                <!-- Button trigger modal -->


                <div class="card-body px-3 pb-2">
                    <form action="<?= base_url('metode/hitung'); ?>" method="post">
                        <div class="modal-body">
                            <br>
                            <?php 
                            $kode = $this->db->query("SELECT * FROM tabel_kode WHERE id_motor = $selects")->result();
                            $jumlah_kode = array();
                            foreach ($kode as $kodes) {
                                $jumlah_kode[] = $kodes->id_kode;
                            }
                            
                            // Mengecek apakah $jumlah_kode tidak kosong
                            if (!empty($jumlah_kode)) {
                                $id_kode_list = implode(",", $jumlah_kode); // Mengubah array menjadi string dengan pemisah koma
                            
                                // Mencari data dari tabel_gejala dengan syarat id_kode ada dalam $jumlah_kode
                                $query = $this->db->query("SELECT * FROM tabel_gejala WHERE id_kode IN ($id_kode_list)");
                                $data_gejala = $query->result();
                            
                                // Menampilkan data gejala
                                foreach ($data_gejala as $gejala) {
                                    echo "<div class='form-check'>
                                    <input class='form-check-input' type='checkbox' value='".$gejala->id_gejala."'
                                        name='selected_gejala[]' id='defaultCheck".$gejala->id_gejala."'>
                                    <label class='form-check-label' for='defaultCheck".$gejala->id_gejala."'>
                                         $gejala->gejala
                                    </label>
                                </div>";
                                    // Lakukan tindakan lain dengan data gejala
                                }
                            } else {
                                echo "Tidak ada kode yang tersedia.";
                            } ?>
                        </div>
                        <div class="modal-footer">
                            <button type="submit" class="btn btn-success">Cek</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
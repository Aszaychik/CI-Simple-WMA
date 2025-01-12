<div class="container-fluid py-4">
    <div class="row">
        <div class="col-7">
            <div class="card my-4">
                <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
                    <div class="bg-gradient-primary shadow-primary border-radius-lg pt-4 pb-3">
                        <h6 class="text-white text-capitalize ps-3">Prediksi Kerusakan</h6>
                    </div>
                </div>
                <!-- Button trigger modal -->


                <div class="card-body px-3 pb-2">
                    <?php 
                    // $jumlah=0;
                    // foreach ($selects as $gejalaId) {
                    //     echo "Gejala yang dipilih: " . $gejalaId . "<br>";
                    //     $data=$this->db->query("SELECT * FROM tabel_gejala WHERE id_gejala=$gejalaId")->result();
                    //     if(($data[0]->id_kode)==($data[0]->id_kode)){
                    //         $jumlah+=$data[0]->nilai;
                    //     }
                    //     // var_dump($data[0]->id_kode);
                    //     echo $jumlah;

                    // } 

                    // $data_array = array(1, 3, 4, 15, 18, 22, 23);
                    $jumlah_per_id_kode = array();
                    
                    // Menjumlahkan nilai berdasarkan id_kode
                    foreach ($selects as $id_gejala) {
                        // Ambil id_kode dari database sesuai dengan $id_gejala
                        $query = $this->db->query("SELECT id_kode FROM tabel_gejala WHERE id_gejala = $id_gejala");
                        $result = $query->row();
                    
                        if ($result) {
                            $id_kode = $result->id_kode;
                    
                            // Tambahkan nilai ke jumlah_per_id_kode berdasarkan id_kode
                            if (!isset($jumlah_per_id_kode[$id_kode])) {
                                $jumlah_per_id_kode[$id_kode] = 0;
                            }
                            $jumlah_per_id_kode[$id_kode] += $id_gejala;
                        }
                    }
                    
                    // Mencari id_kode dengan jumlah nilai terbesar
                    $id_kode_terbesar = null;
                    $nilai_terbesar = null;
                    
                    foreach ($jumlah_per_id_kode as $id_kode => $jumlah) {
                        if ($nilai_terbesar === null || $jumlah > $nilai_terbesar) {
                            $nilai_terbesar = $jumlah;
                            $id_kode_terbesar = $id_kode;
                        }
                    }
                    
                    // Menampilkan hasil
                    // echo "ID Kode Terbesar: " . $id_kode_terbesar . "<br>";
                    $hasilnya=$this->db->get_where('tabel_kode',array('id_kode' => $id_kode_terbesar))->row();
                    // Lakukan tindakan atau operasi lain yang diinginkan
?>
                    <h5 class="text-primary">Hasil Prediksi : Kode <?= $h=$hasilnya->kode_kerusakan; ?> Kedip</h5>
                    <h6 class="">Yaitu Terjadi Kerusakan <?= $hasilnya->keterangan; ?> </h6>
                    <h6 class="">Dengan Biaya Reparasi Sebesar
                    </h6>
                    <div class="btn btn-warning">Rp.
                        <?= $t=number_format(($hasilnya->harga),0,',','.'); ?></div>
                </div>
            </div>
        </div>
        <div class="col-5">
            <div class="card my-4">
                <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
                    <div class="bg-gradient-primary shadow-primary border-radius-lg pt-4 pb-3">
                        <h6 class="text-white text-capitalize ps-3">Nota Transaksi</h6>
                    </div>
                </div>
                <!-- Button trigger modal -->
                <div class="card-body px-5 pb-2">
                    <h6 class="text-center">Nota Transaksi</h6>
                    <p class="text-sm text-secondary text-center">Alamat : Jln Guci-Maduran No 56 Lamongan 62267</p>
                    <hr class="horizontal light mt-0 mb-2">
                    <div class="row">
                        <div class="col-2"></div>
                        <div class="col-4">Kode Rusak</div>
                        <div class="col-6">Harga</div>
                    </div>
                    <hr class="horizontal light mt-0 mb-2">
                    <div class="row ">
                        <div class="col-2"></div>
                        <div class="col-4"><?= $h; ?> kedip</div>
                        <div class="col-6 text-start">Rp <?= $t; ?></div>
                    </div>

                    <div class="row ">
                        <h6 class="col-6 text-center text-primary">Total</h6>
                        <h6 class="col-6 text-start text-primary">Rp <?= $t; ?></h6>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
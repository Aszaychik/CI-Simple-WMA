<?php 
class Data_model extends CI_Model{
    public function tambahData($tabel,$where){
        $this->db->insert("$tabel",$where);
    }
    public function get($tabel,$id)
    {
        $this->db->order_by("$id","DESC");
        return $this->db->get($tabel)->result();
    }
    public function get_noorder($tabel)
    {
        return $this->db->get($tabel)->result();
    }
    public function get_where($tabel,$where)
    {
        $this->db->where($where);
        return $this->db->get("$tabel")->result();
    }
    public function get_whereb($tabel,$where)
    {
        
        return $this->db->query("SELECT * FROM tabel_penjualan WHERE YEAR(tanggal_penjualan)=$where");
    }
    public function update_where($tabel,$where,$data)
    {
        $this->db->where($where);
        $this->db->update("$tabel",$data);
    }
    public function update($tabel,$where,$data,$gambar)
    {
        $this->db->where($where);
        $this->db->update("$tabel",$gambar);
        $this->db->where($where);
        $this->db->update("$tabel",$data);
    }
    public function hapus($tabel,$where)
    {
        $this->db->where($where);
        $this->db->delete("$tabel");
    }
    public function min1bulan($tabel,$kurangbulan)
    {
        $where=array('tanggal_penjualan'=>$kurangbulan);
        $this->db->like($where);
        return $this->db->get('tabel_penjualan')->result();
    }
    public function get_bulandepan($tabel)
    {
        $this->db->limit(1);
        $this->db->order_by('id_penjualan',"DESC");
        return $this->db->get('tabel_penjualan')->result();
    }
    public function get_count($tabel)
    {
        return $this->db->get($tabel)->num_rows();
    }
    public function ftsma($tabel,$limit,$sort)
    {
        $this->db->limit($limit);
        $this->db->order_by('id_penjualan',$sort);
        return $this->db->get($tabel)->result();
    }
    public function pilihSma($tabel,$pilihbulan)
    {
        return $this->db->query("SELECT * FROM $tabel WHERE tanggal_penjualan BETWEEN '2022-03-18' AND '$pilihbulan'");
    }
    public function ftsmapilih($tabel,$pilihbulan,$limit,$sort)
    {
        return $this->db->query("SELECT * FROM $tabel WHERE tanggal_penjualan BETWEEN '2022-03-18' AND '$pilihbulan' ORDER BY id_penjualan DESC LIMIT $limit ")->result();
    }
    public function max($tabel,$limit)
    {
        $this->db->limit($limit);
        $this->db->order_by('pendapatan','DESC');
        return $this->db->get($tabel);
    }
    public function jumlah($tabel,$tahun)
    {
        return $this->db->query("SELECT SUM(pendapatan) as totall FROM $tabel WHERE YEAR(tanggal_penjualan)=$tahun");
    }
    public function emarow($tabel)
    {
        return $this->db->get($tabel);
    }
}
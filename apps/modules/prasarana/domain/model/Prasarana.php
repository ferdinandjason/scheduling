<?php 

class Prasarana
{
    private $id;
    private $idSatker;
    private $idJenisPrasarana;
    private $nama;
    private $kode;
    private $keterangan;
    private $panjang;
    private $lebar;
    private $luas;
    private $kapasitas;
    private $kapasitasUjian;
    private $tahunPengadaan;
    private $statusKeaktifan;

    public function setLuas() {
        $this->luas = $this->panjang * $this->lebar;
    }

    public function getLuas() {
        return $this->luas;
    }
}
<?php 

class Semester
{
    private $id;
    private $idTahunAjaran;
    private $nama;
    private $namaInggris;
    private $singkatan;
    private $singkatanInggris;
    private $semester;
    private $aktif;
    private $tanggalMulai;
    private $tanggalSelesai;

    public function getNamaInggris() {
        $awal = explode(" ", $this->nama);
        $awalInggris;
        switch ($awal[0]) {
            case "Gasal":
                $awalInggris = "Odd";
                break;
            case "Genap":
                $awalInggris = "Even";
                break;
            case "Pendek":
                $awalInggris = "Short";
                break;
            default:
                $awalInggris = $awal;
                break;
        }
        return $awalInggris + " " + $awal[1];
    }

    public function getSingkatan() {
        $awal = explode(" ", $this->nama);
        $singkatan;
        switch ($awal[0]) {
            case "Gasal":
                $singkatan = "Gs.";
                break;
            case "Genap":
                $singkatan = "Gn.";
                break;
            case "Pendek":
                $singkatan = "Pd.";
                break;
            default:
                $singkatan = $awal;
                break;
        }
        return $singkatan + " " + $awal[1];
    }
}
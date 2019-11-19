<?php

namespace Siakad\Scheduling\Domain\Model;

class Mahasiswa
{
    private $id;
    private $idPddikti;
    private $NRP;
    private $NRPLama;
    private $SKSDiakui;
    private $satuanPendidikanAsal;
    private $prodiAsal;
    private $tanggalMasuk;
    private $tanggalKeluar;
    private $IPK;
    private $bidikMisi;
    private $NISN;
    private $tahunIjazahSebelumnya;
    private $namaRekening;
    private $nomorRekening;

    public function getId()
    {
        return $this->id;
    }

    public function setId($id)
    {
        $this->id = $id;
    }

    public function getIdPddikti()
    {
        return $this->idPddikti;
    }

    public function setIdPddikti($idPddikti)
    {
        $this->idPddikti = $idPddikti;
    }

    public function getNRP()
    {
        return $this->NRP;
    }

    public function setNRP($NRP)
    {
        $this->NRP = $NRP;
    }

    public function getNRPLama()
    {
        return $this->NRPLama;
    }

    public function setNRPLama($NRPLama)
    {
        $this->NRPLama = $NRPLama;
    }

    public function getSKSDiakui()
    {
        return $this->SKSDiakui;
    }

    public function setSKSDiakui($SKSDiakui)
    {
        $this->SKSDiakui = $SKSDiakui;
    }

    public function getSatuanPendidikanAsal()
    {
        return $this->satuanPendidikanAsal;
    }

    public function setSatuanPendidikanAsal($satuanPendidikanAsal)
    {
        $this->satuanPendidikanAsal = $satuanPendidikanAsal;
    }

    public function getProdiAsal()
    {
        return $this->prodiAsal;
    }

    public function setProdiAsal($prodiAsal)
    {
        $this->prodiAsal = $prodiAsal;
    }

    public function getTanggalMasuk()
    {
        return $this->tanggalMasuk;
    }

    public function setTanggalMasuk($tanggalMasuk)
    {
        $this->tanggalMasuk = $tanggalMasuk;
    }

    public function getTanggalKeluar()
    {
        return $this->tanggalKeluar;
    }

    public function setTanggalKeluar($tanggalKeluar)
    {
        $this->tanggalKeluar = $tanggalKeluar;
    }

    public function getIPK()
    {
        return $this->IPK;
    }

    public function setIPK($IPK)
    {
        $this->IPK = $IPK;
    }

    public function getBidikMisi()
    {
        return $this->bidikMisi;
    }

    public function setBidikMisi($bidikMisi)
    {
        $this->bidikMisi = $bidikMisi;
    }

    public function getNISN()
    {
        return $this->NISN;
    }

    public function setNISN($NISN)
    {
        $this->NISN = $NISN;
    }

    public function getTahunIjazahSebelumnya()
    {
        return $this->tahunIjazahSebelumnya;
    }

    public function setTahunIjazahSebelumnya($tahunIjazahSebelumnya)
    {
        $this->tahunIjazahSebelumnya = $tahunIjazahSebelumnya;
    }

    public function getNamaRekening()
    {
        return $this->namaRekening;
    }

    public function setNamaRekening($namaRekening)
    {
        $this->namaRekening = $namaRekening;
    }

    public function getNomorRekening()
    {
        return $this->nomorRekening;
    }

    public function setNomorRekening($nomorRekening)
    {
        $this->nomorRekening = $nomorRekening;
    }

}
<?php 

class SatuanKerja
{
    private $id;
    private $nama;
    private $namaInggris;
    private $namaDikti;
    private $namaSingkat;
    private $kodeSatker;
    private $kodeKeuangan;
    private $kodeNomorRegistrasiPokok;
    private $levelSatker;
    private $website;
    private $email;
    private $nomorTelepon;
    private $nomorFaks;
    private $nomorPABX;
    private $tanggalBerdiri;
    private $SKPenyelenggaraan;
    private $tanggalSKPenyelenggaraan;
    private $TMTSKPenyelenggaraan;
    private $TSTSKPenyelenggaraan;
    private $idSimpelFakultas;
    private $idSimpelJurusan;
    private $idSImpelLabits;
    private $idSiakadFakultas;
    private $idSiakadJurusan;
    private $idSiakadProdi;
    private $idSipmabaFakultas;
    private $idSipmabaJurusan;
    private $idSipmabaProdi;
    private $idSimpegMsSatker;
    private $idSimpegJurusan;
    private $idSimpegLabits;
    private $idEKantorUnit;

    public function getId()
    {
        return $this->id;
    }

    public function setId($id)
    {
        $this->id = $id;
    }

    public function getNama()
    {
        return $this->nama;
    }

    public function setNama($nama)
    {
        $this->nama = $nama;
    }

    public function getNamaInggris()
    {
        return $this->namaInggris;
    }

    public function setNamaInggris($namaInggris)
    {
        $this->namaInggris = $namaInggris;
    }

    public function getNamaDikti()
    {
        return $this->namaDikti;
    }

    public function setNamaDikti($namaDikti)
    {
        $this->namaDikti = $namaDikti;
    }

    public function getNamaSingkat()
    {
        return $this->namaSingkat;
    }

    public function setNamaSingkat($namaSingkat)
    {
        $this->namaSingkat = $namaSingkat;
    }

    public function getKodeSatker()
    {
        return $this->kodeSatker;
    }

    public function setKodeSatker($kodeSatker)
    {
        $this->kodeSatker = $kodeSatker;
    }

    public function getKodeKeuangan()
    {
        return $this->kodeKeuangan;
    }

    public function setKodeKeuangan($kodeKeuangan)
    {
        $this->kodeKeuangan = $kodeKeuangan;
    }

    public function getKodeNomorRegistrasiPokok()
    {
        return $this->kodeNomorRegistrasiPokok;
    }

    public function setKodeNomorRegistrasiPokok($kodeNomorRegistrasiPokok)
    {
        $this->kodeNomorRegistrasiPokok = $kodeNomorRegistrasiPokok;
    }

    public function getLevelSatker()
    {
        return $this->levelSatker;
    }

    public function setLevelSatker($levelSatker)
    {
        $this->levelSatker = $levelSatker;
    }

    public function getWebsite()
    {
        return $this->website;
    }

    public function setWebsite($website)
    {
        $this->website = $website;
    }

    public function getEmail()
    {
        return $this->email;
    }

    public function setEmail($email)
    {
        $this->email = $email;
    }

    public function getNomorTelepon()
    {
        return $this->nomorTelepon;
    }

    public function setNomorTelepon($nomorTelepon)
    {
        $this->nomorTelepon = $nomorTelepon;
    }

    public function getNomorFaks()
    {
        return $this->nomorFaks;
    }

    public function setNomorFaks($nomorFaks)
    {
        $this->nomorFaks = $nomorFaks;
    }

    public function getNomorPABX()
    {
        return $this->nomorPABX;
    }

    public function setNomorPABX($nomorPABX)
    {
        $this->nomorPABX = $nomorPABX;
    }

    public function getTanggalBerdiri()
    {
        return $this->tanggalBerdiri;
    }

    public function setTanggalBerdiri($tanggalBerdiri)
    {
        $this->tanggalBerdiri = $tanggalBerdiri;
    }

    public function getSKPenyelenggaraan()
    {
        return $this->SKPenyelenggaraan;
    }

    public function setSKPenyelenggaraan($SKPenyelenggaraan)
    {
        $this->SKPenyelenggaraan = $SKPenyelenggaraan;
    }

    public function getTanggalSKPenyelenggaraan()
    {
        return $this->tanggalSKPenyelenggaraan;
    }

    public function setTanggalSKPenyelenggaraan($tanggalSKPenyelenggaraan)
    {
        $this->tanggalSKPenyelenggaraan = $tanggalSKPenyelenggaraan;
    }

    public function getTMTSKPenyelenggaraan()
    {
        return $this->TMTSKPenyelenggaraan;
    }

    public function setTMTSKPenyelenggaraan($TMTSKPenyelenggaraan)
    {
        $this->TMTSKPenyelenggaraan = $TMTSKPenyelenggaraan;
    }

    public function getTSTSKPenyelenggaraan()
    {
        return $this->TSTSKPenyelenggaraan;
    }

    public function setTSTSKPenyelenggaraan($TSTSKPenyelenggaraan)
    {
        $this->TSTSKPenyelenggaraan = $TSTSKPenyelenggaraan;
    }

    public function getIdSimpelFakultas()
    {
        return $this->idSimpelFakultas;
    }

    public function setIdSimpelFakultas($idSimpelFakultas)
    {
        $this->idSimpelFakultas = $idSimpelFakultas;
    }

    public function getIdSimpelJurusan()
    {
        return $this->idSimpelJurusan;
    }

    public function setIdSimpelJurusan($idSimpelJurusan)
    {
        $this->idSimpelJurusan = $idSimpelJurusan;
    }

    public function getIdSImpelLabits()
    {
        return $this->idSImpelLabits;
    }

    public function setIdSImpelLabits($idSImpelLabits)
    {
        $this->idSImpelLabits = $idSImpelLabits;
    }

    public function getIdSiakadFakultas()
    {
        return $this->idSiakadFakultas;
    }

    public function setIdSiakadFakultas($idSiakadFakultas)
    {
        $this->idSiakadFakultas = $idSiakadFakultas;
    }

    public function getIdSiakadJurusan()
    {
        return $this->idSiakadJurusan;
    }

    public function setIdSiakadJurusan($idSiakadJurusan)
    {
        $this->idSiakadJurusan = $idSiakadJurusan;
    }

    public function getIdSiakadProdi()
    {
        return $this->idSiakadProdi;
    }

    public function setIdSiakadProdi($idSiakadProdi)
    {
        $this->idSiakadProdi = $idSiakadProdi;
    }

    public function getIdSipmabaFakultas()
    {
        return $this->idSipmabaFakultas;
    }

    public function setIdSipmabaFakultas($idSipmabaFakultas)
    {
        $this->idSipmabaFakultas = $idSipmabaFakultas;
    }

    public function getIdSipmabaJurusan()
    {
        return $this->idSipmabaJurusan;
    }

    public function setIdSipmabaJurusan($idSipmabaJurusan)
    {
        $this->idSipmabaJurusan = $idSipmabaJurusan;
    }

    public function getIdSipmabaProdi()
    {
        return $this->idSipmabaProdi;
    }

    public function setIdSipmabaProdi($idSipmabaProdi)
    {
        $this->idSipmabaProdi = $idSipmabaProdi;
    }

    public function getIdSimpegMsSatker()
    {
        return $this->idSimpegMsSatker;
    }

    public function setIdSimpegMsSatker($idSimpegMsSatker)
    {
        $this->idSimpegMsSatker = $idSimpegMsSatker;
    }

    public function getIdSimpegJurusan()
    {
        return $this->idSimpegJurusan;
    }

    public function setIdSimpegJurusan($idSimpegJurusan)
    {
        $this->idSimpegJurusan = $idSimpegJurusan;
    }

    public function getIdSimpegLabits()
    {
        return $this->idSimpegLabits;
    }

    public function setIdSimpegLabits($idSimpegLabits)
    {
        $this->idSimpegLabits = $idSimpegLabits;
    }

    public function getIdEKantorUnit()
    {
        return $this->idEKantorUnit;
    }

    public function setIdEKantorUnit($idEKantorUnit)
    {
        $this->idEKantorUnit = $idEKantorUnit;
    }

}
<?php

namespace Siakad\Scheduling\Domain\Model;

class Dosen
{
    private $id;
    private $nama;
    private $NIK;
    private $jenisKelamin;
    private $tempatLahir;
    private $tanngalLahir;
    private $golonganDarah;
    private $gelarDepan;
    private $gelarBelakang;
    private $NIDN;
    private $NIP;
    private $NPWP;
    private $nawaWajibPajak;
    private $emailPertama;
    private $emailKedua;
    private $emailKetiga;
    private $kartuPegawai;
    private $askes;
    private $taspen;
    private $nomorTelepon;
    private $nomorHandphone;
    private $tanggalWafat;
    private $tanggalPensiun;
    private $fingerprint;
    private $idPDDIKTI;
    private $idGoogleScholar;
    private $idScopus;
    private $idSINTA;
    private $idSIMPEGPEGAWAI;

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

    public function getNIK()
    {
        return $this->NIK;
    }

    public function setNIK($NIK)
    {
        $this->NIK = $NIK;
    }

    public function getJenisKelamin()
    {
        return $this->jenisKelamin;
    }

    public function setJenisKelamin($jenisKelamin)
    {
        $this->jenisKelamin = $jenisKelamin;
    }

    public function getTempatLahir()
    {
        return $this->tempatLahir;
    }

    public function setTempatLahir($tempatLahir)
    {
        $this->tempatLahir = $tempatLahir;
    }

    public function getTanngalLahir()
    {
        return $this->tanngalLahir;
    }

    public function setTanngalLahir($tanngalLahir)
    {
        $this->tanngalLahir = $tanngalLahir;
    }

    public function getGolonganDarah()
    {
        return $this->golonganDarah;
    }

    public function setGolonganDarah($golonganDarah)
    {
        $this->golonganDarah = $golonganDarah;
    }

    public function getGelarDepan()
    {
        return $this->gelarDepan;
    }

    public function setGelarDepan($gelarDepan)
    {
        $this->gelarDepan = $gelarDepan;
    }

    public function getGelarBelakang()
    {
        return $this->gelarBelakang;
    }

    public function setGelarBelakang($gelarBelakang)
    {
        $this->gelarBelakang = $gelarBelakang;
    }

    public function getNIDN()
    {
        return $this->NIDN;
    }

    public function setNIDN($NIDN)
    {
        $this->NIDN = $NIDN;
    }

    public function getNIP()
    {
        return $this->NIP;
    }

    public function setNIP($NIP)
    {
        $this->NIP = $NIP;
    }

    public function getNPWP()
    {
        return $this->NPWP;
    }

    public function setNPWP($NPWP)
    {
        $this->NPWP = $NPWP;
    }

    public function getNawaWajibPajak()
    {
        return $this->nawaWajibPajak;
    }

    public function setNawaWajibPajak($nawaWajibPajak)
    {
        $this->nawaWajibPajak = $nawaWajibPajak;
    }

    public function getEmailPertama()
    {
        return $this->emailPertama;
    }

    public function setEmailPertama($emailPertama)
    {
        $this->emailPertama = $emailPertama;
    }

    public function getEmailKedua()
    {
        return $this->emailKedua;
    }

    public function setEmailKedua($emailKedua)
    {
        $this->emailKedua = $emailKedua;
    }

    public function getEmailKetiga()
    {
        return $this->emailKetiga;
    }

    public function setEmailKetiga($emailKetiga)
    {
        $this->emailKetiga = $emailKetiga;
    }

    public function getKartuPegawai()
    {
        return $this->kartuPegawai;
    }

    public function setKartuPegawai($kartuPegawai)
    {
        $this->kartuPegawai = $kartuPegawai;
    }

    public function getAskes()
    {
        return $this->askes;
    }

    public function setAskes($askes)
    {
        $this->askes = $askes;
    }

    public function getTaspen()
    {
        return $this->taspen;
    }

    public function setTaspen($taspen)
    {
        $this->taspen = $taspen;
    }

    public function getNomorTelepon()
    {
        return $this->nomorTelepon;
    }

    public function setNomorTelepon($nomorTelepon)
    {
        $this->nomorTelepon = $nomorTelepon;
    }

    public function getNomorHandphone()
    {
        return $this->nomorHandphone;
    }

    public function setNomorHandphone($nomorHandphone)
    {
        $this->nomorHandphone = $nomorHandphone;
    }

    public function getTanggalWafat()
    {
        return $this->tanggalWafat;
    }

    public function setTanggalWafat($tanggalWafat)
    {
        $this->tanggalWafat = $tanggalWafat;
    }

    public function getTanggalPensiun()
    {
        return $this->tanggalPensiun;
    }

    public function setTanggalPensiun($tanggalPensiun)
    {
        $this->tanggalPensiun = $tanggalPensiun;
    }

    public function getFingerprint()
    {
        return $this->fingerprint;
    }

    public function setFingerprint($fingerprint)
    {
        $this->fingerprint = $fingerprint;
    }

    public function getIdPDDIKTI()
    {
        return $this->idPDDIKTI;
    }

    public function setIdPDDIKTI($idPDDIKTI)
    {
        $this->idPDDIKTI = $idPDDIKTI;
    }

    public function getIdGoogleScholar()
    {
        return $this->idGoogleScholar;
    }

    public function setIdGoogleScholar($idGoogleScholar)
    {
        $this->idGoogleScholar = $idGoogleScholar;
    }

    public function getIdScopus()
    {
        return $this->idScopus;
    }

    public function setIdScopus($idScopus)
    {
        $this->idScopus = $idScopus;
    }

    public function getIdSINTA()
    {
        return $this->idSINTA;
    }

    public function setIdSINTA($idSINTA)
    {
        $this->idSINTA = $idSINTA;
    }

    public function getIdSIMPEGPEGAWAI()
    {
        return $this->idSIMPEGPEGAWAI;
    }

    public function setIdSIMPEGPEGAWAI($idSIMPEGPEGAWAI)
    {
        $this->idSIMPEGPEGAWAI = $idSIMPEGPEGAWAI;
    }


}
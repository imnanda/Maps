<?php

class kecamatan
{
    public $idKecamatan;
    public $namaKecamatan;
    public $kodePos;

    function jumlah()
    {
        return mysqli_num_rows($this->ambilData());
    }

    function ambilData()
    {
        $sql = "SELECT * FROM kecamatan";
        return Koneksi::getconn()->query($sql);
    }

    function tambahKecamatan()
    {
        $sql = "INSERT INTO kecamatan(namaKecamatan, kodePos) VALUES($this->namaKecamatan, $this->kodePos)";
        return Koneksi::getconn()->query($sql);
    }

    function ubahKecamatan()
    {
        $sql = "UPDATE kecamatan SET kodePos = '$this->kodePos', namaKecamatan = '$this->namaKecamatan' WHERE idKecamatan = $this->idKecamatan";
        return Koneksi::getconn()->query($sql);
    }

    function hapusKecamatan()
    {
        $sql = "DELETE FROM kecamatan WHERE idKecamatan = $this->idKecamatan";
        return Koneksi::getconn()->query($sql);
    }

    function hasKelurahan()
    {
        $sql = "SELECT * FROM kelurahan WHERE idKecamatan = $this->idKecamatan";
        return Koneksi::getconn()->query($sql);
    }
}
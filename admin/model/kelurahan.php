<?php

class kelurahan
{
    public $idKelurahan;
    public $namaKelurahan;

    function jumlah()
    {
        return mysqli_num_rows($this->ambilData());
    }

    function ambilData()
    {
        $sql = "SELECT idKelurahan, namaKelurahan, kelurahan.idKecamatan, kodePos " .
            "FROM kelurahan, kecamatan WHERE kelurahan.idKecamatan = kecamatan.idKecamatan";
        return Koneksi::getconn()->query($sql);
    }

    function tambahKelurahan($idKecamatan)
    {
        $sql = "INSERT INTO kelurahan(namaKelurahan, idKecamatan) VALUES('$this->namaKelurahan', $idKecamatan)";
        return Koneksi::getconn()->query($sql);
    }

    function ubahKelurahan($idKecamatan)
    {
        $sql = "UPDATE kelurahan SET namaKelurahan = '$this->namaKelurahan', idKecamatan = '$idKecamatan' WHERE idKelurahan = $this->idKelurahan";
        return Koneksi::getconn()->query($sql);
    }

    function hapusKelurahan()
    {
        $sql = "DELETE FROM kelurahan WHERE idKelurahan = $this->idKelurahan";
        return Koneksi::getconn()->query($sql);
    }

    function getKodePos($idKecamatan)
    {
        $sql = "SELECT kodePos FROM kecamatan WHERE idKecamatan = $idKecamatan";
        return Koneksi::getconn()->query($sql);
    }
}

?>
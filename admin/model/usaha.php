<?php

class usaha
{
    public $idLokasi;
    public $longtitude;
    public $latitude;
    public $nama;
    public $alamat;
    public $deskripsi;
    public $skalaUsaha;

    function jumlah()
    {
        return mysqli_num_rows($this->ambilData());
    }

    function ambilData()
    {
        $sql = "SELECT idUsaha, latitude, longtitude, namaUsaha, statusUsaha, alamatUsaha, deskripsi, skalaUsaha, " .
            "u.idSektor, namaSektor, u.idKecamatan, namaKecamatan, u.idKelurahan, namaKelurahan, u.noKTP, pu.nama " .
            "FROM usaha u, sektorusaha su, pemilikusaha pu, kecamatan kec, kelurahan kel " .
            "WHERE u.noKTP = pu.noKTP AND u.idKecamatan = kec.idKecamatan AND u.idKelurahan = kel.idKelurahan AND " .
            "u.idSektor = su.idSektor";
        return Koneksi::getconn()->query($sql);
    }

    function approving()
    {
        $sql = "UPDATE ";
        return Koneksi::getconn()->query($sql);
    }
}

?>
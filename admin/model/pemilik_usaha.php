<?php

class pemilik_usaha
{
    public $noKTP;
    public $nama;
    public $email;
    public $noHP;
    public $alamat;
    public $tglLahir;
    public $tmpLahir;
    public $status;
    public $pathKTP;
    public $username;
    public $pass;
    public $token;

    function jumlah()
    {
        return mysqli_num_rows($this->ambilData());
    }

    function ambilData()
    {
        $sql = "SELECT * FROM pemilikusaha";
        return Koneksi::getconn()->query($sql);
    }
}

?>
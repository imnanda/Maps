<?php

class sektorUsaha
{
    public $idSektor;
    public $namaSektor;

    function ambilData()
    {
        $sql = "SELECT * FROM sektorusaha";
        return Koneksi::getconn()->query($sql);
    }

}

?>
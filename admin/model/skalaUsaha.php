<?php

class skalaUsaha
{

    function ambilData($skala)
    {
        $sql = "SELECT * FROM usaha WHERE skalaUsaha = \"$skala\"";
        return Koneksi::getconn()->query($sql);
    }

}

?>
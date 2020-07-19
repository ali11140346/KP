<?php
error_reporting(0);
function decrypt($str) {
    $str = base64_decode(urldecode($str));
    $hasil = '';
    $kunci = 'phantom1395';
    for ($i = 0; $i < strlen($str); $i++) {
        $karakter = substr($str, $i, 1);
        $kuncikarakter = substr($kunci, ($i % strlen($kunci))-1, 1);
        $karakter = chr(ord($karakter)-ord($kuncikarakter));
        $hasil .= $karakter;
    }
    return $hasil;
}
?>

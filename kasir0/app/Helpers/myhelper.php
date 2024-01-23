<?php

function format_rupiah($angka) {
    // Convert the input to float
    $angka = (float) $angka;

    // Format the float as rupiah
    $hasil_rupiah = number_format($angka, 0, ',', '.');

    return $hasil_rupiah;
}

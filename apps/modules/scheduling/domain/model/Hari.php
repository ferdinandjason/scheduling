<?php

namespace Siakad\Scheduling\Domain\Model;

interface Hari
{
    const Senin  = 0;
    const Selasa = 1;
    const Rabu   = 2;
    const Kamis  = 3;
    const Jumat  = 4;
    const Sabtu  = 5;
    const Minggu = 6;

    const StringForm = [
        "Senin",
        "Selasa",
        "Rabu",
        "Kamis",
        "Jumat",
        "Sabtu",
        "Minggu"
    ];

}
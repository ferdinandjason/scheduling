<?php

namespace Siakad\Scheduling\Domain\Model;

interface TipePeriodeKuliah
{
    const Null   = 0;
    const Gasal  = 1;
    const Genap  = 2;
    const Pendek = 3;

    const GasalString = "Gasal";
    const GenapString = "Genap";
    const PendekString = "Pendek";
}

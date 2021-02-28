<?php

namespace App\Imports;

use App\Models\Data;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class DataImport implements ToModel , WithHeadingRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Data([
            'data_nama' => $row['nama'],
            'data_usia' => $row['usia'],
            'data_penghasilan' => $row['penghasilan'],
            'data_tanggungan' => $row['tanggungan'],
            'data_nik' => $row['nik'],
            'data_pekerjaan' => $row['pekerjaan'],
            'data_kategori' => $row['no_kategori']
        ]);
    }
}

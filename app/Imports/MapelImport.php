<?php

namespace App\Imports;

use App\Models\Mapel;
use Maatwebsite\Excel\Concerns\ToModel;

class MapelImport implements ToModel
{
    public function model(array $row)
    {
        // Abaikan baris kosong
        if (!isset($row[0])) {
            return null;
        }

        return new Mapel([
            'nama_mapel' => $row[0],
            'kode'       => $row[1] ?? null,
        ]);
    }
}

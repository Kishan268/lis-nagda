<?php

namespace App\Imports;

use App\ImportStudentData;
use Maatwebsite\Excel\Concerns\ToModel;

class ImportStudents implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new ImportStudentData([
            //
        ]);
    }
}

<?php

namespace App\Imports;

use App\Models\Lead;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;

class LeadImport implements ToCollection
{
    /**
    * @param Collection $collection
    */
    public function collection(Collection $rows)
    {
        foreach ($rows as $row)
        {
            Lead::create([
                'full_name' => $row[0],
                'email' => $row[1],
                'phone_number' => $row[2],
                'job_title' => $row[3],
                'city' => $row[4],
            ]);
        }
    }
}

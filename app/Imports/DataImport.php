<?php

namespace App\Imports;

use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\Importable;
use Maatwebsite\Excel\Concerns\WithCustomCsvSettings;
use Illuminate\Contracts\Queue\ShouldQueue;
use Maatwebsite\Excel\Concerns\WithChunkReading;
use Maatwebsite\Excel\Concerns\SkipsFailures;
use Maatwebsite\Excel\Concerns\SkipsOnError;
use Maatwebsite\Excel\Concerns\SkipsErrors; 
use Log;

class DataImport implements ToCollection, WithCustomCsvSettings, SkipsOnError, ShouldQueue, WithChunkReading
{
    use Importable, SkipsFailures, SkipsErrors;
    /**
    * @param Collection $collection
    */
    public function collection(Collection $rows)
    {
        foreach ($rows as $row) 
        {
            Log::debug($row);
            $email = new EmailHelper();
            $email->createContentForTemplateByImporter($row);
            Mail::to($this->getEmail())->queue(new PostMail($email));
        }
    }

    public function chunkSize(): int
    {
        return 10;
    }

    public function getCsvSettings(): array
    {
        return [
            'input_encoding' => 'ISO-8859-1'
        ];
    }      
}

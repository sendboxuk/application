<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithFileUploads;
use Illuminate\Http\UploadedFile;
use App\Imports\DataImport;

class UploadTool extends Component
{
    use WithFileUploads;

    public $csv_file;

    public function uploadFile()
    {
        $this->validate([
            'csv_file' => 'required|file|max:1024', // 1MB Max
        ]);
        $folder = 'uploads/';
        $filename = time() .'.' . $this->csv_file->getClientOriginalExtension();
        $filePath = $folder . $filename;
        $rst = $this->upload($this->csv_file, $folder, 'local', $filename);     
        if ($rst){
            (new DataImport)->import($filePath, null, \Maatwebsite\Excel\Excel::CSV);
            session()->flash('message', 'The file uploaded');   
        }else{
            session()->flash('error', 'The file can\'t upload');   
        }

    }

    protected function upload(UploadedFile $uploadedFile, $folder = null, $disk = 'local', $name)
    {
        $uploadedFile->storeAs($folder, $name, $disk);

        return true;
    }

    public function render()
    {
        return view('livewire.upload-tool');
    }
}

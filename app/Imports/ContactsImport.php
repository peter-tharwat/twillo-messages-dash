<?php

namespace App\Imports;

use App\ModelContact;
use Maatwebsite\Excel\Concerns\ToModel;

class ContactsImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public $tags;
    public $import;

    public function __construct($tags=[],$import)
    {
        $this->tags = $tags;
        $this->import=$import;
    }
    public function model(array $row)
    {
     
        /*if(is_numeric($row[2])){ */  

            $contact=\App\Models\Contact::create([
                'f_name'=>$row[0],
                'l_name'=>$row[1],
                'phone'=>$row[2], 
                'import_id'=>$import->id
            ]);
            $contact->tags()->sync($this->tags); 

        /*}*/ 
    }
}

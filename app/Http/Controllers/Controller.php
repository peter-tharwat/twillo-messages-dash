<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;
    public function upload_file( 
    	$file=null,
    	$path="uploads",
    	$privacy="public"
    )
    {
    	if(isset($file)){ 
    		$file_name = uniqid() . '.' . $file->getClientOriginalExtension(); 
    		$filePath = '/'.$path.'/' . $file_name;
    		\Storage::put($filePath, file_get_contents($file), $privacy);
    		return $file_name; 
    	}
    	return '';
    }
    
}

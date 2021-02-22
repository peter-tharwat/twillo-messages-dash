<?php

namespace App\Http\Controllers;

use App\Models\Import;
use App\Imports\ContactsImport;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Http\Request;

class ImportController extends Controller
{
  

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */ 
    public function index(Request $request)
    {
        $imports=Import::where(function($q)use($request){
            if($request->key!=null)
                $q->where('path','LIKE',"%$request->key%")
                ->orWhere('status','LIKE',"%$request->key%");  
        })->orderBy('id','DESC')->paginate();
        return view('imports.index',compact('imports'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('imports.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //dd($request->all());

        $request->validate([
            'note'=>"nullable|max:255",
            'tags'=>"array|nullable",
            'tags.*'=>"nullable|exists:tags,id", 
        ]);


        $extensions = array("xls","xlsx","xlm","xla","xlc","xlt","xlw"); 
        $result = array($request->file('file')->getClientOriginalExtension()); 
        if(in_array($result[0],$extensions)){
             // Do something when Succeeded 
        }else{
            emotify('success', 'برجا التأكد من صحة الملف');
            return redirect()->back();
        }
        $import= \App\Models\Import::create([
            'note'=>$request->note,
            'path'=>$import_name
        ]);
        $import_name= $this->upload_file($request->file,'public/imports'); 
        Excel::import(new ContactsImport($request->tags,$import), $request->file('file'));
        
        emotify('success', 'تمت الإضافة بنجاح');
        return redirect()->route('imports.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Tag  $tag
     * @return \Illuminate\Http\Response
     */
    public function show(Tag $tag)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Tag  $tag
     * @return \Illuminate\Http\Response
     */
    public function edit(Tag $tag)
    {
        //return view('imports.edit',compact('import'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Tag  $tag
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Tag $tag)
    {
       /* $request->validate([
            'tag_name'=>"required|min:2|max:255", 
            'note'=>"nullable|max:255", 
        ]);
        $tag->update([
            'tag_name'=>$request->tag_name,  
            'note'=>$request->note,
        ]);
        emotify('success', 'تم التعديل بنجاح');
        return redirect()->route('imports.index');*/
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Tag  $tag
     * @return \Illuminate\Http\Response
     */
    public function destroy(Tag $tag)
    {
        /*$tag->delete();
        emotify('success', 'تمت الحذف بنجاح');
        return redirect()->route('imports.index');*/
    }


}

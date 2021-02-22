<?php

namespace App\Http\Controllers;

use App\Models\Tag;
use Illuminate\Http\Request;

class TagController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */


    public function index(Request $request)
    {
        $tags=Tag::where(function($q)use($request){
            if($request->key!=null)
                $q->where('tag_name','LIKE',"%$request->key%")
                ->orWhere('note','LIKE',"%$request->key%");  
        })->orderBy('id','DESC')->paginate();
        return view('tags.index',compact('tags'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('tags.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'tag_name'=>"required|min:2|max:255", 
            'note'=>"nullable|max:255", 
        ]);
        $tag=Tag::create([
            'tag_name'=>$request->tag_name, 
            'note'=>$request->note,
        ]);
        emotify('success', 'تمت الإضافة بنجاح');
        return redirect()->route('tags.index');
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
        return view('tags.edit',compact('tag'));
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
        $request->validate([
            'tag_name'=>"required|min:2|max:255", 
            'note'=>"nullable|max:255", 
        ]);
        $tag->update([
            'tag_name'=>$request->tag_name,  
            'note'=>$request->note,
        ]);
        emotify('success', 'تم التعديل بنجاح');
        return redirect()->route('tags.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Tag  $tag
     * @return \Illuminate\Http\Response
     */
    public function destroy(Tag $tag)
    {
        $tag->delete();
        emotify('success', 'تمت الحذف بنجاح');
        return redirect()->route('tags.index');
    }
}

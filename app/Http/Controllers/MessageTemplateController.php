<?php

namespace App\Http\Controllers;

use App\Models\MessageTemplate;
use Illuminate\Http\Request;

class MessageTemplateController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */ 
    public function index(Request $request)
    {
        $templates=MessageTemplate::where(function($q)use($request){
            if($request->key!=null)
                $q->where('title','LIKE',"%$request->key%")
                ->orWhere('content','LIKE',"%$request->key%")
                ->orWhere('note','LIKE',"%$request->key%");  
        })->orderBy('id','DESC')->paginate();
        return view('templates.index',compact('templates'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('templates.create');
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
            'title'=>"required|min:2|max:255", 
            'content'=>"required|min:2|max:1000", 
        ]);
        $template=MessageTemplate::create([
            'title'=>$request->title, 
            'content'=>$request->content,
        ]);
        emotify('success', 'تمت الإضافة بنجاح');
        return redirect()->route('message-templates.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\MessageTemplate  $messageTemplate
     * @return \Illuminate\Http\Response
     */
    public function show(MessageTemplate $messageTemplate)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\MessageTemplate  $messageTemplate
     * @return \Illuminate\Http\Response
     */
    public function edit(MessageTemplate $message_template)
    {
        return view('templates.edit',compact('message_template'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\MessageTemplate  $messageTemplate
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, MessageTemplate $messageTemplate)
    {
        $request->validate([
            'title'=>"required|min:2|max:255", 
            'content'=>"required|min:2|max:1000", 
        ]);
        $messageTemplate->update([
            'title'=>$request->title, 
            'content'=>$request->content,
        ]);
        emotify('success', 'تم التعديل بنجاح');
        return redirect()->route('message-templates.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\MessageTemplate  $messageTemplate
     * @return \Illuminate\Http\Response
     */
    public function destroy(MessageTemplate $messageTemplate)
    {
       $messageTemplate->delete();
       emotify('success', 'تم الحذف بنجاح');
        return redirect()->route('message-templates.index');
    }
}

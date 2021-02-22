<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $contacts=Contact::where(function($q)use($request){
            if($request->key!=null)
                $q->where('f_name','LIKE',"%$request->key%")
                ->orWhere('l_name','LIKE',"%$request->key%")
                ->orWhere('phone','LIKE',"%$request->key%");  
        })->orderBy('id','DESC')->paginate();
        return view('contacts.index',compact('contacts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('contacts.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        /*dd($request->all());*/
        $request->validate([
            'f_name'=>"required|min:2|max:255",
            'l_name'=>"required|min:2|max:255",
            'phone'=>"required|min:2|max:255",
            'note'=>"nullable|max:255",
            'tags'=>"array|nullable",
            'tags.*'=>"nullable|exists:tags,id"
        ]);
        $contact = Contact::create([
            'f_name'=>$request->f_name,
            'l_name'=>$request->l_name,
            'phone'=>$request->phone,
            'note'=>$request->note,
        ]);
        $contact->tags()->sync($request->tags); 
        emotify('success', 'تمت الإضافة بنجاح');
        return redirect()->route('contacts.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Contact  $contact
     * @return \Illuminate\Http\Response
     */
    public function show(Contact $contact)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Contact  $contact
     * @return \Illuminate\Http\Response
     */
    public function edit(Contact $contact)
    {
        return view('contacts.edit',compact('contact'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Contact  $contact
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Contact $contact)
    {
        $request->validate([
            'f_name'=>"required|min:2|max:255",
            'l_name'=>"required|min:2|max:255",
            'phone'=>"required|min:2|max:255",
            'note'=>"nullable|max:255",
            'tags'=>"array|nullable",
            'tags.*'=>"nullable|exists:tags,id"
        ]);
        $contact->update([
            'f_name'=>$request->f_name,
            'l_name'=>$request->l_name,
            'phone'=>$request->phone,
            'note'=>$request->note,
        ]);
        $contact->tags()->sync($request->tags); 
        emotify('success', 'تم التعديل بنجاح');
        return redirect()->route('contacts.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Contact  $contact
     * @return \Illuminate\Http\Response
     */
    public function destroy(Contact $contact)
    {
        $contact->delete();
        emotify('success', 'تم الحذف بنجاح');
        return redirect()->route('contacts.index');
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\Message;
use Illuminate\Http\Request;
use Twilio;
class MessageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    { 
        $messages=Message::where(function($q)use($request){
            if($request->key!=null)
                $q->where('contact_id','LIKE',"%$request->key%")
                ->orWhere('phone','LIKE',"%$request->key%")
                ->orWhere('content','LIKE',"%$request->key%")
                ->orWhere('status','LIKE',"%$request->key%");  
        })->orderBy('id','DESC')->paginate();
        return view('messages.index',compact('messages'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
       return view('messages.create');
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
            'content'=>"required|min:2|max:1200",
        ]); 
        if($request->tags!=null){
            $request->validate([
                'tags'=>"array|required",
                'tags.*'=>"required|exists:tags,id"
            ]);
            //$tags= \App\Models\Tag::whereIn('id',$request->tags)->get();
            $contacts = \App\Models\Contact::whereHas('tags',function($q)use($request){
                $q->whereIn('tags.id',$request->tags);
            })->get();
            
            foreach($contacts as $contact){
               
                $this->send_message($contact,$request->content);
            }
       
        }else if($request->contacts_id!=null){
            $request->validate([
                'contacts_id'=>"array|required",
                'contacts_id.*'=>"required|exists:contacts,id"
            ]);
            $contacts = \App\Models\Contact::whereIn('id',$request->contacts_id)->get();
            foreach($contacts as $contact){
                $this->send_message($contact,$request->content);
            }
        } 
        
        emotify('success', 'تمت الإضافة بنجاح');
        return redirect()->route('messages.index');

    }

    public function send_message($contact,$content)
    {

//template_id
//status
        /*
            send twillo message 
        */ 
        $message= \App\Models\Message::create([
            'contact_id'=>$contact->id,
            'phone'=>$contact->phone,
            'content'=>$content, 
            'status'=>"PENDING"
        ]); 

        $message->notify(new \App\Notifications\MessageNotification($message));
        
        return $message;
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Message  $message
     * @return \Illuminate\Http\Response
     */
    public function show(Message $message)
    {
        return "<pre>".$message."</pre>";
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Message  $message
     * @return \Illuminate\Http\Response
     */
    public function edit(Message $message)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Message  $message
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Message $message)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Message  $message
     * @return \Illuminate\Http\Response
     */
    public function destroy(Message $message)
    {
        //
    }
}

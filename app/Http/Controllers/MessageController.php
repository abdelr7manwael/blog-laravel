<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Message;
class MessageController extends Controller
{
    public function index()
    {

        $messages = Message::get();
        return view('message/list',['messages'=>$messages]);

    }
    public function create()
    {
        //
        return view('message/create');

    }
    public function store(Request $request)
    {
        //validation
        $validator= \Validator::make($request->all(),[
            'name'=>'required|string',
            'email'=>'required|email|string',
            'phone'=>'required|integer',
            'message'=>'required'
        ]);
        if($validator->fails()){
            return redirect('message/create')->withErrors($validator)->withInput();
        }
        $message = new Message;
        $message->name = $request->name;
        $message->email = $request->email;
        $message->phone = $request->phone;
        $message->message = $request->message;
        $message->save();
        return redirect('posts');

    }
     public function destroy($id)
    {
        //
        $message = Message::find($id);
        $message->delete();
    }
}

<?php

namespace App\Http\Controllers;

use App\message;
use App\user;
use Illuminate\Http\Request;

class MessageController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }



    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, $id)
    {
        $this->validate($request, [

            'message' => 'required',
            
        ]);
        
        $msg = new Message;
        $msg->s_uid = Auth()->user()->id;
        $msg->r_uid = $id;
        $msg->message = $request->input('message');
        $msg->save();
        return redirect()->back();

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\message  $message
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $u_name = User::find($id);
        $user_id = auth()->user()->id;
        $msgs = Message::where([
            ['r_uid', $id],
            ['s_uid', $user_id],

        ])->orwhere([
            ['r_uid', $user_id],
            ['s_uid', $id],
        ])->get();
       
        return view('pages.message')->with(compact('msgs', 'id', 'u_name'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\message  $message
     * @return \Illuminate\Http\Response
     */
    public function edit(message $message)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\message  $message
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, message $message)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\message  $message
     * @return \Illuminate\Http\Response
     */
    public function destroy(message $message)
    {
        //
    }
}

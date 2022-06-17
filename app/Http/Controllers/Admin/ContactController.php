<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Contact;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $datalist=Contact::all();
        return view('admin.show_contact_messages',['datalist'=>$datalist]);
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
    public function store(Request $request)
    {
        //
        $data=new Contact;
        $data->name=$request->input('fname').' '.$request->input('lname');
        $data->IP=$_SERVER["REMOTE_ADDR"];
        $data->contact_reason=$request->input('contact_reason');
        $data->email=$request->input('email');
        $data->message=$request->input('message');
        $data->save();
        return redirect()->back()->with('success','Mesajınız İletilmiştir İlginiz için Teşekkür Ederiz.');
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
    public function edit(Contact $contact, $id)
    {
        //
        $data=Contact::find($id);
        $data->status='Okundu';
        $data->save();
        return view('admin.edit_contact_messages',['data'=>$data]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Contact  $contact
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Contact $contact, $id)
    {
        //
        $data=Contact::find($id);
        $data->note=$request->input('note');
        $data->save();
        return redirect()->back()->with('success','Kayıt Başarıyla Güncellendi.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Contact  $contact
     * @return \Illuminate\Http\Response
     */
    public function destroy(Contact $contact)
    {
        //
    }
}

<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Editors;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class EditorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $datalist=Editors::all();
        return view('admin.show_editors',['datalist'=>$datalist]);
    }

    public function add()
    {
        //
        return view('admin.add_editor');
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        //
        $data=new Editors;
        $data->photo=Storage::putFile('profile-photos',$request->file('photo'));
        $data->name=$request->input('name');
        $data->number_of_contributions=$request->input('number_of_contributions');
        $data->instagram=$request->input('instagram');
        $data->youtube=$request->input('youtube');
        $data->biography=$request->input('biography');
        $data->save();
        return redirect()->route('admin_editor')->with('success','Kayıt Başarıyla Eklendi.');
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
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Editors  $editors
     * @return \Illuminate\Http\Response
     */
    public function show(Editors $editors)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Editors  $editors
     * @return \Illuminate\Http\Response
     */
    public function edit(Editors $editors, $id)
    {
        //
        $data=Editors::Find($id);
        return view('admin.edit_editor',['data'=>$data]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Editors  $editors
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Editors $editors, $id)
    {
        //
        $data=Editors::find($id);
        if ($request->file('photo') != null) {
            $data->photo = Storage::putFile('profile-photos', $request->file('photo'));
        }
        $data->name=$request->input('name');
        $data->number_of_contributions=$request->input('number_of_contributions');
        $data->instagram=$request->input('instagram');
        $data->youtube=$request->input('youtube');
        $data->biography=$request->input('biography');
        $data->save();
        return redirect()->back()->with('success','Kayıt Başarıyla Güncellendi.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Editors  $editors
     * @return \Illuminate\Http\Response
     */
    public function destroy(Editors $editors, $id)
    {
        //
        Editors::destroy($id);
        return redirect()->back()->with('success','Kayıt Başarıyla Silindi.');
    }
}

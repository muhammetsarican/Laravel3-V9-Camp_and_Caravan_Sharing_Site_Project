<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Camp;
use App\Models\Camp_category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;


class CampController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $datalist = Camp::all();
        return view('admin.show_camp', ['datalist' => $datalist]);
    }

    public function add()
    {
        //
        return view('admin.add_camp');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        //
        if ($request->input('camp_phone') != $request->input('camp_phone_validation')) {
            return redirect()->back()->with('error', 'Telefon Numaraları Eşleşmiyor.');
        } else {
            $data = new Camp;
            $data->name = $request->input('name');
            $data->user_id = \Illuminate\Support\Facades\Auth::user()->id;
            $data->have_you_been = $request->input('have_you_been');
            $data->information_from = $request->input('information_from');
            $data->operating_type = $request->input('operating_type');
            $data->camp_phone = $request->input('camp_phone');
            $data->address = $request->input('address');
            $data->web_address = $request->input('web_address');
            $data->location = $request->input('location');
            $data->about_camp = $request->input('about_camp');
            $data->status = $request->input('status');
            $data->image=Storage::putFile('image',$request->file('image'));
            $data->save();
            return redirect()->route('admin_camp')->with('success', 'Kayıt Başarıyla Eklendi.');
        }
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
     * @param  \App\Models\Camp  $camp
     * @return \Illuminate\Http\Response
     */
    public function show(Camp $camp)
    {
        //
    }

    public function campcategory(Camp $camp, $id)
    {
        $data = Camp::find($id);
        $datalist = Camp_category::all()->sortBy('name');
        return view('admin.camp_categories', ['data' => $data, 'datalist' => $datalist]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Camp  $camp
     * @return \Illuminate\Http\Response
     */
    public function edit(Camp $camp, $id)
    {
        //
        $data=Camp::find($id);
        return view('admin.edit_camp',['data'=>$data]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Camp  $camp
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Camp $camp, $id)
    {
        //
        if ($request->input('camp_phone') != $request->input('camp_phone_validation')) {
            return redirect()->back()->with('error', 'Telefon Numaraları Eşleşmiyor.');
        } else {
            $data=Camp::find($id);
            $data->name = $request->input('name');
            $data->user_id = \Illuminate\Support\Facades\Auth::user()->id;
            $data->have_you_been = $request->input('have_you_been');
            $data->information_from = $request->input('information_from');
            $data->operating_type = $request->input('operating_type');
            $data->camp_phone = $request->input('camp_phone');
            $data->address = $request->input('address');
            $data->web_address = $request->input('web_address');
            $data->location = $request->input('location');
            $data->about_camp = $request->input('about_camp');
            $data->status = $request->input('status');
            if ($request->file('image') != null) {
                $data->image = Storage::putFile('public/image', $request->file('image'));
            }
            $data->save();
            return redirect()->back()->with('success','Kayıt Başarıyla Güncellendi.');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Camp  $camp
     * @return \Illuminate\Http\Response
     */
    public function destroy(Camp $camp, $id)
    {
        //
        Camp::destroy($id);
        return redirect()->back()->with('success','Kayıt Başarıyla Silindi.');
    }
}

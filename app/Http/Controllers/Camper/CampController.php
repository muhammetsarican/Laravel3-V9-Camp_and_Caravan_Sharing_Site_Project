<?php

namespace App\Http\Controllers\Camper;

use App\Http\Controllers\Controller;
use App\Models\Camp;
use App\Models\Camp_category;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
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
        $datalist=Camp::where('user_id',Auth::user()->id)->get();
        return view('user.show_camp',['datalist'=>$datalist]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('user.add_camp');
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
            $data->video_url = substr($request->input('video_url'),strrpos($request->input('video_url'),'/'));
            $data->user_review = $request->input('user_review');
            $data->save();
            return redirect()->route('user_camp')->with('success', 'Kayıt Başarıyla Eklendi.');
        }
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
        $datalist = Camp_category::all()->sortBy('category_id');
        $category=Category::all();
        return view('user.camp_categories', ['data' => $data, 'datalist' => $datalist, 'category'=>$category]);
    }

    public function campcategorystore(Request $request, Camp $camp, $id)
    {
        for ($i = 0; $i <= 6; $i++) {
            if ($request->input('category_id_' . $i) != 0) {
                $data = new Camp_category();
                $data->camp_id = $request->input('camp_id');
                $data->category_id = $request->input('category_id_' . $i);
                $data->save();
            }
        }
        return redirect()->back()->with('success', 'Kategori Başarıyla Eklendi.');
    }

    public function campcategorydelete($id)
    {
        Camp_category::destroy($id);
        return redirect()->back()->with('success', 'Kategori Başarıyla Silindi.');
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
        return view('user.edit_camp',['data'=>$data]);
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
            $data->video_url = substr($request->input('video_url'),strrpos($request->input('video_url'),'/'));
            $data->user_review = $request->input('user_review');
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

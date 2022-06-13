<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Blog;
use App\Models\Camp;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class BlogController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $datalist=Blog::all();
        return view('admin.show_blog',['datalist'=>$datalist]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $datalist=Camp::all();
        return view('admin.add_blog',['datalist'=>$datalist]);
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
        $data=new Blog;
        $data->title=$request->input('title');
        $data->user_id=Auth::user()->id;
        $data->camp_id=$request->input('camp_id');
        $data->post=$request->input('post');
        $data->keywords=$request->input('keywords');
        $data->description=$request->input('description');
        $data->detail=$request->input('detail');
        $data->status=$request->input('status');
        $data->image=Storage::putFile('image',$request->file('image'));
        $data->save();
        return redirect()->route('admin_blog')->with('success','Kayıt Başarıyla Eklendi.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Blog  $blog
     * @return \Illuminate\Http\Response
     */
    public function show(Blog $blog)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Blog  $blog
     * @return \Illuminate\Http\Response
     */
    public function edit(Blog $blog, $id)
    {
        //
        $datalist=Camp::all();
        $data=Blog::find($id);
        return view('admin.edit_blog',['data'=>$data,'datalist'=>$datalist]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Blog  $blog
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Blog $blog, $id)
    {
        //
        $data=Blog::find($id);
        $data->title=$request->input('title');
        $data->user_id=Auth::user()->id;
        $data->camp_id=$request->input('camp_id');
        $data->post=$request->input('post');
        $data->keywords=$request->input('keywords');
        $data->description=$request->input('description');
        $data->detail=$request->input('detail');
        $data->status=$request->input('status');
        if ($request->file('image') != null) {
            $data->image = Storage::putFile('public/image', $request->file('image'));
        }
        $data->save();
        return redirect()->back()->with('success','Kayıt Başarıyla Güncellendi.');
    
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Blog  $blog
     * @return \Illuminate\Http\Response
     */
    public function destroy(Blog $blog, $id)
    {
        //
        Blog::destroy($id);
        return redirect()->back()->with('success','Kayıt Başarıyla Silindi.');
    }
}

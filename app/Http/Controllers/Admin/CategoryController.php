<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    protected $appends=[
        'getParentsTree'
    ];
    
    public static function getParentsTree($category,$title)
    {
        if($category->parent_id==0)
        {
            return $title;
        }
        $parent=Category::find($category->parent_id);
        if($title==''){
            $title=$parent->title ; 
        }else{
        $title=$parent->title.' > '.$title;
        }
        return CategoryController::getParentsTree($parent,$title);
    }

    public function index()
    {
        $datalist=Category::all();
        return view('admin.show_category',['datalist'=>$datalist]);
    }

    public function add()
    {
        $datalist=Category::with('children')->get();
        return view('admin.add_category',['datalist'=>$datalist]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        //
        db::table('categories')->insert([
            'parent_id'=>$request->input('parent_id'),
            'title'=>$request->input('title'),
            'keywords'=>$request->input('keywords'),
            'description'=>$request->input('description'),
            'status'=>$request->input('status')
        ]);
        return redirect()->back()->with('success','Kayıt Başarıyla Eklendi.');
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
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function show(Category $category)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function edit(Category $category, $id)
    {
        //
        $data=Category::Find($id);
        $datalist=Category::with('children')->get();
        return view('admin.edit_category',['data'=>$data,'datalist'=>$datalist]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Category $category, $id)
    {
        //
        $data=Category::find($id);
        $data->parent_id=$request->input('parent_id');
        $data->title=$request->input('title');
        $data->keywords=$request->input('keywords');
        $data->description=$request->input('description');
        $data->status=$request->input('status');
        $data->save();
        return redirect()->back()->with('success','Kayıt Başarıyla Güncellendi.');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function destroy(Category $category, $id)
    {
        //
        Category::destroy($id);
        return redirect()->back()->with('success','Kayıt Başarıyla Silindi.');
    }
}

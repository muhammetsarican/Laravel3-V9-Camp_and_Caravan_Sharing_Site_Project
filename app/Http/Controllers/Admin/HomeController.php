<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Camp;
use App\Models\Category;
use App\Models\Contact;
use App\Models\Review;
use App\Models\User;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public static function getmessage()
    {
        return Contact::where('status', 'New')->get();
    }

    public static function getcountmessage()
    {
        return Contact::where('status', 'New')->count();
    }

    public static function getdate()
    {
        return date('d/m/y');
    }

    public function index()
    {
        //
        $review = Review::where('id', '>', 0)->count();
        $user = User::where('id', '>', 0)->count();
        $camp = Camp::where('id', '>', 0)->count();
        $category = Category::where('id', '>', 0)->count();

        $new_review = Review::where('status', 'False')->count();
        $new_user = User::where('status', 'False')->count();
        $new_camp = Camp::where('status', 'False')->count();
        $new_category = Category::where('status', 'False')->count();

        $max = $review + $user + $camp + $category;
        $data = [
            'review' => $review,
            'user' => $user,
            'category' => $category,
            'camp' => $camp,
            'max' => $max,

            'new_review' => $new_review,
            'new_user' => $new_user,
            'new_camp' => $new_camp,
            'new_category' => $new_category,
        ];
        return view('admin.index', $data);
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
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}

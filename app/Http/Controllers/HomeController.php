<?php

namespace App\Http\Controllers;

use App\Models\Camp;
use App\Models\Category;
use App\Models\Image;
use App\Models\Review;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    
    // public static function get_role($id)
    // {
    //     $user=User::find($id);

    //     if ($user->roles->where('name','admin')->exists())
    //     {
    //         print_r('TRUE');
    //         exit();
    //     }
    // }
    public static function categorylist()
    {
        return Category::where('parent_id','=',0)->with('children')->get();
    }
    
    public function userLogin()
    {
        return view('user.login');
    }

    public function userRegister()
    {
        return view('user.register');
    }

    public function index()
    {
        $datalist=Camp::all();
        return view('user.index',['datalist'=>$datalist]);
    }

    public function campdetail($id)
    {
        $data=Camp::find($id);
        $review=Review::where('camp_id',$id)->get();
        $images=Image::where('camp_id',$id)->get();
        $data=[
            'review'=>$review,
            'data'=>$data,
            'image'=>$images,
        ];
        return view('user.camp_detail',$data);
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

    public function editor()
    {
        return view('user.editors');
    }

    public function adminlogin(){
        return view('admin.login');
    }
    public function logincheck(Request $request)
    {
        if($request->isMethod('post'))
        {
            $kullanici=$request->only('email','password');
            if(Auth::attempt($kullanici)){
                $request->session()->regenerate();
                return redirect()->route('admin_home')/*->intended('admin')*/;
            }
            return back()->withErrors(['email'=>'The provided credentials do not match our records']);
        }
        else {
            return view('admin/login');
        }
    }
    public function adminlogout(Request $veri){
        Auth::logout();
        $veri->session()->invalidate();
        $veri->session()->regenerateToken();
        return redirect()->route('admin_login');
    }
    public function userlogout(Request $veri){
        Auth::logout();
        $veri->session()->invalidate();
        $veri->session()->regenerateToken();
        return back();
    }
}

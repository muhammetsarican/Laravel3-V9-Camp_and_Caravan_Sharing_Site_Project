<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\Camp;
use App\Models\Camp_category;
use App\Models\Category;
use App\Models\Editors;
use App\Models\Filter;
use App\Models\Image;
use App\Models\Review;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use PDO;
use PhpParser\Node\Expr\Cast\Array_;

use function PHPSTORM_META\type;

class HomeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public static function getcountreview($camp_id){
        return Review::where([
            ['camp_id',$camp_id],
            ['status','Aktif'],
            ])->count();
    }
    

    public static function get_city($title)
    {
        $parent = Category::where('title', $title)->get();
        $cities = array('city_id' => array(), 'city_title' => array());
        foreach ($parent as $pr) {
            $category = Category::where('parent_id', $pr->id)->get();
            foreach ($category as $ct) {
                array_push($cities['city_title'], $ct->title);
                array_push($cities['city_id'], $ct->id);
                // print_r($ct->title);
                // exit();
            }
        }
        return $cities;
    }

    public static function get_parent($title)
    {
        $parent = Category::where('title', $title)->first();

        return Category::where('parent_id', $parent->id)->get();
    }

    public function filter()
    {
        $data_bool = 0;
        $camp_id_array = array();

        $data = DB::table('camp_categories')
            ->get();
        $data2 = DB::table('filters')
            ->select('category_id')
            ->Where([
                ['IP', $_SERVER["REMOTE_ADDR"]],
            ])
            ->get();
        $camp_id = $data[0]->camp_id;

        for ($i = 0; $i < count($data); $i++) {
            for ($j = 0; $j < count($data2); $j += 1) {
                if ($camp_id != $data[$i]->camp_id) {
                    $data_bool = 0;
                    $camp_id = $data[$i]->camp_id;
                }
                if ($data[$i]->category_id == $data2[$j]->category_id) {
                    $data_bool += 1;
                }
            }
            if ($data_bool == count($data2)) {
                if (in_array($data[$i]->camp_id, $camp_id_array)) {
                } else {
                    array_push($camp_id_array, $data[$i]->camp_id);
                }
            }
        }
        return HomeController::get_filter_camp_id($camp_id_array);
    }

    public function get_filter_camp_id($camp_id_array)
    {
        $merged_array=Array();
        for($i=0;$i<count($camp_id_array);$i++){
            $merged_array=array_merge($merged_array,DB::select('select * from camps where id= '.$camp_id_array[$i]));
        }
        $filter=Filter::all();
        return view('user.filtered_camp',['datalist'=>$merged_array,'data'=>$filter]);
    }


    public function getcamp(Request $request)
    {
        $search = $request->input('search');
        $count = Camp::where('name', 'like', '%' . $search . '%')->get()->count();
        if (empty($search)) {
            return back();
        } else {
            if ($count == 1) {
                $data = Camp::where('name', 'like', '%' . $search . '%')->first();
                return redirect()->route('camp_detail', ['id' => $data->id]);
            } else {
                return redirect()->route('camplist', ['search' => $search]);
            }
        }
    }

    public function camplist($search)
    {
        $datalist = Camp::where('name', 'like', '%' . $search . '%')->get();
        return view('user.search_camps', ['search' => $search, 'datalist' => $datalist]);
    }

    public static function categorylist()
    {
        return Category::where('parent_id', '=', 0)->with('children')->get();
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
        $blog = Blog::all();
        $review = Review::all();
        $datalist = Camp::all();
        return view('user.index', ['datalist' => $datalist, 'review' => $review, 'blog' => $blog]);
    }

    public function campdetail($id)
    {
        $data = Camp::find($id);
        $review = Review::where([
            ['camp_id', $id],
            ['status','Aktif'],
            ])->get();
        $images = Image::where('camp_id', $id)->get();
        $data = [
            'review' => $review,
            'data' => $data,
            'image' => $images,
        ];
        return view('user.camp_detail', $data);
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
        $datalist = Editors::all();
        return view('user.editors', ['datalist' => $datalist]);
    }

    public function blog()
    {
        $datalist = Blog::all();
        return view('user.blog', ['datalist' => $datalist]);
    }

    public function contact()
    {
        return view('user.contact');
    }

    public function adminlogin()
    {
        return view('admin.login');
    }
    public function logincheck(Request $request)
    {
        if ($request->isMethod('post')) {
            $kullanici = $request->only('email', 'password');
            if (Auth::attempt($kullanici)) {
                $request->session()->regenerate();
                return redirect()->route('admin_home')/*->intended('admin')*/;
            }
            return back()->withErrors(['email' => 'The provided credentials do not match our records']);
        } else {
            return view('admin/login');
        }
    }
    public function adminlogout(Request $veri)
    {
        Auth::logout();
        $veri->session()->invalidate();
        $veri->session()->regenerateToken();
        return redirect()->route('admin_login');
    }
    public function userlogout(Request $veri)
    {
        Auth::logout();
        $veri->session()->invalidate();
        $veri->session()->regenerateToken();
        return back();
    }
}

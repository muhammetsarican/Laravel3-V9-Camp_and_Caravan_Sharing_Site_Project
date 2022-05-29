<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Role_user;
use App\Models\User;
use Illuminate\Http\Request;
use App\Models\Roles;
use Illuminate\Support\Facades\Storage;


class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $datalist=User::all();
        return view('admin.show_user',['datalist'=>$datalist]);
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
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        //
    }
    public function userrole(User $user, $id)
    {
        $data = User::find($id);
        $datalist = Roles::all()->sortBy('name');
        return view('admin.user_roles', ['data' => $data, 'datalist' => $datalist]);
    }

    public function userrolesstore(Request $request, User $user, $id)
    {
        $user = User::find($id);
        $roleid = $request->input('roleid');
        $user->roles()->attach($roleid);
        return redirect()->back()->with('success', 'Rol Başarıyla Eklendi.');
    }

    public function userrolesdelete(User $user, $userid, $roleid)
    {
        $user = User::find($userid);
        $user->roles()->detach($roleid);
        return redirect()->back()->with('success', 'Rol Başarıyla Silindi.');
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user, $id)
    {
        //
        $data=User::find($id);
        return view('admin.edit_user',['data'=>$data]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user, $id)
    {
        //
        $data = User::find($id);
        $data->name = $request->input('name');
        $data->email = $request->input('email');
        $data->phone = $request->input('phone');
        $data->address = $request->input('address');
        if ($request->file('image') != null) {
            $data->profile_photo_path = Storage::putFile('profile-photos', $request->file('image'));
        }
        $data->save();
        return redirect()->back()->with('success', 'Updated Successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user, $id)
    {
        //
        User::destroy($id);
        return redirect()->back()->with('success','Kayıt Başarıyla Silindi.');
    }
}

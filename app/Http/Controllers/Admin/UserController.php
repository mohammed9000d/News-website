<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

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
        $users = User::all();
        return view('admin.users.index', ['users'=>$users]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('admin.users.create');
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
        $request->validate([
            'name' => 'required|string|min:3|max:20',
            'email' => 'required|email|unique:users,email',
            'mobile' => 'required|numeric|unique:users,mobile'
        ]);
        $user = User::create([
            'name' => $request->get('name'),
            'email' => $request->get('email'),
            'mobile' => $request->get('mobile'),
            'password' => Hash::make('pass123$')
        ]);
        if($user) {
            session()->flash('alert-type', 'alert-success');
            session()->flash('message', 'created user successfully');
            return redirect()->back();
        }else {
            session()->flash('alert-type', 'alert-danger');
            session()->flash('message', 'faild to create user');
            return redirect()->back();
        }
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
        $user = User::findOrfail($id);
        return view('admin.users.edit', ['user' => $user]);
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
        $request->request->add(['id' => $id]);
        $request->validate([
            'id' => 'required|integer|exists:users,id',
            'name' => 'required|string|min:3|max:20',
            'email' => 'required|email|unique:users,email,'.$id,
            'mobile' => 'required|numeric|unique:users,mobile,'.$id
        ]);
        $user = User::find($id);
        $user->update([
            'name' => $request->get('name'),
            'email' => $request->get('email'),
            'mobile' => $request->get('mobile'),
            'password' => Hash::make('pass123$')
        ]);
        if($user) {
            session()->flash('alert-type', 'alert-success');
            session()->flash('message', 'Updated user successfully');
            return redirect()->back();
        }else {
            session()->flash('alert-type', 'alert-danger');
            session()->flash('message', 'faild to update user');
            return redirect()->back();
        }
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
        $isDeleted = User::destroy($id);
        if($isDeleted){
            return response()->json([
                'title'=>'Success',
                'text'=>'User deleted successfully',
                'icon'=>'success'
            ]);

        }else{
            return response()->json([
                'title'=>'Failed',
                'text'=>'Failed to delete user',
                'icon'=>'error'
            ]);

        }
    }
}

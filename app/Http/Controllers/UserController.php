<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use File;
use Image;
use DB;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::latest()->paginate(4);
        return view('userindex', compact('users'))->with('i', (request()->input('page', 1) - 1) * 4);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('usercreate');
    }

   /*  public function userregister()
    {
        return view('userregister');
    }

    public function register(Request $request)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'phone' => ['required', 'min:10'],
            'address' => ['required', 'string', 'max:255'],
            'photo' => 'required|image|mimes:jpeg,png,jpg,gif,svg',
        ]);

        $imageName = '';
        if ($request->photo) {
            $imageName = time() . '.' . $request->photo->extension();
            $request->photo->move(public_path('image/user'), $imageName);
        }

        $user = new User();

        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = $request->password;
        $user->phone = $request->phone;
        $user->address = $request->address;
        $user->photo = $imageName;
        $user->save();
        return redirect()->route('/login');
    } */


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'phone' => ['required', 'min:10'],
            'address' => ['required', 'string', 'max:255'],
            'photo' => 'required|image|mimes:jpeg,png,jpg,gif,svg',
        ]);

        $imageName = '';
        if ($request->photo) {
            $imageName = time() . '.' . $request->photo->extension();
            $request->photo->move(public_path('image/user'), $imageName);
        }

        $user = new User();

        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = $request->password;
        $user->phone = $request->phone;
        $user->address = $request->address;
        $user->photo = $imageName;
        $user->save();
        return redirect()->route('user.index')->with('success', 'User has been Added successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        return view('usershow', compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        return view('useredit', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        $request->validate([
            'name' => 'required', 'string', 'max:255',
            'email' => ['required', 'string', 'email', 'max:255'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'phone' => ['required', 'min:10'],
            'address' => ['required', 'string', 'max:255'],
            // 'photo' => 'required|image|mimes:jpeg,png,jpg,gif,svg',
            ]);

        $imageName = '';
        if ($request->photo) {
            $imageName = time() . '.' . $request->photo->extension();
            $request->photo->move(public_path('image/user'), $imageName);
        }

        $user = new User();

        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = $request->password;
        $user->phone = $request->phone;
        $user->address = $request->address;
        //$user->photo = $imageName;
        $user->update();
        return redirect()->route('user.index')->with('success', 'User has been Updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = User::findOrFail($id);
        $user->delete();
        return redirect()->route('user.index')->with('danger', 'User has been Deleted successfully.');
    }

}

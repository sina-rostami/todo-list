<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Crypt;

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
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('user.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required',
            'email' => 'required',
            'password' => 'required',
            'confirm-password' => 'required',
        ]);

        if ($validated['password'] != $validated['confirm-password'])
        {
            return view('login', [
                'message' => 'Passwords don\'t match',
            ]);
        }

        $user = New User;
        $user->email = $validated['email'];
        $user->name = $validated['name'];
        $user->password = Crypt::encrypt($validated['password']);
        $user->save();
        $request->session()->put('user_id', $request['id']);

        // redirect to his/her tasks page
        return view("login");
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
        return view("user.edit", [
            'user' => User::findOrFail($id)
        ]);
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
        $validated = $request->validate([
            'name' => 'required',
            'email' => 'required',
            'password' => 'required',
            'confirm-password' => 'required',
        ]);

        if ($validated['password'] != $validated['confirm-password'])
        {
            return view('login', [
                'message' => 'Passwords don\'t match',
            ]);
        }

        $user = User::findOrFail($id);

        if ($user->id != $request->session()->get('user_id'))
        {
            return view('login', [
                'message' => 'Access denied',
            ]);
        }

        $user->name = $validated['name'];
        $user->email = $validated['email'];
        $user->password = Crypt::encrypt($validated['password']);
        $user->save();

        return redirect()->route('user.login');
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

    public function login(Request $request)
    {
        $validated = $request->validate([
            'email' => 'required',
            'password' => 'required',
        ]);

        $users = User::where('email', $validated['email'])->get();
        if (!count($users))
        {
            return view('login', [
                'message' => 'Not found',
            ]);
        }
        $user = $users[0];
        if (Crypt::decrypt($user['password']) == $validated['password'])
        {
            $request->session()->put('user_id', strval($user['id']));
            return redirect()->route('task.index');
        }
            // go to login with an alert
        return view('login', [
            'message' => 'Wrong Password',
        ]);
    }

    public function logout(Request $request)
    {
        $request->session()->put('user_id', null);
        return redirect()->route('user.login');
    }
}

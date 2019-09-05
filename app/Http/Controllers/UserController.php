<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\User;

class UserController extends Controller
{
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = User::find($id);
        return view("profil.edit", compact('user'));
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
        $data = $request->validate([
            'name' => 'max:255|string|nullable',
            'email' => 'max:255|string|email|unique:users|nullable',
            'password' => 'min:8|confirmed|nullable'
        ]);

        if ($request->has('password')) {
            $data['password'] = Hash::make($data['password']);
        }

        User::whereId($id)->update($data);
        return redirect()->back()->with('success', 'Data uploaded');
    }

    public function destroy($id)
    {
        User::whereId($id)->delete();
        return redirect('home');
    }
}

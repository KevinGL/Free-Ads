<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::latest()->get();     //Lecture dans la BDD

        return view("users.index", compact("users"));       //Envoi des résultats à la vue
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    
    /* public function create()     //On ne crée pas d'utilisateur à la main
    {
        //
    }*/

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
    public function show($id)
    {
        $user = User::findOrFail($id);     //Lecture dans la BDD

        return view("users.show", compact("user"));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    
     /*public function edit(User $user)
    {
        //
    }*/

    public function makeAdminThisUser($id)
    {
        $user = User::findOrFail($id);

        $user->admin = "1";

        $user->save();

        return redirect("/users");
    }

    public function makeNotAdminThisUser($id)
    {
        $user = User::findOrFail($id);

        $user->admin = "0";

        $user->save();

        return redirect("/users");
    }

    public function delete($id)
    {
        $user = User::findOrFail($id);

        $user->forceDelete();

        return redirect("/users");
    }
}

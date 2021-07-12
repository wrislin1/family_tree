<?php

namespace App\Http\Controllers;

use App\Models\Relations;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Inertia\Inertia;

class RelationsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Inertia\Response
     */
    public function index(){
        $users = User::all();
        $relations = Relations::all();
        return Inertia::render('Dashboard',['users'=>$users,'relations'=>$relations]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Inertia\Response
     */
    public function create(): \Inertia\Response
    {
        $users = User::all();
        return Inertia::render('Relations/create',['users'=>$users]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Inertia\Response
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'user_id' => ['required'],
            'user2_id' => ['required'],
            'relation' => ['required', 'max:50'],
        ]);
        if($validated) {
            $relation = Relations::create([
                'user_id'=>$request->user_id,
                'user2_id'=>$request->user2_id,
                'relation'=>$request->relation,
                'information'=>$request->information,
            ]);
            return Inertia::render('Dashboard');
        }

        return 'error';
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

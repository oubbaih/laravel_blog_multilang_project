<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use DataTables;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function CheckAllUsers()
    {
        $data = User::select('*');
        return   DataTables::of($data)
            ->addIndexColumn()
            ->addColumn('actions', function ($row) {
                $btn = '<div style="display:flex;justify-content:space-between;flex-direction:row;"> <a href="' . Route('dashboard.user.edit', $row->id) . '"   class="btn btn-primary"> <i class="fa fa-edit"></i>Edit</a>
                <a  id="deleteBtn" data-id="' . $row->id . '" onClick="clickFinc()" class="btn btn-danger" style="color:white;" data-toggle="modal" data-target="#staticBackdrop"> <i class="fa fa-trash"></i>Delete</a></div>';
                return  $btn;
            })


            ->rawColumns(['actions'])
            ->make(true);
    }
    public function delete(Request $request)
    {
        $request->validate([
            'id_use' => 'required|numeric'
        ]);

        if (is_numeric($request->id_use)) {
            User::where('id', $request->id_use)->delete();
        }
        return back();
    }
    public function index()
    {

        // dd($users);
        return view('dashboard.users.index');
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
        return view('dashboard.users.edit');
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

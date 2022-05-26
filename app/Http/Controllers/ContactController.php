<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class ContactController extends Controller
{


    public function CheckAllContacts()
    {
        $data = Contact::select('*');
        return   DataTables::of($data)
            ->addIndexColumn()
            ->addColumn('actions', function ($row) {
                $btn = '<div style="display:flex;justify-content:space-between;flex-direction:row;"> <a href="' . Route('dashboard.contact.edit', $row->id) . '"   class="btn btn-primary"> <i class="fa fa-edit"></i>Edit</a><a  id="deleteBtn" data-id="' . $row->id . '" onClick="clickFinc()" class="btn btn-danger" style="color:white;" data-toggle="modal" data-target="#staticBackdrop"> <i class="fa fa-trash"></i>Delete</a></div>';
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
            Contact::where('id', $request->id_use)->delete();
        }
        return back();
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return view('dashboard.contact.index');
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
        $request->validate([
            'email' => 'required|email',
            'name' => 'required',
            'message' => 'required'
        ]);

        Contact::create($request->except('_token'));
        return back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Contact  $contact
     * @return \Illuminate\Http\Response
     */
    public function show(Contact $contact)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Contact  $contact
     * @return \Illuminate\Http\Response
     */
    public function edit(Contact $contact)
    {
        //
        return view('dashboard.contact.edit', compact('contact'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Contact  $contact
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Contact $contact)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Contact  $contact
     * @return \Illuminate\Http\Response
     */
    public function destroy(Contact $contact)
    {
        //
    }
}

<?php

namespace App\Http\Controllers\Categories;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Support\Str;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */



    public function CheckAllCategories()
    {
        $data = Category::select('*')->with('getParent');
        return   DataTables::of($data)
            ->addIndexColumn()
            ->addColumn('actions', function ($row) {
                $btn = '<div style="display:flex;justify-content:space-between;flex-direction:row;"> <a href="' . Route('dashboard.category.edit', $row->id) . '"   class="btn btn-primary"> <i class="fa fa-edit"></i>Edit</a>
                <a  id="deleteBtn" data-id="' . $row->parent . '" onClick="clickFinc()" class="btn btn-danger" style="color:white;" data-toggle="modal" data-target="#staticBackdrop"> <i class="fa fa-trash"></i>Delete</a></div>';
                return  $btn;
            })
            ->addColumn('title', function ($row) {
                return $row->translate(app()->getLocale())->title;
            })
            ->addColumn('content', function ($row) {
                return $row->translate(app()->getLocale())->content;
            })
            // ->addColumn('parent' ,  function($row){
            //     return $row->
            // })

            ->rawColumns(['actions', 'title', 'content'])
            ->make(true);
    }
    public function delete(Request $request)
    {
        $request->validate([
            'id_use' => 'required|numeric'
        ]);

        if (is_numeric($request->id_use)) {
            if ($request->id_use > 0) {
                $cate2 = Category::where('parent', $request->id_use)->first();

                if (file_exists(public_path() . $cate2->image) && $cate2->image != null) {
                    unlink(public_path() . $cate2->image);
                }
                $cate2->delete();
                return back();
            } else {
                $category = Category::where('parent', 0)->first();
                if (file_exists(public_path() . $category->image)) {
                    unlink(public_path() . $category->image);
                }
                $allChildren = Category::where('parent', $request->id_use);

                foreach ($allChildren as $child) {
                    if (file_exists(public_path() . $child->image)) {
                        unlink(public_path() . $child->image);
                    }
                    $child->delete();
                }

                $category->delete();
                return back();
            }
        }
    }







    public function index()
    {
        //
        return view('dashboard.categories.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $categories = Category::whereNull('parent')->orWhere('parent', 0)->get();
        return view('dashboard.categories.create', compact('categories'));
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


        $category =  Category::create($request->except('image', '_token'));
        if ($request->hasFile('image')) {

            $file = $request->file('image');
            $filename = Str::uuid() . $file->getClientOriginalName();
            $file->move(public_path('images'), $filename);
            $path = '/images/' . $filename;
            $category->update(['image' => $path]);
        }
        return redirect(route('dashboard.category.index'));
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
        $category = Category::where('id', $id)->first();

        return view('dashboard.categories.edit', compact('category'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Category $category)
    {
        //
        $category->update($request->except('image', '_token'));
        if ($request->hasFile('image')) {
            if (file_exists(public_path() . $category->image) && $category->image != null) {
                unlink(public_path() . $category->image);
            }
            $file = $request->file('image');
            $filename = Str::uuid() . $file->getClientOriginalName();
            $file->move(public_path('images'), $filename);
            $path = '/images/' . $filename;
            $category->update(['image' => $path]);
        }
        return redirect()->route('dashboard.category.index');
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

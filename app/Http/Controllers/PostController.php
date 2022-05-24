<?php


namespace App\Http\Controllers;

use Illuminate\Support\Str;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Models\Post;
use Yajra\DataTables\Facades\DataTables;

class PostController extends Controller
{

    public function CheckAllPost()
    {
        $data = Post::select('*');
        // dd($data);
        return   DataTables::of($data)
            ->addIndexColumn()
            ->addColumn('actions', function ($row) {
                $btn = '<div style="display:flex;justify-content:space-between;flex-direction:row;"> <a href="' . Route('dashboard.post.edit', $row->id) . '"   class="btn btn-primary"> <i class="fa fa-edit"></i>Edit</a>
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
            Post::where('id', $request->id_use)->delete();
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

        $posts = Post::all();
        return view('dashboard.post.index', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories  = Category::all();
        // dd(count($categories));
        if (count($categories) > 0) {

            return view('dashboard.post.create');
        }
        return abort(404);
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

        $post = Post::create($request->except('_token', 'image'));
        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $filename = Str::uuid() . $file->getClientOriginalName();
            $file->move(public_path('images'), $filename);
            $path = 'images/' . $filename;
            $post->update(['image' => $path]);
        }
        return back();
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

<?php

namespace App\Http\Controllers\Admin;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Shop;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;


class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.shop.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.shop.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validateData=$request->validate([
            'name'=>'required|max:255',
            'category'=>'required',
            'about'=>'required',
            'img'=>'required',
        ]);

        $new_name="images".microtime().".jpg";
        $img=Image::make($request->file("img"));

        // images watermake
        // dd($new_name);
        $watermark = Image::make('logo.png');

        $img->insert($watermark, 'bottom-right');
        $img->save('public/thumb/'.$new_name);

        //image resize
        $img->fit(360,280, function($constraint){
            $constraint->aspectRatio();
        })->save('public/shop/'.$new_name);

        $shops=new Shop([
            'name'=>$request->get('name'),
            'category'=>$request->get('category'),
            'about'=>$request->get('about'),
            'img'=>$new_name
        ]);

        $shops->save();
        return redirect()->back()->with('success','Ma`lumot saqlandi !');


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

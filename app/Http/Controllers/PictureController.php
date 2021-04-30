<?php

namespace App\Http\Controllers;

use App\Models\Pictures;
use Illuminate\Http\Request;

class PictureController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('media.pictures');
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
        $image = $request->file('file');

        $imageName = uniqid().time() . '.' . $image->extension();

        $image->move(public_path('images'), $imageName);

        return response()->json(['success' => $imageName]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Pictures  $pictures
     * @return \Illuminate\Http\Response
     */
    public function show(Pictures $pictures)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Pictures  $pictures
     * @return \Illuminate\Http\Response
     */
    public function edit(Pictures $pictures)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Pictures  $pictures
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Pictures $pictures)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Pictures  $pictures
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        {
            if ($request->get('name')) {
                File::delete(public_path('images/' . $request->get('name')));
            }
        }
    }

    function fetch()
    {
        $images = \File::allFiles(public_path('images'));
        $output = '<div class="row">';
        foreach($images as $image)
        {
            $output .= '
      <div class="col-md-2" style="margin-bottom:16px;" align="center">
                <img src="'.asset('images/' . $image->getFilename()).'" class="img-thumbnail" width="175" height="175" style="height:175px;" />
                <button type="button" class="btn btn-link remove_image" id="'.$image->getFilename().'">Remove</button>
            </div>
      ';
        }
        $output .= '</div>';
        echo $output;
    }

}

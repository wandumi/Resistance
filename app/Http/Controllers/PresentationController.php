<?php

namespace App\Http\Controllers;

use App\Presentation;
use App\PresentationSection;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use App\Http\Requests\PresentationRequest;

class PresentationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $presentations = Presentation::latest()->get();

        $lists = PresentationSection::all();

        return view('presentations.index', compact('presentations', 'lists'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $presentationLists = PresentationSection::all();

        return view('presentations.create', compact('presentationLists'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PresentationRequest $request)
    {
        

        if($request->hasFile('upload') && $request->hasFile('cover_image'))
        {
       
            $upload             = $request->upload;
            $coverImage         = $request->cover_image;

            $uploadName         = time() . $upload->getClientOriginalName();
            $coverName          = time() . $coverImage->getClientOriginalName();

            $upload->move(public_path('pdf_files/'), $uploadName);
            $coverImage->move(public_path('cover_images/'), $coverName);
        }

        Presentation::create([
            'presentation_section_id'   => $request->presentation_section_id,
            'upload'                    => $uploadName,
            'cover_image'               => $coverName,
        ]);

        return back()->with('message','Successfully Submitted');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Presentation  $presentation
     * @return \Illuminate\Http\Response
     */
    public function show(Presentation $presentation)
    {
        return $presentation;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Presentation  $presentation
     * @return \Illuminate\Http\Response
     */
    public function edit(Presentation $presentation)
    {
        $presentationLists = PresentationSection::all();

        return view('presentations.edit', compact('presentation', 'presentationLists'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Presentation  $presentation
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Presentation $presentation)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Presentation  $presentation
     * @return \Illuminate\Http\Response
     */
    public function destroy(Presentation $presentation)
    {
        $upload      = public_path("pdf_files\\") .$presentation->upload;
        $coverImage  = public_path("cover_images\\") .$presentation->cover_image;

        if(File::exists($upload) && File::exists($coverImage)) {
            File::delete($upload);
            File::delete($coverImage);
        }

        $presentation->presentation_section()->dissociate()->delete();

        return response()->json([
            'success' => 'Record deleted successfully!'
        ]);
    }
}

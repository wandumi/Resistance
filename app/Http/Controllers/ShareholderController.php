<?php

namespace App\Http\Controllers;

use App\Shareholder;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use App\Http\Requests\ShareholderRequest;

class ShareholderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $shareholders = Shareholder::latest()->get();

        return view('shareholder.index', compact('shareholders'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('shareholder.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ShareholderRequest $request)
    {

        if($request->hasFile('logo'))
        {
            $fileName       = $request->logo;
            $logo           = time() . $fileName->getClientOriginalName();
            $fileName->move( public_path('logos/'), $logo);
        }

        Shareholder::create([
            'name'              => $request->name,
            'numberOfShares'    => $request->numberOfShares,
            'perIssueShared'    => $request->perIssueShared,
            'logo'              => $logo,
        ]);

        return back()->with("message", "Successfully Submitted");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Shareholder  $shareholder
     * @return \Illuminate\Http\Response
     */
    public function show(Shareholder $shareholder)
    {
        return $shareholder;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Shareholder  $shareholder
     * @return \Illuminate\Http\Response
     */
    public function edit(Shareholder $shareholder)
    {
        return view('shareholder.edit', compact('shareholder'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Shareholder  $shareholder
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Shareholder $shareholder)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Shareholder  $shareholder
     * @return \Illuminate\Http\Response
     */
    public function destroy(Shareholder $shareholder)
    {
        $logo      = public_path("logos\\") . $shareholder->logo;
        
        if(File::exists($logo)) {
            File::delete($logo);
        } else {
            abort("Couldnt delete the file");
        }

        $shareholder->delete();

        return response()->json([
            'success' => 'Record deleted successfully!'
        ]);
    }
}

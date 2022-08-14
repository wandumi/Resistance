<?php

namespace App\Http\Controllers;

use App\DmtnPolicies;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class DmtnPoliciesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $policies = DmtnPolicies::latest()->paginate();

        return view('dmtn.policies.index', compact('policies') );
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dmtn.policies.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
        if($request->hasFile('pdf'))
        {
            $pdf = $request->pdf;
            $fileName = time() . $pdf->getClientOriginalName();
            $pdf->move(public_path('pdf_files/'), $fileName);
        }

        DmtnPolicies::create([
                'name' => $request->name,
                'pdf'   => $fileName,
        ]);

       return back()->with('message','Submitted Successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\DmtnPolicies  $dmtnPolicies
     * @return \Illuminate\Http\Response
     */
    public function show(DmtnPolicies $dmtnPolicies)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\DmtnPolicies  $dmtnPolicies
     * @return \Illuminate\Http\Response
     */
    public function edit(DmtnPolicies $dmtnPolicies, $id)
    {
        $dmtnPolicies = DmtnPolicies::where('id', $id)->first();

       
        return view('dmtn.policies.edit', compact('dmtnPolicies'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\DmtnPolicies  $dmtnPolicies
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, DmtnPolicies $dmtnPolicies)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\DmtnPolicies  $dmtnPolicies
     * @return \Illuminate\Http\Response
     */
    public function destroy(DmtnPolicies $dmtnPolicies, $id)
    {
        $policies = DmtnPolicies::where('id', $id)->first();

        $pdf         = public_path("pdf_files\\") . $policies->pdf;
      
        if(File::exists($pdf)) {
            File::delete($pdf);
        }

        $policies->delete();

        return response()->json(['message' => 'Successfully Deleted']);
    }
}

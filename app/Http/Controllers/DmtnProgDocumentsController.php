<?php

namespace App\Http\Controllers;

use App\DmtnProgDocuments;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use App\Http\Requests\ProgDocumentRequest;

class DmtnProgDocumentsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $progDocuments = DmtnProgDocuments::latest()->paginate();

        return view('dmtn.programDocuments.index', compact('progDocuments'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dmtn.programDocuments.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ProgDocumentRequest $request)
    {
        if($request->hasFile('pdf'))
        {
            $pdf = $request->pdf;
            $fileName = time() . $pdf->getClientOriginalName();
            $pdf->move(public_path('pdf_files/'), $fileName);
        }
       DmtnProgDocuments::create([
            'name' => $request->name,
            'pdf'   => $fileName,
       ]);

       return back()->with('message','Submitted Successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\DmtnProgDocuments  $dmtnProgDocuments
     * @return \Illuminate\Http\Response
     */
    public function show(DmtnProgDocuments $dmtnProgDocuments)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\DmtnProgDocuments  $dmtnProgDocuments
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $dmtnProgDocuments = DmtnProgDocuments::where('id', $id)->first();

        return view('dmtn.programDocuments.edit', compact('dmtnProgDocuments'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\DmtnProgDocuments  $dmtnProgDocuments
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, DmtnProgDocuments $dmtnProgDocuments)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\DmtnProgDocuments  $dmtnProgDocuments
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $progDocuments = DmtnProgDocuments::where('id', $id)->first();

        $pdf         = public_path("pdf_files\\") . $progDocuments->pdf;
      
        if(File::exists($pdf)) {
            File::delete($pdf);
        }

        $progDocuments->delete();

        return response()->json(['message' => 'Successfully Deleted']);
    }

    public function sortable(DmtnProgDocuments $DmtnProgDocuments)
    {
        $DmtnProgDocuments = DmtnProgDocuments::orderBy('list', 'asc')->get();

        return view('dmtn.programDocuments.sortable', compact('DmtnProgDocuments'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function updateAll(Request $request)
    {
       
        DmtnProgDocuments::truncate();

        foreach($request->DmtnProgDocumentsdata as $DmtnProgDocuments){
            DmtnProgDocuments::create([
                'id' => $DmtnProgDocuments['id'],
                'name' => $DmtnProgDocuments['name'],
                'pdf' => $DmtnProgDocuments['pdf'],
                "list" => $DmtnProgDocuments['list'],
            ]);
        }


        return response('Update Successful', 200);
    }

    
}

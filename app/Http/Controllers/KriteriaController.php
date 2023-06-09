<?php

namespace App\Http\Controllers;

use App\Models\Kriteria;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

use DataTables;

class KriteriaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $data = Kriteria::all();
            return Datatables::of($data)
                    ->addIndexColumn()
                    ->addColumn('action', function($row){

                        
                      
                        $btn =  '<a href="javascript:void(0)" data-toggle="tooltip"  data-id="'.$row->id.'" data-original-title="edit" class="text-secondary editData">
                        <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-edit-2 "><path d="M17 3a2.828 2.828 0 1 1 4 4L7.5 20.5 2 22l1.5-5.5L17 3z"></path></svg>
                        </a> | <a href="javascript:void(0)" data-toggle="tooltip"  data-id="'.$row->id.'" data-original-title="Delete" class="text-secondary deleteData">
                        <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-trash "><polyline points="3 6 5 6 21 6"></polyline><path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"></path></svg>
                        </a>'; 

 
                            return $btn;
                    })
                    ->rawColumns(['action'])
                    ->make(true);
        }


        return view('kriteria.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // validate
        $this->validate($request, [
            'kode_kriteria' => 'required',
            'nama_kriteria' => 'required',
            'bobot_kriteria' => 'required',
            'tipe_kriteria' => 'required',
        ]);

        // store with update or create
        Kriteria::updateOrCreate(
            ['id' => $request->id],
            [
                'kode_kriteria' => $request->kode_kriteria,
                'nama_kriteria' => $request->nama_kriteria,
                'bobot_kriteria' => $request->bobot_kriteria,
                'tipe_kriteria' => $request->tipe_kriteria,
            ]
        );

        if(!$request->data_id == ''){
            return response()->json([
                'status' => 'sukses',
                'message'=>'Paket berhasil Diubah'
            ],200);
        } else {
            return response()->json([
                'status' => 'sukses',
                'message'=>'Paket berhasil Ditambahkan'
            ],200);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Kriteria $kriteria)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Kriteria $kriteria)
    {
        return response()->json($kriteria, 200);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Kriteria $kriteria)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Kriteria $kriteria)
    {
        $kriteria->delete();
        return response()->json([
            'status' => 'sukses',
            'message'=>'Kriteria berhasil Dihapus'
        ],200);
    }
}

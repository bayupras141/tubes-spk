<?php

namespace App\Http\Controllers;

use App\Models\Alternatif;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

use DataTables;

class AlternatifController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {
            // ambil data alternatif dan penilaian

            // $data = Alternatif::with('penilaian')->get();

            $data = Alternatif::all();
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
                    ->rawColumns([ 'action'])
                    ->make(true);
                    // dd($data);
        }

        return view('alternatif.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
            $validator = Validator::make($request->all(), [
                'kode_alternatif' => 'required',
                'nama_alternatif' => 'required',
                'c1' => 'required',
                'c2' => 'required',
                'c3' => 'required',
                'c4' => 'required',
                'c5' => 'required',
                'c6' => 'required',
            ]);
    
            if ($validator->fails()) {
                return response()->json(['errors' => $validator->errors()->all()]);
            }
    
            Alternatif::updateOrCreate(
                ['id' => $request->data_id],
                [
                    'kode_alternatif' => $request->kode_alternatif,
                    'nama_alternatif' => $request->nama_alternatif,
                    'c1' => $request->c1,
                    'c2' => $request->c2,
                    'c3' => $request->c3,
                    'c4' => $request->c4,
                    'c5' => $request->c5,
                    'c6' => $request->c6,
                ]
            );
            if(!$request->data_id == ''){
                return response()->json([
                    'status' => 'sukses',
                    'message'=>'Alternatif berhasil Diubah'
                ],200);
            } else {
                return response()->json([
                    'status' => 'sukses',
                    'message'=>'Alternatif berhasil Ditambahkan'
                ],200);
            }
    }

    /**
     * Display the specified resource.
     */
    public function show(Alternatif $alternatif)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $data = Alternatif::find($id);
        return response()->json($data, 200);

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Alternatif $alternatif)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $alternatif = Alternatif::find($id);
        $alternatif->delete();
        return response()->json([
            'status' => 'sukses',
            'message'=>'Alternatif berhasil Dihapus'
        ],200);
    }
}

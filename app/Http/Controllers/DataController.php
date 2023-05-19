<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\DataModel;
use App\Http\Controllers\Str;
use App\Http\Requests\StoreDataModelRequest;
use App\Http\Requests\UpdateDataModelRequest;
use Illuminate\Support\Facades\DB;

class DataController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.input-out-admin', [
            'title' => 'Input Data',
            'name' => 'Kelurahan Oetete',
            'desc' => 'Dokumen Keluar',
            'button' => 'Input Data'
        ]);
    }

    public function datas(Request $request)
    {
        $cari = $request->query('cari');

        if (!empty($cari)) {
            $data = DataModel::sortable()
                ->where('data_models.nomor_dokumen', 'like', '%' . $cari . '%')
                ->orWhere('data_models.kategori', 'like', '%' . $cari . '%')
                ->paginate(5)->onEachSide(1);
        } else {
            $data = DataModel::sortable()->paginate(5)->onEachSide(1);
        }

        return view('admin.datas-admin', compact('data'), [
            'title' => 'Data Arsip',
            'name' => 'Kelurahan Oetete',
            'desc' => 'Arsip Dokumen Keluar',
            'button' => 'Data Arsip'
        ])->with([
            'data' => $data,
            'cari' => $cari
        ]);
    }

    // public function dokMasuk()
    // {
    //     return view('admin.input-out-admin', [
    //         'title' => 'Input Data',
    //         'name' => 'Kelurahan Oetete',
    //         'desc' => 'Dokumen Keluar'
    //     ]);
    // }

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

        $request->validate([
            'nomor_dokumen' => 'required|max:100',
            'keterangan_khusus' => 'max:255',
            'file' => 'mimes:pdf',
            'kategori' => 'required'
        ]);

        if ($request->file('file')) {
            $file = $request->file('file');
            // dd($file->getClientOriginalExtension());
            $file->move(public_path('assets/uploads/documents/keluar'), $request->nomor_dokumen . '.' . $file->getClientOriginalExtension());
        }

        $data = [
            'nomor_dokumen' => $request->nomor_dokumen,
            'keterangan_khusus' => $request->keterangan_khusus,
            'kategori' => $request->kategori,
            'file'  =>  $request->file('file') ? 'assets/uploads/documents/keluar/' . $request->nomor_dokumen . '.' . $file->getClientOriginalExtension() : null,
        ];

        if (DataModel::create($data)) {
            return redirect('/datas')->with('success', 'Berhasil mengupdate data');
        }
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
        $data = DataModel::find($id);
        return view('admin.datas-edit-keluar', compact('data'), [
            'title' => 'Edit Arsip',
            'name' => 'Kelurahan Oetete',
            'desc' => 'Arsip Dokumen Keluar',
            'button' => 'Data Arsip'
        ]);
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
        if ($request->file('file')) {
            $file = $request->file('file');
            // dd($file->getClientOriginalExtension());
            $file->move(public_path('assets/uploads/documents/masuk'), $request->nomor_dokumen . '.' . $file->getClientOriginalExtension());
        }

        if (DataModel::find($id)->update([
            'nomor_dokumen' => $request->nomor_dokumen,
            'keterangan_khusus' => $request->keterangan_khusus,
            'kategori' => $request->kategori,
            'file'  =>  $request->file('file') ? 'assets/uploads/documents/keluar/' . $request->nomor_dokumen . '.' . $file->getClientOriginalExtension() : null,
        ])) {
            return redirect('/datas');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        DB::table('data_models')->where('id', $id)->delete();
        return redirect('/datas')->with('success', 'Data berhasil dihapus');
    }
}

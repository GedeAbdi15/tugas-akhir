<?php

namespace App\Http\Controllers;

use App\Models\data_masuk;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

// use App\Http\Requests;

class DataMasukController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.input-admin', [
            'title' => 'Input Data',
            'name' => 'Kelurahan Oetete',
            'desc' => 'Dokumen Masuk',
            'button' => 'Input Data'
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\Storedata_masukRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'asal_dokumen' => 'required|max:255',
            'perihal' => 'required|max:255',
            'nomor_dokumen' => 'required|max:100',
            'file' => 'mimes:pdf',
            'tgl_masuk' => 'required|max:100',
            'keterangan' => 'max:255'
        ]);

        if ($request->file('file')) {
            $file = $request->file('file');
            // dd($file->getClientOriginalExtension());
            $file->move(public_path('assets/uploads/documents/masuk'), $request->nomor_dokumen . '.' . $file->getClientOriginalExtension());
        }

        $data = [
            'asal_dokumen' => $request->asal_dokumen,
            'perihal' => $request->perihal,
            'nomor_dokumen' => $request->nomor_dokumen,
            'tgl_masuk' => $request->tgl_masuk,
            'keterangan' => $request->keterangan,
            'file'  =>  $request->file('file') ? 'assets/uploads/documents/masuk/' . $request->nomor_dokumen . '.' . $file->getClientOriginalExtension() : null,
        ];

        if (data_masuk::create($data)) {
            return redirect('/datas-masuk');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\data_masuk  $data_masuk
     * @return \Illuminate\Http\Response
     */
    public function show(data_masuk $data_masuk, Request $request)
    {
        $cari = $request->query('cari');

        if (!empty($cari)) {
            $data_masuk = data_masuk::sortable()
                ->where('data_masuks.nomor_dokumen', 'like', '%' . $cari . '%')
                ->orWhere('data_masuks.tgl_masuk', 'like', '%' . $cari . '%')
                ->paginate(5)->onEachSide(1);
        } else {
            $data_masuk = data_masuk::sortable()->paginate(5)->onEachSide(1);
        }

        return view('admin.datas-admin-masuk', compact('data_masuk'), [
            'title' => 'Data Arsip',
            'name' => 'Kelurahan Oetete',
            'desc' => 'Arsip Dokumen Masuk',
            'button' => 'Data Arsip'
        ])->with([
            'data' => $data_masuk,
            'cari' => $cari
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\data_masuk  $data_masuk
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, data_masuk $data_masuk, $id)
    {
        $data_masuk = data_masuk::find($id);
        return view('admin.datas-edit-masuk', compact('data_masuk'), [
            'title' => 'Edit Arsip Masuk',
            'name' => 'Kelurahan Oetete',
            'desc' => 'Arsip Masuk',
            'button' => 'Data Arsip'
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\Updatedata_masukRequest  $request
     * @param  \App\Models\data_masuk  $data_masuk
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        if ($request->file('file')) {
            $file = $request->file('file');
            // dd($file->getClientOriginalExtension());
            $file->move(public_path('assets/uploads/documents/masuk'), $request->nomor_dokumen . '.' . $file->getClientOriginalExtension());
        }

        if (data_masuk::find($id)->update([
            'asal_dokumen' => $request->asal_dokumen,
            'perihal' => $request->perihal,
            'nomor_dokumen' => $request->nomor_dokumen,
            'tgl_masuk' => $request->tgl_masuk,
            'keterangan' => $request->keterangan,
            'file'  =>  $request->file('file') ? 'assets/uploads/documents/masuk/' . $request->nomor_dokumen . '.' . $file->getClientOriginalExtension() : null,
        ])) {
            return redirect('/datas-masuk');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\data_masuk  $data_masuk
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        DB::table('data_masuks')->where('id', $id)->delete();
        return redirect('/datas-masuk')->with('success', 'Data berhasil dihapus');
    }
}

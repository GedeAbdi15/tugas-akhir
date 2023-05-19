<?php

namespace App\Http\Controllers;

use App\Models\data_masuk;
use App\Models\DataModel;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $data = DataModel::sortable()->paginate(5)->onEachSide(1);
        $data_m = data_masuk::sortable()->paginate(5)->onEachSide(1);

        return view('admin.index-admin', compact('data', 'data_m'), [
            'title' => 'Home',
            'name' => 'Kelurahan Oetete',
            'desc' => 'Input Data',
            'img' => '/assets/image/logo.png',
            'button' => 'Home',
        ]);
    }
}

<?php

namespace App\Http\Controllers;



use App\Models\ArticlesNews;
use App\Models\Categories;
use Illuminate\Http\Request;


class RedaksiController extends Controller
{
    public function index()
    {
        return view('pages.redaksi');
    }
}

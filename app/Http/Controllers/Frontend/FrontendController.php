<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class FrontendController extends Controller
{
    //
    protected $folderName='frontend.';
    public function index()
    {
        return view($this->folderName.'index', [

        ]);
    }
}

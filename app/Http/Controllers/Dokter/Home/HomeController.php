<?php

namespace App\Http\Controllers\Dokter\Home;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    private $views      = 'dokter/home';
    private $url        = 'dokter/home';
    private $title      = 'Halaman Dashboard';


    public function __construct()
    {
        // Di isi Construct
    }

    public function index()
    {
        $data = [
            'title'         => $this->title,
            'url'           => $this->url,
            'page'          => 'Halaman Dashboard',
        ];
        
        return view($this->views . "/index", $data);
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        //
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        //
    }

    public function update(Request $request, $id)
    {   
        //
    }

    public function destroy($id)
    {
        //
    }
}

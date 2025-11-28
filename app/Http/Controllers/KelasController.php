<?php

namespace App\Http\Controllers;
use App\Models\Kelas;

use Illuminate\Http\Request;

class KelasController extends Controller
{

    private $menu = 'kelas';

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // agenda user
        // $userId = auth()->id();

        // $datas = Kelas::get();
        $datas = Kelas::get();

        $menu = $this->menu;
        return view('pages.admin.kelas.index', compact('menu', 'datas'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $menu = $this->menu;
        return view('pages.admin.kelas.create', compact('menu'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $r = $request->all();
        // $r['tempat_kegiatan'] = $r['lokasi_kegiatan'];
        // dd($r);
        Kelas::create($r);

        return redirect()->route('kelas.index')->with('message', 'store');
    }

    /**
     * Display the specified resource.
     */
    public function show(Kelas $kelas)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $data = Kelas::find($id);
        $menu = $this->menu;

        return view('pages.admin.kelas.edit', compact('data', 'menu'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {
        $r = $request->all();
        $data = Kelas::find($r['id']);

        // $r['nama_kegiatan'] = $r['judul'];
        // $r['tempat_kegiatan'] = $r['lokasi_kegiatan'];

        // dd($r);
        $data->update($r);

        return redirect()->route('kelas.index')->with('message', 'update');


    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $data = Kelas::find($id);
        $data->delete();
        return response()->json($data);
    }
}

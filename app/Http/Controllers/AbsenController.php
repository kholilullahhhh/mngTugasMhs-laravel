<?php

namespace App\Http\Controllers;
use App\Models\Agenda;
use App\Models\Absensi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Midtrans\Config;
use Midtrans\Snap;

class AbsenController extends Controller
{
    private $menu = 'absensi';
    public function userIndex()
    {
        $datas = Absensi::with(['user', 'agenda'])
            ->where('user_id', auth()->id())
            ->orderBy('created_at', 'desc')
            ->get();

        return view('pages.user.absen.index', [
            'datas' => $datas,
            'menu' => $this->menu
        ]);
    }


    public function userCreate()
    {
        $menu = $this->menu;
        $agendas = Agenda::where('status', 'publish')->get();


        $userId = auth()->id();
        // $agendas = Agenda::where('user_id', $userId)->get();

        return view('pages.user.absen.create', compact('agendas', 'menu'));
    }
    public function userStore(Request $request)
    {
        $user = Auth::user();

        $r = $request->all();
        $r['user_id'] = $user->id;

        // Upload dokumentasi (gambar)
        if ($request->hasFile('dokumentasi')) {
            $foto = $request->file('dokumentasi');
            $ext = $foto->getClientOriginalExtension();

            $nameFoto = date('Y-m-d_H-i-s_') . "." . $ext;
            $destinationPath = public_path('upload/dokumentasi');
            $foto->move($destinationPath, $nameFoto);

            $r['dokumentasi'] = $nameFoto;
        }

        // Upload laporan (PDF)
        if ($request->hasFile('laporan')) {
            $laporan = $request->file('laporan');
            $ext = $laporan->getClientOriginalExtension();

            if ($ext != 'pdf') {
                return redirect()->back()->with('message', 'File laporan harus dalam format PDF');
            }

            $nameLaporan = date('Y-m-d_H-i-s_') . "." . $ext;
            $destinationPath = public_path('upload/laporan');
            $laporan->move($destinationPath, $nameLaporan);

            $r['laporan'] = $nameLaporan;
        }

        Absensi::create($r);
        return redirect()->route('user.absensi.index')->with('success', 'Data absensi berhasil disimpan');
    }
}
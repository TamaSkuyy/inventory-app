<?php

namespace App\Http\Controllers\Master;

use App\Http\Controllers\Controller;
use App\Http\Requests\StorePelangganRequest;
use App\Http\Requests\UpdatePelangganRequest;
use App\Models\Master\Pelanggan;
use App\Repositories\Access\User\EloquentUserRepository;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
// use Auth;


class PelangganController extends Controller
{
    public function __construct()
    {
        $this->repository = new EloquentUserRepository;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        return view('master.pelanggan.index', ['pelanggans' => Pelanggan::sortable(['pelKode' => 'asc'])->paginate()]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('master.pelanggan.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StorePelangganRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // return $request;
        $validator = Validator::make($request->all(), [
            'pelKode'       => 'required|max:255',
            'pelNama'       => 'required|max:255',
            'pelAlamat'     => 'sometimes',
            'pelNoTelpon'   => 'sometimes|numeric',
        ]);
        // return $validator->errors();

        if ($validator->fails()) return redirect()->back()->withErrors($validator->errors());

        $pelanggan = new Pelanggan;
 
        $pelanggan->pelKode = $request->get('pelKode');
        $pelanggan->pelNama = $request->get('pelNama');
        $pelanggan->pelAlamat = $request->get('pelAlamat');
        $pelanggan->pelNoTelpon = $request->get('pelNoTelpon');
 
        $pelanggan->save();

        if($pelanggan)
        {
            return redirect()->intended(route('master.pelanggan'))->withFlashSuccess('Data Berhasil Disimpan!');
        }

        return redirect()->route('master.pelanggan')->withFlashDanger('Data Gagal Disimpan!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Master\Pelanggan  $pelanggan
     * @return \Illuminate\Http\Response
     */
    public function show(Pelanggan $pelanggan)
    {
        // return $pelanggan;
        return view('master.pelanggan.show', ['pelanggan' => $pelanggan]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Master\Pelanggan  $pelanggan
     * @return \Illuminate\Http\Response
     */
    public function edit(Pelanggan $pelanggan)
    {
        return view('master.pelanggan.edit', ['pelanggan' => $pelanggan]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdatePelangganRequest  $request
     * @param  \App\Models\Master\Pelanggan  $pelanggan
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Pelanggan $pelanggan)
    {
        // return Auth::user();

        $validator = Validator::make($request->all(), [
            'pelKode'    => 'required|max:255',
            'pelNama'    => 'required|max:255',
            'pelAlamat'  => 'sometimes',
            'pelNoTelpon'   => 'sometimes|numeric',
        ]);

        if ($validator->fails()) return redirect()->back()->withErrors($validator->errors());

        $pelanggan->pelKode = $request->get('pelKode');
        $pelanggan->pelNama = $request->get('pelNama');
        $pelanggan->pelAlamat = $request->get('pelAlamat');
        $pelanggan->pelNoTelpon = $request->get('pelNoTelpon');

        $pelanggan->save();

        return redirect()->intended(route('master.pelanggan'))->withFlashSuccess('Data Berhasil Diupdate!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Master\Pelanggan  $pelanggan
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // return $id;
        $status = DB::table('pelanggan')->where('pelId','=',$id)->delete();;

        if($status)
        {
            return redirect()->route('master.pelanggan')->withFlashSuccess('Data Berhasil Dihapus!');
        }

        return redirect()->route('master.pelanggan')->withFlashDanger('Data Gagal Dihapus!');
    }
}

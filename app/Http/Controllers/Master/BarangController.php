<?php

namespace App\Http\Controllers\Master;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreBarangRequest;
use App\Http\Requests\UpdateBarangRequest;
use App\Models\Master\Barang;
use App\Repositories\Access\User\EloquentUserRepository;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
// use Auth;


class BarangController extends Controller
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
        // $query = Barang::get();

        // return $query;
        // return array('barangs' => Barang::sortable(['barangKode' => 'asc'])->paginate());
        return view('master.barang.index', ['barangs' => Barang::sortable(['barangKode' => 'asc'])->paginate()]);
    }

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
     * @param  \App\Http\Requests\StoreBarangRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreBarangRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Master\Barang  $barang
     * @return \Illuminate\Http\Response
     */
    public function show(Barang $barang)
    {
        // return $barang;
        return view('master.barang.show', ['barang' => $barang]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Master\Barang  $barang
     * @return \Illuminate\Http\Response
     */
    public function edit(Barang $barang)
    {
        return view('master.barang.edit', ['barang' => $barang]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateBarangRequest  $request
     * @param  \App\Models\Master\Barang  $barang
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Barang $barang)
    {
        // return Auth::user();

        $validator = Validator::make($request->all(), [
            'barangKode'    => 'required|max:255',
            'barangNama'    => 'required|max:255',
            'barangSatuan'  => 'sometimes',
            'barangHarga'   => 'sometimes|numeric',
        ]);

        if ($validator->fails()) return redirect()->back()->withErrors($validator->errors());

        $barang->barangKode = $request->get('barangKode');
        $barang->barangNama = $request->get('barangNama');
        $barang->barangSatuan = $request->get('barangSatuan');
        $barang->barangHarga = $request->get('barangHarga');

        $barang->save();

        return redirect()->intended(route('master.barang'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Master\Barang  $barang
     * @return \Illuminate\Http\Response
     */
    public function destroy(Barang $barang)
    {
        //
    }
}

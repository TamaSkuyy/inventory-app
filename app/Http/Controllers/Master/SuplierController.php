<?php

namespace App\Http\Controllers\Master;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreSuplierRequest;
use App\Http\Requests\UpdateSuplierRequest;
use App\Models\Master\Suplier;
use App\Repositories\Access\User\EloquentUserRepository;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
// use Auth;


class SuplierController extends Controller
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
        return view('master.suplier.index', ['supliers' => Suplier::sortable(['supKode' => 'asc'])->paginate()]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('master.suplier.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreSuplierRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // return $request;
        $validator = Validator::make($request->all(), [
            'supKode'       => 'required|max:255',
            'supNama'       => 'required|max:255',
            'supAlamat'     => 'sometimes',
            'supNoTelpon'   => 'sometimes|numeric',
        ]);
        // return $validator->errors();

        if ($validator->fails()) return redirect()->back()->withErrors($validator->errors());

        $suplier = new Suplier;
 
        $suplier->supKode = $request->get('supKode');
        $suplier->supNama = $request->get('supNama');
        $suplier->supAlamat = $request->get('supAlamat');
        $suplier->supNoTelpon = $request->get('supNoTelpon');
 
        $suplier->save();

        if($suplier)
        {
            return redirect()->intended(route('master.suplier'))->withFlashSuccess('Data Berhasil Disimpan!');
        }

        return redirect()->route('master.suplier')->withFlashDanger('Data Gagal Disimpan!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Master\Suplier  $suplier
     * @return \Illuminate\Http\Response
     */
    public function show(Suplier $suplier)
    {
        // return $suplier;
        return view('master.suplier.show', ['suplier' => $suplier]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Master\Suplier  $suplier
     * @return \Illuminate\Http\Response
     */
    public function edit(Suplier $suplier)
    {
        return view('master.suplier.edit', ['suplier' => $suplier]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateSuplierRequest  $request
     * @param  \App\Models\Master\Suplier  $suplier
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Suplier $suplier)
    {
        // return Auth::user();

        $validator = Validator::make($request->all(), [
            'supKode'    => 'required|max:255',
            'supNama'    => 'required|max:255',
            'supAlamat'  => 'sometimes',
            'supNoTelpon'   => 'sometimes|numeric',
        ]);

        if ($validator->fails()) return redirect()->back()->withErrors($validator->errors());

        $suplier->supKode = $request->get('supKode');
        $suplier->supNama = $request->get('supNama');
        $suplier->supAlamat = $request->get('supAlamat');
        $suplier->supNoTelpon = $request->get('supNoTelpon');

        $suplier->save();

        return redirect()->intended(route('master.suplier'))->withFlashSuccess('Data Berhasil Diupdate!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Master\Suplier  $suplier
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // return $id;
        $status = DB::table('suplier')->where('supId','=',$id)->delete();;

        if($status)
        {
            return redirect()->route('master.suplier')->withFlashSuccess('Data Berhasil Dihapus!');
        }

        return redirect()->route('master.suplier')->withFlashDanger('Data Gagal Dihapus!');
    }
}

<?php

namespace App\Http\Controllers\Master;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreBarangRequest;
use App\Http\Requests\UpdateBarangRequest;
use App\Models\Master\Barang;
use App\Repositories\Access\User\EloquentUserRepository;
use App\Tables\BarangTable;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use \Illuminate\View\View;
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
    public function index(Request $request): View
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
        return view('master.barang.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreBarangRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'barangKode'    => 'required|max:255',
            'barangNama'    => 'required|max:255',
            'barangSatuan'  => 'sometimes',
            'barangHarga'   => 'sometimes|numeric',
            'barangImg'     => 'image|mimes:jpg,png,jpeg,gif,svg|max:2048',
        ]);

        if ($validator->fails()) return redirect()->back()->withErrors($validator->errors());

        $barang = new Barang;
 
        $barang->barangKode = $request->get('barangKode');
        $barang->barangNama = $request->get('barangNama');
        $barang->barangSatuan = $request->get('barangSatuan');
        $barang->barangHarga = $request->get('barangHarga');

        if($file = $request->file('barangImg')) {
            $name = $request->file('barangImg')->getClientOriginalName();
            $path = $request->file('barangImg')->storeAs('public/images/barang', $name);

            $barang->barangImg = $name;
            $barang->barangPath = $path;
        }
 
        $barang->save();

        if($barang)
        {
            return redirect()->intended(route('master.barang'))->withFlashSuccess('Data Berhasil Disimpan!');
        }

        return redirect()->route('master.barang')->withFlashDanger('Data Gagal Disimpan!');
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
        // return $barang;

        $validator = Validator::make($request->all(), [
            'barangKode'    => 'required|max:255',
            'barangNama'    => 'required|max:255',
            'barangSatuan'  => 'sometimes',
            'barangHarga'   => 'sometimes|numeric',
            'barangImg'     => 'image|mimes:jpg,png,jpeg,gif,svg|max:2048',
        ]);

        if ($validator->fails()) return redirect()->back()->withErrors($validator->errors());

        $barang->barangKode = $request->get('barangKode');
        $barang->barangNama = $request->get('barangNama');
        $barang->barangSatuan = $request->get('barangSatuan');
        $barang->barangHarga = $request->get('barangHarga');

        if($file = $request->file('barangImg')) {

            $img = DB::table('barang')->where('barangId','=',$barang->barangId)->get();

            $image_path = !empty($img[0]->barangPath) ? $img[0]->barangPath : '';

            if(Storage::exists($image_path)) {
                Storage::delete($image_path);
            }

            $name = $request->file('barangImg')->getClientOriginalName();
            $path = $request->file('barangImg')->storeAs('public/images/barang', $name);

            $barang->barangImg = $name;
            $barang->barangPath = $path;
        }
 

        $barang->save();

        return redirect()->intended(route('master.barang'))->withFlashSuccess('Data Berhasil Diupdate!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Master\Barang  $barang
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // return $id;
        $img = DB::table('barang')->where('barangId','=',$id)->get();
        $status = DB::table('barang')->where('barangId','=',$id)->delete();;

        if($status)
        {
            $image_path = !empty($img[0]->barangPath) ? $img[0]->barangPath : '';

            if(Storage::exists($image_path)) {
                Storage::delete($image_path);
            }
            
            return redirect()->route('master.barang')->withFlashSuccess('Data Berhasil Dihapus!');
        }

        return redirect()->route('master.barang')->withFlashDanger('Data Gagal Dihapus!');
    }

    public function search(Request $request)
    {
    	$barang = [];

        // if($request->has('q')){
            $search = $request->q;
            $barang =Barang::select("barangKode as id", DB::raw("CONCAT(barangKode,' - ',barangNama) as name"), "barangNama")
            		->where('barangKode', 'LIKE', "%$search%")
            		->orwhere('barangNama', 'LIKE', "%$search%")
            		->get();
        // }

        return response()->json($barang);
    }
}

<?php

namespace App\Http\Controllers\Transaksi;

use App\Http\Controllers\Controller;
use App\Models\Transaksi\Penerimaan;
use App\Models\Transaksi\Penerimaandetail;
use App\Repositories\Access\User\EloquentUserRepository;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use \Illuminate\View\View;

use Input;

class PenerimaanController extends Controller
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
        return view('transaksi.penerimaan.index', ['penerimaans' => Penerimaan::leftjoin('suplier','supKode','=','terimaSuplier')->sortable(['terimaNomor' => 'asc'])->paginate()]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('transaksi.penerimaan.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // return $request;
        
        $rec=$request->record_detail;
        $jumlah=0;
        for($i=1;$i<=$rec;$i++){
            $test = 'detail'.$i.'_0';
            $test1 = 'detail'.$i.'_1';
            $test2 = 'detail'.$i.'_2';
            $test3 = 'detail'.$i.'_3';
            $test4 = 'detail'.$i.'_4';

            $idbarang=!empty($request->$test)?$request->$test:'';
            $nmbarang=!empty($request->$test1)?$request->$test1:'';
            $qty=!empty($request->$test2)?$request->$test2:'';
            $harga=!empty($request->$test3)?$request->$test3:'';
            $total=!empty($request->$test4)?$request->$test4:'';

            if($idbarang!=''){
                $detailbarang = new Penerimaandetail();

                $detailbarang->terimadNomor = $request->terimaNomor;
                $detailbarang->terimadKdBarang = $idbarang;
                $detailbarang->terimadNmBarang = $nmbarang;
                $detailbarang->terimadQty = $qty;
                $detailbarang->terimadHarga = $harga;
                $detailbarang->terimadTotal = $total;
                $detailbarang->save();

                $jumlah=$jumlah+$total;
            }
        } 

        $penerimaan = new Penerimaan;
 
        $penerimaan->terimaNomor = $request->terimaNomor;
        $penerimaan->terimaTgl = $request->terimaTgl;
        $penerimaan->terimaSuplier = $request->terimaSuplier;
        $penerimaan->terimaTotal = $jumlah;
        $penerimaan->save();

        if($penerimaan){
            $result = array(
                'code' => 200,
                'message' => 'success',
            );
            $result['data'] = $penerimaan;
        } else {
            $result = array(
                'code' => 201,
                'message' => 'error',
            );
            $result['data'] = null;
        }
        
        return json_encode($result);

        // if($penerimaan)
        // {
        //     return redirect()->intended(route('transaksi.penerimaan'))->withFlashSuccess('Data Berhasil Disimpan!');
        // }

        // return redirect()->route('transaksi.penerimaan')->withFlashDanger('Data Gagal Disimpan!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Transaksi\Penerimaan  $penerimaan
     * @return \Illuminate\Http\Response
     */
    public function show(Penerimaan $penerimaan)
    {
        // return $penerimaan;
        return view('transaksi.penerimaan.show', ['barang' => $penerimaan]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Transaksi\Penerimaan  $penerimaan
     * @return \Illuminate\Http\Response
     */
    public function edit(Penerimaan $penerimaan)
    {
        return view('transaksi.penerimaan.edit', ['barang' => $penerimaan]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Models\Transaksi\Penerimaan  $penerimaan
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Penerimaan $penerimaan)
    {
        // return $penerimaan;

        $validator = Validator::make($request->all(), [
            'barangKode'    => 'required|max:255',
            'barangNama'    => 'required|max:255',
            'barangSatuan'  => 'sometimes',
            'barangHarga'   => 'sometimes|numeric',
            'barangImg'     => 'image|mimes:jpg,png,jpeg,gif,svg|max:2048',
        ]);

        if ($validator->fails()) return redirect()->back()->withErrors($validator->errors());

        $penerimaan->barangKode = $request->get('barangKode');
        $penerimaan->barangNama = $request->get('barangNama');
        $penerimaan->barangSatuan = $request->get('barangSatuan');
        $penerimaan->barangHarga = $request->get('barangHarga');

        if($file = $request->file('barangImg')) {

            $img = DB::table('barang')->where('barangId','=',$penerimaan->barangId)->get();

            $image_path = !empty($img[0]->barangPath) ? $img[0]->barangPath : '';

            if(Storage::exists($image_path)) {
                Storage::delete($image_path);
            }

            $name = $request->file('barangImg')->getClientOriginalName();
            $path = $request->file('barangImg')->storeAs('public/images/barang', $name);

            $penerimaan->barangImg = $name;
            $penerimaan->barangPath = $path;
        }
 

        $penerimaan->save();

        return redirect()->intended(route('transaksi.penerimaan'))->withFlashSuccess('Data Berhasil Diupdate!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Transaksi\Penerimaan  $penerimaan
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // return $id;
        $status = DB::table('penerimaan')->where('terimaId','=',$id)->delete();;

        if($status)
        {
            return redirect()->route('transaksi.penerimaan')->withFlashSuccess('Data Berhasil Dihapus!');
        }

        return redirect()->route('transaksi.penerimaan')->withFlashDanger('Data Gagal Dihapus!');
    }
}

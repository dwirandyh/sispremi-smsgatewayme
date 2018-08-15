<?php

namespace App\Http\Controllers;

use App\Agen;
use App\Asuransi;
use App\Pembayaran;
use Illuminate\Http\Request;

class PembayaranController extends Controller
{
    private $viewData = [];
    private $pageTitle = 'Pembayaran';

    function __construct()
    {
        $this->viewData['pageTitle'] = $this->pageTitle;
        $this->viewData['act'] = '';
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $this->viewData['data'] = Pembayaran::all();
        return view('pembayaran', $this->viewData);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $this->viewData['act'] = 'create';
        $this->viewData['asuransi'] = Asuransi::all();
        $this->viewData['agen'] = Agen::pluck('nama', 'idAgen');
        return view('pembayaran', $this->viewData);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'noPembayaran' => 'required',
            'idAsuransi' => 'required',
            'idAgen' => 'required',
            'tglPembayaran' => 'required|date',
            'periodeDari' => 'required|date',
            'periodeSampai' => 'required|date',
            'jumlahPembayaran' => 'required|int',
        ]);

        Pembayaran::insert($data);

        \Session::flash('message', 'Data berhasil disimpan');
        return redirect('/pembayaran');
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $this->viewData['act'] = 'show';
        $this->viewData['detail'] = Pembayaran::find($id)->first();
        $this->viewData['asuransi'] = Asuransi::all();
        $this->viewData['agen'] = Agen::pluck('nama', 'idAgen');
        return view('pembayaran', $this->viewData);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $data = $request->validate([
            'noPembayaran' => 'required',
            'idAsuransi' => 'required',
            'idAgen' => 'required',
            'tglPembayaran' => 'required|date',
            'periodeDari' => 'required|date',
            'periodeSampai' => 'required|date',
            'jumlahPembayaran' => 'required|int',
        ]);

        $pembayaran = Pembayaran::find($id);
        $pembayaran->noPembayaran = $data['noPembayaran'];
        $pembayaran->idAsuransi = $data['idAsuransi'];
        $pembayaran->idAgen = $data['idAgen'];
        $pembayaran->tglPembayaran = $data['tglPembayaran'];
        $pembayaran->periodeDari = $data['periodeDari'];
        $pembayaran->periodeSampai = $data['periodeSampai'];
        $pembayaran->jumlahPembayaran = $data['jumlahPembayaran'];
        $pembayaran->save();


        \Session::flash('message', 'Data berhasil diedit');
        return redirect('/pembayaran');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try {
            Pembayaran::find($id)->delete();
        } catch (\Exception $e) {
            print_r($e->getMessage());
            exit();
        }
        \Session::flash('message', 'Data berhasil dihapus');
        return redirect('/pembayaran');
    }

    public function cetak($id){
        $data['detail'] = Pembayaran::find($id);
        return view('laporan.kwitansi_pembayaran', $data);
    }

    public function cetakKlaim($id){
        $data['detail'] = Pembayaran::find($id);
        return view('laporan.kwitansi_klaim', $data);
    }
}

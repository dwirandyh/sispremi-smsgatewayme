<?php

namespace App\Http\Controllers;

use App\Agen;
use App\Asuransi;
use App\Pelanggan;
use App\Pembayaran;
use App\PenerimaSantunan;
use Illuminate\Http\Request;

class AsuransiController extends Controller
{
    private $viewData = [];
    private $pageTitle = 'Asuransi';

    function __construct()
    {
        $this->viewData['pageTitle'] = $this->pageTitle;
        $this->viewData['act'] = '';
        $this->viewData['agen'] = Agen::pluck('nama', 'idAgen');
        $this->viewData['pelanggan'] = Pelanggan::pluck('nama', 'idPelanggan');

        $this->viewData['macamAsuransi'] = ['Mitra Beasiswa Berencana' => 'Mitra Beasiswa Berencana', 'Kesehatan' => 'Kesehatan'];
        $this->viewData['caraBayar'] = ['1 Bulan' => '1 Bulan', 'Triwulan' => 'Triwulan', '1 Tahun' => '1 Tahun'];
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $this->viewData['data'] = Asuransi::all();
        return view('asuransi', $this->viewData);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $this->viewData['act'] = 'create';
        return view('asuransi', $this->viewData);
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
            'idAsuransi' => 'required',
            'idPelanggan' => 'required',
            'idAgen' => 'required',
            'macamAsuransi' => 'required',
            'mulaiAsuransi' => 'required|date',
            'masaAsuransi' => 'required|integer',
            'masaPembayaran' => 'required|integer',
            'masaLeluasa' => 'required|integer',
            'caraBayar' => 'required',
            'nominal' => 'required|integer',
            'biayaAngsuran' => 'required|integer',
        ]);

        $data['created_at'] = date('Y-m-d G:i:s');

        Asuransi::insert($data);

        \Session::flash('message', 'Data berhasil disimpan');
        return redirect('/asuransi');
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
        $this->viewData['detail'] = Asuransi::find($id)->first();
        return view('asuransi', $this->viewData);
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
            'idAsuransi' => 'required',
            'idPelanggan' => 'required',
            'idAgen' => 'required',
            'macamAsuransi' => 'required',
            'mulaiAsuransi' => 'required|date',
            'masaAsuransi' => 'required|integer',
            'masaPembayaran' => 'required|integer',
            'masaLeluasa' => 'required|integer',
            'caraBayar' => 'required',
            'nominal' => 'required|integer',
            'biayaAngsuran' => 'required|integer',
        ]);


        $data = Asuransi::find($id)->first();;
        $data->idAsuransi = $request->post('idAsuransi');
        $data->idPelanggan = $request->post('idPelanggan');
        $data->idAgen = $request->post('idAgen');
        $data->macamAsuransi = $request->post('macamAsuransi');
        $data->mulaiAsuransi = $request->post('mulaiAsuransi');
        $data->masaAsuransi = $request->post('masaAsuransi');
        $data->masaPembayaran = $request->post('masaPembayaran');
        $data->masaLeluasa = $request->post('masaLeluasa');
        $data->caraBayar = $request->post('caraBayar');
        $data->nominal = $request->post('nominal');
        $data->biayaAngsuran = $request->post('biayaAngsuran');
        $data->save();


        \Session::flash('message', 'Data berhasil diedit');
        return redirect('/asuransi');
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
            Asuransi::find($id)->delete();
        } catch (\Exception $e) {
            print_r($e->getMessage());
            exit();
        }
        \Session::flash('message', 'Data berhasil dihapus');
        return redirect('/asuransi');
    }

    public function cetak($id){
        $data['detail'] = Asuransi::find($id);
        $data['penerima'] = PenerimaSantunan::all()->where('idPelanggan', '=', $data['detail']->idPelanggan);
        $data['pembayaran'] = Pembayaran::all()->where('idAsuransi', '=', $data['detail']->idAsuransi);
        return view('laporan.informasi_polis', $data);
    }
}

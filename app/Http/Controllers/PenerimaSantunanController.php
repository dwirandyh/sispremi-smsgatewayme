<?php

namespace App\Http\Controllers;

use App\Pelanggan;
use App\PenerimaSantunan;
use Illuminate\Http\Request;

class PenerimaSantunanController extends Controller
{
    private $viewData = [];
    private $pageTitle = 'Penerima Santunan';

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
        $this->viewData['data'] = PenerimaSantunan::all();
        return view('penerima_santunan', $this->viewData);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $this->viewData['act'] = 'create';
        $this->viewData['pelanggan'] = Pelanggan::all();
        return view('penerima_santunan', $this->viewData);
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
            'idPelanggan' => 'required',
            'nama' => 'required',
            'jenisKelamin' => 'required',
            'tglLahir' => 'required|date',
            'status' => 'required',
        ]);

        PenerimaSantunan::insert($data);

        \Session::flash('message', 'Data berhasil disimpan');
        return redirect('/penerima_santunan');
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
        $this->viewData['detail'] = PenerimaSantunan::find($id)->first();
        $this->viewData['pelanggan'] = Pelanggan::all();
        return view('penerima_santunan', $this->viewData);
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
            'idPelanggan' => 'required',
            'nama' => 'required',
            'jenisKelamin' => 'required',
            'tglLahir' => 'required|date',
            'status' => 'required',
        ]);

        $data = PenerimaSantunan::find($id);
        $data->idPelanggan = $request->post('idPelanggan');
        $data->nama = $request->post('nama');
        $data->jenisKelamin = $request->post('jenisKelamin');
        $data->tglLahir = $request->post('tglLahir');
        $data->status = $request->post('status');
        $data->save();


        \Session::flash('message', 'Data berhasil diedit');
        return redirect('/penerima_santunan');
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
            PenerimaSantunan::find($id)->delete();
        } catch (\Exception $e) {
            print_r($e->getMessage());
            exit();
        }
        \Session::flash('message', 'Data berhasil dihapus');
        return redirect('/penerima_santunan');
    }
}

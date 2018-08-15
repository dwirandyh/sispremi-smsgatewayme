<?php

namespace App\Http\Controllers;

use App\Pelanggan;
use Illuminate\Http\Request;

class PelangganController extends Controller
{
    private $viewData = [];
    private $pageTitle = 'Pelanggan';

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
        $this->viewData['data'] = Pelanggan::all();
        return view('pelanggan', $this->viewData);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $this->viewData['act'] = 'create';
        return view('pelanggan', $this->viewData);
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
            'namaIbu' => 'required',
            'tempatLahir' => 'required',
            'tglLahir' => 'required|date',
            'wargaNegara' => 'required',
            'statusPernikahan' => 'required',
            'alamat' => 'required',
            'noTelepon' => 'required',
            'email' => 'required',
            'pekerjaan' => 'required',
            'jabatan' => 'required',
        ]);

        Pelanggan::insert($data);

        \Session::flash('message', 'Data berhasil disimpan');
        return redirect('/pelanggan');
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
        $this->viewData['detail'] = Pelanggan::find($id)->first();
        return view('pelanggan', $this->viewData);
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
            'namaIbu' => 'required',
            'tempatLahir' => 'required',
            'tglLahir' => 'required|date',
            'wargaNegara' => 'required',
            'statusPernikahan' => 'required',
            'alamat' => 'required',
            'noTelepon' => 'required',
            'email' => 'required',
            'pekerjaan' => 'required',
            'jabatan' => 'required',
        ]);

        $data = Pelanggan::find($id)->first();;
        $data->nama = $request->post('nama');
        $data->jenisKelamin = $request->post('jenisKelamin');
        $data->namaIbu = $request->post('namaIbu');
        $data->tempatLahir = $request->post('tempatLahir');
        $data->tglLahir = $request->post('tglLahir');
        $data->wargaNegara = $request->post('wargaNegara');
        $data->statusPernikahan = $request->post('statusPernikahan');
        $data->alamat = $request->post('alamat');
        $data->email = $request->post('email');
        $data->pekerjaan = $request->post('pekerjaan');
        $data->jabatan = $request->post('jabatan');
        $data->save();


        \Session::flash('message', 'Data berhasil diedit');
        return redirect('/pelanggan');
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
            Pelanggan::find($id)->delete();
        } catch (\Exception $e) {
            print_r($e->getMessage());
            exit();
        }
        \Session::flash('message', 'Data berhasil dihapus');
        return redirect('/pelanggan');
    }
}

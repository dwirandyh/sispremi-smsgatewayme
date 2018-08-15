<?php

namespace App\Http\Controllers;

use App\Agen;
use Illuminate\Http\Request;

class AgenController extends Controller
{
    private $viewData = [];
    private $pageTitle = 'Agen';

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
        $this->viewData['data'] = Agen::all();
        return view('agen', $this->viewData);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $this->viewData['act'] = 'create';
        return view('agen', $this->viewData);
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
            'idAgen' => 'required',
            'nama' => 'required',
            'alamat' => 'required',
            'noTelepon' => 'required',
        ]);

        Agen::insert($data);

        \Session::flash('message', 'Data berhasil disimpan');
        return redirect('/agen');
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
        $this->viewData['detail'] = Agen::find($id)->first();
        return view('agen', $this->viewData);
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
            'idAgen' => 'required',
            'nama' => 'required',
            'alamat' => 'required',
            'noTelepon' => 'required',
        ]);

        $data = Agen::find($id)->first();;
        $data->nama = $request->post('nama');
        $data->alamat = $request->post('alamat');
        $data->noTelepon = $request->post('noTelepon');
        $data->save();


        \Session::flash('message', 'Data berhasil diedit');
        return redirect('/agen');
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
            Agen::find($id)->delete();
        } catch (\Exception $e) {
            print_r($e->getMessage());
            exit();
        }
        \Session::flash('message', 'Data berhasil dihapus');
        return redirect('/agen');
    }
}
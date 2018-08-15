@extends('layout.index')
@section('content')
    @if(empty($act))
        <div class="page-content">
            <!-- START X-NAVIGATION VERTICAL -->
            <ul class="x-navigation x-navigation-horizontal x-navigation-panel">
                <!-- TOGGLE NAVIGATION -->
                <li class="xn-icon-button">
                    <a href="#" class="x-navigation-minimize"><span class="fa fa-dedent"></span></a>
                </li>
                <!-- END TOGGLE NAVIGATION -->
            </ul>
            <!-- END X-NAVIGATION VERTICAL -->

            <!-- START BREADCRUMB -->
            <ul class="breadcrumb">
                <li><a href="{{ url('/') }}">Home</a></li>
                <li class="active">{{ $pageTitle }}</li>
            </ul>
            <!-- END BREADCRUMB -->

            <div class="page-title">
                <h2><span class="fa fa-arrow-circle-o-left"></span> {{ $pageTitle }}</h2>
            </div>

            <!-- PAGE CONTENT WRAPPER -->
            <div class="page-content-wrap">

                <div class="row">
                    <div class="col-md-12">
                        <div>
                            @if (!empty(\Session::get('message')))
                                <div class="alert alert-success">
                                    {{ \Session::get('message') }}
                                </div>
                            @endif
                        </div>
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <h3 class="panel-title">{{ $pageTitle }} | <a href="{{ url('/asuransi/create') }}"
                                                                              class="btn btn-info btn-sm"
                                                                              style="color: #FFF;">Tambah Data</a></h3>
                            </div>
                            <div class="panel-body">
                                <div class="table-responsive">
                                    <table class="table table-bordered table-striped datatable">
                                        <thead>
                                        <tr>
                                            <th>No Polis</th>
                                            <th>No. Pemegang Polis</th>
                                            <th>Nama Pemegang Polis</th>
                                            <th>Nama Agen</th>
                                            <th>Macam Asuransi</th>
                                            <th>Mulai Asuransi</th>
                                            <th>Masa Asuransi</th>
                                            <th>Masa Pembayaran</th>
                                            <th>Masa Leluasa</th>
                                            <th>Cara Bayar</th>
                                            <th>Nominal</th>
                                            <th>Biaya Angsuran</th>
                                            <th>Informasi Polis</th>
                                            <th>Aksi</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach ($data as $row)
                                            <tr>
                                                <td>{{ $row->idAsuransi }}</td>
                                                <td>{{ $row->idPelanggan }}</td>
                                                <td>{{ $row->pelanggan->nama }}</td>
                                                <td>{{ $row->agen->nama }}</td>
                                                <td>{{ $row->macamAsuransi }}</td>
                                                <td>{{ $row->mulaiAsuransi }}</td>
                                                <td>{{ $row->masaAsuransi }} tahun</td>
                                                <td>{{ $row->masaPembayaran }} tahun</td>
                                                <td>{{ $row->masaLeluasa }} bulan</td>
                                                <td>{{ $row->caraBayar }}</td>
                                                <td>{{ $row->nominal }}</td>
                                                <td>{{ $row->biayaAngsuran }}</td>
                                                <td><a href="{{ url('/asuransi/' . $row->idAsuransi . '/cetak') }}"
                                                       class="btn btn-primary">Cetak</a></td>
                                                <td>
                                                    <a href="{{ url('/asuransi/' . $row->idAsuransi . '/edit') }}"
                                                       class="btn btn-info">Edit</a>
                                                    <form method="post"
                                                          action="{{ url('/asuransi/' . $row->idAsuransi) }}">
                                                        {{ csrf_field() }}
                                                        <input type="hidden" name="_method" value="delete">
                                                        <button type="submit" class="btn btn-danger btn-sm">Hapus
                                                        </button>
                                                    </form>
                                                </td>
                                            </tr>
                                        @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>

            </div>
            <!-- END PAGE CONTENT WRAPPER -->
        </div>
    @elseif ($act == 'create')
        <div class="page-content">
            <!-- START X-NAVIGATION VERTICAL -->
            <ul class="x-navigation x-navigation-horizontal x-navigation-panel">
                <!-- TOGGLE NAVIGATION -->
                <li class="xn-icon-button">
                    <a href="#" class="x-navigation-minimize"><span class="fa fa-dedent"></span></a>
                </li>
                <!-- END TOGGLE NAVIGATION -->
            </ul>
            <!-- END X-NAVIGATION VERTICAL -->

            <!-- START BREADCRUMB -->
            <ul class="breadcrumb">
                <li><a href="{{ url('/') }}">Home</a></li>
                <li class="active">{{ $pageTitle }}</li>
            </ul>
            <!-- END BREADCRUMB -->

            <div class="page-title">
                <h2><span class="fa fa-arrow-circle-o-left"></span> {{ $pageTitle }}</h2>
            </div>

            <!-- PAGE CONTENT WRAPPER -->
            <div class="page-content-wrap">

                <div class="row">
                    <div class="col-md-12">

                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <h3 class="panel-title">Tambah {{ $pageTitle }} | <a href="{{ url('/asuransi') }}"
                                                                                     class="btn btn-info btn-sm"
                                                                                     style="color: #FFF;">Kembali</a>
                                </h3>
                            </div>
                            <form class="form-horizontal" role="form" method="post" action="{{ url('/asuransi') }}">
                                {{ csrf_field() }}
                                <div class="panel-body">
                                    @if ($errors->any())
                                        <div class="alert alert-danger">
                                            <ul>
                                                @foreach ($errors->all() as $error)
                                                    <li>{{ $error }}</li>
                                                @endforeach
                                            </ul>
                                        </div>
                                    @endif
                                    <div class="form-group">
                                        <label class="col-md-2 control-label">No. Polis</label>
                                        <div class="col-md-8">
                                            <input type="text" class="form-control" name="idAsuransi"
                                                   value="{{ old('idAsuransi') }}">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-2 control-label">Pelanggan</label>
                                        <div class="col-md-8">
                                            {{ Form::select('idPelanggan', $pelanggan, '', ['class' => 'form-control select']) }}
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-2 control-label">Agen</label>
                                        <div class="col-md-8">
                                            {{ Form::select('idAgen', $agen, '', ['class' => 'form-control select']) }}
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-2 control-label">Macam Asuransi</label>
                                        <div class="col-md-8">
                                            {{ Form::select('macamAsuransi', $macamAsuransi, '', ['class' => 'form-control select']) }}
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-2 control-label">Mulai Asuransi</label>
                                        <div class="col-md-8">
                                            <input type="date" class="form-control datepicker" name="mulaiAsuransi"
                                                   value="{{ old('mulaiAsuransi', date('Y-m-d')) }}">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-2 control-label">Masa Asuransi (tahun)</label>
                                        <div class="col-md-8">
                                            <input type="number" class="form-control" name="masaAsuransi"
                                                   value="{{ old('masaAsuransi') }}">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-2 control-label">Masa Pembayaran (tahun)</label>
                                        <div class="col-md-8">
                                            <input type="number" class="form-control" name="masaPembayaran"
                                                   value="{{ old('masaPembayaran') }}">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-2 control-label">Masa Leluasa (bulan)</label>
                                        <div class="col-md-8">
                                            <input type="number" class="form-control" name="masaLeluasa"
                                                   value="{{ old('masaLeluasa') }}">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-2 control-label">Cara Bayar Premi</label>
                                        <div class="col-md-8">
                                            {{ Form::select('caraBayar', $caraBayar, '', ['class' => 'form-control select']) }}
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-2 control-label">UP Nominal</label>
                                        <div class="col-md-8">
                                            <input type="number" class="form-control" name="nominal"
                                                   value="{{ old('nominal') }}">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-2 control-label">Biaya Angsuran</label>
                                        <div class="col-md-8">
                                            <input type="text" class="form-control" name="biayaAngsuran"
                                                   value="{{ old('biayaAngsuran') }}">
                                        </div>
                                    </div>
                                </div>
                                <div class="panel-footer">
                                    <button class="btn btn-primary" type="submit">Submit</button>
                                    <button class="btn btn-danger" type="reset">Reset</button>
                                </div>
                            </form>
                        </div>

                    </div>
                </div>

            </div>
            <!-- END PAGE CONTENT WRAPPER -->
        </div>
    @elseif ($act == 'show')
        <div class="page-content">
            <!-- START X-NAVIGATION VERTICAL -->
            <ul class="x-navigation x-navigation-horizontal x-navigation-panel">
                <!-- TOGGLE NAVIGATION -->
                <li class="xn-icon-button">
                    <a href="#" class="x-navigation-minimize"><span class="fa fa-dedent"></span></a>
                </li>
                <!-- END TOGGLE NAVIGATION -->
            </ul>
            <!-- END X-NAVIGATION VERTICAL -->

            <!-- START BREADCRUMB -->
            <ul class="breadcrumb">
                <li><a href="{{ url('/') }}">Home</a></li>
                <li class="active">{{ $pageTitle }}</li>
            </ul>
            <!-- END BREADCRUMB -->

            <div class="page-title">
                <h2><span class="fa fa-arrow-circle-o-left"></span> {{ $pageTitle }}</h2>
            </div>

            <!-- PAGE CONTENT WRAPPER -->
            <div class="page-content-wrap">

                <div class="row">
                    <div class="col-md-12">

                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <h3 class="panel-title">Edit {{ $pageTitle }} | <a href="{{ url('/asuransi') }}"
                                                                                   class="btn btn-info btn-sm"
                                                                                   style="color: #FFF;">Kembali</a>
                                </h3>
                            </div>
                            <form class="form-horizontal" role="form" method="post"
                                  action="{{ url('/asuransi/' . $detail->idAsuransi) }}">
                                {{ csrf_field() }}
                                <input type="hidden" name="_method" value="put">
                                <div class="panel-body">
                                    @if ($errors->any())
                                        <div class="alert alert-danger">
                                            <ul>
                                                @foreach ($errors->all() as $error)
                                                    <li>{{ $error }}</li>
                                                @endforeach
                                            </ul>
                                        </div>
                                    @endif
                                    <div class="form-group">
                                        <label class="col-md-2 control-label">No. Polis</label>
                                        <div class="col-md-8">
                                            <input type="text" class="form-control" name="idAsuransi"
                                                   value="{{ old('idAsuransi', $detail->idAsuransi) }}">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-2 control-label">Pelanggan</label>
                                        <div class="col-md-8">
                                            {{ Form::select('idPelanggan', $pelanggan, $detail->idPelanggan, ['class' => 'form-control select']) }}
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-2 control-label">Agen</label>
                                        <div class="col-md-8">
                                            {{ Form::select('idAgen', $agen, $detail->idAgen, ['class' => 'form-control select']) }}
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-2 control-label">Macam Asuransi</label>
                                        <div class="col-md-8">
                                            {{ Form::select('macamAsuransi', $macamAsuransi, $detail->macamAsuransi, ['class' => 'form-control select']) }}
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-2 control-label">Mulai Asuransi</label>
                                        <div class="col-md-8">
                                            <input type="date" class="form-control datepicker" name="mulaiAsuransi"
                                                   value="{{ old('mulaiAsuransi', $detail->mulaiAsuransi) }}">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-2 control-label">Masa Asuransi (tahun)</label>
                                        <div class="col-md-8">
                                            <input type="number" class="form-control" name="masaAsuransi"
                                                   value="{{ old('masaAsuransi', $detail->masaAsuransi) }}">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-2 control-label">Masa Pembayaran (tahun)</label>
                                        <div class="col-md-8">
                                            <input type="number" class="form-control" name="masaPembayaran"
                                                   value="{{ old('masaPembayaran', $detail->masaPembayaran) }}">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-2 control-label">Masa Leluasa (bulan)</label>
                                        <div class="col-md-8">
                                            <input type="number" class="form-control" name="masaLeluasa"
                                                   value="{{ old('masaLeluasa', $detail->masaLeluasa) }}">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-2 control-label">Cara Bayar Premi</label>
                                        <div class="col-md-8">
                                            {{ Form::select('caraBayar', $caraBayar, $detail->caraBayar, ['class' => 'form-control select']) }}
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-2 control-label">UP Nominal</label>
                                        <div class="col-md-8">
                                            <input type="number" class="form-control" name="nominal"
                                                   value="{{ old('nominal', $detail->nominal) }}">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-2 control-label">Biaya Angsuran</label>
                                        <div class="col-md-8">
                                            <input type="text" class="form-control" name="biayaAngsuran"
                                                   value="{{ old('biayaAngsuran', $detail->biayaAngsuran) }}">
                                        </div>
                                    </div>
                                </div>
                                <div class="panel-footer">
                                    <button class="btn btn-primary" type="submit">Submit</button>
                                    <button class="btn btn-danger" type="reset">Reset</button>
                                </div>
                            </form>
                        </div>

                    </div>
                </div>

            </div>
            <!-- END PAGE CONTENT WRAPPER -->
        </div>
    @endif
@endsection
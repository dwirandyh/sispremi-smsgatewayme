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
                                <h3 class="panel-title">{{ $pageTitle }} | <a href="{{ url('/pembayaran/create') }}"
                                                                              class="btn btn-info btn-sm"
                                                                              style="color: #FFF;">Tambah Data</a></h3>
                            </div>
                            <div class="panel-body">
                                <div class="table-responsive">
                                    <table class="table table-bordered table-striped datatable">
                                        <thead>
                                        <tr>
                                            <th>No. Pembayaran</th>
                                            <th>No. Polis</th>
                                            <th>Nama Pemegang Polis</th>
                                            <th>Macam Asuransi</th>
                                            <th>Nama Agen</th>
                                            <th>Tanggal Pembayaran</th>
                                            <th>Periode</th>
                                            <th>Jumlah Pembayaran</th>
                                            <th>Kwitansi</th>
                                            <th>Kwitansi Klaim</th>
                                            <th>Aksi</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach ($data as $row)
                                            <tr>
                                                <td>{{ $row->noPembayaran }}</td>
                                                <td>{{ $row->idAsuransi }}</td>
                                                <td>{{ $row->asuransi->pelanggan->nama }}</td>
                                                <td>{{ $row->asuransi->macamAsuransi }}</td>
                                                <td>{{ $row->agen->nama }}</td>
                                                <td>{{ date('d M Y', strtotime($row->tglPembayaran)) }}</td>
                                                <td>{{ date('d M Y', strtotime($row->periodeDari)) }} sampai {{ date('d M Y', strtotime($row->periodeSampai)) }}</td>
                                                <td>{{ $row->jumlahPembayaran }}</td>
                                                <td>
                                                    <a href="{{ url('/pembayaran/' . $row->noPembayaran . '/cetak') }}" class="btn btn-primary btn-sm">Cetak Kwitansi</a>
                                                </td>
                                                <td>
                                                    <a href="{{ url('/pembayaran/' . $row->noPembayaran . '/cetak-klaim') }}" class="btn btn-primary btn-sm">Cetak Kwitansi Klaim</a>
                                                </td>
                                                <td>
                                                    <a href="{{ url('/pembayaran/' . $row->noPembayaran . '/edit') }}"
                                                       class="btn btn-info">Edit</a>
                                                    <form method="post"
                                                          action="{{ url('/pembayaran/' . $row->noPembayaran) }}">
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
                                <h3 class="panel-title">Tambah {{ $pageTitle }} | <a href="{{ url('/pembayaran') }}"
                                                                                     class="btn btn-info btn-sm"
                                                                                     style="color: #FFF;">Kembali</a>
                                </h3>
                            </div>
                            <form class="form-horizontal" role="form" method="post" action="{{ url('/pembayaran') }}">
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
                                        <label class="col-md-2 control-label">No. Pembayaran</label>
                                        <div class="col-md-8">
                                            <input type="text" class="form-control" name="noPembayaran"
                                                   value="{{ old('noPembayaran') }}">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-2 control-label">Data Polis Asuransi</label>
                                        <div class="col-md-8">
                                            <select class="form-control select" name="idAsuransi">
                                                @foreach ($asuransi as $row)
                                                    <option value="{{ $row->idAsuransi }}">{{ $row->idAsuransi }}
                                                        | {{ $row->pelanggan->nama }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-2 control-label">Agen</label>
                                        <div class="col-md-8">
                                            {{ Form::select('idAgen', $agen, '', ['class' => 'form-control select']) }}
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-2 control-label">Tanggal Pembayaran</label>
                                        <div class="col-md-8">
                                            <input type="text" class="form-control datepicker" name="tglPembayaran"
                                                   value="{{ old('tglPembayaran', date('Y-m-d')) }}">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-2 control-label">Periode</label>
                                        <div class="col-md-3">
                                            <input type="text" class="form-control datepicker" name="periodeDari"
                                                   value="{{ old('periodeDari', date('Y-m-d')) }}">
                                        </div>
                                        <div class="col-md-1 control-label">Sampai</div>
                                        <div class="col-md-3">
                                            <input type="text" class="form-control datepicker" name="periodeSampai"
                                                   value="{{ old('periodeDari', date('Y-m-d')) }}">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-2 control-label">Jumlah Pembayaran</label>
                                        <div class="col-md-8">
                                            <input type="number" class="form-control" name="jumlahPembayaran"
                                                   value="{{ old('jumlahPembayaran', 0) }}">
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
                                <h3 class="panel-title">Edit {{ $pageTitle }} | <a href="{{ url('/pembayaran') }}"
                                                                                   class="btn btn-info btn-sm"
                                                                                   style="color: #FFF;">Kembali</a>
                                </h3>
                            </div>
                            <form class="form-horizontal" role="form" method="post"
                                  action="{{ url('/pembayaran/' . $detail->noPembayaran) }}">
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
                                        <label class="col-md-2 control-label">No. Pembayaran</label>
                                        <div class="col-md-8">
                                            <input type="text" class="form-control" name="noPembayaran"
                                                   value="{{ old('noPembayaran', $detail->noPembayaran) }}">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-2 control-label">Data Polis Asuransi</label>
                                        <div class="col-md-8">
                                            <select class="form-control select" name="idAsuransi">
                                                @foreach ($asuransi as $row)
                                                    <option value="{{ $row->idAsuransi }}" {{ ($row->idAsuransi == $detail->idAsuransi ? 'selected' : '')  }}>{{ $row->idAsuransi }}
                                                        | {{ $row->pelanggan->nama }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-2 control-label">Agen</label>
                                        <div class="col-md-8">
                                            {{ Form::select('idAgen', $agen, $detail->idAgen, ['class' => 'form-control select']) }}
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-2 control-label">Tanggal Pembayaran</label>
                                        <div class="col-md-8">
                                            <input type="text" class="form-control datepicker" name="tglPembayaran"
                                                   value="{{ old('tglPembayaran', $detail->tglPembayaran) }}">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-2 control-label">Periode</label>
                                        <div class="col-md-3">
                                            <input type="text" class="form-control datepicker" name="periodeDari"
                                                   value="{{ old('periodeDari', $detail->periodeDari) }}">
                                        </div>
                                        <div class="col-md-1 control-label">Sampai</div>
                                        <div class="col-md-3">
                                            <input type="text" class="form-control datepicker" name="periodeSampai"
                                                   value="{{ old('periodeDari', $detail->periodeSampai) }}">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-2 control-label">Jumlah Pembayaran</label>
                                        <div class="col-md-8">
                                            <input type="number" class="form-control" name="jumlahPembayaran"
                                                   value="{{ old('jumlahPembayaran', $detail->jumlahPembayaran) }}">
                                        </div>
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
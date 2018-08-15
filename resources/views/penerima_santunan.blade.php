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
                                <h3 class="panel-title">{{ $pageTitle }} | <a
                                            href="{{ url('/penerima_santunan/create') }}"
                                            class="btn btn-info btn-sm"
                                            style="color: #FFF;">Tambah Data</a></h3>
                            </div>
                            <div class="panel-body">
                                <div class="table-responsive">
                                    <table class="table table-bordered table-striped datatable">
                                        <thead>
                                        <tr>
                                            <th>ID Pelanggan</th>
                                            <th>Nama Pelanggan</th>
                                            <th>Nama Penerima</th>
                                            <th>Jenis Kelamin</th>
                                            <th>Tanggal Lahir</th>
                                            <th>Status</th>
                                            <th>Aksi</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach ($data as $row)
                                            <tr>
                                                <td>{{ $row->idPelanggan }}</td>
                                                <td>{{ $row->pelanggan->nama }}</td>
                                                <td>{{ $row->nama }}</td>
                                                <td>{{ $row->jenisKelamin }}</td>
                                                <td>{{ $row->tglLahir }}</td>
                                                <td>{{ $row->status }}</td>
                                                <td>
                                                    <a href="{{ url('/penerima_santunan/' . $row->idPenerima . '/edit') }}"
                                                       class="btn btn-info">Edit</a>
                                                    <form method="post"
                                                          action="{{ url('/penerima_santunan/' . $row->idPenerima) }}">
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
                                <h3 class="panel-title">Tambah {{ $pageTitle }} | <a
                                            href="{{ url('/penerima_santunan') }}"
                                            class="btn btn-info btn-sm"
                                            style="color: #FFF;">Kembali</a>
                                </h3>
                            </div>
                            <form class="form-horizontal" role="form" method="post"
                                  action="{{ url('/penerima_santunan') }}">
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
                                    <legend>Pelanggan</legend>
                                    <div class="form-group">
                                        <label class="col-md-2 control-label">Nama</label>
                                        <div class="col-md-4">
                                            <select class="form-control select" name="idPelanggan">
                                                @foreach ($pelanggan as $row)
                                                    <option value="{{ $row->idPelanggan }}">{{ $row->nama }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>

                                    <legend>Penerima Santunan</legend>
                                    <div class="form-group">
                                        <label class="col-md-2 control-label">Nama</label>
                                        <div class="col-md-4">
                                            <input type="text" class="form-control" name="nama"
                                                   value="{{ old('nama') }}">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-2 control-label">Jenis Kelamin</label>
                                        <div class="col-md-4">
                                            <select name="jenisKelamin" class="form-control select">
                                                <option>Laki - Laki</option>
                                                <option>Perempuan</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-2 control-label">Tanggal Lahir</label>
                                        <div class="col-md-3">
                                            <input type="text" class="form-control datepicker" name="tglLahir"
                                                   value="{{ old('tglLahir') }}">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-2 control-label">Status</label>
                                        <div class="col-md-4">
                                            <select name="status" class="form-control select">
                                                <option>Istri</option>
                                                <option>Suami</option>
                                                <option>Anak</option>
                                                <option>Saudara Kandung</option>
                                            </select>
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
                                <h3 class="panel-title">Edit {{ $pageTitle }} | <a
                                            href="{{ url('/penerima_santunan') }}"
                                            class="btn btn-info btn-sm"
                                            style="color: #FFF;">Kembali</a>
                                </h3>
                            </div>
                            <form class="form-horizontal" role="form" method="post"
                                  action="{{ url('/penerima_santunan/' . $detail->idPenerima) }}">
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
                                    <legend>Pelanggan</legend>
                                    <div class="form-group">
                                        <label class="col-md-2 control-label">Nama</label>
                                        <div class="col-md-4">
                                            <select class="form-control select" name="idPelanggan">
                                                @foreach ($pelanggan as $row)
                                                    <option value="{{ $row->idPelanggan }}" {{ ($row->idPelanggan == $detail->idPelanggan) ? 'selected' : '' }}>{{ $row->nama }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>

                                    <legend>Penerima Santunan</legend>
                                    <div class="form-group">
                                        <label class="col-md-2 control-label">Nama</label>
                                        <div class="col-md-4">
                                            <input type="text" class="form-control" name="nama"
                                                   value="{{ old('nama', $detail->nama) }}">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-2 control-label">Jenis Kelamin</label>
                                        <div class="col-md-4">
                                            <select name="jenisKelamin" class="form-control select">
                                                <option {{ ($detail->jenisKelamin == 'Laki - Laki') ? 'selected' : '' }}>Laki - Laki</option>
                                                <option {{ ($detail->jenisKelamin == 'Perempuan') ? 'selected' : '' }}>Perempuan</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-2 control-label">Tanggal Lahir</label>
                                        <div class="col-md-3">
                                            <input type="text" class="form-control datepicker" name="tglLahir"
                                                   value="{{ old('tglLahir', $detail->tglLahir) }}">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-2 control-label">Status</label>
                                        <div class="col-md-4">
                                            <select name="status" class="form-control select">
                                                <option {{ ($detail->status == 'Istri') ? 'selected' : '' }}>Istri</option>
                                                <option {{ ($detail->status == 'Suami') ? 'selected' : '' }}>Suami</option>
                                                <option {{ ($detail->status == 'Anak') ? 'selected' : '' }}>Anak</option>
                                                <option {{ ($detail->status == 'Saudara Kandung') ? 'selected' : '' }}>Saudara Kandung</option>
                                            </select>
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
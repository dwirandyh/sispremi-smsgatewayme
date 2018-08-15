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
                                <h3 class="panel-title">{{ $pageTitle }} | <a href="{{ url('/pelanggan/create') }}"
                                                                              class="btn btn-info btn-sm"
                                                                              style="color: #FFF;">Tambah Data</a></h3>
                            </div>
                            <div class="panel-body">
                                <div class="table-responsive">
                                    <table class="table table-bordered table-striped datatable">
                                        <thead>
                                        <tr>
                                            <th>ID Pemegang Polis</th>
                                            <th>Nama</th>
                                            <th>Tempat Tgl Lahir</th>
                                            <th>Jenis Kelamin</th>
                                            <th>Alamat</th>
                                            <th>No. Telepon</th>
                                            <th>Pekerjaan</th>
                                            <th>Jabatan</th>
                                            <th>Aksi</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach ($data as $row)
                                            <tr>
                                                <td>{{ $row->idPelanggan }}</td>
                                                <td>{{ $row->nama }}</td>
                                                <td>{{ $row->tempatLahir }}, {{ $row->tglLahir }}</td>
                                                <td>{{ $row->jenisKelamin }}</td>
                                                <td>{{ $row->alamat }}</td>
                                                <td>{{ $row->noTelepon }}</td>
                                                <td>{{ $row->pekerjaan }}</td>
                                                <td>{{ $row->jabatan }}</td>
                                                <td>
                                                    <a href="{{ url('/pelanggan/' . $row->idPelanggan . '/edit') }}"
                                                       class="btn btn-info">Edit</a>
                                                    <form method="post"
                                                          action="{{ url('/pelanggan/' . $row->idPelanggan) }}">
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
                                <h3 class="panel-title">Tambah {{ $pageTitle }} | <a href="{{ url('/pelanggan') }}"
                                                                                     class="btn btn-info btn-sm"
                                                                                     style="color: #FFF;">Kembali</a>
                                </h3>
                            </div>
                            <form class="form-horizontal" role="form" method="post" action="{{ url('/pelanggan') }}">
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
                                            <label class="col-md-2 control-label">No Pemegang Polis</label>
                                            <div class="col-md-8">
                                                <input type="text" class="form-control" name="idPelanggan"
                                                       value="{{ old('idPelanggan') }}">
                                            </div>
                                        </div>
                                    <div class="form-group">
                                        <label class="col-md-2 control-label">Nama</label>
                                        <div class="col-md-8">
                                            <input type="text" class="form-control" name="nama"
                                                   value="{{ old('nama') }}">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-2 control-label">Tempat, Tgl Lahir</label>
                                        <div class="col-md-5">
                                            <input type="text" class="form-control" name="tempatLahir"
                                                   value="{{ old('tempatLahir') }}">
                                        </div>
                                        <div class="col-md-3">
                                            <input type="text" class="form-control datepicker" name="tglLahir"
                                                   value="{{ old('tglLahir') }}">
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
                                        <label class="col-md-2 control-label">Nama Ibu</label>
                                        <div class="col-md-8">
                                            <input type="text" class="form-control" name="namaIbu"
                                                   value="{{ old('namaIbu') }}">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-2 control-label">Kewarganegaraan</label>
                                        <div class="col-md-8">
                                            <input type="text" class="form-control" name="wargaNegara"
                                                   value="{{ old('wargaNegara') }}">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-2 control-label">Status Pernikahan</label>
                                        <div class="col-md-4">
                                            <select name="statusPernikahan" class="form-control select">
                                                <option>Belum Menikah</option>
                                                <option>Menikah</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-2 control-label">Alamat</label>
                                        <div class="col-md-8">
                                            <textarea class="form-control" name="alamat">{{ old('alamat') }}</textarea>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-2 control-label">No. Telepon</label>
                                        <div class="col-md-8">
                                            <input type="text" class="form-control" name="noTelepon"
                                                   value="{{ old('noTelepon') }}">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-2 control-label">Email</label>
                                        <div class="col-md-8">
                                            <input type="text" class="form-control" name="email"
                                                   value="{{ old('email') }}">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-2 control-label">Pekerjaan</label>
                                        <div class="col-md-8">
                                            <input type="text" class="form-control" name="pekerjaan"
                                                   value="{{ old('pekerjaan') }}">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-2 control-label">Jabatan</label>
                                        <div class="col-md-8">
                                            <input type="text" class="form-control" name="jabatan"
                                                   value="{{ old('jabatan') }}">
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
                                <h3 class="panel-title">Edit {{ $pageTitle }} | <a href="{{ url('/pelanggan') }}"
                                                                                   class="btn btn-info btn-sm"
                                                                                   style="color: #FFF;">Kembali</a>
                                </h3>
                            </div>
                            <form class="form-horizontal" role="form" method="post"
                                  action="{{ url('/pelanggan/' . $detail->idPelanggan) }}">
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
                                        <label class="col-md-2 control-label">No Pemegang Polis</label>
                                        <div class="col-md-8">
                                            <input type="text" class="form-control" name="idPelanggan"
                                                   value="{{ old('idPelanggan', $detail->idPelanggan) }}">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-2 control-label">Nama</label>
                                        <div class="col-md-8">
                                            <input type="text" class="form-control" name="nama"
                                                   value="{{ old('nama', $detail->nama) }}">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-2 control-label">Tempat, Tgl Lahir</label>
                                        <div class="col-md-5">
                                            <input type="text" class="form-control" name="tempatLahir"
                                                   value="{{ old('tempatLahir', $detail->tempatLahir) }}">
                                        </div>
                                        <div class="col-md-3">
                                            <input type="text" class="form-control datepicker" name="tglLahir"
                                                   value="{{ old('tglLahir', $detail->tglLahir) }}">
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
                                        <label class="col-md-2 control-label">Nama Ibu</label>
                                        <div class="col-md-8">
                                            <input type="text" class="form-control" name="namaIbu"
                                                   value="{{ old('namaIbu', $detail->namaIbu) }}">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-2 control-label">Kewarganegaraan</label>
                                        <div class="col-md-8">
                                            <input type="text" class="form-control" name="wargaNegara"
                                                   value="{{ old('wargaNegara', $detail->wargaNegara) }}">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-2 control-label">Status Pernikahan</label>
                                        <div class="col-md-4">
                                            <select name="statusPernikahan" class="form-control select">
                                                <option>Belum Menikah</option>
                                                <option>Menikah</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-2 control-label">Alamat</label>
                                        <div class="col-md-8">
                                            <textarea class="form-control"
                                                      name="alamat">{{ old('alamat', $detail->alamat) }}</textarea>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-2 control-label">No. Telepon</label>
                                        <div class="col-md-8">
                                            <input type="text" class="form-control" name="noTelepon"
                                                   value="{{ old('noTelepon', $detail->noTelepon) }}">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-2 control-label">Email</label>
                                        <div class="col-md-8">
                                            <input type="text" class="form-control" name="email"
                                                   value="{{ old('email', $detail->email) }}">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-2 control-label">Pekerjaan</label>
                                        <div class="col-md-8">
                                            <input type="text" class="form-control" name="pekerjaan"
                                                   value="{{ old('pekerjaan', $detail->pekerjaan) }}">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-2 control-label">Jabatan</label>
                                        <div class="col-md-8">
                                            <input type="text" class="form-control" name="jabatan"
                                                   value="{{ old('jabatan', $detail->jabatan) }}">
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
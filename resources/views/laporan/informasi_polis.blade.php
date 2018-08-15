<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
        "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <title>Untitled Document</title>
</head>

<body>
<table width="100%" border="0" cellspacing="0" cellpadding="10">
    <tr>
        <td align="center"><strong>INFORMASI POLIS</strong></td>
    </tr>
    <tr>
        <td align="center">Data Pemegang Polis | Data Penerima Santunan | Data Asuransi | Data Kantor Tagih Dan Data
            Penagihan Premi
        </td>
    </tr>
    <tr>
        <td align="center" style="border:#000 1px solid;">
            <table width="100%" border="0" cellspacing="0" cellpadding="5">
                <tr>
                    <td height="35" colspan="2" style="border:2px #000 solid;"><strong>Data Pemegang Polis</strong></td>
                </tr>
                <tr>
                    <td>No. Polis</td>
                    <td>{{ $detail->idAsuransi }}</td>
                </tr>
                <tr>
                    <td>ID Pemengang Polis</td>
                    <td>{{ $detail->idPelanggan }}</td>
                </tr>
                <tr>
                    <td>Jenis Kelamin</td>
                    <td>{{ $detail->pelanggan->jenisKelamin }}</td>
                </tr>
                <tr>
                    <td>Nama Pemegang Polis</td>
                    <td>{{ $detail->pelanggan->nama  }}</td>
                </tr>
                <tr>
                    <td>Ibu Kandung</td>
                    <td>{{ $detail->pelanggan->namaIbu }}</td>
                </tr>
                <tr>
                    <td>Tempat/Tanggal Lahir</td>
                    <td>{{ $detail->pelanggan->tempatLahir }}
                        / {{ date('d-m-Y', strtotime($detail->pelanggan->tglLahir)) }}</td>
                </tr>
                <tr>
                    <td>Warga Negara</td>
                    <td>{{ $detail->pelanggan->wargaNegara }}</td>
                </tr>
                <tr>
                    <td>Status Pernikahan</td>
                    <td>{{ $detail->pelanggan->statusPernikahan }}</td>
                </tr>
                <tr>
                    <td height="43" valign="bottom" colspan="2" style="border-bottom:#000 1px solid;">
                        <strong>Rumah</strong></td>
                </tr>
                <tr>
                    <td>Alamat</td>
                    <td>{{ $detail->pelanggan->alamat }}</td>
                </tr>
                <tr>
                    <td>No. Telepon</td>
                    <td>{{ $detail->pelanggan->noTelepon }}</td>
                </tr>
                <tr>
                    <td>Email</td>
                    <td>{{ $detail->pelanggan->email }}</td>
                </tr>
                <tr>
                    <td height="44" valign="bottom" colspan="2" style="border-bottom:#000 1px solid;"><strong>Lembaga/Perusahaan</strong>
                    </td>
                </tr>
                <tr>
                    <td>Pekerjaan</td>
                    <td>{{ $detail->pelanggan->pekerjaan }}</td>
                </tr>
                <tr>
                    <td>Jabatan</td>
                    <td>{{ $detail->pelanggan->jabatan }};</td>
                </tr>
                <tr>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                </tr>
            </table>
        </td>
    </tr>
    <tr>
        <td align="center" style="border:#000 1px solid;">
            <table width="100%" border="0" cellspacing="0" cellpadding="5">
                <tr>
                    <td height="35" colspan="7" style="border:2px #000 solid;"><strong>Data Penerima Santunan</strong>
                    </td>
                </tr>
                <tr>
                    <td>No.</td>
                    <td>Nama Penerima Santunan</td>
                    <td>L/P</td>
                    <td>Tgl Lahir</td>
                    <td>Umur Saat Penutupan</td>
                    <td>Insurable Interest terhadap Tertanggung</td>
                </tr>
                @foreach ($penerima as $row)
                    @php($i = 1)
                    <tr>
                        <td>{{ $i }}</td>
                        <td>{{ $row->nama }}</td>
                        <td>{{ $row->jenisKelamin }}</td>
                        <td>{{ date('d-m-Y', strtotime($row->tglLahir)) }}</td>
                        <td>{{ \App\Helper::umur($row->tglLahir) }}</td>
                        <td>{{ $row->status }}</td>
                    </tr>
                    @php($i++)
                @endforeach
            </table>
        </td>
    </tr>
    <tr>
        <td align="center" style="border:#000 1px solid;">
            <table width="100%" border="0" cellspacing="0" cellpadding="5">
                <tr>
                    <td height="35" colspan="7" style="border:2px #000 solid;"><strong>Data Asuransi</strong></td>
                </tr>
                <tr>
                    <td>Usia Tertanggung</td>
                    <td>{{ \App\Helper::umur($detail->pelanggan->tglLahir) }} (Tahun)</td>
                    <td>Pekerjaan Tertanggung</td>
                    <td>{{ $detail->pelanggan->pekerjaan }}</td>
                </tr>
                <tr>
                    <td>Macam Asuransi</td>
                    <td>{{ $detail->macamAsuransi }}</td>
                    <td>Mulai Asuransi</td>
                    <td>{{ date('d-m-Y', strtotime($detail->created_at)) }}</td>
                </tr>
                <tr>
                    <td>Masa Asuransi</td>
                    <td>{{ $detail->masaAsuransi }} (Tahun)</td>
                    <td>Masa Pembayaran Premi</td>
                    <td>{{ $detail->masaAsuransi }} (Tahun)</td>
                </tr>
                <tr>
                    <td>Masa Leluasa</td>
                    <td>{{ $detail->masaLeluasa }} (Bulan)</td>
                    <td>Masa Pembayaran Premi</td>
                    <td>{{ $detail->masaPembayaran }} (Tahun)</td>
                </tr>
                <tr>
                    <td>Mata Uang</td>
                    <td>Rp</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                </tr>
            </table>

        </td>
    </tr>
    <tr>
        <td align="center" style="border:#000 1px solid;">
            <table width="100%" border="0" cellspacing="0" cellpadding="5">
                <tr>
                    <td height="35" colspan="2" style="border:2px #000 solid;"><strong>Data Kantor Tagih Dan Data
                            Penagihan Premi</strong></td>
                </tr>
                <tr>
                    <td>Kode Kantor / Nama Kantor</td>
                    <td>DETP / KC BANDAR JAYA</td>
                </tr>
                <tr>
                    <td>Kode Unit / Kode Blok</td>
                    <td>DGSP / DGSP07</td>
                </tr>
                <tr>
                    <td>Kode Agen</td>
                    <td>{{ $detail->agen->idAgen }}</td>
                </tr>
                <tr>
                    <td>Nama Agen</td>
                    <td>{{ $detail->agen->nama }}</td>
                </tr>
                <tr>
                    <td>Tempat Bayar Premi</td>
                    <td>ALAMAT RUMAH PEMEGANG POLIS (AGEN)</td>
                </tr>
                <tr>
                    <td>Alamat</td>
                    <td>{{ $detail->agen->alamat }}</td>
                </tr>
                <tr>
                    <td>No. Telepon</td>
                    <td>{{ $detail->agen->noTelepon }}</td>
                </tr>
            </table>
        </td>
    </tr>
    <tr>
        <td align="center" style="border:#000 1px solid;">
            <table width="100%" border="1" cellspacing="0" cellpadding="5">
                <tr>
                    <td height="35" colspan="5" style="border:2px #000 solid;"><strong>Setoran Premi</strong></td>
                </tr>
                <tr>
                    <td>No Kwitansi</td>
                    <td>Tanggal Pembayaran</td>
                    <td>Nama Agen</td>
                    <td>Periode</td>
                    <td>Jumlah Pembayaran</td>
                </tr>
                @foreach ($detail->pembayaran as $row)
                    <tr>
                        <td>{{ $row->noPembayaran }}</td>
                        <td>{{ date('d-m-Y', strtotime($row->tglPembayaran)) }}</td>
                        <td>{{ $row->agen->nama }}</td>
                        <td>{{ date('d-m-Y', strtotime($row->periodeDari)) }} - {{ date('d-m-Y', strtotime($row->periodeSampai)) }}</td>
                        <td>{{ \App\Helper::rupiah($row->jumlahPembayaran) }}</td>
                    </tr>
                @endforeach
            </table>
        </td>
    </tr>
</table>

</body>
</html>

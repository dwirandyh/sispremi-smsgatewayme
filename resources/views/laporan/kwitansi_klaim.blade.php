<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>Untitled Document</title>
</head>

<body>
<table width="100%" border="0" cellspacing="0" cellpadding="5">
    <tr>
        <td height="75" colspan="3" valign="top"><b>KWITANSI PEMBAYARAN KLAIM</b></td>
        <td>&nbsp;</td>
        <td colspan="3" valign="top"><img src="{{ asset('/images/logo.jpg') }}"
                                          style="width: 150px; height: 80px;"></td>
    </tr>
    <tr>
        <td height="103" colspan="7" style="text-align:center">KWITANSI PEMBAYARAN KLAIM<br />
            Telah diteirma dari AJB Bumi Putera 1912 Kantor 610A0 KC BANDAR JAYA (0725127212)<br />
            uang sebesar {{ \App\Helper::rupiah($detail->asuransi->nominal) }} ({{ \App\Helper::terbilang($detail->asuransi->nominal) }} rupiah)</td>
    </tr>
    <tr>
        <td>1.</td>
        <td>DATA POLIS</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
    </tr>
    <tr>
        <td>&nbsp;</td>
        <td>Nomor Polis</td>
        <td>:</td>
        <td>{{ $detail->asuransi->idAsuransi }}</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
    </tr>
    <tr>
        <td>&nbsp;</td>
        <td>Macam Asuransi</td>
        <td>:</td>
        <td>{{ $detail->asuransi->macamAsuransi }}</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
    </tr>
    <tr>
        <td>&nbsp;</td>
        <td>Nama Pemegang Polis</td>
        <td>:</td>
        <td>{{ $detail->asuransi->pelanggan->nama }}</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
    </tr>
    <tr>
        <td>&nbsp;</td>
        <td>Alamat</td>
        <td>:</td>
        <td>{{ $detail->asuransi->pelanggan->alamat }}</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
    </tr>
    <tr>
        <td>&nbsp;</td>
        <td>Mulai Asuransi</td>
        <td>:</td>
        <td>{{ date('d/m/Y', strtotime($detail->asuransi->created_at)) }}</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
    </tr>
    <tr>
        <td height="53">&nbsp;</td>
        <td valign="bottom">Habis Kontrak</td>
        <td valign="bottom">:</td>
        <td valign="bottom">{{ date('d/m/Y', strtotime('+' . $detail->asuransi->masaAsuransi . ' years', strtotime($detail->asuransi->created_at))) }}</td>
        <td valign="bottom">Bayar Premi s.d</td>
        <td valign="bottom">:</td>
        <td valign="bottom">-</td>
    </tr>
    <tr>
        <td>&nbsp;</td>
        <td>Umur Tertanggung</td>
        <td>:</td>
        <td>{{ \App\Helper::umur($detail->asuransi->pelanggan->tglLahir) }}</td>
        <td>Masa Pemb.Premi</td>
        <td>:</td>
        <td>{{ $detail->asuransi->masaAsuransi }} TAHUN</td>
    </tr>
    <tr>
        <td>&nbsp;</td>
        <td>Masa Asuransi</td>
        <td>:</td>
        <td>{{ $detail->asuransi->masaAsuransi }} TAHUN</td>
        <td>Nomor Folio</td>
        <td>: </td>
        <td>-</td>
    </tr>
    <tr>
        <td>&nbsp;</td>
        <td>Cara Bayar Premi</td>
        <td>: </td>
        <td>{{ $detail->asuransi->caraBayar }}</td>
        <td>Mata Uang Pinj.</td>
        <td>:</td>
        <td>-</td>
    </tr>
    <tr>
        <td>&nbsp;</td>
        <td>Mata Uang</td>
        <td>:</td>
        <td>RRUPIAH</td>
        <td>Sisa Pinjaman</td>
        <td>:</td>
        <td>-</td>
    </tr>
    <tr>
        <td>&nbsp;</td>
        <td>U. Pertanggungan</td>
        <td>:</td>
        <td>{{ \App\Helper::rupiah($detail->nominal) }}</td>
        <td>Bunga Akhir s.d</td>
        <td>:</td>
        <td>-</td>
    </tr>
    <tr>
        <td>&nbsp;</td>
        <td>Premi Dasar</td>
        <td>:</td>
        <td>{{ \App\Helper::rupiah($detail->biayaAngsuran) }}</td>
        <td>Kurs saat Pinj.</td>
        <td>:</td>
        <td>-</td>
    </tr>
    <tr>
        <td>&nbsp;</td>
        <td>Premi Rider/PA</td>
        <td>:</td>
        <td>-</td>
        <td>Kurs saat ini</td>
        <td>:</td>
        <td>-</td>
    </tr>
    <tr>
        <td>&nbsp;</td>
        <td>Premi Waiver</td>
        <td>:</td>
        <td>-</td>
        <td>Tgl Meninggal</td>
        <td>:</td>
        <td>-</td>
    </tr>
    <tr>
        <td>&nbsp;</td>
        <td>Premi Extra ABRI</td>
        <td>:</td>
        <td>-</td>
        <td>Tgl Perhitungan</td>
        <td>:</td>
        <td>{{ date('d/m/Y', strtotime($detail->asuransi->created_at)) }}</td>
    </tr>
    <tr>
        <td height="65" valign="bottom">2.</td>
        <td valign="bottom">HAK PEMEGANG POLIS / YANG DITUNJUK</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
    </tr>
    <tr>
        <td>&nbsp;</td>
        <td>Dana</td>
        <td>:</td>
        <td>30% x {{ \App\Helper::rupiah($detail->asuransi->nominal) }}</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>={{ \App\Helper::rupiah($detail->asuransi->nominal * 30 / 100) }}</td>
    </tr>
    <tr>
        <td height="61" valign="bottom">3.</td>
        <td valign="bottom">POTONGAN</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
    </tr>
    <tr>
        <td>&nbsp;</td>
        <td>Materai:</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td style="border-bottom:#000 1px solid">=6000</td>
    </tr>
    <tr>
        <td height="58">&nbsp;</td>
        <td>Diterimakan:</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td style="border-bottom:#000 3px solid">={{ \App\Helper::rupiah(($detail->asuransi->nominal * 30 / 100) - 6000) }}</td>
    </tr>
    <tr>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td colspan="4" style="text-align:center">Bandar Jaya 34172, {{ date('d-m-Y', strtotime($detail->asuransi->created_at)) }}</td>
    </tr>
    <tr>
        <td colspan="2" style="text-align:center">Perhitungan disetujui.disyahkan</td>
        <td>&nbsp;</td>
        <td colspan="4" style="text-align:center">Pemegang polis/Yang ditunjuk</td>
    </tr>
    <tr>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td colspan="4" style="text-align:center">Materai</td>
    </tr>
    <tr>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td colspan="3">&nbsp;</td>
    </tr>
    <tr>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td colspan="3">&nbsp;</td>
    </tr>
    <tr>
        <td colspan="2" style="text-align:center">(..........................................)</td>
        <td>&nbsp;</td>
        <td colspan="4" style="text-align:center">({{ $detail->asuransi->pelanggan->nama }})</td>
    </tr>
</table>
<script>
    window.print();
</script>
</body>
</html>

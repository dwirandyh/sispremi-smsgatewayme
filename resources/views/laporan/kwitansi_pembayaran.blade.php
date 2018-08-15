<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
        "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <title>Kwitansi Pembayaran</title>
</head>

<body>
<table width="100%" border="0" cellspacing="0" cellpadding="5">
    <tr>
        <td width="34%" valign="top">
            <table width="100%" border="0" cellspacing="0" cellpadding="5">
                <tr>
                    <td width="46%" height="100" valign="top"><strong>KWITANSI PREMI</strong></td>
                    <td width="3%">&nbsp;</td>
                    <td width="51%" valign="top"><img src="{{ asset('/images/logo.jpg') }}"
                                                      style="width: 150px; height: 80px;"></td>
                </tr>
                <tr>
                    <td><strong>Seri No</strong></td>
                    <td>:</td>
                    <td>{{ $detail->noPembayaran }}</td>
                </tr>
                <tr>
                    <td><strong>Nama</strong></td>
                    <td>:</td>
                    <td>{{ $detail->asuransi->pelanggan->nama }}</td>
                </tr>
                <tr>
                    <td><strong>Nomor Polis</strong></td>
                    <td>:</td>
                    <td>{{ $detail->asuransi->idPelanggan  }}</td>
                </tr>
                <tr>
                    <td><strong>Periode</strong></td>
                    <td>:</td>
                    <td>{{ date('d-m-Y', strtotime($detail->periodeDari)) }}
                        - {{ date('d-m-Y', strtotime($detail->periodeSampai)) }}</td>
                </tr>
                <tr>
                    <td height="40px;" valign="top"><strong>Cara Bayar</strong></td>
                    <td valign="top">:</td>
                    <td valign="top">{{ $detail->asuransi->caraBayar }}</td>
                </tr>
                <tr>
                    <td style="border-top: 1px #000 solid;" height="30">Premi/Angka Dasar</td>
                    <td style="border-top: 1px #000 solid;">:</td>
                    <td style="border-top: 1px #000 solid;"><strong>{{ $detail->jumlahPembayaran }}</strong></td>
                </tr>
                <tr>
                    <td height="30" style="border-bottom: 1px #000 solid;">Jumlah Pembahyaran</td>
                    <td style="border-bottom: 1px #000 solid;">:</td>
                    <td style="border-bottom: 1px #000 solid;"><strong>{{ $detail->jumlahPembayaran }}</strong></td>
                </tr>
                <tr>
                    <td>Pembayaran Diterima Tanggal</td>
                    <td>:</td>
                    <td>{{ date('d-m-Y', strtotime($detail->tglPembayaran)) }}</td>
                </tr>
                <tr>
                    <td>Tanggal/No. Kas</td>
                    <td>:</td>
                    <td>&nbsp;</td>
                </tr>
                <tr>
                    <td>Nama Agen</td>
                    <td>:</td>
                    <td>{{ $detail->agen->nama }}</td>
                </tr>
                <tr>
                    <td>Kantor Pelayanan</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                </tr>
            </table>
        </td>
        <td width="66%" valign="top">
            <table width="100%" border="0" cellspacing="5" cellpadding="5">
                <tr>
                    <td width="28%" height="76" valign="top"><strong>KWITANSI PREMI</strong></td>
                    <td width="20%" valign="top">Bumiputra<br/>
                        Wisma Bumiputera Lt 17-21<br/>
                        Jl. Jendral Sudirman<br/>
                        Jakarta 12901<br/>
                        www.bumiputera.com <br/></td>
                    <td width="27%" valign="top">Halo Bumiputra:08041091912<br/>
                        T: +62221 253 2154, 251 2157<br/>
                        F:+6221 251 2172<br/>
                        E: info@bumiputera.com
                    </td>
                    <td width="25%" valign="top"><img src="{{ asset('/images/logo.jpg') }}"
                                                      style="width: 150px; height: 80px;"></td>
                </tr>
                <tr>
                    <td><strong>Seri No.</strong></td>
                    <td>{{ $detail->noPembayaran }}</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                </tr>
                <tr>
                    <td><strong>Sudah Diterima Dari:</strong></td>
                    <td>{{ $detail->asuransi->pelanggan->nama }}</td>
                    <td>&nbsp;</td>
                    <td>No. Polis : {{ $detail->asuransi->idAsuransi  }}</td>
                </tr>
                <tr>
                    <td><strong>Alamat:</strong></td>
                    <td>{{ $detail->asuransi->pelanggan->alamat }}</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                </tr>
                <tr>
                    <td colspan="4">Untuk Pembayaran Premi Asuransi Jiwa dengan rincian:</td>
                </tr>
                <tr>
                    <td colspan="4">
                        <table width="100%" border="1" cellspacing="0" cellpadding="5">
                            <tr>
                                <td style="background:#333; color:#FFF; font-weight:bold">Premi/Angka Dasar</td>
                                <td style="background:#333; color:#FFF; font-weight:bold">Denda</td>
                                <td style="background:#333; color:#FFF; font-weight:bold">Kurs/Indeks</td>
                                <td style="background:#333; color:#FFF; font-weight:bold">Jumlah Premi (Rp)</td>
                                <td style="background:#333; color:#FFF; font-weight:bold">Mutasi &amp; Potongan
                                    Premi(Rp)
                                </td>
                                <td style="background:#333; color:#FFF; font-weight:bold">Jumlah Pembayaran (Rp)</td>
                            </tr>
                            <tr>
                                <td><strong>{{ $detail->jumlahPembayaran }}</strong></td>
                                <td>&nbsp;</td>
                                <td>&nbsp;</td>
                                <td><strong>{{ $detail->jumlahPembayaran }}</strong></td>
                                <td>&nbsp;</td>
                                <td><strong>{{ $detail->jumlahPembayaran }}</strong></td>
                            </tr>
                        </table>
                    </td>
                </tr>
                <tr>
                    <td>Cara Bayar</td>
                    <td>{{ $detail->asuransi->caraBayar }}</td>
                    <td>Untuk Periode</td>
                    <td>{{ date('d-m-Y', strtotime($detail->periodeDari)) }}
                        - {{ date('d-m-Y', strtotime($detail->periodeSampai)) }}</td>
                </tr>
                <tr>
                    <td>Pembayaran Diterima Tanggal</td>
                    <td>{{ date('d-m-Y', strtotime($detail->tglPembayaran)) }}</td>
                    <td>&nbsp;</td>
                    <td width="50%">Bandar Lampung, {{ date('d-m-Y') }}</td>
                </tr>
                <tr>
                    <td>Nama Agen</td>
                    <td>{{ $detail->asuransi->agen->nama }}</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                </tr>
                <tr>
                    <td>Kantor Pelayanan</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                </tr>
            </table>
        </td>
    </tr>
</table>
<script>
    window.print();
</script>
</body>
</html>

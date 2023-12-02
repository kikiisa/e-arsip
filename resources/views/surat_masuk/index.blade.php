<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ url('/assets/css/bootstrap.css') }}"/>

    <title></title>
</head>
<body>
    <div class="row">
        <div class="container">
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">Jenis</th>
                        <th scope="col">Perangkat Daerah</th>
                        <th scope="col">Tanggal Surat</th>
                        <th scope="col">Nomor</th>
                        <th scope="col">Tanggal Diterima</th>
                        <th scope="col">Perihal</th>
                        <th scope="col">Yang Bertandatangan</th>
                        <th scope="col">Disposisi/ Arahan/ Petunjuk</th>
                        <th scope="col">Telaah Staf</th>
                        <th scope="col">Disposisi/ Arahan/ Petunjuk atas Telaah Staf</th>
                        <th scope="col">Keterangan</th>
                    </tr>
                </thead>
                <tbody>
                    @if(count($suratMasuk) == 0)
                        <tr>
                            <td colspan="8" align="center"><b>Tidak ada data untuk ditampilkan</b></td>
                        </tr>
                    @endif
                    @foreach($suratMasuk as $item)
                        <tr>
                            <td>{{ $item->jenis }}</td>
                            <td>{{ @$item->unit->nama }}</td>
                            <td>{{ date('d-m-Y', strtotime($item->tanggal_surat)) }}</td>
                            <td>{{ @$item->nomor }}</td>
                            <td>{{ date('d-m-Y', strtotime($item->tanggal_terima)) }}</td>
                            <td>{{ $item->perihal }}</td>
                            <td>{{ $item->ttd }}</td>
                            <td>{{ $item->disposisi }}</td>
                            <td>
                                <a
                                    href="{{ url('uploads/documents/surat-masuk/'. $item->telaah) }}"
                                    class="btn btn-sm btn-primary text-white"
                                    target="_blank"
                                >
                                    <i class="fa fa-file"></i> Lihat
                                </a>
                            </td>
                            <td>{{ $item->disposisi_telaah }}</td>
                            <td>
                                <a
                                    href="{{ url('uploads/documents/surat-masuk/'. $item->lampiran) }}"
                                    class="btn btn-sm btn-primary text-white"
                                    target="_blank"
                                >
                                    <i class="fa fa-file"></i> Lihat
                                </a>
                                <!--<a
                                    href="{{ url('/surat-masuk/form-ubah/'. $item->id) }}"
                                    class="btn btn-sm btn-warning text-white"
                                >
                                    <i class="fa fa-edit"></i> Ubah
                                </a>-->
                                <a
                                    href="{{ url('/surat-masuk/hapus/'. $item->id) }}"
                                    class="btn btn-sm btn-danger"
                                >
                                    <i class="fa fa-times"></i> Hapus
                                </a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
    <script>
        window.print()
    </script>
</body>
</html>
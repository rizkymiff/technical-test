@extends('layouts.app')

@section('title', 'Dashboard Apps')

@section('breadcrumb')
<div class="content-header">
    <div class="d-flex align-items-center">
        <div class="mr-auto">
            <h3 class="page-title">Dashboard Apps</h3>
            <div class="d-inline-block align-items-center">
                <nav>
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item active"><a href="{{ route('admin.dashboard.index') }}"><i class="mdi mdi-home-outline"></i></a></li>
                    </ol>
                </nav>
            </div>
        </div>

    </div>
</div>
@endsection

@section('content')
@if (auth()->user()->is_admin)
    <div class="box">
        <!-- /.box-header -->
        <div class="box-body">
            <div class="table-responsive">
              <table id="data-table" class="table table-bordered table-striped" style="width:100%">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Bangunan</th>
                        <th>Warna</th>
                        <th>Posisi</th>
                        <th>Pemilik</th>
                        <th>Makanan / Minuman</th>
                        <th>Peliharaan</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>1</td>
                        <td>Rumah</td>
                        <td>Hijau Pupus</td>
                        <td>Pertama</td>
                        <td>Orang Sunda</td>
                        <td>Cappucino</td>
                        <td>Ular</td>
                    </tr>
                    <tr>
                        <td>2</td>
                        <td>Rumah</td>
                        <td>Putih Tulang</td>
                        <td>Sebelah Kiri Orang batak</td>
                        <td>Orang Betawi</td>
                        <td>Mie Instant</td>
                        <td>Kuda</td>
                    </tr>
                    <tr>
                        <td>3</td>
                        <td>Rumah</td>
                        <td>Kuning Telur</td>
                        <td>Tengah</td>
                        <td>Orang Batak</td>
                        <td>Steak & Susu Beruang</td>
                        <td>Anjing</td>
                    </tr>
                    <tr>
                        <td>4</td>
                        <td>Rumah</td>
                        <td>Merah Marun</td>
                        <td></td>
                        <td>Orang Madura</td>
                        <td>Spaghetti & Pizza</td>
                        <td>Kucing</td>
                    </tr>
                    <tr>
                        <td>5</td>
                        <td>Rumah</td>
                        <td>Biru Langit</td>
                        <td></td>
                        <td>Orang Jawa</td>
                        <td>Teh Melatih</td>
                        <td>Ikan Cupang</td>
                    </tr>
                </tbody>
            </table>
            </div>
        </div>
        <!-- /.box-body -->
      </div>
      <!-- /.box -->
    </div>
@endif
@endsection

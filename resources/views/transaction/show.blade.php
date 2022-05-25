@extends('layouts.app')

@section('title', 'Detail data transaksi')

@section('breadcrumb')
<div class="content-header">
    <div class="d-flex align-items-center">
        <div class="mr-auto">
            <h3 class="page-title">Detail data transaksi</h3>
            <div class="d-inline-block align-items-center">
                <nav>
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('admin.dashboard.index') }}"><i class="mdi mdi-home-outline"></i></a></li>
                        <li class="breadcrumb-item" aria-current="transaction">Transaksi</li>
                        <li class="breadcrumb-item active" aria-current="transaction">Detail</li>
                    </ol>
                </nav>
            </div>
        </div>

    </div>
</div>
@endsection

@section('content')
<div class="row">
    <div class="col-lg-6 col-12">
          <div class="box">
            <div class="box-header with-border">
                <h4 class="box-title">Data</h4>
            </div>
            <!-- /.box-header -->
            {{-- <form class="form" id="form-data" action="{{ route('admin.transaction.store') }}" method="post"> --}}
                {{-- @csrf --}}
                <div class="box-body">
                    <div class="row">
                      <div class="col-md-6">

                        <div class="form-group">
                          <label>Kode transaksi</label>
                          <input name="code" type="text" class="form-control" value="{{ $transaction->code }}" readonly>
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group">
                          <label>Name </label>
                          <input type="text" class="form-control" placeholder="Nama Barang" required name="item_name" value="{{ $transaction->item_name }}" readonly>
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-6">
                        <div class="form-group">
                          <label >Jumlah</label>
                          <input type="number" class="form-control" placeholder="Jumlah Barang" name="qty" required value="{{ $transaction->qty }}" readonly>
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group">
                          <label >Harga</label>
                          <input name="price" type="number" class="form-control" placeholder="Harga barang" required value="{{ $transaction->price }}" readonly>
                        </div>
                      </div>
                    </div>
                </div>
                <!-- /.box-body -->
                <div class="box-footer text-right">
                    <a href="{{ route('admin.transaction.index') }}" title="Kembali" class="btn btn-warning">
                      <i class="glyphicon glyphicon-arrow-left"></i> Back
                    </a>
                </div>
            {{-- </form> --}}
          </div>
          <!-- /.box -->
    </div>
</div>
@endsection

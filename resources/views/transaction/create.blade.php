@extends('layouts.app')

@section('title', 'Buat data transaksi baru')

@section('breadcrumb')
<div class="content-header">
    <div class="d-flex align-items-center">
        <div class="mr-auto">
            <h3 class="page-title">Buat data transaksi baru</h3>
            <div class="d-inline-block align-items-center">
                <nav>
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('admin.dashboard.index') }}"><i class="mdi mdi-home-outline"></i></a></li>
                        <li class="breadcrumb-item" aria-current="transaction">Transaksi</li>
                        <li class="breadcrumb-item active" aria-current="transaction">Buat</li>
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
            <form class="form" id="form-data" action="{{ route('admin.transaction.store') }}" method="post">
                @csrf
                <div class="box-body">
                    <div class="row">
                      <div class="col-md-6">

                        <div class="form-group">
                          <label>Kode transaksi</label>
                          <input name="code" type="text" class="form-control" value="INV-{{ date('Ymd') }}-{{ substr(strtotime(date('Ymd H:i:s')), 7) }}" readonly>
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group">
                          <label>Name </label>
                          <input type="text" class="form-control" placeholder="Nama Barang" required name="item_name">
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-6">
                        <div class="form-group">
                          <label >Jumlah</label>
                          <input type="number" class="form-control" placeholder="Jumlah Barang" name="qty" required>
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group">
                          <label >Harga</label>
                          <input name="price" type="number" class="form-control" placeholder="Harga barang" required>
                        </div>
                      </div>
                    </div>
                </div>
                <!-- /.box-body -->
                <div class="box-footer text-right">
                    <button type="button" class="btn btn-warning mr-1">
                      <i class="ti-trash"></i> Batal
                    </button>
                    <button type="submit" class="btn btn-primary">
                      <i class="ti-save-alt"></i> Simpan
                    </button>
                </div>
            </form>
          </div>
          <!-- /.box -->
    </div>
</div>
@endsection

@section('scripts')
    <script src="{{ asset('assets/vendor_components/jquery-toast-plugin-master/src/jquery.toast.js') }}"></script>
    <script type="text/javascript">
        $(document).ready(function(){
            $('#form-data').submit(function(e) {
                e.preventDefault();
                $.ajax({
                    url: $(this).attr('action'),
                    data: $(this).serialize(),
                    method: 'post',
                }).done(function(e) {
                    // $('body').unblock();
                    var json = JSON.parse(JSON.stringify(e));
                    $.toast({
                        heading: 'Berhasil!',
                        text: json.message,
                        position: 'top-right',
                        loaderBg: '#ff6849',
                        icon: 'success',
                    });
                    setTimeout(function() {
                        window.location.href = `{{ route('admin.transaction.index') }}`;
                    }, 2000);
                }).fail(function(e) {
                    // $('body').unblock();
                    var json = JSON.parse(JSON.stringify(e));
                    $.each(json.responseJSON.errors, function(i, a) {
                        $.toast({
                            heading: 'Terjadi kesalahan!',
                            text: a,
                            position: 'top-right',
                            loaderBg: '#ff6849',
                            icon: 'error',
                            hideAfter: 3500
                        });
                    });
                })
            })
        });
    </script>
@endsection

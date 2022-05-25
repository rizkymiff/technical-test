@extends('layouts.app')

@section('title', 'Data transaksi')

@section('content')
    <div class="box">
        <div class="box-header with-border">
          <h3 class="box-title">Data Transaksi</h3>
          <a class="btn btn-primary pull-right" href="{{ route('admin.transaction.create') }}" title="">Buat baru</a>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
            <div class="table-responsive">
              <table id="data-table" class="table table-bordered table-striped" style="width:100%">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Kode</th>
                        <th>Nama Barang</th>
                        <th>Jumlah</th>
                        <th>Harga</th>
                        <th class="text-center">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($transactions as $key => $transaction)
                    <tr>
                        <td>{{ $key+1 }}</td>
                        <td>
                            <a href="{{ route('admin.transaction.show', $transaction->id) }}" title="">{{ $transaction->code }}</a> <br>
                            <small>Di buat pada: {{ $transaction->created_at->format('D, d M Y') }}</small>
                        </td>
                        <td>{{ $transaction->item_name }}</td>
                        <td>{{ $transaction->qty }}</td>
                        <td>{{ number_format($transaction->price, 2, ',', '.') }}</td>
                        <td class="text-center">
                            <a href="{{ route('admin.transaction.edit', $transaction->id) }}" title="perbarui">
                                <i class="glyphicon glyphicon-pencil"></i>
                            </a> /
                            <a class="text-danger deleted" href="#" data-url="{{ route('admin.transaction.destroy', $transaction->id) }}" title="hapus">
                                <i class="glyphicon glyphicon-trash"></i>
                            </a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            </div>
        </div>
        <!-- /.box-body -->
      </div>
      <!-- /.box -->
    </div>

    <form method="post" hidden class="form-deleted" id="form-data">
        @method('delete')
        @csrf
    </form>
@endsection

@section('scripts')
<script src="{{ asset('assets/vendor_components/jquery-toast-plugin-master/src/jquery.toast.js') }}"></script>
<script src="{{ asset('assets/vendor_components/datatable/datatables.min.js') }}"></script>
<script>

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
                location.reload();
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

    $('#data-table tfoot th').each( function () {
        var title = $(this).text();
        $(this).html( '<input type="text" placeholder="Search '+title+'" />' );
    } );

    // DataTable
    var table = $('#data-table').DataTable();

    // Apply the search
    table.columns().every( function () {
        var that = this;

        $( 'input', this.footer() ).on( 'keyup change', function () {
            if ( that.search() !== this.value ) {
                that
                    .search( this.value )
                    .draw();
            }
        } );
    } );

    $('.deleted').on('click', function () {
        $('.form-deleted').attr('action', $(this).data('url'));
        $('#form-data').submit();
    });
</script>
@endsection

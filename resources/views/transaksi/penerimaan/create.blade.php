@extends('admin.layouts.admin')

@section('title', __('Tambah Data'))

@section('content')
    <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="row">
                <div class="form-group">
                    <div class="panel-body">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="terimaNomor" > 
                                    {{ __('Nomor') }}
                                    <span class="required">*</span>
                                </label>
                                <div class="col-md-9 col-sm-9 col-xs-12">
                                    <input id="terimaNomor" type="text" class="form-control col-md-7 col-xs-12 "
                                        name="terimaNomor" >
                                </div>
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="terimaTgl" >
                                    {{ __('Tanggal') }}
                                    <span class="required">*</span>
                                </label>
                                <div class="col-md-9 col-sm-9 col-xs-12">
                                    <input id="terimaTgl" type="date" class="form-control col-md-7 col-xs-12"
                                        name="terimaTgl" >
                                </div>
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="terimaSuplier" >
                                    {{ __('Suplier') }}
                                    <span class="required">*</span>
                                </label>
                                <div class="col-md-9 col-sm-9 col-xs-12">
                                    <select class="searching form-control col-md-7 col-xs-12" id="terimaSuplier" name="terimaSuplier" ></select>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="form-group">
                    <div class="panel panel-default">
                        <div class="panel-heading">Detail Barang</div>
                        <div class="panel-body">
                            <div class="row" style="margin-bottom:15px">
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="terimaKode" > 
                                            {{ __('Barang') }}
                                        </label>
                                        <div class="col-md-9 col-sm-9 col-xs-12">
                                            <select class="searching2 form-control col-md-7 col-xs-12" id="barang" name="barang"></select>
                                            <input type="hidden" id="nmbarang" name="nmbarang">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="terimaKode" > 
                                            {{ __('Qty') }}
                                        </label>
                                        <div class="col-md-9 col-sm-9 col-xs-12">
                                            <input id="qty" type="text" class="form-control col-md-7 col-xs-12 "
                                            name="qty" >
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="terimaKode" > 
                                            {{ __('Harga') }}
                                        </label>
                                        <div class="col-md-9 col-sm-9 col-xs-12">
                                            <input id="harga" type="text" class="form-control col-md-7 col-xs-12 "
                                            name="harga" >
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <div class="col-md-9 col-sm-9 col-xs-12">
                                            <button type="button" class="btn btn-success" onclick="tambah_barang()"> {{ __('Tambah') }}</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <table class="table table-bordered" id="detail_barang">
                                        <thead>
                                            <tr>
                                                <!-- <th>#</th> -->
                                                <th>Kode Barang</th>
                                                <th>Nama Barang</th>
                                                <th>Qty</th>
                                                <th>Harga</th>
                                                <th>Total</th>
                                                <th>Del</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                </div>
                <div class="form-group">
                    <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-1">
                        <a class="btn btn-primary" href="{{ URL::previous() }}"> {{ __('Batal') }}</a>
                        <button type="submit" onclick="simpan()" class="btn btn-success"> {{ __('Simpan') }}</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('styles')
    @parent
    {{ Html::style(mix('assets/admin/css/users/edit.css')) }}
@endsection

@section('scripts')
    @parent
    {{ Html::script(mix('assets/admin/js/users/edit.js')) }}
    <script type="text/javascript">
        $('.searching').select2({
            placeholder: 'Pilih Suplier',
            width: 'resolve',
            ajax: {
                url: '/master/suplierforcombo',
                dataType: 'json',
                delay: 250,
                processResults: function (data) {
                    return {
                        results: $.map(data, function (item) {
                            return {
                                text: item.name,
                                id: item.id
                            }
                        })
                    };
                },
                cache: true
            }
        });

        $('.searching2').select2({
            placeholder: 'Pilih Barang',
            width: 'resolve',
            ajax: {
                url: '/master/barangforcombo',
                dataType: 'json',
                delay: 250,
                processResults: function (data) {
                    return {
                        results: $.map(data, function (item) {
                            document.getElementById('nmbarang').value = item.barangNama;
                            return {
                                text: item.name,
                                id: item.id
                            }
                        })
                    };
                },
                cache: true
            }
        });

        function tambah_barang() {
            var rowCount = $('#detail_barang tr').length;

            var kd_barang = document.getElementById('barang').value;
            var nm_barang = document.getElementById('nmbarang').value;
            var qty = document.getElementById('qty').value;
            var harga = document.getElementById('harga').value;
            var total = qty*harga;

            var row = new Object();
                row = '<tr>';
                // row += '<th scope="row">'+rowCount+'</th>';
                row += '<td>'+ kd_barang +'</td>';
                row += '<td>'+ nm_barang +'</td>';
                row += '<td>'+ (qty ? qty : 0) +'</td>';
                row += '<td>'+ (harga ? harga : 0) +'</td>';
                row += '<td>'+ total +'</td>';
                row += '<td><span class="fa fa-close" onclick="hapus_barang(this)"></span></td>';
                row += '</tr>';


            $('#detail_barang > tbody:last-child').append(row);

            $("#barang").val(null).trigger('change');
            document.getElementById('nmbarang').value = "";
            document.getElementById('qty').value = "";
            document.getElementById('harga').value = "";
        }

        function hapus_barang(btn, total) {
            var row = btn.parentNode.parentNode;
            row.parentNode.removeChild(row);
            // $("#detail_barang").on('click', 'row', function() {
                // $(this).closest('tr').remove();
            // })
        }

        function simpan(){
            var terimaNomor = document.getElementById('terimaNomor').value;
            var terimaTgl = document.getElementById('terimaTgl').value;
            var terimaSuplier = document.getElementById('terimaSuplier').value;

            var postData                = new Object();

            //gets table
            var oTable = document.getElementById('detail_barang');

            //gets rows of table
            var rowLength = oTable.rows.length;

            //loops through rows    
            for (i = 1; i < rowLength; i++){

                //gets cells of current row
                var oCells = oTable.rows.item(i).cells;

                //gets amount of cells of current row
                var cellLength = oCells.length;

                //loops through each cell in current row
                for(var j = 0; j < cellLength - 1; j++){
                    /* get your cell info here */
                    postData['detail'+i+'_'+j] = oCells.item(j).innerHTML;
                }
            }

            postData['terimaNomor']     = terimaNomor;
            postData['terimaTgl']       = terimaTgl;
            postData['terimaSuplier']   = terimaSuplier;
            postData['record_detail']   = rowLength - 1;

            // console.log(postData);
            // return;

            if (confirm("Anda Akan Simpan Transaksi ?")) {
                $.ajax({
                    type: "POST",
                    url: "/transaksi/penerimaan/store",
                    data: postData,
                    dataType: "json",
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    success: function (data) {
                            //confirm(data['stokhNota']);
                            //confirm(data['nota']);
                            //confirm(data);

                            // oTable.clear().draw();
                            // $('#tData').dataTable().fnDestroy();
                            // setupTabel();

                            // oTable2.clear().draw();
                            // $('#tDataList').dataTable().fnDestroy();
                            // setListing();

                            // document.getElementById('nopemeriksaan').value = '';
                            // document.getElementById('nokontrak').value = '';
                            // document.getElementById('nokwitansi').value = '';
                            // document.getElementById('nopenerimaangudang').value = '';
                            // document.getElementById('idxdet').value = 1;
                            // document.getElementById('nota').value = '';
                            //document.getElementById('tglfaktur').value = '';
                            // document.getElementById('ppn').value =0;
                            // document.getElementById('nppn').value =0;
                            // document.getElementById('nofaktur').value = '';
                            // document.getElementById('tglterima').value = '';
                            // document.getElementById('totaltrans').value   = 0;
                            // document.getElementById('totaltanpa_ppn').value = 0;
                            //document.getElementById('sdana').value = '';
                            //document.getElementById('jthtempo').value = '';
                            // $("#suplier").select2("val", "");
                            // clearHeader();
                            // jmlBrs = 0;
                            alert('sukses');
                    },
                    error: function (XMLHttpRequest, textStatus, errorThrown) {
                            alert(textStatus + " : " + errorThrown + " -> GAGAL DISIMPAN !!!");
                    }
                });
            }
        }
    </script>
@endsection
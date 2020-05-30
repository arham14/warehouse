@extends('layouts.app')
    
@section('konten')
    <div style="margin:20px 0;"></div>
	
	<table class="easyui-datagrid" title="Data Purchase Order" style="width:99%;height:470px" id="data-po" data-options="toolbar:'#toolbar', singleSelect:'true'">
		<thead>
			<tr>
                <th data-options="field:'kode_produk', align:'center'" halign="center" width="20%">Kode Produk</th>
                <th data-options="field:'nama_produk'" halign="center" width="50%">Nama Produk</th>
                <th data-options="field:'qty_po'" halign="center" width="30%">Jumlah Order</th>
			</tr>
		</thead>
    </table>

    <div id="toolbar">
        <a href="javasript:void(0)" data-options="iconCls:'icon-add', plain:'true'" class="easyui-linkbutton" onclick="openFormInput()"> Add</a> |
        <a href="javasript:void(0)" data-options="iconCls:'icon-reload', plain:'true'" class="easyui-linkbutton" onclick="loadDataProduk()"> Reload</a>
    </div>
@stop

@section('js')
    <script>
        $(function()
        {
            // loadDataProduk()    
        })

        function loadDataProduk()
        {
            $('#data-produk').datagrid('loading');

            $.post('{{ route('produk.data')}}', {_token: '{{ csrf_token() }}'}, function(e) {
                
                $('#data-produk').datagrid('loaded');

                $('#data-produk').datagrid('reload');

                $('#data-produk').datagrid({
                
                    data:e,

                    onLoadSuccess: function() {
                        
                        $(this).datagrid('getPanel').find('.datagrid-row').css('height', '50px')
                        
                    }
                    
                });

            }); 
        }

        function openFormInput()
        {
            $('#window-form-input-po').window('open').window('center')
        }
    </script>
@stop
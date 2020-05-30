@extends('layouts.app')
@extends('template-parts.supplier.form-input')
    
@section('konten')
    <div style="margin:20px 0;"></div>
	
	<table class="easyui-datagrid" title="Data Supplier" style="width:99%;height:470px" id="data-supplier" data-options="rownumbers:'true', toolbar:'#toolbar', singleSelect:'true'">
		<thead>
			<tr>
                <th data-options="field:'nama_supplier'" halign="center" width="30%">Nama Supplier</th>
                <th data-options="field:'tlp_supplier', align:'center'" halign="center" width="20%">Nomor Telpon</th>
                <th data-options="field:'alamat_supplier'" halign="center" width="50%">Alamat</th>
			</tr>
		</thead>
    </table>

    <div id="toolbar">
        <a href="javasript:void(0)" data-options="iconCls:'icon-add', plain:'true'" class="easyui-linkbutton" onclick="openFormInput()"> Add</a> |
        <a href="javasript:void(0)" data-options="iconCls:'icon-reload', plain:'true'" class="easyui-linkbutton" onclick="loadDataSupplier()"> Reload</a>
    </div>
@stop

@section('js')
    <script>
        $(function()
        {
            loadDataSupplier()    
        })

        function loadDataSupplier()
        {
            $('#data-supplier').datagrid('loading');

            $.post('{{ route('supplier.data')}}', {_token: '{{ csrf_token() }}'}, function(e) {
                
                $('#data-supplier').datagrid('loaded');

                $('#data-supplier').datagrid('reload');

                $('#data-supplier').datagrid({
                
                    data:e,

                    onLoadSuccess: function() {
                        
                        $(this).datagrid('getPanel').find('.datagrid-row').css('height', '50px')
                        
                    }
                    
                });

            }); 
        }

        function openFormInput()
        {
            $('#window-form-input-supplier').window('open').window('center')
        }
    </script>
@stop
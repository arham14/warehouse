@extends('layouts.app')
@extends('template-parts.gudang.form-input')
@extends('template-parts.gudang.form-edit')
    
@section('konten')
    <div style="margin:20px 0;"></div>
	
	<table class="easyui-datagrid" title="Data Gudang" style="width:99%;height:470px" id="data-gudang" data-options="rownumbers:'true', toolbar:'#toolbar', singleSelect:'true'">
		<thead>
			<tr>
                <th data-options="field:'kode', align:'center'" halign="center" width="10%">Kode Gudang</th>
                <th data-options="field:'nama_gudang'" halign="center" width="25%">Nama Gudang</th>
                <th data-options="field:'status'" halign="center" width="15%">Jenis Gudang</th>
                <th data-options="field:'alamat_gudang'" halign="center" width="50%">Alamat Gudang</th>
			</tr>
		</thead>
    </table>

    <div id="toolbar">
        <a href="javasript:void(0)" data-options="iconCls:'icon-add', plain:'true'" class="easyui-linkbutton" onclick="openFormInput()"> Add</a> |
        <a href="javasript:void(0)" data-options="iconCls:'icon-edit', plain:'true'" class="easyui-linkbutton" onclick="openFormEdit()"> Edit</a> |
        <a href="javasript:void(0)" data-options="iconCls:'icon-reload', plain:'true'" class="easyui-linkbutton" onclick="loadDataGudang()"> Reload</a>
    </div>
@stop

@section('js')
    <script>
        $(function()
        {
            loadDataGudang()    
        })

        function loadDataGudang()
        {
            $('#data-gudang').datagrid('loading');

            $.post('{{ route('gudang.data')}}', {_token: '{{ csrf_token() }}'}, function(e) {
                
                $('#data-gudang').datagrid('loaded');

                $('#data-gudang').datagrid('reload');

                $('#data-gudang').datagrid({
                
                    data:e,

                    onLoadSuccess: function() {
                        
                        $(this).datagrid('getPanel').find('.datagrid-row').css('height', '50px')
                        
                    }
                    
                });

            }); 
        }

        function openFormInput()
        {
            $('#window-form-input-gudang').window('open').window('center')
        }
    </script>
@stop
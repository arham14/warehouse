@extends('layouts.app')
@extends('template-parts.karyawan.form-input')
@extends('template-parts.karyawan.form-edit')
    
@section('konten')
    <div style="margin:20px 0;"></div>
	
	<table class="easyui-datagrid" title="Data Karyawan" style="width:98%;height:470px" id="data-karyawan" data-options="rownumbers:'true', toolbar:'#toolbar', singleSelect:'true'">
		<thead>
			<tr>
                <th data-options="field:'nip', align:'center'" halign="center" width="10%">NIP</th>
                <th data-options="field:'nama_karyawan'" halign="center" width="25%">Nama</th>
                <th data-options="field:'no_hp', align:'center'" halign="center" width="12%">No HP</th>
                <th data-options="field:'email'" halign="center" width="18%">Email</th>
                <th data-options="field:'alamat'" halign="center" width="35%">Alamat</th>
			</tr>
		</thead>
    </table>

    <div id="toolbar">
        <a href="javasript:void(0)" data-options="iconCls:'icon-add', plain:'true'" class="easyui-linkbutton" onclick="openFormInput()"> Add</a> |
        <a href="javasript:void(0)" data-options="iconCls:'icon-edit', plain:'true'" class="easyui-linkbutton" onclick="openFormEdit()"> Edit</a> |
        <a href="javasript:void(0)" data-options="iconCls:'icon-reload', plain:'true'" class="easyui-linkbutton" onclick="loadDataKaryawan()"> Reload</a>
    </div>
@stop

@section('js')
    <script>
        $(function()
        {
            loadDataKaryawan()    
        })

        function loadDataKaryawan()
        {
            $('#data-karyawan').datagrid('loading');

            $.post('{{ route('karyawan.data')}}', {_token: '{{ csrf_token() }}'}, function(e) {
                
                $('#data-karyawan').datagrid('loaded');

                $('#data-karyawan').datagrid('reload');

                $('#data-karyawan').datagrid({
                
                    data:e,

                    onLoadSuccess: function() {
                        
                        $(this).datagrid('getPanel').find('.datagrid-row').css('height', '50px')
                        
                    }
                    
                });

            }); 
        }

        function openFormInput()
        {
            $('#window-form-input-karyawan').window('open').window('center')
        }
    </script>
@stop
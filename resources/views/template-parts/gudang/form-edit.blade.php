<div class="easyui-window" id="window-form-edit-gudang" title="Edit Gudang" data-options="width:500,height:375,modal:true, closed:true, border:'thin'" style="padding:15px;">
    <input type="text" id="id-edit" style="display:none">
    <table style="width:450px">
        <tr>
            <td style="padding: 7px">Kode Gudang</td>
            <td>:</td>
            <td style="padding: 7px"> <input class="easyui-textbox" id="edit-kode" style="width:100%; height: 30px;"> </td>
        </tr>
        <tr>
            <td style="padding: 7px">Nama Gudang</td>
            <td>:</td>
            <td style="padding: 7px"> <input class="easyui-textbox" id="edit-nama" style="width:100%; height: 30px;"> </td>
        </tr>
        <tr>
            <td style="padding: 7px">Jenis Gudang</td>
            <td>:</td>
            <td style="padding: 7px"> 
                <select class="easyui-combobox" id="edit-jenis_gudang" style="width:100%; height: 30px;"> 
                    <option value="Gudang Besar">Gudang Besar</option>
                    <option value="Gudang Kecil">Gudang Kecil</option>
                    <option value="Gudang Konsinyasi">Gudang Konsinyasi</option>
                </select>
            </td>
        </tr>
        <tr>
            <td style="padding: 7px">Alamat</td>
            <td>:</td>
            <td style="padding: 7px"> <input class="easyui-textbox" multiline="true" id="edit-alamat" style="width:100%; height: 100px;"> </td>
        </tr>
    </table>

    <div style="width:450px; text-align:right; padding-right:10px; margin-top: 25px;">
        <a href="javascript:void(0)" data-options="iconCls:'icon-ok'" class="easyui-linkbutton" onclick="updateGudang()"> Simpan </a>
        <a href="javascript:void(0)" data-options="iconCls:'icon-cancel'" onclick="closeFormEdit()" class="easyui-linkbutton"> Batal </a>
    </div>
</div>

<script>
    function openFormEdit()
    {
        var data = $('#data-gudang').datagrid('getSelected')

        if(data === null)
        {
            alert('Pilih Data yang Ingin Diubah!')
        }
        else
        {
            $('#id-edit').val(data.id)

            $('#edit-kode').textbox('setValue', data.kode).textbox('disable', 'true');

            $('#edit-nama').textbox('setValue', data.nama_gudang);

            $('#edit-alamat').textbox('setValue', data.alamat_gudang);

            $('#edit-jenis_gudang').combobox('setValue', data.status);

            $('#window-form-edit-gudang').window('open').window('center')
        }
    }

    function closeFormEdit()
    {
        $('#window-form-edit-gudang').window('close');

        clearFormEdit();
    }

    function clearFormEdit()
    {
        
        $('#edit-kode').textbox('setValue', '');

        $('#edit-nama').textbox('setValue', '');

        $('#edit-alamat').textbox('setValue', '');

    }

    function updateGudang()
    {

        var id = $('#id-edit').val();

        var kode = $('#edit-kode').textbox('getValue');

        var nama = $('#edit-nama').textbox('getValue');

        var status = $('#edit-jenis_gudang').combobox('getValue');

        var alamat = $('#edit-alamat').textbox('getValue');

        $.post('{{ route('gudang.update')}}', {id, kode, nama, status, alamat, _token: '{{ csrf_token() }}'}, function(e) {
                
            loadDataGudang()

            closeFormEdit()

        }); 

    }
</script>
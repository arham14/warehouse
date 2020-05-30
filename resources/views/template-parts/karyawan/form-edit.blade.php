<div class="easyui-window" id="window-form-edit-karyawan" title="Edit Karyawan" data-options="width:500,height:475,modal:true, closed:true, border:'thin'" style="padding:15px;">
    <input type="text" id="edit-id" style="display:none">
    <table style="width:450px">
        <tr>
            <td style="padding: 7px">NIP</td>
            <td>:</td>
            <td style="padding: 7px"> <input class="easyui-textbox" id="edit-nip" style="width:100%; height: 30px;"> </td>
        </tr>
        <tr>
            <td style="padding: 7px">NIK</td>
            <td>:</td>
            <td style="padding: 7px"> <input class="easyui-textbox" id="edit-nik" style="width:100%; height: 30px;"> </td>
        </tr>
        <tr>
            <td style="padding: 7px">Nama Karyawan</td>
            <td>:</td>
            <td style="padding: 7px"> <input class="easyui-textbox" id="edit-nama" style="width:100%; height: 30px;"> </td>
        </tr>
        <tr>
            <td style="padding: 7px">No HP</td>
            <td>:</td>
            <td style="padding: 7px"> <input class="easyui-textbox" id="edit-no_hp" style="width:100%; height: 30px;"> </td>
        </tr>
        <tr>
            <td style="padding: 7px">Email</td>
            <td>:</td>
            <td style="padding: 7px"> <input class="easyui-textbox" id="edit-email" style="width:100%; height: 30px;"> </td>
        </tr>
        <tr>
            <td style="padding: 7px">Alamat</td>
            <td>:</td>
            <td style="padding: 7px"> <input class="easyui-textbox" multiline="true" id="edit-alamat" style="width:100%; height: 100px;"> </td>
        </tr>
    </table>

    <div style="width:450px; text-align:right; padding-right:10px; margin-top: 25px;">
        <a href="javascript:void(0)" data-options="iconCls:'icon-ok'" class="easyui-linkbutton" onclick="updateKaryawan()"> Simpan </a>
        <a href="javascript:void(0)" data-options="iconCls:'icon-cancel'" onclick="closeFormEdit()" class="easyui-linkbutton"> Batal </a>
    </div>
</div>

<script>
    function openFormEdit()
    {
        var data = $('#data-karyawan').datagrid('getSelected');

        if(data === null)
        {
            alert('Pilih Data yang Ingin Diubah!');
        }
        else
        {
            $('#edit-id').val(data.id)
            
            $('#edit-nip').textbox('setValue', data.nip).textbox('disable', true)

            $('#edit-nik').textbox('setValue', data.nik)

            $('#edit-nama').textbox('setValue', data.nama)

            $('#edit-nama').textbox('setValue', data.nama_karyawan)

            $('#edit-no_hp').textbox('setValue', data.no_hp)

            $('#edit-email').textbox('setValue', data.email)

            $('#edit-alamat').textbox('setValue', data.alamat)
        
            $('#window-form-edit-karyawan').window('open').window('center')
        }
        
    }

    function closeFormEdit()
    {
        $('#window-form-edit-karyawan').window('close');

        clearFormEdit();
    }

    function clearFormEdit()
    {
        $('#edit-id').val('');

        $('#edit-nik').textbox('setValue', '');

        $('#edit-nip').textbox('setValue', '');

        $('#edit-nama').textbox('setValue', '');

        $('#edit-no_hp').textbox('setValue', '');

        $('#edit-email').textbox('setValue', '');

        $('#edit-alamat').textbox('setValue', '');

    }

    function updateKaryawan()
    {

        var id = $('#edit-id').val();

        var nik = $('#edit-nik').textbox('getValue');

        var nip = $('#edit-nip').textbox('getValue');

        var nama = $('#edit-nama').textbox('getValue');

        var no_hp = $('#edit-no_hp').textbox('getValue');

        var email = $('#edit-email').textbox('getValue');

        var alamat = $('#edit-alamat').textbox('getValue');

        $.post('{{ route('karyawan.update')}}', {id, nik, nip, nama, no_hp, email, alamat, _token: '{{ csrf_token() }}'}, function(e) {
                
            loadDataKaryawan()

            closeFormEdit()

        }); 

    }
</script>
<div class="easyui-window" id="window-form-input-karyawan" title="Add Karyawan" data-options="width:500,height:475,modal:true, closed:true, border:'thin'" style="padding:15px;">
    <table style="width:450px">
        <tr>
            <td style="padding: 7px">NIP</td>
            <td>:</td>
            <td style="padding: 7px"> <input class="easyui-textbox" id="input-nip" style="width:100%; height: 30px;"> </td>
        </tr>
        <tr>
            <td style="padding: 7px">NIK</td>
            <td>:</td>
            <td style="padding: 7px"> <input class="easyui-textbox" id="input-nik" style="width:100%; height: 30px;"> </td>
        </tr>
        <tr>
            <td style="padding: 7px">Nama Karyawan</td>
            <td>:</td>
            <td style="padding: 7px"> <input class="easyui-textbox" id="input-nama" style="width:100%; height: 30px;"> </td>
        </tr>
        <tr>
            <td style="padding: 7px">No HP</td>
            <td>:</td>
            <td style="padding: 7px"> <input class="easyui-textbox" id="input-no_hp" style="width:100%; height: 30px;"> </td>
        </tr>
        <tr>
            <td style="padding: 7px">Email</td>
            <td>:</td>
            <td style="padding: 7px"> <input class="easyui-textbox" id="input-email" style="width:100%; height: 30px;"> </td>
        </tr>
        <tr>
            <td style="padding: 7px">Alamat</td>
            <td>:</td>
            <td style="padding: 7px"> <input class="easyui-textbox" multiline="true" id="input-alamat" style="width:100%; height: 100px;"> </td>
        </tr>
    </table>

    <div style="width:450px; text-align:right; padding-right:10px; margin-top: 25px;">
        <a href="javascript:void(0)" data-options="iconCls:'icon-ok'" class="easyui-linkbutton" onclick="submitKaryawan()"> Simpan </a>
        <a href="javascript:void(0)" data-options="iconCls:'icon-cancel'" onclick="closeForm()" class="easyui-linkbutton"> Batal </a>
    </div>
</div>

<script>
    function closeForm()
    {
        $('#window-form-input-karyawan').window('close');

        clearForm();
    }

    function clearForm()
    {
        
        $('#input-nik').textbox('setValue', '');

        $('#input-nip').textbox('setValue', '');

        $('#input-nama').textbox('setValue', '');

        $('#input-no_hp').textbox('setValue', '');

        $('#input-email').textbox('setValue', '');

        $('#input-alamat').textbox('setValue', '');

    }

    function submitKaryawan()
    {

        var nik = $('#input-nik').textbox('getValue');

        var nip = $('#input-nip').textbox('getValue');

        var nama = $('#input-nama').textbox('getValue');

        var no_hp = $('#input-no_hp').textbox('getValue');

        var email = $('#input-email').textbox('getValue');

        var alamat = $('#input-alamat').textbox('getValue');

        $.post('{{ route('karyawan.submit')}}', {nik, nip, nama, no_hp, email, alamat, _token: '{{ csrf_token() }}'}, function(e) {
                
            loadDataKaryawan()

            closeForm()

        }); 

    }
</script>
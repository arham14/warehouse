<div class="easyui-window" id="window-form-input-gudang" title="Add Gudang" data-options="width:500,height:375,modal:true, closed:true, border:'thin'" style="padding:15px;">
    <table style="width:450px">
        <tr>
            <td style="padding: 7px">Kode Gudang</td>
            <td>:</td>
            <td style="padding: 7px"> <input class="easyui-textbox" id="input-kode" style="width:100%; height: 30px;"> </td>
        </tr>
        <tr>
            <td style="padding: 7px">Nama Gudang</td>
            <td>:</td>
            <td style="padding: 7px"> <input class="easyui-textbox" id="input-nama" style="width:100%; height: 30px;"> </td>
        </tr>
        <tr>
            <td style="padding: 7px">Jenis Gudang</td>
            <td>:</td>
            <td style="padding: 7px"> 
                <select class="easyui-combobox" id="input-jenis_gudang" style="width:100%; height: 30px;"> 
                    <option value="Gudang Besar">Gudang Besar</option>
                    <option value="Gudang Kecil">Gudang Kecil</option>
                    <option value="Gudang Konsinyasi">Gudang Konsinyasi</option>
                </select>
            </td>
        </tr>
        <tr>
            <td style="padding: 7px">Alamat</td>
            <td>:</td>
            <td style="padding: 7px"> <input class="easyui-textbox" multiline="true" id="input-alamat" style="width:100%; height: 100px;"> </td>
        </tr>
    </table>

    <div style="width:450px; text-align:right; padding-right:10px; margin-top: 25px;">
        <a href="javascript:void(0)" data-options="iconCls:'icon-ok'" class="easyui-linkbutton" onclick="submitGudang()"> Simpan </a>
        <a href="javascript:void(0)" data-options="iconCls:'icon-cancel'" onclick="closeForm()" class="easyui-linkbutton"> Batal </a>
    </div>
</div>

<script>
    function closeForm()
    {
        $('#window-form-input-gudang').window('close');

        clearForm();
    }

    function clearForm()
    {
        
        $('#input-kode').textbox('setValue', '');

        $('#input-nama').textbox('setValue', '');

        $('#input-alamat').textbox('setValue', '');

    }

    function submitGudang()
    {

        var kode = $('#input-kode').textbox('getValue');

        var nama = $('#input-nama').textbox('getValue');

        var status = $('#input-jenis_gudang').combobox('getValue');

        var alamat = $('#input-alamat').textbox('getValue');

        $.post('{{ route('gudang.submit')}}', {kode, nama, status, alamat, _token: '{{ csrf_token() }}'}, function(e) {
                
            loadDataGudang()

            closeForm()

        }); 

    }
</script>
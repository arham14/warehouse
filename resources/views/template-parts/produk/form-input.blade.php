<div class="easyui-window" id="window-form-input-produk" title="Add Produk" data-options="width:500,height:275,modal:true, closed:true, border:'thin'" style="padding:15px;">
    <table style="width:450px">
        <tr>
            <td style="padding: 7px">Kode Produk</td>
            <td>:</td>
            <td style="padding: 7px"> <input class="easyui-textbox" id="input-kode" style="width:100%; height: 30px;"> </td>
        </tr>
        <tr>
            <td style="padding: 7px">Nama Produk</td>
            <td>:</td>
            <td style="padding: 7px"> <input class="easyui-textbox" id="input-nama" style="width:100%; height: 30px;"> </td>
        </tr>
        <tr>
            <td style="padding: 7px">Berat Produk (gram)</td>
            <td>:</td>
            <td style="padding: 7px"> <input class="easyui-textbox" id="input-berat" style="width:100%; height: 30px;"> </td>
        </tr>
    </table>

    <div style="width:450px; text-align:right; padding-right:10px; margin-top: 25px;">
        <a href="javascript:void(0)" data-options="iconCls:'icon-ok'" class="easyui-linkbutton" onclick="submitProduk()"> Simpan </a>
        <a href="javascript:void(0)" data-options="iconCls:'icon-cancel'" onclick="closeForm()" class="easyui-linkbutton"> Batal </a>
    </div>
</div>

<script>
    function closeForm()
    {
        $('#window-form-input-produk').window('close');

        clearForm();
    }

    function clearForm()
    {
        
        $('#input-kode').textbox('setValue', '');

        $('#input-nama').textbox('setValue', '');

        $('#input-berat').textbox('setValue', '');

    }

    function submitProduk()
    {
        var kode_produk = $('#input-kode').textbox('getValue');

        var nama_produk = $('#input-nama').textbox('getValue');

        var berat_produk = $('#input-berat').textbox('getValue');

        $.post('{{ route('produk.submit-header')}}', {kode_produk, nama_produk, berat_produk, _token: '{{ csrf_token() }}'}, function(e) {
                
            loadDataProduk()

            closeForm()

        });
    }
</script>
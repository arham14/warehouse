<div class="easyui-window" id="window-form-input-supplier" title="Add Supplier" data-options="width:500,height:315,modal:true, closed:true, border:'thin'" style="padding:15px;">
    <table style="width:450px">
        <tr>
            <td style="padding: 7px">Nama Supplier</td>
            <td>:</td>
            <td style="padding: 7px"> <input class="easyui-textbox" id="input-nama" style="width:100%; height: 30px;"> </td>
        </tr>
        <tr>
            <td style="padding: 7px">No Telpon</td>
            <td>:</td>
            <td style="padding: 7px"> <input class="easyui-textbox" id="input-tlp" style="width:100%; height: 30px;"> </td>
        </tr>
        <tr>
            <td style="padding: 7px">Alamat</td>
            <td>:</td>
            <td style="padding: 7px"> <input class="easyui-textbox" id="input-alamat" style="width:100%; height: 90px;" multiline="true"> </td>
        </tr>
    </table>

    <div style="width:450px; text-align:right; padding-right:10px; margin-top: 25px;">
        <a href="javascript:void(0)" data-options="iconCls:'icon-ok'" class="easyui-linkbutton" onclick="submitSupplier()"> Simpan </a>
        <a href="javascript:void(0)" data-options="iconCls:'icon-cancel'" onclick="closeForm()" class="easyui-linkbutton"> Batal </a>
    </div>
</div>

<script>
    function closeForm()
    {
        $('#window-form-input-supplier').window('close');

        clearForm();
    }

    function clearForm()
    {
        
        $('#input-nama').textbox('setValue', '');

        $('#input-tlp').textbox('setValue', '');

        $('#input-alamat').textbox('setValue', '');

    }

    function submitSupplier()
    {
        var nama_supplier = $('#input-nama').textbox('getValue');

        var tlp_supplier = $('#input-tlp').textbox('getValue');

        var alamat_supplier = $('#input-alamat').textbox('getValue');

        $.post('{{ route('supplier.submit')}}', {nama_supplier, tlp_supplier, alamat_supplier, _token: '{{ csrf_token() }}'}, function(e) {
                
            loadDataSupplier()

            closeForm()

        });
    }
</script>
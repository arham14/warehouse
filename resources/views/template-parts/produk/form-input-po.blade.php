<!-- Window Submit PO Start -->
<div id="wrap-form-po" class="easyui-window" title="Form Submit PO" data-options="modal:true,closed:true" style="margin-top:30px;padding:15px;">	
	<div id="wrap-input" class="easyui-layout" style="width:1080px;height:480px;">
        <div data-options="region:'east',split:true,title:'Review Transaksi Obat',collapsible:false" style="width:600px;padding: 10px">
            <table id="reference-obat" class="easyui-datagrid" title="Data Transaksi" data-options="
			    rownumbers:true,
			    singleSelect:true"
			    style="height:420px;">
			    <thead frozen="true">
			    	<th data-options="field:'kode_obat', hidden:'true', width:80, halign:'center'">Kode Obat</th>
		    		<th data-options="field:'nama_obat', width:220, halign:'center'">Nama Obat</th>
		    		<th data-options="field:'stok_sistem', width:75, halign:'center', align:'right'" formatter="formatUang">Qty</th>
	    		</thead>
	    		<thead>
		    		<th data-options="field:'stok_minimal', width:90, halign:'center', align:'right'" formatter="formatUang">Stok Min</th>
		    		<th data-options="field:'stok_out', width:90, halign:'center', align:'right'" formatter="formatUang">Pemakaian</th>
		    		<th data-options="field:'satuan_obat', width:100, halign:'center'">Satuan</th>
		    		<th data-options="field:'harga_modal', width:120, halign:'center', align:'right'" formatter="formatUang">Beli Terakhir</th>
		    		<th data-options="field:'harga_jual', width:120, halign:'center', align:'right'" formatter="formatUang">Jual Terakhir</th>
			    </thead>
			</table>
        </div>

        <div data-options="region:'center',title:'Submit PO'" style="padding:10px;">
        	<table style="margin-bottom: 10px">
				<tr style="margin:30px 0 20px 20px">
					<td>PO Number</td>
					<td> : </td>
					<td>
						<input id="no_po" class="easyui-textbox" style="width: 243px;" disabled="true">
					</td>
				</tr>
				<tr style="margin:30px 0 20px 20px">
					<td>Tanggal PO</td>
					<td> : </td>
					<td>
						<input id="tgl_po" class="easyui-datebox" style="width: 243px;">
					</td>
				</tr>
				<tr style="margin:30px 0 20px 20px">
					<td>Supplier</td>
					<td> : </td>
					<td>
						<input id="supplier" class="easyui-textbox" style="width: 243px;">
					</td>
				</tr>
			</table>

			<table id="po-temp" class="easyui-datagrid" title="List PO" data-options="
			    rownumbers:true,
			    toolbar:'#toolbar-temp', 
			    singleSelect:true"
			    style="height:258px;width: 460px;">
			    <thead>
			    	<tr>
			    		<th data-options="field:'nama_obat', width:180, halign:'center'">Nama Obat</th>
			    		<th data-options="field:'harga_modal', width:75, halign:'center', align:'right'" formatter="formatUang">Beli</th>
			    		<th data-options="field:'harga_jual', width:75, halign:'center', align:'right'" formatter="formatUang">Jual</th>
			    		<th data-options="field:'qty', width:75, halign:'center', align:'right'" formatter="formatUang">Qty</th>
			    		<th data-options="field:'satuan', width:100, halign:'center'">Satuan</th>
			    	</tr>
			    </thead>
			</table>

			<div id="toolbar-temp" style="padding:5px;">
		        <input id="obat" class="easyui-combobox" style="width: 175px;" data-options="
		        prompt:'Pilih Obat',
		        onChange: function(){
		            var kode_obat=$('#obat').combobox('getValue')
		            
		            $.post('{{ URL::to('proses-obat/get-price') }}', {kode_obat, _token:'{{ csrf_token() }}'}, function(data1) {
			        	$('#harga_beli').textbox('setValue', data1[0].harga_modal);
			        	$('#harga_jual').textbox('setValue', data1[0].harga_jual);
					});
		        }
		        ">
		        <input id="qty" class="easyui-textbox" style="width: 50px;text-align: right;" data-options="prompt:'Qty'">
		        <input id="harga_beli" class="easyui-textbox" style="width: 85px;text-align: right;" data-options="prompt:'Harga Beli'">
		        <input id="harga_jual" class="easyui-textbox" style="width: 85px;text-align: right;" data-options="prompt:'Harga Jual'">
		        <a href="javascript:void(0);" onclick="submitTemp();" class="easyui-linkbutton" iconCls="icon-add" plain="true"></a>
		    </div>

		    <div id="buttons-po" style="text-align:right;margin-right: 10px;margin-top: 10px; margin-bottom: 15px;">
			    <a href="javascript:void(0)" id="submitPo" class="easyui-linkbutton c6" iconCls="icon-ok" onclick="submitPo()" style="width:120px"> Proses </a>

			    <a href="javascript:void(0)" id="saveAsDraft" class="easyui-linkbutton c6" iconCls="icon-save" onclick="saveAsDraft()" style="width:120px"> Simpan </a>

			    <a href="javascript:void(0)" id="cancelPo" class="easyui-linkbutton c6" iconCls="icon-cancel" onclick="cancelPo()" style="width:80px">Batal</a>
			</div>
        </div>
    </div>
</div>
<!-- Window Submit PO End -->

<script>	
	function formNewPo(po)
	{
		$('#wrap-form-po').window({
		 	autoOpen: false,
		  	height: 550,
		  	width: 1130,
		  	collapsible: false,
            minimizable: false,
            maximizable: false,
            closable: false
		}).window('open').window('center');

		$('#wrap-form-po').window('window').attr('tabIndex','-1').bind('keydown',function(e){
			
		});

		$.post('{{ route('produk.get-id-po') }}', { _token:'{{ csrf_token() }}'
						}, function(e){
			console.log(e)
		});
	
	}

	function closePo(){
		$('#wrap-form-po').window('close');	
		$('#no_po').textbox('setValue', '');
		$('#tgl_po').textbox('setValue', '');
		$('#supplier').textbox('setValue', '');

		loadDataPo(0);
	}

	function submitTemp()
	{
		var id_po=$('#no_po').textbox('getValue');
		var kode_obat=$('#obat').combobox('getValue');
		var qty=$('#qty').textbox('getValue');
		var harga_modal=$('#harga_beli').textbox('getValue');
		var harga_jual=$('#harga_jual').textbox('getValue');

		$.post('{{ URL::to('proses-obat/submit-po-detail') }}', {id_po, kode_obat, qty, harga_modal, harga_jual, _token:'{{ csrf_token() }}'
					}, function(e){
			loadDetailPo();

			$('#obat').combobox('setValue', '');
			$('#qty').textbox('setValue', '');
			$('#harga_beli').textbox('setValue', '');
			$('#harga_jual').textbox('setValue', '');

			$('#obat').combobox('combobox').focus();
	    });
	}

	function saveAsDraft() {
		var id_po=$('#no_po').textbox('getValue');
		var tanggal=$('#tgl_po').textbox('getValue');
		var supplier=$('#supplier').textbox('getValue');
		var status="draft";
		
		$.post('{{ URL::to('proses-kesehatan/submit-po') }}', {id_po, tanggal, supplier, status, _token:'{{ csrf_token() }}'
					}, function(e){
			closePo();
	    });
	}

	function submitPo(){
		var id_po=$('#no_po').textbox('getValue');
		var tanggal=$('#tgl_po').textbox('getValue');
		var supplier=$('#supplier').textbox('getValue');
		var status="process";
		
		$.post('{{ URL::to('proses-obat/submit-po') }}', {id_po, tanggal, supplier, status, _token:'{{ csrf_token() }}'
					}, function(e){
			closePo();
	    });
	}

	function loadDetailPo() {
		$('#po-temp').datagrid('loading');
		var id_po=$('#no_po').textbox('getValue');

		$.post('{{ URL::to('proses-obat/data-po-detail') }}', {id_po, _token:'{{ csrf_token() }}'
					}, function(e){
			$('#po-temp').datagrid('loaded');
			$('#po-temp').datagrid('reload');
			$('#po-temp').datagrid({data:e});
			$('#po-temp').datagrid('getPanel').panel('panel').attr('tabindex',1).focus();
			$('#po-temp').datagrid('selectRow', 0);

			$('#po-temp').datagrid('getPanel').panel('panel').attr('tabindex',1).bind('keydown',function(e){
				
				switch(e.keyCode){
					case 38:	// up
						var selected = $('#po-temp').datagrid('getSelected');
						if (selected){
							var index = $('#po-temp').datagrid('getRowIndex', selected);
							$('#po-temp').datagrid('selectRow', index-1);
						} else {
							$('#po-temp').datagrid('selectRow', 0);
						}
						break;
					case 40:	// down
						var selected = $('#po-temp').datagrid('getSelected');
						if (selected){
							var index = $('#po-temp').datagrid('getRowIndex', selected);
							$('#po-temp').datagrid('selectRow', index+1);
						} else {
							$('#po-temp').datagrid('selectRow', 0);
						}
						break;
					case 45: //insert
						$('#supplier').textbox('textbox').focus();
						break;
					case 46: //delete
						deleteDetailPo();
						break;
					case 13: //enter
						break;
					case 113: //edit
						break;
				}
			});
	    });
	}

	function loadDataObatCombo(){
		$('#obat').combobox({
	        valueField: "kode_obat",
	        textField: "nama_obat",
	        method: 'get',
	        url:'proses-obat/rekap-obat'
	    });
	}

	function setTanggalPo(){
    	var today=format_tanggal(new Date, 0);
    	var tgl_po=$('#tgl_po').datebox('getValue');
		
		if(tgl_po == '')
		{
			$('#tgl_po').datebox('setValue', today);	
		}
		else{
			$('#tgl_po').datebox('setValue', tgl_po);
		}
    }

    
    function loadDataObat()
    {
    	$('#reference-obat').datagrid('loaded');
    	var nama_obat='';

    	$.post('{{ URL::to('proses-obat/rekap-obat') }}', {nama_obat, _token:'{{ csrf_token() }}'
					}, function(e){
			$('#reference-obat').datagrid('loaded');
			$('#reference-obat').datagrid('reload');
			$('#reference-obat').datagrid({data:e});
	    });
    }

    function deleteDetailPo()
    {
    	var row=$('#po-temp').datagrid('getSelected');
    	var id_po_detail=row.id_po_detail;

    	$.post('{{ URL::to('proses-obat/hapus-detail-po') }}', {id_po_detail, _token:'{{ csrf_token() }}'
					}, function(e){
			loadDetailPo();
	    });
    }

    function cancelPo()
    {
    	var no_po=$('#no_po').textbox('getValue');

    	$.post('{{ URL::to('proses-obat/hapus-data-po') }}', {no_po, _token:'{{ csrf_token() }}'}, function(e){
			closePo();
	    });
    }

</script>
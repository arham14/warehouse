<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<title>Stock Management System</title>
	<link rel="stylesheet" type="text/css" href="{{ asset('themes/default/easyui.css') }}">
	<link rel="stylesheet" type="text/css" href="{{ asset('themes/icon.css') }}">
	<script type="text/javascript" src="{{ asset('jquery.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('jquery.easyui.min.js') }}"></script>
    @yield('header')
</head>
<body>
	<div style="margin:15px 0;"></div>

	<!-- Content Main Menu Start -->
	<div class="easyui-panel" style="width:99%">
		<a onclick="goTo('/')" href="javascript:void(0)" class="easyui-linkbutton" data-options="plain:true">Home</a>
		<a href="javascript:void(0)" class="easyui-menubutton" data-options="menu:'#sub-menu-master'">Master</a>
		<a href="javascript:void(0)" class="easyui-menubutton" data-options="menu:'#sub-menu-transaction'">Transaction</a>
		<a href="javascript:void(0)" class="easyui-menubutton" data-options="menu:'#sub-menu-report'">Report</a>
		<a href="javascript:void(0)" class="easyui-menubutton" data-options="menu:'#sub-menu-tools'">Tools</a>
	</div>
	<!-- Content Main Menu End -->

	<!-- Content Submenu Start -->
	<div id="sub-menu-master" style="width:100px;">
		<div onclick="goTo('{{ route('gudang.index') }}')">Gudang</div>
		<div onclick="goTo('{{ route('produk.index') }}')">Produk</div>
		<div onclick="goTo('{{ route('supplier.index') }}')">Supplier</div>
		<div onclick="goTo('{{ route('karyawan.index') }}')">Karyawan</div>
	</div>
	<div id="sub-menu-transaction" style="width:100px;">
		<div>
			<span>Produk</span>
			<div style="width:80px;">
				<div onclick="goTo('{{ route('produk.index-po') }}')">Purchase Order</div>
			</div>
		</div>
	</div>
	<div id="sub-menu-report" style="width:100px;">
		<div onclick="goTo('/gudang/master')">Gudang</div>
		<div onclick="goTo('/produk/master')">Produk</div>
	</div>
	<div id="sub-menu-tools" style="width:100px;">
		<div onclick="goTo('/gudang/master')">Gudang</div>
		<div onclick="goTo('/produk/master')">Produk</div>
		<div>
			<form action="logout" method="post"> @csrf <input type="submit" value="Keluar"> </form>	
		</div>
	</div>
	<!-- Content Submenu End -->

    @yield('konten')
    
    @yield('js')

    <script>
        function goTo(menu)
        {
            
			window.location.replace(menu)
            
        }
    </script>
</body>
</html>
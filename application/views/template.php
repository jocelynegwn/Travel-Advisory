<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>TravelAdvisory | by Binus University</title>
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <link rel="stylesheet" href="<?=base_url()?>assets/bower_components/bootstrap/dist/css/bootstrap.min.css">
  <link rel="stylesheet" href="<?=base_url()?>assets/bower_components/font-awesome/css/font-awesome.min.css">
  <link rel="stylesheet" href="<?=base_url()?>assets/dist/css/AdminLTE.min.css">
  <link rel="stylesheet" href="<?=base_url()?>assets/dist/css/skins/_all-skins.min.css">
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>
<body class="hold-transition skin-blue sidebar-mini <?=$this->uri->segment(1) == 'sale' ? 'sidebar-collapse' : null?>">

	<div class="wrapper">
  		<header class="main-header">
    		<a href="<?=base_url('dashboard')?>" class="logo">
      			<span class="logo-mini">m<b>P</b></span>
      			<span class="logo-lg">travel<b>ADVISORY</b></span>
    		</a>
    		<nav class="navbar navbar-static-top">
      			<a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
        			<span class="sr-only">Toggle navigation</span>
        			<span class="icon-bar"></span>
        			<span class="icon-bar"></span>
        			<span class="icon-bar"></span>
      			</a>

      			<div class="navbar-custom-menu">
        			<ul class="nav navbar-nav">
          				<li class="dropdown tasks-menu">
            				<a href="#" class="dropdown-toggle" data-toggle="dropdown">
              					<i class="fa fa-flag-o"></i>
              					<span class="label label-danger">3</span>
            				</a>
            				<ul class="dropdown-menu">
              					<li class="header">You have 3 tasks</li>
              					<li>
                					<ul class="menu">
                  						<li>
                    					<a href="#">
                      						<h3>Design some buttons
                        						<small class="pull-right">20%</small>
                      						</h3>
                      						<div class="progress xs">
                        						<div class="progress-bar progress-bar-aqua" style="width: 20%" role="progressbar" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100">
                          						<span class="sr-only">20% Complete</span>
                        						</div>
                     						</div>
                    					</a>
                  						</li>
                					</ul>
             					</li>
              					<li class="footer">
                					<a href="#">View all tasks</a>
              					</li>
            				</ul>
          				</li>
						
          				<!-- User Account -->
          				<li class="dropdown user user-menu">
            				<a href="#" class="dropdown-toggle" data-toggle="dropdown">
              					<img src="<?=base_url()?>assets/dist/img/user2-160x160.jpg" class="user-image">
              					<span class="hidden-xs"><?=$this->fungsi->user_login()->username?></span>
            				</a>
            				<ul class="dropdown-menu">
              					<li class="user-header">
                					<img src="<?=base_url()?>assets/dist/img/user2-160x160.jpg" class="img-circle">
									<p><?=$this->fungsi->user_login()->name?>
                  						<small><?=$this->fungsi->user_login()->address?></small>
                					</p>
              					</li>
              					<li class="user-footer">
                					<div class="pull-left">
                  						<a href="#" class="btn btn-default btn-flat">Profile</a>
                					</div>
                					<div class="pull-right">
                  						<a href="<?=site_url('auth/logout')?>" class="btn btn-flat bg-red">Sign out</a>
                					</div>
              					</li>
            				</ul>
          				</li>
        			</ul>
      			</div>
    		</nav>
  		</header>

  		<!-- Left side column -->
  		<aside class="main-sidebar">
    		<section class="sidebar">
      			<div class="user-panel">
        			<div class="pull-left image">
          				<img src="<?=base_url()?>assets/dist/img/user2-160x160.jpg" class="img-circle">
        			</div>
        			<div class="pull-left info">
          				<p><?=ucfirst($this->fungsi->user_login()->username)?></p>
          				<a href="#"><i class="fa fa-circle text-success"></i> Online</a>
        			</div>
      			</div>
      			<form action="#" method="get" class="sidebar-form">
        			<div class="input-group">
          				<input type="text" name="q" class="form-control" placeholder="Search...">
          				<span class="input-group-btn">
                			<button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i></button>
              			</span>
        			</div>
      			</form>
      			<!-- sidebar menu -->
      			<ul class="sidebar-menu" data-widget="tree">
       	 			<li class="header">MAIN NAVIGATION</li>
        			<li <?=$this->uri->segment(1) == 'dashboard' || $this->uri->segment(1) == ''?' class="active"' : '' ?>>
          				<a href="<?=site_url('dashboard')?>"><i class="fa fa-dashboard"></i> <span>Dashboard</span></a>
					</li>
					<?php if($this->fungsi->user_login()->level == 1){?>
					<li <?=$this->uri->segment(1) == 'customer' ? 'class="active"' : ''?>>
						<a href="<?=site_url('customer')?>"><i class="fa fa-users"></i> <span>Customers</span></a>
					</li>
					<?php } ?> 
					<li class="treeview <?=$this->uri->segment(1) == 'destination' || $this->uri->segment(1) == 'package' || $this->uri->segment(1) == 'food' || 
					$this->uri->segment(1) == 'hotel' || $this->uri->segment(1) == 'transportation' || $this->uri->segment(1) == 'tourist' ? 'active' : '' ?>">
						<a href="#">
							<i class="fa fa-archive"></i> <span>Products</span>
							<span class="pull-right-container"><i class="fa fa-angle-left pull-right"></i></span>
          				</a>
          				<ul class="treeview-menu">
            				<li <?=$this->uri->segment(1) == 'destination' ? 'class="active"' : '' ?>><a href="<?=site_url('destination')?>"><i class="fa fa-circle-o"></i> Destination</a></li>
							<li <?=$this->uri->segment(1) == 'food' ? 'class="active"' : '' ?>><a href="<?=site_url('food')?>"><i class="fa fa-circle-o"></i> Food</a></li>
							<li <?=$this->uri->segment(1) == 'hotel' ? 'class="active"' : '' ?>><a href="<?=site_url('hotel')?>"><i class="fa fa-circle-o"></i> Hotel</a></li>
							<li <?=$this->uri->segment(1) == 'transportation' ? 'class="active"' : '' ?>><a href="<?=site_url('transportation')?>"><i class="fa fa-circle-o"></i> Transportation</a></li>
							<li <?=$this->uri->segment(1) == 'tourist' ? 'class="active"' : '' ?>><a href="<?=site_url('tourist')?>"><i class="fa fa-circle-o"></i> Tourist Attraction</a></li>
            				<li <?=$this->uri->segment(1) == 'package' ? 'class="active"' : '' ?>><a href="<?=site_url('package')?>"><i class="fa fa-circle-o"></i> Packages</a></li>
          				</ul>
        			</li>
					<li class="treeview <?=$this->uri->segment(1) == 'stock' || $this->uri->segment(1) == 'sale' ? 'active' : '' ?>">
						<a href="#">
							<i class="fa fa-shopping-cart"></i> <span>Transaction</span>
							<span class="pull-right-container"><i class="fa fa-angle-left pull-right"></i></span>
          				</a>
          				<ul class="treeview-menu">
            				<li <?=$this->uri->segment(1) == 'sale' ? 'class="active"' : '' ?>>
								<a href="<?=site_url('sale')?>"><i class="fa fa-circle-o"></i> Sales</a>
							</li>
							<?php if($this->fungsi->user_login()->level == 1){?>
            				<li <?=$this->uri->segment(1) == 'stock' && $this->uri->segment(2) == 'in' ? 'class="active"' : '' ?>>
								<a href="<?=site_url('stock/in')?>"><i class="fa fa-circle-o"></i> Stock In</a></li>
							<li <?=$this->uri->segment(1) == 'stock' && $this->uri->segment(2) == 'out' ? 'class="active"' : '' ?>>
								<a href="<?=site_url('stock/out')?>"><i class="fa fa-circle-o"></i> Stock Out</a></li>
							<?php } ?> 
          				</ul>
					</li>
					<?php if($this->session->userdata('level')==1){?>
       				<li class="treeview <?=$this->uri->segment(1) == 'report' ? 'active' : ''?>">
          				<a href="#">
            				<i class="fa fa-pie-chart"></i> <span>Reports</span>
            				<span class="pull-right-container"><i class="fa fa-angle-left pull-right"></i></span>
          				</a>
          				<ul class="treeview-menu">
            				<li <?=$this->uri->segment(1) == 'report' && $this->uri->segment(1) == 'sale' ? 'active' : ''?>><a href="<?=site_url('report/sale')?>"><i class="fa fa-circle-o"></i> Sales</a></li>
            				<!-- <li><a href="#"><i class="fa fa-circle-o"></i> Stocks</a></li> -->
					<?php } ?> 
          				</ul>
        			</li>
					<?php if($this->fungsi->user_login()->level == 1){?>
					<li class="header">SETTINGS</li>
					<li><a href="<?=site_url('user')?>"><i class="fa fa-user"></i> <span>Users</span></a></li>
					<?php } ?> 
				</ul>
    		</section>
 		</aside>

  		<!-- Content Wrapper -->
  		<div class="content-wrapper">
            <?php echo $contents ?>
		</div>

		<footer class="main-footer">
    		<div class="pull-right hidden-xs">
      			<b>Version</b> 1.0
    		</div>
    		<strong>Copyright &copy; 2023 <a href="https://binus.ac.id/">Binus University</a>.</strong> All rights reserved.
  		</footer>
	</div>

<!-- jQuery 3 -->
<script src="<?=base_url()?>assets/bower_components/jquery/dist/jquery.min.js"></script>
<script src="<?=base_url()?>assets/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<script src="<?=base_url()?>assets/bower_components/jquery-slimscroll/jquery.slimscroll.min.js"></script>
<script src="<?=base_url()?>assets/dist/js/adminlte.min.js"></script>

<script src="<?=base_url()?>assets/bower_components/datatables.net/js/jquery.dataTables.min.js"></script>
<script src="<?=base_url()?>assets/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>

<script>
$(document).ready(function() {
    $('#table1').DataTable()
})    
</script>

</body>
<script>
    $(document).ready(function() {
        $(document).on('click', '#select', function() {
            var package_id = $(this).data('id');
            var barcode = $(this).data('barcode');
            var name = $(this).data('name');
            var stock = $(this).data('stock');
            $('#package_id').val(package_id);
            $('#barcode').val(barcode);
            $('#package_name').val(name);
            $('#stock').val(stock);
            $('#modal-item').modal('hide');
        })
    })
</script>

<script>
    $(document).ready(function() {
        $(document).on('click', '#set_dtl', function() {
            var barcode = $(this).data('barcode');
            var packagename = $(this).data('packagename');
            var detail = $(this).data('detail');
            var qty = $(this).data('qty');
            var date = $(this).data('date');
            $('#barcode').text(barcode);
            $('#package_name').text(packagename);
            $('#detail').text(detail);
            $('#qty').text(qty);
            $('#date').text(date);
            $('#detail').text(detail);
        })
    })
</script>

<script>
    $(document).on('click', '#select', function() {
		var barcode = $(this).data('barcode')

        $('#package_id').val($(this).data('id'))
		$('#barcode').val(barcode)
		$('#price').val($(this).data('price'))
		$('#stock').val($(this).data('stock'))
		$('#modal-item').modal('hide')

		get_cart_qty(barcode)
    })
	
	function get_cart_qty(barcode) {
		$('#cart_table tr').each(function() {
			var qty_cart = $("#cart_table td.barcode:contains('"+barcode+"')").parent().find("td").eq(4).html()
			if(qty_cart != null) {
				$('#qty_cart').val(qty_cart)
			} else {
				$('#qty_cart').val(0)
			}
		})
	}

	$(document).on('click', '#add_cart', function() {
		var package_id = $('#package_id').val()
		var price = $('#price').val()
		var stock = $('#stock').val()
		var qty = $('#qty').val()
		var qty_cart = $('#qty_cart').val()
		if(package_id == '') {
			alert('Product belum dipilih.')
			$('#barcode').focus()
		} else if(stock < 1 || parseInt(stock) < (parseInt(qty_cart) + parseInt(qty))) {
			alert('Stock tidak mencukupi.')
			$('#barcode').focus()
		} else {
			$.ajax({
				type: 'POST',
				url: '<?=site_url('sale/process')?>',
				data: {'add_cart' : true, 'package_id' : package_id, 'price' : price, 'qty' : qty},
				dataType: 'json',
				success: function(result) {
					if(result.success == true) {
						$('#cart_table').load('<?=site_url('sale/cart_data')?>', function() {
							calculate()
						} )
						$('#package_id').val('')
						$('#barcode').val('')
						$('#qty').val(1)
						$('#barcode').focus()
					} else {
						alert('Gagal tambah item cart.')
					}
				}
			})
		}
	})

	$(document).on('click', '#del_cart', function() {
		if(confirm('Apakah Anda yakin?')) {
			var cart_id = $(this).data('cartid')
			$.ajax({
				type: 'POST',
				url: '<?=site_url('sale/cart_del')?>',
				dataType: 'json',
				data: {'cart_id': cart_id},
				success: function(result) {
					if(result.success == true) {
						$('#cart_table').load('<?=site_url('sale/cart_data')?>', function() {
							calculate()
						})
					} else {
						alert('Gagal hapus item cart.');
					}
				}
			})
		}
	})

	$(document).on('click', '#update_cart', function() {
        $('#cartid_item').val($(this).data('cartid'))
		$('#barcode_item').val($(this).data('barcode'))
		$('#product_item').val($(this).data('product'))
		$('#stock_item').val($(this).data('stock'))
		$('#price_item').val($(this).data('price'))
		$('#qty_item').val($(this).data('qty'))
		$('#total_before').val($(this).data('price') * $(this).data('qty'))
		$('#discount_item').val($(this).data('discount'))
		$('#total_item').val($(this).data('total'))
    })
	
	function count_edit_modal() {
		var price = $('#price_item').val()
		var qty = $('#qty_item').val()
		var discount = $('#discount_item').val()

		total_before = price * qty
		$('#total_before').val(total_before)

		total = (price - discount) * qty
		$('#total_item').val(total)

		if(discount == '') {
			$('#discount_item').val(0)
		}
	}
	$(document).on('keyup mouseup', '#price_item, #qty_item, #discount_item', function() {
		count_edit_modal()
	})

	$(document).on('click', '#edit_cart', function() {
		var cart_id = $('#cartid_item').val()
		var price = $('#price_item').val()
		var qty = $('#qty_item').val()
		var discount = $('#discount_item').val()
		var total = $('#total_item').val()
		var stock = $('#stock_item').val()
		if(price == '' || price < 1) {
			alert('Harga tidak boleh kosong.')
			$('#price_item').focus()
		} else if(qty == '' || qty < 1) {
			alert('Qty tidak boleh kosong.')
			$('#qty_item').focus()
		} else if(parseInt(qty) > parseInt(stock)) {
			alert('Stock tidak mencukupi.')
			$('#qty_item').focus()
		} else {
			$.ajax({
				type: 'POST',
				url: '<?=site_url('sale/process')?>',
				data: {'edit_cart' : true, 'cart_id' : cart_id, 'price' : price,
						'qty' : qty, 'discount' : discount, 'total' : total},
				dataType: 'json',
				success: function(result) {
					if(result.success == true) {
						$('#cart_table').load('<?=site_url('sale/cart_data')?>', function() {
							calculate()
						})
						alert('Data item cart berhasil ter-update.')
						$('#modal-item-edit').modal('hide')
					} else {
						alert('Data item cart tidak ter-update.')
						$('#modal-item-edit').modal('hide')
					}
				}
			})
		}
	})

	function calculate() {
		var subtotal = 0;
		$('#cart_table tr').each(function() {
			subtotal += parseInt($(this).find('#total').text())
		})
		isNaN(subtotal) ? $('#sub_total').val(0) : $('#sub_total').val(subtotal)

		var discount = $('#discount').val()
		var grand_total = subtotal - discount
		if(isNaN(grand_total)) {
			$('#grand_total').val(0)
			$('#grand_total2').text(0)
		} else {
			$('#grand_total').val(grand_total)
			$('#grand_total2').text(grand_total)
		}

		var cash = $('#cash').val();
		cash != 0 ? $('#change').val(cash - grand_total) : $('#change').val(0)

		if(discount == '') {
			$('#discount').val(0)
		}
	}
	$(document).on('keyup mouseup', '#discount', '#cash', function() {
		calculate()
	})

	$(document).ready(function() {
		calculate()
	})

	$(document).on('click', '#process_payment', function() {
		var customer_id = $('#customer').val()
		var subtotal = $('#sub_total').val()
		var discount = $('#discount').val()
		var grandtotal = $('#grand_total').val()
		var cash = $('#cash').val()
		var change = $('#change').val()
		var note = $('#note').val()
		var date = $('#date').val()
		if(subtotal < 1) {
			alert('Belum ada product item yang dipilih.')
			$('#barcode').focus()
		} else if(cash < 1) {
			alert('Jumlah uang cash belum di-input.')
			$('#cash').focus()
		} else {
			if(confirm('Yakin proses transaksi ini?')) {
				$.ajax({
					type: 'POST',
					url: '<?=site_url('sale/process')?>',
					data: {'process_payment': true, 'customer_id': customer_id, 'subtotal': subtotal,
						'discount': discount, 'grandtotal': grandtotal, 'cash': cash, 'change': change,
						'note': note, 'date': date},
					dataType: 'json',
					success: function(result) {
						if(result.success) {
							alert('Transaksi berhasil.');
							window.open('<?=site_url('sale/cetak/')?>' + result.sale_id, '_blank')
						} else {
							alert('Transaksi gagal.');
						}
						location.href='<?=site_url('sale')?>'
					}
				})
			}
		}
	})

	$(document).on('click', '#cancel_payment', function() {
		if(confirm('Apakah Anda yakin?')) {
			$.ajax({
				type: 'POST',
				url: '<?=site_url('sale/cart_del')?>',
				dataType: 'json',
				data: {'cancel_payment': true},
				success: function(result) {
					if(result.success == true) {
						$('#cart_table').load('<?=site_url('sale/cart_data')?>', function() {
							calculate()
						})
					}
				}
			})
			$('#discount').val(0)
			$('#cash').val(0)
			$('#customer').val('').change()
			$('#barcode').val('')
			$('#barcode').focus()
		}
	})

	$(document).on('click', '#detail', function() {
		$('#invoice').text($(this).data('invoice'))
		$('#cust').text($(this).data('customer'))
		$('#datetime').text($(this).data('date') + ' ' + $(this).data('time'))
		$('#total').text($(this).data('total'))
		$('#discount').text($(this).data('discount'))
		$('#cash').text($(this).data('cash'))
		$('#change').text($(this).data('remaining'))
		$('#grandtotal').text($(this).data('grandtotal'))
		$('#note').text($(this).data('note'))
		$('#cashier').text($(this).data('cashier'))

		var product = '<table class="table no-margin">'
		product += '<tr><th>Item</th><th>Price</th><th>Qty</th><th>Disc</th><th>Total</th></tr>'
		$.getJSON('<?=site_url('report/sale_product/')?>'+$(this).data('saleid'), function(data) {
			$.each(data, function(key, val) {
				product += '<tr><td>'+val.name+'</td><td>'+val.price+'</td><td>'+val.qty+'</td><td>'+val.discount_item+'</td><td>'+val.total+'</td></tr>'
			})
			product += '</table>'
			$('#product').html(product)
		})
	})
</script>

</html>

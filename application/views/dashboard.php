<section class="content-header">
      			<h1>Dashboard
        			<small>Control Panel</small>
      			</h1>
      			<ol class="breadcrumb">
        			<li><a href="#"><i class="fa fa-dashboard"></i></a></li>
        			<li class="active">Dashboard</li>
      			</ol>
    		</section>

    		<!-- Main content -->
    		<section class="content">

      			<div class="row">
        			<div class="col-md-3 col-sm-6 col-xs-12">
						<div class="info-box">
							<span class="info-box-icon bg-aqua"><i class="fa fa-th"></i></span>
							<div class="info-box-content">
								<span class="info-box-text">Packages</span>
								<span class="info-box-number"><?=$this->fungsi->count_package()?></span>
							</div>
						</div>
					</div>
					<div class="col-md-3 col-sm-6 col-xs-12">
						<div class="info-box">
							<span class="info-box-icon bg-green"><i class="fa fa-users"></i></span>
							<div class="info-box-content">
								<span class="info-box-text">Customers</span>
								<span class="info-box-number"><?=$this->fungsi->count_customer()?></span>
							</div>
						</div>
					</div>
					<div class="col-md-3 col-sm-6 col-xs-12">
						<div class="info-box">
							<span class="info-box-icon bg-yellow"><i class="fa fa-user-plus"></i></span>
							<div class="info-box-content">
								<span class="info-box-text">Users</span>
								<span class="info-box-number"><?=$this->fungsi->count_user()?></span>
							</div>
						</div>
					</div>
				</div>
		
			</section>
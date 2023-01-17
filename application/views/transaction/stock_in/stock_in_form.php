<section class="content-header">
      <h1>
        Stock In
        <small>Incoming Package</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i></a></li>
        <li>Transaction</li>
        <li class="active">Stock In</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="box">
            <div class="box-header">
                <h3 class="box-title">Add Stock In</h3>
                <div class="pull-right">
                    <a href="<?=site_url('stock/in')?>" class="btn btn-warning btn-flat">
                        <i class="fa fa-undo"></i> Back
                    </a>
                </div>
            </div>
            <div class="box-body">
                <div class="row">
                    <div class="col-md-4 col-md-offset-4">
                        <form action="<?=site_url('stock/process')?>" method="post">
                            <div class="form-group">
                                <label>Date *</label>
                                <input type="date" name="date" value="<?=date('Y-m-d')?>" class="form-control" required>
                            </div>
                            <div>
                                <label for="barcode">Barcode *</label>
                            </div>
                            <div class="form-group input-group">
                                <input type="hidden" name="package_id" id="package_id">
                                <input type="text" name="barcode" id="barcode" class="form-control" required autofocus>
                                <span class="input-group-btn">
                                    <button type="button" class="btn btn-info btn-flat" data-toggle="modal" data-target="#modal-package">
                                        <i class="fa fa-search"></i>
                                    </button>
                                </span>
                            </div>
                            <div class="form-group">
                                <label for="package_name">Package Name *</label>
                                <input type="text" name="package_name" id="package_name" class="form-control" readonly>
                            </div>
                            <div class="form-group">
                                <label for="stock">Initial Stock</label>
                                <input type="text" name="stock" id="stock" value="-" class="form-control" readonly>
                            </div>
                            <div class="form-group">
                                <label>Detail </label>
                                <input type="text" name="detail" class="form-control">
                            </div>
                            <div class="form-group">
                                <label>Qty *</label>
                                <input type="number" name="qty" class="form-control" required>
                            </div>
                            <div class="form-group">
                                <button type="submit" name="in_add" class="btn btn-success btn-flat">
                                    <i class="fa fa-paper-plane"></i> Save
                                </button>
                                <button type="Reset" class="btn btn-flat">Reset</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
</section>

<div class="modal fade" id="modal-package">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                <h4 class="modal-title">Select Package</h4>
            </div>
            <div class="modal-body table-responsive">
                <table class="table table-bordered table-striped" id="table1">
                    <thead>
                        <tr>
                            <th>Barcode</th>
                            <th>Name</th>
                            <th>Price</th>
                            <th>Stock</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach($package as $i => $data){ ?>
                        <tr>
                           <td><?=$data->barcode?></td>
                           <td><?=$data->name?></td>
                           <td class="text-right"><?=indo_currency($data->price)?></td>
                           <td class="text-right"><?=$data->stock?></td>
                           <td class="text-right">
                                <button class="btn btn-xs btn-info" id="select"
                                    data-id="<?=$data->package_id?>"
                                    data-barcode="<?=$data->barcode?>"
                                    data-name="<?=$data->name?>"
                                    data-stock="<?=$data->stock?>">
                                    <i class="fa fa-check"></i> Select
                                </button>
                           </td>
                        </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<!-- pindah ke template klo ga error -->
<!-- <script>
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
</script> -->
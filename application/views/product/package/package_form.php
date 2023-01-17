<section class="content-header">
      <h1>
        Packages
        <small>Packages Travel</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i></a></li>
        <li class="active">Packages</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="box">
            <div class="box-header">
                <h3 class="box-title"><?=ucfirst($page)?> Packages</h3>
                <div class="pull-right">
                    <a href="<?=site_url('package')?>" class="btn btn-warning btn-flat">
                        <i class="fa fa-undo"></i> Back
                    </a>
                </div>
            </div>
            <div class="box-body">
                <div class="row">
                    <div class="col-md-4 col-md-offset-4">
                        <form action="<?=site_url('package/process')?>" method="post">
                            <div class="form-group">
                                <label>Barcode *</label>
                                <input type="hidden" name="id" value="<?=$row->package_id?>">
                                <input type="text" name="barcode" value="<?=$row->barcode?>" class="form-control" required>
                            </div>
                            <div class="form-group">
                                <label for="name">Name *</label>
                                <input type="text" name="name" id="name" value="<?=$row->name?>" class="form-control" required>
                            </div>
                            <div class="form-group">
                                <label>Destination *</label>
                                <select name="destination" class="form-control" required> //arti required adalah wajib diisi
                                    <option value="">- Pilih -</option>
                                    <?php foreach($destination->result() as $key => $data){ ?>
                                        <option value="<?=$data->destination_id?>" <?=$data->destination_id == $row->destination_id ? "selected" : null?> ><?=$data->name?></option>
                                    <?php } ?>
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Food *</label>
                                <select name="food" class="form-control" required>
                                    <option value="">- Pilih -</option>
                                    <?php foreach($food->result() as $key => $data){ ?>
                                        <option value="<?=$data->food_id?>" <?=$data->food_id == $row->food_id ? "selected" : null?> ><?=$data->name?></option>
                                    <?php } ?>
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Hotel *</label>
                                <select name="hotel" class="form-control" required>
                                    <option value="">- Pilih -</option>
                                    <?php foreach($hotel->result() as $key => $data){ ?>
                                        <option value="<?=$data->hotel_id?>" <?=$data->hotel_id == $row->hotel_id ? "selected" : null?> ><?=$data->name?></option>
                                    <?php } ?>
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Transportation *</label>
                                <select name="transportation" class="form-control" required>
                                    <option value="">- Pilih -</option>
                                    <?php foreach($transportation->result() as $key => $data){ ?>
                                        <option value="<?=$data->transportation_id?>" <?=$data->transportation_id == $row->transportation_id ? "selected" : null?> ><?=$data->name?></option>
                                    <?php } ?>
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Tourist Attraction *</label>
                                <select name="tourist" class="form-control" required>
                                    <option value="">- Pilih -</option>
                                    <?php foreach($tourist->result() as $key => $data){ ?>
                                        <option value="<?=$data->tourist_id?>" <?=$data->tourist_id == $row->tourist_id ? "selected" : null?> ><?=$data->name?></option>
                                    <?php } ?>
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Price *</label>
                                <input type="number" name="price" value="<?=$row->price?>" class="form-control" required>
                            </div>
                            <div class="form-group">
                                <button type="submit" name="<?=$page?>" class="btn btn-success btn-flat">
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
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
        <?php $this->view('messages') ?>
        <div class="box">
            <div class="box-header">
                <h3 class="box-title">Data Packages</h3>
                <div class="pull-right">
                <?php if($this->fungsi->user_login()->level == 1){?>
                    <a href="<?=site_url('package/add')?>" class="btn btn-primary btn-flat">
                        <i class="fa fa-user-plus"></i> Create
                    </a>
                    <?php } ?>
                </div>
            </div>
            <div class="box-body table-responsive">
                <table class="table table-bordered table-striped" id="table1">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Barcode</th>
                            <th>Name</th>
                            <th>Destination</th>
                            <th>Food</th>
                            <th>Hotel</th>
                            <th>Transportation</th>
                            <th>Tourist Attraction</th>
                            <th>Price</th>
                            <th>Stock</th>
                            <?php if($this->fungsi->user_login()->level == 1){?>
                            <th>Actions</th>
                            <?php } ?>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $no = 1;
                        foreach($row->result() as $key => $data) { ?>
                        <tr>
                            <td style="width:5%;"><?=$no++?>.</td>
                            <td><?=$data->barcode?></td>
                            <td><?=$data->name?></td>
                            <td><?=$data->destination_name?></td>
                            <td><?=$data->food_name?></td>
                            <td><?=$data->hotel_name?></td>
                            <td><?=$data->transportation_name?></td>
                            <td><?=$data->tourist_name?></td>
                            <td><?=$data->price?></td>
                            <td><?=$data->stock?></td>
                            <td class="text-center" width="160px">
                            <?php if($this->fungsi->user_login()->level == 1){?>
                                <a href="<?=site_url('package/edit/'.$data->package_id)?>"  class="btn btn-primary btn-xs">
                                    <i class="fa fa-pencil"></i> Update
                                </a>
                                <a href="<?=site_url('package/del/'.$data->package_id)?>" onclick="return confirm('Apakah anda yakin ingin menghapus data tersebut?')" class="btn btn-danger btn-xs">
                                    <i class="fa fa-trash"></i> Delete
                                </a>
                                <?php } ?>
                            </td>
                        </tr>
                        <?php
                        } ?>
                    </tbody>
                </table>
            </div>
        </div>

    </section>

    <script>
        $(document).ready(function() {
            $('#table1').DataTable({ //table 1 disesuaikan dgn id line 25
                "processing": true,
                "serverSide": true,
                "ajax": {
                    "url": <?=site_url('package/get_ajax')?>
                    "type": "POST"
                },
                "columnDefs":[
                    {
                        "targets": [5,6],
                        "className": 'text-right'
                    },
                    {
                        "targets": [7,-1],
                        "className": "text-center"
                    },
                    {
                        "targets": [0, 7,-1],
                        "orderable": false
                    }
                ],
                "order": []
            }) 
        })    
    </script>
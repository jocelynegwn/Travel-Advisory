<section class="content-header">
      <h1>
        Food
        <small>Makanan</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i></a></li>
        <li class="active">Food</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
        <?php $this->view('messages') ?>
        <div class="box">
            <div class="box-header">
                <h3 class="box-title">Data Makanan</h3>
                <div class="pull-right">
                <?php if($this->fungsi->user_login()->level == 1){?>
                    <a href="<?=site_url('food/add')?>" class="btn btn-primary btn-flat">
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
                            <th>Name</th>
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
                            <td><?=$data->name?></td>
                            <td class="text-center" width="160px">
                            <?php if($this->fungsi->user_login()->level == 1){?>
                                <a href="<?=site_url('food/edit/'.$data->food_id)?>"  class="btn btn-primary btn-xs">
                                    <i class="fa fa-pencil"></i> Update
                                </a>
                                <a href="<?=site_url('food/del/'.$data->food_id)?>" onclick="return confirm('Apakah anda yakin ingin menghapus data tersebut?')" class="btn btn-danger btn-xs">
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
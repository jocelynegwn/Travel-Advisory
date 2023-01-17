<?php $no = 1;
if($cart->num_rows() > 0) {
    foreach ($cart->result() as $c => $data) { ?>
        <tr>
            <td><?=$no++?>.</td>
            <td class="barcode"><?=$data->barcode?></td>
            <td><?=$data->package_name?></td>
            <td class="text-right"><?=$data->cart_price?></td>
            <td class="text-center"><?=$data->qty?></td>
            <td class="text-right"><?=$data->discount_package?></td>
            <td class="text-right" id="total"><?=$data->total?></td>
            <td class="text-center" width="160px">
                <button id="update_cart" data-toggle="modal" data-target="#modal-package-edit"
                data-cartid="<?=$data->cart_id?>"
                data-barcode="<?=$data->barcode?>"
                data-product="<?=$data->package_name?>"
                data-stock="<?=$data->stock?>"
                data-price="<?=$data->cart_price?>"
                data-qty="<?=$data->qty?>"
                data-discount="<?=$data->discount_package?>"
                data-total="<?=$data->total?>"
                class="btn btn-xs btn-primary">
                    <i class="fa fa-pencil"></i> Update
                </button>
                <button id="del_cart" data-cartid="<?=$data->cart_id?>" class="btn btn-xs btn-danger">
                    <i class="fa fa-trash"></i> Delete
                </button>
            </td>
        </tr>
    <?php
    }
} else {
    echo '<tr>
    <td colspan="8" class="text-center">Tidak ada package.</td>
    </tr>';
} ?>
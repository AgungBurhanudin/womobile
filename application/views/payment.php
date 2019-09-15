<div role="main" class="ui-content">

    <div class="pages_maincontent">
        <h2 class="page_title">Payment</h2> 
        <div style="float: right;margin-top: 15px;margin-right: 15px">
            <a href="<?= base_url() ?>Dashboard"  class="ui-link"><img src="<?= base_url() ?>assets/images/icons/black/menu_close.png" alt="" title="" height="30px"></a>
        </div>
        <div class="page_content"> 
            <table class="table table-responsive-sm table-hover table-outline mb-0" id="tablePaymentVendor">
                <thead class="thead-light">
                    <tr>
                        <th style="width: 3%">No</th>
                        <th>Nama Vendor</th>
                        <th style="width: 15%">CP</th>
                        <th style="width: 10%">Phone</th>
                        <th style="width: 15%">Biaya</th>
                        <th style="width: 15%">Status</th>
                        <th style="width: 100px">Action</th>
                    </tr>
                    <tr>
                        <td colspan="8">
                            <h5>Di  Bayarkan Oleh WO</h5>
                        </td>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $no = 1;
                    $total = 0;
                    if (!empty($vendor)) {
                        foreach ($vendor as $val) {
                            if ($val->dibayaroleh == "wo") {
                                ?>
                                <tr>
                                    <td><?= $no++ ?></td>
                                    <td colspan="3">
                                        <?= $val->nama_vendor ?><br><?= $val->cp ?><br><?= $val->nohp_cp ?>
                                    </td>
                                    
                                    <td align="right"><?= number_format($val->biaya, 2) ?></td>
                                    <td><?php
                                        if ($val->status == 0) {
                                            echo "Belum Terbayar";
                                        } else if ($val->status == 1) {
                                            echo "Menunggu konfirmasi";
                                        } else if ($val->status == 2) {
                                            echo "Terbayar Sebagian";
                                        } else if ($val->status == 3) {
                                            echo "Terbayar";
                                        }
                                        ?>
                                    </td>
                                    <td>
                                        <?php
                                        if ($val->status == 0) {
                                            ?>
                                            <a href="<?= base_url() ?>Dashboard/editPayment?id=<?= $val->id ?>" class="btn btn-sm btn-success"><i class="fa fa-dollar"></i> Bayar</a>
                                            <?php
                                        } else if ($val->status == 1) {
                                            ?>
                                            <a href="<?= base_url() ?>Dashboard/editPayment?id=<?= $val->id ?>" class="btn btn-sm btn-warning"><i class="fa fa-eye"></i> Konfirmasi</a>
                                            <?php
                                        } else if ($val->status == 2) {
                                            ?>
                                            <a href="<?= base_url() ?>Dashboard/editPayment?id=<?= $val->id ?>" class="btn btn-sm btn-warning"><i class="fa fa-pencil"></i> Bayar Sisa</a>
                                            <?php
                                        } else if ($val->status == 3) {
                                            ?>
                                            <a href="<?= base_url() ?>Dashboard/editPayment?id=<?= $val->id ?>" class="btn btn-sm btn-primary"><i class="fa fa-pencil"></i> Edit</a>
                                            <?php
                                        }
                                        ?>

                                    </td>
                                </tr>
                                <?php
                                $total += $val->biaya;
                            }
                        }
                    } else {
                        echo "<tr><td colspan='7'>Payment Vendor Masih Kosong</td></tr>";
                    }
                    ?>
                    <tr>
                        <td colspan="4">Total</td>
                        <td align="right"><?= number_format($total, 2) ?></td>
                        <td></td>
                        <td></td>
                    </tr>
                    <tr>
                        <td colspan="8">
                            <h5>Di  Bayarkan Sendiri</h5>
                        </td>
                    </tr>
                    <?php
                    $no = 1;
                    $total = 0;
                    if (!empty($vendor)) {
                        foreach ($vendor as $val) {
                            if ($val->dibayaroleh == "sendiri") {
                                ?>
                                <tr>
                                    <td><?= $no++ ?></td>
                                    <td colspan="3">
                                        <?= $val->nama_vendor ?><br><?= $val->cp ?><br><?= $val->nohp_cp ?>
                                    </td>
                                    <td align="right"><?= number_format($val->biaya, 2) ?></td>
                                    <td><?php
                                        if ($val->status == 0) {
                                            echo "Belum Terbayar";
                                        } else if ($val->status == 1) {
                                            echo "Menunggu konfirmasi";
                                        } else if ($val->status == 2) {
                                            echo "Terbayar";
                                        }
                                        ?>
                                    </td>
                                    <td>

                                        <?php
                                        if ($val->status == 0) {
                                            ?>
                                            <a href="<?= base_url() ?>Dashboard/editPayment?id=<?= $val->id ?>" class="btn btn-sm btn-success"><i class="fa fa-dollar"></i> Bayar</a>
                                            <?php
                                        } else if ($val->status == 1) {
                                            ?>
                                            <a href="<?= base_url() ?>Dashboard/editPayment?id=<?= $val->id ?>" class="btn btn-sm btn-warning"><i class="fa fa-eye"></i> Konfirmasi</a>
                                            <?php
                                        } else if ($val->status == 2) {
                                            ?>
                                            <a href="<?= base_url() ?>Dashboard/editPayment?id=<?= $val->id ?>" class="btn btn-sm btn-warning"><i class="fa fa-pencil"></i> Bayar Sisa</a>
                                            <?php
                                        } else if ($val->status == 3) {
                                            ?>
                                            <a href="<?= base_url() ?>Dashboard/editPayment?id=<?= $val->id ?>" class="btn btn-sm btn-primary"><i class="fa fa-pencil"></i> Edit</a>
                                            <?php
                                        }
                                        ?>
                                    </td>
                                </tr>
                                <?php
                                $total += $val->biaya;
                            }
                        }
                    } else {
                        echo "<tr><td colspan='7'>Payment Vendor Masih Kosong</td></tr>";
                    }
                    ?>
                </tbody>
                <tfoot>
                    <tr>
                        <td colspan="4">Total</td>
                        <td align="right"><?= number_format($total, 2) ?></td>
                        <td></td>
                        <td></td>
                    </tr>
                </tfoot>
            </table>
        </div>
    </div>
</div>

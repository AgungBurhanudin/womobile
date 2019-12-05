<style>

    .invoice .head{
        width: 100%;
        height: 35px;
        background-color: #f4787a;
        border-top-right-radius: 15px;
        border-top-left-radius: 15px;
        font-weight: bold;
        text-align: center;
        line-height: 35px;
        border: 1px solid #f4787a;
    }
    .invoice .body{
        width: 100%;
        height: auto;
        border-right: 1px solid #f4787a;
        border-left: 1px solid #f4787a;
    }
    .invoice .foot{
        width: 100%;
        height: 45px;
        background-color: #f4787a;
        border-bottom-right-radius: 15px;
        border-bottom-left-radius: 15px;
        line-height: 35px;
        border: 1px solid #f4787a;
    }

    .invoice .head-paid{
        width: 100%;
        height: 35px;
        background-color: #e7e7e7;
        border-top-right-radius: 15px;
        border-top-left-radius: 15px;
        font-weight: bold;
        text-align: center;
        line-height: 35px;
        border: 1px solid #e7e7e7;
    }
    .invoice .body-paid{
        width: 100%;
        height: auto;
        border-right: 1px solid #e7e7e7;
        border-left: 1px solid #e7e7e7;
    }
    .invoice .foot-paid{
        width: 100%;
        height: 45px;
        background-color: #e7e7e7;
        border-bottom-right-radius: 15px;
        border-bottom-left-radius: 15px;
        line-height: 35px;
        border: 1px solid #e7e7e7;
    }
</style>
<div role="main" class="ui-content">

    <div class="pages_maincontent">
        <h2 class="page_title">Detail Payment</h2> 
        <div style="float: right;margin-top: 15px;margin-right: 15px">
            <a href="<?= base_url() ?>Dashboard/payment"  class="ui-link"><img src="<?= base_url() ?>assets/images/icons/black/menu_close.png" alt="" title="" height="30px"></a>
        </div>
        <div class="page_content"> 
            <?php
            $no = 1;
            $total = 0;
            if (!empty($payment)) {
                $class = "";
                if ($payment->status == "3") {
                    $class = "-paid";
                }
                ?>
                <div class="invoice">
                    <div class="head<?= $class ?>"><?= $payment->nama_vendor ?></div>
                    <div class="body<?= $class ?>">
                        <div style="padding:10px;">
                            <table style="width:100%" class="table">
                                <tr>
                                    <td style="width:40%">
                                        Nama Vendor
                                    </td>
                                    <td>
                                        <?= $payment->nama_vendor ?>
                                    </td>
                                </tr>
                                <tr>
                                    <td style="width:40%">
                                        CP
                                    </td>
                                    <td>
                                        <?= $payment->cp ?>
                                    </td>
                                </tr>
                                <tr>
                                    <td style="width:40%">
                                        No Telephone
                                    </td>
                                    <td>
                                        <?= $payment->nohp_cp ?>
                                    </td>
                                </tr>
                                <tr>
                                    <td style="width:40%">
                                        Total Biaya
                                    </td>
                                    <td style="text-align: right">
                                        <?= number_format($payment->biaya, 2) ?>
                                    </td>
                                </tr>
                                <tr>
                                    <td style="width:40%">
                                        Terbayar
                                    </td>
                                    <td style="text-align: right">
                                        <?= number_format($payment->terbayar, 2) ?>
                                    </td>
                                </tr>
                                <tr>
                                    <td style="width:40%">
                                        Kekurangan
                                    </td>
                                    <td style="text-align: right">
                                        <?= number_format($payment->biaya - $payment->terbayar, 2) ?>
                                    </td>
                                </tr>
                                <tr>
                                    <td style="width:40%">
                                        Status
                                    </td>
                                    <td><b>
                                            <?php
                                            if ($payment->status == 0) {
                                                echo "BELUM TERBAYAR";
                                            } else if ($payment->status == 1) {
                                                echo "MENUNGGU KONFIRMASI PEMBAYARAN";
                                            } else if ($payment->status == 2) {
                                                echo "TERBAYAR SEBAGIAN";
                                            } else if ($payment->status == 3) {
                                                echo "LUNAS";
                                            } else if ($payment->status == 9) {
                                                echo "PEMBAYARAN GAGAL";
                                            }
                                            ?></b>
                                    </td>
                                </tr>
                            </table>
                            <br>
                            <b>History Pembayaran</b>
                            <table class="table" style="width: 100%">
                                <tr style="background-color: #e7e7e7">
                                    <td colspan="3"></td>
                                </tr>
                                <?php
                                foreach ($detail as $d) {
                                    ?>
                                    <tr>
                                        <td style="width: 5%"></td>
                                        <td style="width:30%">Tanggal </td>
                                        <td>
                                            <?= DateToIndo($d->tanggal_bayar) ?>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td style="width: 5%"></td>
                                        <td style="width:30%">Cara </td>
                                        <td>
                                            <?= $d->cara_pembayaran ?>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td style="width: 5%"></td>
                                        <td style="width:30%">Nominal </td>
                                        <td style="text-align: right">
                                            <?= number_format($d->terbayar, 2) ?>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td style="width: 5%"></td>
                                        <td style="width:30%">Bukti </td>
                                        <td>
                                            <a href="<?= base_url() ?>../../files/bukti/<?= $d->bukti ?>">Download</a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td></td>
                                        <td style="width:40%">
                                            Status
                                        </td>
                                        <td><b>
                                                <?php
                                                if ($d->status == 0) {
                                                    echo "MENUNGGU KONFIRMASI PEMBAYARAN";
                                                } else if ($d->status == 1) {
                                                    echo "TERKONFIRMASI";
                                                } else if ($d->status == 2) {
                                                    echo "PEMBAYARAN GAGAL";
                                                }
                                                ?></b>
                                        </td>
                                    </tr>
                                    <tr style="background-color: #e7e7e7">
                                        <td colspan="3"></td>
                                    </tr>
                                    <?php
                                }
                                ?>
                            </table>
                        </div>
                    </div>
                    <div class="foot<?= $class ?>">
                        <div style="float:right; margin-right:25px">
                            <a href="#">
                                <a href="<?= base_url() ?>Dashboard/editPayment?id=<?= $payment->id ?>" class="btn btn-sm btn-primary"><i class="fa fa-pencil"></i>
                                    <button type="button" style="height:30px;line-height:10px;">Bayar</button>
                                </a>
                            </a>
                        </div>
                    </div>
                </div>
                <?php
            } else {
                echo "<tr><td colspan='7'>Payment Vendor Masih Kosong</td></tr>";
            }
            ?>
        </div>
    </div>
</div>

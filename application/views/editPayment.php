<div role="main" class="ui-content">

    <div class="pages_maincontent">
        <h2 class="page_title">Form Payment</h2> 
        <div style="float: right;margin-top: 15px;margin-right: 15px">
            <a href="<?= base_url() ?>Dashboard/detailPayment?id=<?= $payment->id ?>"  class="ui-link"><img src="<?= base_url() ?>assets/images/icons/black/menu_close.png" alt="" title="" height="30px"></a>
        </div>
        <div class="page_content"> 
            <form class="form-horizontal" action="#" id="formPaymentVendor" method="post">
                <input type="hidden" class="id_wedding" name="id_wedding" value="<?= $id_wedding ?>">
                <input type="hidden" name="id_payment_pengantin" id="id_payment_pengantin">                    
                <div class="form-group row">
                    <label class="col-md-3 col-form-label" for="hf-email">Nama Vendor</label>
                    <div class="col-md-9">
                        <input readonly="readonly" name="nama_vendor_payment" id="nama_vendor_payment" type="text" required="required" class="form_input" data-role="none" placeholder="" />
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-md-3 col-form-label">CP </label>
                    <div class="col-md-9">
                        <input readonly="readonly" name="cp_payment" id="cp_payment" type="text" required="required" class="form_input" data-role="none" />
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-md-3 col-form-label">No Telepone</label>
                    <div class="col-md-9">
                        <input readonly="readonly" name="nohp_payment" id="nohp_payment" onkeypress="return isNumberKey(event)" type="text" required="required" class="form_input" data-role="none" />
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-md-3 col-form-label">Biaya</label>
                    <div class="col-md-9">
                        <input readonly="readonly" name="biaya_payment" id="biaya_payment" type="text" required="required" class="form_input" data-role="none" />
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-md-3 col-form-label">Total Pembayaran</label>
                    <div class="col-md-9">
                        <input name="terbayar" id="terbayar" type="number" required="required" class="form_input" data-role="none" />
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-md-3 col-form-label">Cara Bayar</label>
                    <div class="col-md-9">
                        <select class="form_input" data-role="none" name="cara" id="cara">
                            <option value="">-- Cara Pembayaran --</option>
                            <option value="CASH">CASH</option>
                            <option value="TRANSFER">TRANSFER</option>
                        </select>
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-md-3 col-form-label">Di Bayarkan ke</label>
                    <div class="col-md-9">
                        <select class="form_input" data-role="none" name="dibayarke" id="dibayarke">
                            <option value="">-- Di Bayar ke --</option>
                            <option value="WO">Mahkota / Tiara</option>
                            <option value="VENDOR">Langsung ke vendor</option>
                        </select>
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-md-3 col-form-label">Tanggal Pembayaran</label>
                    <div class="col-md-9">
                        <input name="tanggal_bayar" id="tanggal_bayar" type="date" required="required" class="form_input datepicker" data-role="none" />
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-md-3 col-form-label">Bukti Pembayaran</label>
                    <div class="col-md-9">
                        <input name="bukti" id="bukti" type="file" required="required" class="form_input" data-role="none" />
                        <!-- <label for="bukti" class="custom-file-upload">
                            <i class="fa fa-cloud-upload"></i> Upload Bukti
                        </label> -->
                        <br>
                        <span id="bukti_download"></span>
                    </div>
                </div>
                <!-- <div class="form-group row">
                    <label class="col-md-3 col-form-label">Status Pembayaran</label>
                    <div class="col-md-9">
                        <select class="form_input" data-role="none" name="status_pembayaran" id="status_pembayaran">
                            <option value="">-- Status Pembayaran --</option>
                            <option value="0">Belum Terbayar</option>
                            <option value="1">Menunggu Konfirmasi</option>
                            <option value="2">Terbayar Sebagian</option>
                            <option value="3">Lunas</option>
                        </select>
                    </div>
                </div> -->
                <div class="form-group row">
                    <label class="col-md-3 col-form-label"></label>
                    <div class="col-md-9">
                        <!--<button class="btn btn-secondary" type="button" data-dismiss="modal">Tutup</button>-->
                        <button class="btn btn-primary" type="button" onclick="simpanPaymentVendor()">Simpan</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

<script>

    function simpanPaymentVendor() {
//        var formData = new FormData($("#formVendor")[0]);
//        var formData = $("#formVendor").serialize();
        var id = $("#id_payment_pengantin").val();
        var formData = new FormData($("#formPaymentVendor")[0]);
        $.ajax({
            type: 'POST',
            url: '<?= base_url() ?>Dashboard/doPayment',
            processData: false,
            contentType: false,
            data: formData,
            dataType: "JSON",
            success: function (data) {
                if (data.code == "200") {
                    swal("success", "Berhasil menambah pembayaran!");

                    setTimeout(function () {
                        window.location = "<?= base_url() ?>Dashboard/detailPayment?id="+id;
                    }, 1000);

                } else {
                    swal("warning", "Gagal menambah pembayaran!");
                }
            }
        });
    }
    $(function () {
        $("#id_payment_pengantin").val('<?= $payment->id ?>');
        $("#nama_vendor_payment").val('<?= $payment->nama_vendor ?>');
        $("#cp_payment").val('<?= $payment->cp ?>');
        $("#nohp_payment").val('<?= $payment->nohp_cp ?>');
        $("#biaya_payment").val('<?= $payment->biaya ?>');
        $("#bayar_oleh").val('<?= $payment->dibayaroleh ?>');
        $("#dibayarke").val('<?= $payment->dibayarke ?>');
        $("#terbayar").val('<?= $payment->terbayar ?>');

        $("#cara").val('<?= $payment->cara_pembayaran ?>');
        $("#tanggal_bayar").val('<?= $payment->tanggal_bayar ?>');
        var bukti = '<?= $payment->bukti ?>';
        if (bukti != "" & bukti != null) {
            $("#bukti_download").html("<a href='<?= base_url() ?>../files/bukti/<?= $payment->bukti ?>'>Download</a>");
        }
        $("#status_pembayaran").val('<?= $payment->status ?>');
    });
</script>
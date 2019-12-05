<div role="main" class="ui-content">

    <div class="pages_maincontent">
        <h2 class="page_title">Undangan</h2> 
        <div style="float: right;margin-top: 15px;margin-right: 15px">
            <a href="<?= base_url() ?>Undangan"  class="ui-link"><img src="<?= base_url() ?>assets/images/icons/black/menu_close.png" alt="" title="" height="30px"></a>
        </div>
        <div class="page_content"> 
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Form Tamu Undangan</h4>
                </div>
                <div class="modal-body">
                    <form class="form-horizontal" action="#" name="formUndangan" id="formUndangan" method="post">
                        <input type="hidden" name="id_wedding" id="id_wedding" value="<?= $id_wedding ?>">
                        <input type="hidden" name="id_undangan" id="id_undangan" value="">
                        <div class="form-group row">
                            <label class="col-md-3 col-form-label" for="hf-email">Nama Lengkap</label>
                            <div class="col-md-9">
                                <input name="nama_lengkap" id="nama_lengkap" type="text" required="required" class="form_input" data-role="none" placeholder="" />
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-md-3 col-form-label" for="hf-password">Alamat </label>
                            <div class="col-md-9">
                                <input name="alamat_undangan" id="alamat_undangan" type="text" required="required" class="form_input" data-role="none" />
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-md-3 col-form-label" for="hf-password">Tipe Undangan </label>
                            <div class="col-md-9">
                                <select class="form_input" data-role="none" name="tipe_undangan" id="tipe_undangan">
                                    <option value="">-- Pilih Tipe Undangan --</option>
                                    <option value="Umum">Umum</option>
                                    <option value="Teman">Teman</option>
                                    <option value="Keluarga">Keluarga</option>
                                    <option value="VIP">VIP</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-md-3 col-form-label" for="hf-password">Nohp </label>
                            <div class="col-md-9">
                                <input name="nohp_undangan" id="nohp_undangan" type="number" required="required" class="form_input" data-role="none" />
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-md-3 col-form-label" for="hf-password"></label>
                            <div class="col-md-9">
                                <button class="btn btn-primary" type="button" onclick="simpanUndangan()">Simpan</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<script>

    function simpanUndangan() {
        var formData = new FormData($("#formUndangan")[0]);
        $.ajax({
            type: 'POST',
            url: '<?= base_url() ?>Undangan/add',
            processData: false,
            contentType: false,
            data: formData,
            dataType: "JSON",
            success: function (data) {
                document.getElementById("formUndangan").reset();
                if (data.code == "200") {
//                    swal('success', 'Berhasil menambah undangan!');

                    $.confirm({
                        title: "SUCCESS",
                        content: "Berhasil menambahkan undangan",
                        icon: 'fa fa-question-circle',
                        animation: 'scale',
                        closeAnimation: 'scale',
                        opacity: 0.5,
                        buttons: {
                            'close': {
                                text: 'Proceed',
                                btnClass: 'btn-blue',
                                action: function () {
                                    window.location = "<?= base_url() ?>Undangan";
                                }
                            }
                        }
                    });
                } else {
                    swal('error', 'Gagal menambah undangan!');
                }
            }
        });
    }
</script>
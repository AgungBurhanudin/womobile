<div role="main" class="ui-content">

    <div class="pages_maincontent">
        <h2 class="page_title">Undangan</h2> 
        <div style="float: right;margin-top: 15px;margin-right: 15px">
            <a href="<?= base_url() ?>Dashboard"  class="ui-link"><img src="<?= base_url() ?>assets/images/icons/black/menu_close.png" alt="" title="" height="30px"></a>
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
                                    <option value="Teman">Teman</option>
                                    <option value="Keluarga">Keluarga</option>
                                    <option value="VIP">VIP</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-md-3 col-form-label" for="hf-password"></label>
                            <div class="col-md-9">
                                <button class="btn btn-primary" type="submit" onclick="simpanUndangan()">Simpan</button>
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
        $('#undangan').validate({
            rules: {
                nama: {
                    required: true,
                    minlength: 2
                },
            },
            messages: {
                nama: {
                    required: "Please enter a Nama Undangan",
                    minlength: "Nama Undangan minimal 2 karakter"
                },
            },
            submitHandler: function (form) {
                $.ajax({
                    type: 'POST',
                    url: '<?= base_url() ?>Undangan/add',
                    processData: false,
                    contentType: false,
                    data: formData,
                    dataType: "JSON",
                    success: function (data) {
                        if (data.code == "200") {
                            alert("Berhasil menambah undangan!");
                        } else {
                            alert("Gagal menambah undangan!");
                        }
                    }
                });
            }
        });
    }
</script>
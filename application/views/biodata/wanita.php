<?php
if (!empty($wanita)) {
    $id = $wanita->id;
    $id_wedding = $wanita->id_wedding;
    $nama_lengkap = $wanita->nama_lengkap;
    $nama_panggilan = $wanita->nama_panggilan;
    $gender = $wanita->gender;
    $alamat_sekarang = $wanita->alamat_sekarang;
    $alamat_nikah = $wanita->alamat_nikah;
    $tempat_lahir = $wanita->tempat_lahir;
    $tanggal_lahir = $wanita->tanggal_lahir;
    $no_hp = $wanita->no_hp;
    $email = $wanita->email;
    $agama = $wanita->agama;
    $pendidikan = $wanita->pendidikan;
    $hobi = $wanita->hobi;
    $sosmed = $wanita->sosmed;
    $instagram = $wanita->instagram;
    $status = $wanita->status;
    $photo = $wanita->photo;
    if ($photo == "") {
        $photo = "user.jpg";
    }
    if (!file_exists("./files/images/" . $photo)) {
        $photo = "user.jpg";
    }
} else {
    $id = "";
    $id_wedding = "";
    $nama_lengkap = "";
    $nama_panggilan = "";
    $gender = "";
    $alamat_sekarang = "";
    $alamat_nikah = "";
    $tempat_lahir = "";
    $tanggal_lahir = "";
    $no_hp = "";
    $email = "";
    $agama = "";
    $pendidikan = "";
    $hobi = "";
    $sosmed = "";
    $instagram = "";
    $status = "";
    $photo = "user.jpg";
}
?>
<div role="main" class="ui-content">
    <div class="">
        <div class="loginform">
            <form method="POST" action="#" id="formBioWanita" enctype="multipart/form-data">
                <input type="hidden" class="id_wedding" name="id" value="<?= $id ?>">
                <input type="hidden" class="id_wedding" name="id_wedding" value="<?= $id_wedding ?>">
                <input type="hidden" class="id_wedding" name="gender_wanita" value="<?= $gender ?>">
                <label class="control-label">Foto Pengantin Wanita</label>
                <input type="file" class="" id="file-upload-wanita" name="foto_wanita" data-role="none" value="Upload Photo" accept="image/png, image/jpeg, image/gif" data-role="file"  />
                <label for="file-upload-wanita" class="custom-file-upload">
                    <i class="fa fa-cloud-upload"></i> Upload Foto
                </label>

                <label class="control-label">Nama Lengkap Pengantin Wanita</label>
                <input name="nama_lengkap_wanita" id="nama_lengkap_wanita" type="text"  class="form_input required" data-role="none" placeholder="" />


                <label class="control-label">Nama Panggilan Pengantin Wanita</label>
                <input name="nama_panggilan_wanita" id="nama_panggilan_wanita" type="text"  class="form_input required" data-role="none" />


                <label class="control-label">Alamat Sekarang Pengantin Wanita</label>
                <input name="alamat_sekarang_wanita" id="alamat_sekarang_wanita" type="text"  class="form_input required" data-role="none" />


                <label class="control-label">Alamat setelah nikah Pengantin Wanita</label>
                <input name="alamat_nikah_wanita" id="alamat_nikah_wanita" type="text"  class="form_input required" data-role="none" />


                <label class="control-label">Tempat Lahir Pengantin Wanita</label>
                <input name="tempat_lahir_wanita" id="tempat_lahir_wanita" type="text"  class="form_input required" data-role="none" />



                <label class="control-label">Tanggal Lahir Pengantin Wanita</label>
                <input name="tanggal_lahir_wanita" id="tanggal_lahir_wanita" type="date"  class="form_input required" data-role="none" />


                <label class="control-label">No Hp Pengantin Wanita</label>
                <input name="no_hp_wanita" id="no_hp_wanita" type="number"  class="form_input required" data-role="none" />

                <label class="control-label">Email Pengantin Wanita</label>
                <input name="email_wanita" id="email_wanita" type="text"  class="form_input required" data-role="none" />


                <label class="control-label">Agama Pengantin Wanita</label>
                <!--<input name="agama_wanita" id="agama_wanita" type="text"  class="form_input required" data-role="none" />-->

<!--                <select class="form_input required" data-role="none" name="agama_wanita" id="agama_wanita">
                    <option value="">-- Pilih Agama --</option>
                    <option value="Islam">Islam</option>
                    <option value="Kristen">Kristen</option>
                    <option value="Katholik">Katholik</option>
                    <option value="Budha">Budha</option>
                    <option value="Hindu">Hindu</option>
                </select>-->
                <select name="agama_wanita" id="agama_wanita" data-role="none" class="form_input">
                    <option value=""> -- Pilih Agama --</option>
                    <?php
                    foreach ($data_agama as $val) {
                        ?>
                        <option value="<?= $val->agama ?>"><?= $val->agama ?></option>
                        <?php
                    }
                    ?>
                </select>

                <label class="control-label">Pendidikan Pengantin Wanita</label>
                <input name="pendidikan_wanita" id="pendidikan_wanita" type="text"  class="form_input required" data-role="none" />


                <label class="control-label">Hobi Pengantin Wanita</label>
                <input name="hobi_wanita" id="hobi_wanita" type="text"  class="form_input required" data-role="none" />


                <label class="control-label">Akun Facebook Pengantin Wanita</label>
                <input name="sosmed_wanita" id="sosmed_wanita" type="text"  class="form_input required" data-role="none" />

                <label class="control-label">Akun Instagram Pengantin Wanita</label>
                <input name="instagram_wanita" id="instagram_wanita" type="text"  class="form_input required" data-role="none" />
                <button type="submit" onclick="simpanBioWanita()">Simpan</button>
            </form>
        </div>        
    </div>

</div>

<script>
    $("#id_wanita").val('<?= $id ?>');
    $("#id_wedding_wanita").val('<?= $id_wedding ?>');
    $("#nama_lengkap_wanita").val('<?= $nama_lengkap ?>');
    $("#nama_panggilan_wanita").val('<?= $nama_panggilan ?>');
    $("#gender_wanita").val('<?= $gender ?>');
    $("#alamat_sekarang_wanita").val('<?= $alamat_sekarang ?>');
    $("#alamat_nikah_wanita").val('<?= $alamat_nikah ?>');
    $("#tempat_lahir_wanita").val('<?= $tempat_lahir ?>');
    $("#tanggal_lahir_wanita").val('<?= toYMD($tanggal_lahir) ?>');
    $("#no_hp_wanita").val('<?= $no_hp ?>');
    $("#email_wanita").val('<?= $email ?>');
    $("#agama_wanita").val('<?= $agama ?>');
    $("#pendidikan_wanita").val('<?= $pendidikan ?>');
    $("#hobi_wanita").val('<?= $hobi ?>');
    $("#sosmed_wanita").val('<?= $sosmed ?>');
    $("#instagram_wanita").val('<?= $instagram ?>');
    $("#status_wanita").val('<?= $status ?>');
    $("#photoWanita").attr('style', 'background: url(<?= base_url() . "/files/images/" . $photo ?>) no-repeat center center; background-size:cover;');

    function simpanBioWanita() {
        $('#formBioWanita').validate({            
            submitHandler: function (form) {
                var formData = new FormData($("#formBioWanita")[0]);
                $.ajax({
                    type: 'POST',
                    url: '<?= base_url() ?>Dashboard/saveBiodataWanita',
                    processData: false,
                    contentType: false,
                    data: formData,
                    dataType: "JSON",
                    success: function (data) {
                        if (data.code == "200") {
                            // alert("Berhasil merubah biodata!");

                            $.confirm({
                                title: "SUCCESS",
                                content: "Berhasil memperbarui biodata",
                                icon: 'fa fa-question-circle',
                                animation: 'scale',
                                closeAnimation: 'scale',
                                opacity: 0.5,
                                buttons: {
                                    'close': {
                                        text: 'Proceed',
                                        btnClass: 'btn-blue',
                                        action: function () {
                                            window.location = "<?= base_url() ?>Dashboard/biodata";
                                        }
                                    }
                                }
                            });
                        } else {
                            alert("Gagal merubah biodata!");
                        }
                    }
                });
            }
        });
    }
</script>
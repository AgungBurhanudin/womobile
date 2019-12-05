<?php
if (!empty($ayahpria)) {
    $id_ayah_pria = $ayahpria->id;
    $ayah_pria = $ayahpria->nama;
    $nohp_ayah_pria = $ayahpria->no_hp;
} else {
    $id_ayah_pria = "";
    $ayah_pria = "";
    $nohp_ayah_pria = "";
}
if (!empty($ibupria)) {
    $id_ibu_pria = $ibupria->id;
    $ibu_pria = $ibupria->nama;
    $nohp_ibu_pria = $ibupria->no_hp;
} else {
    $id_ibu_pria = "";
    $ibu_pria = "";
    $nohp_ibu_pria = "";
}
if (!empty($ayahwanita)) {
    $id_ayah_wanita = $ayahwanita->id;
    $ayah_wanita = $ayahwanita->nama;
    $nohp_ayah_wanita = $ayahwanita->no_hp;
} else {
    $id_ayah_wanita = "";
    $ayah_wanita = "";
    $nohp_ayah_wanita = "";
}
if (!empty($ibuwanita)) {
    $id_ibu_wanita = $ibuwanita->id;
    $ibu_wanita = $ibuwanita->nama;
    $nohp_ibu_wanita = $ibuwanita->no_hp;
} else {
    $id_ibu_wanita = "";
    $ibu_wanita = "";
    $nohp_ibu_wanita = "";
}
?><div role="main" class="ui-content">

    <div class="pages_maincontent">
        <h2 class="page_title">Data Keluarga</h2> 
        <div style="float: right;margin-top: 15px;margin-right: 15px">
            <a href="<?= base_url() ?>Dashboard"  class="ui-link"><img src="<?= base_url() ?>assets/images/icons/black/menu_close.png" alt="" title="" height="30px"></a>
        </div>

        <div class="page_content"> 

            <div data-role="tabs" id="tabs">
                <div data-role="navbar">
                    <ul>
                        <li><a href="#one" class="ui-btn-active">Keluarga Pria</a></li>
                        <li><a href="#two">Keluarga Wanita</a></li>
                    </ul>
                </div>
                <div id="one">
                    <h3>Biodata Keluarga Pria</h3>
                    <form class="form-horizontal" action="#" id="" method="post">
                        <input type="hidden" name="id" value="<?= $id_wedding ?>">
                        <input type="hidden" name="id_wedding" value="<?= $id_wedding ?>">

                        <div class="form-group row" style="padding: 10px">
                            <label class="col-md-3 col-form-label" for="ayah_pria">Ayah</label>
                            <div class="col-md-5">
                                <input class="form_input" data-role="none" id="ayah_pria" type="text" name="ayah_pria" value="<?= $ayah_pria ?>" placeholder="Nama Ayah" autocomplete="text">                
                            </div><br>
                            <div class="col-md-4">
                                <input class="form_input" data-role="none" id="nohp_ayah_pria" type="text" value="<?= $nohp_ayah_pria ?>" onkeypress="return isNumberKey(event)"  name="nohp_ayah_pria" placeholder="No Hp Ayah" autocomplete="text">                
                            </div>
                        </div>
                        <div class="form-group row" style="padding: 10px">
                            <label class="col-md-3 col-form-label" for="ibu_pria">Ibu</label>
                            <div class="col-md-5">
                                <input class="form_input" data-role="none" id="ibu_pria" type="text" name="ibu_pria" value="<?= $ibu_pria ?>" placeholder="Nama Ibu" autocomplete="current-password">                
                            </div><br>
                            <div class="col-md-4">
                                <input class="form_input" data-role="none" id="nohp_ibu_pria" type="text" name="nohp_ibu_pria" value="<?= $nohp_ibu_pria ?>" onkeypress="return isNumberKey(event)"  placeholder="No Hp Ibu" autocomplete="text">                
                            </div>
                        </div>
                        <div style="float: right;padding: 10px">
                            <button type="button" onclick="saveOrtu('pria')" class="btn btn-mini btn-primary"><i class="fa fa-save"></i> Simpan</button>
                        </div>
                        <div class="form-group row" style="padding: 10px">
                            <h3>Saudara</h3><br>
                            <div id="dataSaudara_pria">
                                <table class="table" style="width: 100%">
                                    <tr>
                                        <td>Hubungan</td>
                                        <td>
                                            <input type="hidden" name="idsaudara_pria" id="idsaudara_pria">
                                            <select name="hubungan_pria" id="hubungan_pria" class="form_input" data-role="none">
                                                <option value="">-- Pilih Saudara --</option>
                                                <option value="KAKAK">KAKAK</option>
                                                <option value="ADIK">ADIK</option>
                                                <option value="KAKAK_IPAR">KAKAK IPAR</option>
                                                <option value="KAKAK_IPAR">ADIK IPAR</option>
                                            </select>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Nama</td>
                                        <td>
                                            <input type="text" name="nama_saudara_pria" id="nama_saudara_pria" class="form_input" data-role="none">
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>No Hp</td>
                                        <td>
                                            <input type="text" name="nohp_saudara_pria" id="nohp_saudara_pria" onkeypress="return isNumberKey(event)" class="form_input" data-role="none">
                                        </td>
                                    </tr>
                                    <tr>
                                        <td></td>
                                        <td>
                                            <button type="button" onclick="saveSaudara('pria')" class="btn btn-mini btn-primary"><i class="fa fa-plus"></i> Simpan </button>
                                        </td>
                                    </tr>
                                </table>
                                <ul class="features_list_detailed">
                                    <?php
                                    $no = 1;
                                    foreach ($saudara_pria as $val) {
                                        ?>
                                        <li>
                                            <div class="feat_small_icon"><img src="<?= base_url() ?>assets/images/icons/black/user.png" alt="" title=""></div>
                                            <div class="feat_small_details">
                                                <h4><?= $val->hubungan ?></h4>
                                                <a href="#" data-transition="slidefade" class="ui-link">
                                                    <?= $val->nama ?><br>
                                                    <?= $val->no_hp ?><br>
                                                </a>
                                            </div>
                                            <div class="view_more"><a href="#" onclick="deleteSaudara('pria', '<?= $val->id ?>')" data-transition="slidedown" class="ui-link"><img src="<?= base_url() ?>assets/images/icons/black/menu_close.png" alt="" title="Delete Vendor"></a></div>

                                        </li> 
                                        <?php
                                    }
                                    ?>
                                </ul>
                            </div>
                        </div>
                    </form>
                    </p>
                </div>

                <div id="two">
                    <h3>Biodata Keluarga Wanita</h3>
                    <form class="form-horizontal" action="#" id="" method="post">
                        <input type="hidden" name="id" value="<?= $id_wedding ?>">
                        <input type="hidden" name="id_wedding" value="<?= $id_wedding ?>">

                        <div class="form-group row" style="padding: 10px">
                            <label class="col-md-3 col-form-label" for="ayah_wanita">Ayah</label>
                            <div class="col-md-5">
                                <input class="form_input" data-role="none" id="ayah_wanita" type="text" name="ayah_wanita" value="<?= $ayah_wanita ?>" placeholder="Nama Ayah" autocomplete="text">                
                            </div><br>
                            <div class="col-md-4">
                                <input class="form_input" data-role="none" id="nohp_ayah_wanita" type="text" value="<?= $nohp_ayah_wanita ?>" onkeypress="return isNumberKey(event)"  name="nohp_ayah_wanita" placeholder="No Hp Ayah" autocomplete="text">                
                            </div>
                        </div>
                        <div class="form-group row" style="padding: 10px">
                            <label class="col-md-3 col-form-label" for="ibu_wanita">Ibu</label>
                            <div class="col-md-5">
                                <input class="form_input" data-role="none" id="ibu_wanita" type="text" name="ibu_wanita" value="<?= $ibu_wanita ?>" placeholder="Nama Ibu" autocomplete="current-password">                
                            </div><br>
                            <div class="col-md-4">
                                <input class="form_input" data-role="none" id="nohp_ibu_wanita" type="text" name="nohp_ibu_wanita" value="<?= $nohp_ibu_wanita ?>" onkeypress="return isNumberKey(event)"  placeholder="No Hp Ibu" autocomplete="text">                
                            </div>
                        </div>
                        <div style="float: right;padding: 10px">
                            <button type="button" onclick="saveOrtu('wanita')" class="btn btn-mini btn-primary"><i class="fa fa-save"></i> Simpan</button>
                        </div>
                        <div class="form-group row" style="padding: 10px">
                            <h3>Saudara</h3><br>
                            <div id="dataSaudara_wanita">
                                <table class="table" style="width: 100%">
                                    <tr>
                                        <td>Hubungan</td>
                                        <td>
                                            <input type="hidden" name="idsaudara_wanita" id="idsaudara_wanita">
                                            <select name="hubungan_wanita" id="hubungan_wanita" class="form_input" data-role="none">
                                                <option value="">-- Pilih Saudara --</option>
                                                <option value="KAKAK">KAKAK</option>
                                                <option value="ADIK">ADIK</option>
                                                <option value="KAKAK_IPAR">KAKAK IPAR</option>
                                                <option value="KAKAK_IPAR">ADIK IPAR</option>
                                            </select>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Nama</td>
                                        <td>
                                            <input type="text" name="nama_saudara_wanita" id="nama_saudara_wanita" class="form_input" data-role="none">
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>No Hp</td>
                                        <td>
                                            <input type="text" name="nohp_saudara_wanita" id="nohp_saudara_wanita" onkeypress="return isNumberKey(event)" class="form_input" data-role="none">
                                        </td>
                                    </tr>
                                    <tr>
                                        <td></td>
                                        <td>
                                            <button type="button" onclick="saveSaudara('wanita')" class="btn btn-mini btn-primary"><i class="fa fa-plus"></i> Simpan </button>
                                        </td>
                                    </tr>
                                </table>
                                <ul class="features_list_detailed">
                                    <?php
                                    $no = 1;
                                    foreach ($saudara_wanita as $val) {
                                        ?>
                                        <li>
                                            <div class="feat_small_icon"><img src="<?= base_url() ?>assets/images/icons/black/user.png" alt="" title=""></div>
                                            <div class="feat_small_details">
                                                <h4><?= $val->hubungan ?></h4>
                                                <a href="#" data-transition="slidefade" class="ui-link">
                                                    <?= $val->nama ?><br>
                                                    <?= $val->no_hp ?><br>
                                                </a>
                                            </div>
                                            <div class="view_more"><a href="#" onclick="deleteSaudara('wanita', '<?= $val->id ?>')" data-transition="slidedown" class="ui-link"><img src="<?= base_url() ?>assets/images/icons/black/menu_close.png" alt="" title="Delete Vendor"></a></div>

                                        </li> 
                                        <?php
                                    }
                                    ?>
                                </ul>
                            </div>
                        </div>
                    </form>
                    </p>
                </div>
            </div>
        </div>
    </div>
</div>
<script>

    function saveOrtu(tipe) {
        var id = $("#id").val();
        var id_wedding = $("#id_wedding").val();
        var ayah = $("#ayah_" + tipe).val();
        var ibu = $("#ibu_" + tipe).val();
        var nohpayah = $("#nohp_ayah_" + tipe).val();
        var nohpibu = $("#nohp_ibu_" + tipe).val();
        $.ajax({
            url: "<?= base_url() ?>Keluarga/saveOrtu",
            data: "id=" + id + "&id_wedding=" + id_wedding + "&ayah=" + ayah + "&ibu=" + ibu
                    + "&nohpayah=" + nohpayah + "&nohpibu=" + nohpibu + "&tipe=" + tipe,
            type: "POST",
            dataType: "JSON",
            success: function (data) {
                if (data.code == 200) {
//                    alert("Berhasil merubah Orang Tua");

                    $.confirm({
                        title: "SUCCESS",
                        content: "Berhasil merubah data",
                        icon: 'fa fa-question-circle',
                        animation: 'scale',
                        closeAnimation: 'scale',
                        opacity: 0.5,
                        buttons: {
                            'close': {
                                text: 'Proceed',
                                btnClass: 'btn-blue',
                                action: function () {
                                    $("#tabKeluarga_" + tipe).load(location.href + " #tabKeluarga_" + tipe);
                                }
                            }
                        }
                    });

                } else {
                    alert("Gagal menambah Orang Tua");
                }
            }
        });
    }
    function editSaudara(tipe, id) {
        $.ajax({
            url: "<?= base_url() ?>Keluarga/getKeluarga?id=" + id,
            dataType: "JSON",
            success: function (data) {
                $("#idsaudara_" + tipe).val(data.id);
                $("#hubungan_" + tipe).val(data.hubungan);
                $("#nama_saudara_" + tipe).val(data.nama);
                $("#nohp_saudara_" + tipe).val(data.no_hp);
            }
        });
    }
    function deleteSaudara(tipe, id) {
        $.confirm({
            title: "CONFIRM",
            content: "Apakah anda yakin akan menghapus data ini?",
            icon: 'fa fa-question-circle',
            animation: 'scale',
            closeAnimation: 'scale',
            opacity: 0.5,
            buttons: {
                'Confirm': {
                    text: 'Confirm',
                    btnClass: 'btn-warning',
                    action: function () {
                        $.ajax({
                            url: "<?= base_url() ?>Keluarga/deleteKeluarga?id=" + id,
                            dataType: "JSON",
                            success: function (data) {
                                $("#dataSaudara_" + tipe).load(location.href + " #dataSaudara_" + tipe);
                            }
                        });
                    }
                },
                cancel: function () {
                    return false;
                }
            }
        });

    }
    function saveSaudara(tipe) {
        var id = $("#id").val();
        var id_wedding = $("#id_wedding").val();
        var idsaudara = $("#idsaudara_" + tipe).val();
        var hubungan = $("#hubungan_" + tipe).val();
        var nama = $("#nama_saudara_" + tipe).val();
        var nohp = $("#nohp_saudara_" + tipe).val();
        $.ajax({
            url: "<?= base_url() ?>Keluarga/saveSaudara",
            data: "id=" + id + "&id_wedding=" + id_wedding + "&idsaudara=" + idsaudara + "&hubungan=" + hubungan
                    + "&nama=" + nama + "&nohp=" + nohp + "&tipe=" + tipe,
            type: "POST",
            dataType: "JSON",
            success: function (data) {
                if (data.code == 200) {

                    $.confirm({
                        title: "SUCCESS",
                        content: "Berhasil merubah data",
                        icon: 'fa fa-question-circle',
                        animation: 'scale',
                        closeAnimation: 'scale',
                        opacity: 0.5,
                        buttons: {
                            'close': {
                                text: 'Proceed',
                                btnClass: 'btn-blue',
                                action: function () {
                                    $("#dataSaudara_" + tipe).load(location.href + " #dataSaudara_" + tipe);
                                    $("#idsaudara_" + tipe).val('');
                                    $("#hubungan_" + tipe).val('');
                                    $("#nama_saudara_" + tipe).val('');
                                    $("#nohp_saudara_" + tipe).val('');
                                }
                            }
                        }
                    });
                } else {
                    alert("Gagal merubah saudara");
                }
            }
        });
    }
</script>

<div role="main" class="ui-content">

    <div class="pages_maincontent">
        <h2 class="page_title">Paket Acara</h2> 
        <div style="float: right;margin-top: 15px;margin-right: 15px">
            <a href="<?= base_url() ?>Dashboard" data-rel="back" class="ui-link"><img src="<?= base_url() ?>assets/images/icons/black/menu_close.png" alt="" title="" height="30px"></a>
        </div>
        <div class="page_content"> 
            <input type="hidden" name="id_wedding" id="id_wedding" value="<?= $id_wedding ?>">
            
        </div>
        <div class="page_content"> 
            <input type="hidden" name="id_wedding" id="id_wedding" value="<?= $id_wedding ?>">
            <?php
            foreach ($acara as $val) {
                ?>
                <div data-role="collapsible" data-content-theme="false">
                    <h4><a onclick="getFieldAcara('<?= $val->id_field ?>')" href="#acara_<?= $val->id_field ?>" ><?= $val->nama_acara ?></a></h4>
                    <p><div id="acara_<?= $val->id_field ?>"></div></p>
                </div>
                <?php
            }
            ?>
        </div>  
    </div>
</div>
<script>
//    $("#tabAcara").scrollingTabs();

    function getFieldAcara(id) {
        $.ajax({
            url: "<?= base_url() ?>Wedding/acara/field?id=" + id,
            success: function (data) {
                $("#acara_" + id).html(data);
            }
        });

    }

    function saveacara(id, value, type = null) {
        var id_wedding = $("#id_wedding").val();
        if (type == "addabletext") {
            var dataForm = new FormData($("#form" + value)[0]);
            dataForm.append('id', id);
            dataForm.append('id_wedding', id_wedding);
            dataForm.append('type', type);
            dataForm.append('value', value);
            $.ajax({
                url: "<?= base_url() ?>Wedding/acara/add",
                type: "POST",
                data: dataForm,
                processData: false,
                contentType: false,
                success: function (data) {
                }
            });
        } else {
            dataForm = "id=" + id + "&value=" + value + "&id_wedding=" + id_wedding;
            $.ajax({
                url: "<?= base_url() ?>Wedding/acara/add",
                type: "POST",
                data: dataForm,
                success: function (data) {
                }
            });
    }
    }
</script>
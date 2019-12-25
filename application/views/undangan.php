<div role="main" class="ui-content">

    <div class="pages_maincontent">
        <h2 class="page_title">Undangan</h2> 
        <div style="float: right;margin-top: 15px;margin-right: 15px">
            <a href="<?= base_url() ?>Dashboard"  class="ui-link"><img src="<?= base_url() ?>assets/images/icons/black/menu_close.png" alt="" title="" height="30px"></a>
        </div>
        <div class="page_content"> 

            <h3>Daftar Tamu Undangan</h3>
            <ul class="features_list_detailed">
                <?php
                $no = 1;
                if (!empty($undangan)) {
                    foreach ($undangan as $val) {
                        ?>
                        <li>
                            <div class="feat_small_icon">
                                <img src="<?= base_url() ?>assets/images/icons/black/user.png" alt="" title="" style="height: 30px">
                            </div>
                            <div class="feat_small_details">
                                <?= $val->nama ?>
                            </div>
                            <div class="view_more" style=" position: absolute; right: 10px;margin-top: -10px; margin-bottom: 0"><a href="#" onclick="deleteUndangan('<?= $val->id ?>')" data-transition="slidedown" class="ui-link"><img src="<?= base_url() ?>assets/images/icons/black/trash.png" alt="" title="Delete Undangan"></a>
                            </div>
                        </li>
                        <?php
                    }
                } else {
                    echo "<tr><td colspan='7'>Data Undangan Masih Kosong</td></tr>";
                }
                ?>
            </ul>
            <div class="clear"></div>
            <div id="loadMore">
                <a href="<?= base_url() ?>Undangan/addUndangan">
                    <img src="<?= base_url() ?>assets/images/load_posts.png" alt="" title="">
                </a>
            </div>
        </div>
    </div>
</div>
<script>
    function deleteUndangan(id) {
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
                            url: "<?= base_url() ?>Undangan/delete?id=" + id,
                            success: function (data) {
                                window.location = "<?= base_url() ?>Undangan";
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
</script>
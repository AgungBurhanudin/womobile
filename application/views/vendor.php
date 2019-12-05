<div role="main" class="ui-content">
    <div class="pages_maincontent">
        <h2 class="page_title">Vendor</h2> 
        <div style="float: right;margin-top: 15px;margin-right: 15px">
            <a href="<?= base_url() ?>Dashboard"  class="ui-link"><img src="<?= base_url() ?>assets/images/icons/black/menu_close.png" alt="" title="" height="30px"></a>
        </div>
        <div class="page_content"> 

            <ul class="features_list_detailed">

                <?php
                $no = 1;
                if (!empty($vendor)) {
                    foreach ($vendor as $val) {
                        ?>
                        <li>
                            <div class="feat_small_icon"><img src="<?= base_url() ?>assets/images/icons/black/user.png" alt="" title=""></div>
                            <div class="feat_small_details">
                                <h4><?= $val->nama_vendor ?></h4>
                                <a href="#" data-transition="slidefade" class="ui-link">
                                    <?= $val->cp ?><br>
                                    <?= $val->nohp_cp ?><br>
                                    <?= $val->biaya ?>
                                </a>
                            </div>
                            <div class="view_more"><a href="#" onclick="deleteVendor('<?= $val->id ?>')" data-transition="slidedown" class="ui-link"><img src="<?= base_url()?>assets/images/icons/black/menu_close.png" alt="" title="Delete Vendor"></a></div>

                        </li> 

                        <?php
                    }
                } else {
                    echo "<li>Data Vendor Masih Kosong</li>";
                }
                ?>

            </ul>
            <div class="clear"></div>
            <div id="loadMore">
                <a href="<?= base_url() ?>Dashboard/addVendor">
                    <img src="<?= base_url() ?>assets/images/load_posts.png" alt="" title="">
                </a>
            </div>
        </div>
    </div>

</div>

<script>
    function deleteVendor(id) {
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
                            url: "<?= base_url() ?>Wedding/vendor/delete?id=" + id,
                            success: function (data) {
                                window.location = "<?= base_url() ?>Dashboard/vendor";
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
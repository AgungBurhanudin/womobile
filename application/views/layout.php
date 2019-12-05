<div role="main" class="ui-content">

    <div class="pages_maincontent">
        <h2 class="page_title">Layout</h2> 
        <div style="float: right;margin-top: 15px;margin-right: 15px">
            <a href="<?= base_url() ?>Dashboard"  class="ui-link"><img src="<?= base_url() ?>assets/images/icons/black/menu_close.png" alt="" title="" height="30px"></a>
        </div>
        <div class="page_content"> 
            <?php
            if (empty($layout)) {
                echo "Layout belum di upload";
            } else {
                foreach ($layout as $v) {
                    ?>
                    <h1><?= $v->nama_layout ?></h1>
                    <img src="<?= base_url() ?>../files/images/<?= $v->layout ?>" width="100%">

                    <?php
                }
            }
            ?>

        </div>
    </div>
</div>
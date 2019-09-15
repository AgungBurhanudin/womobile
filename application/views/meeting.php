<div role="main" class="ui-content">


    <div class="pages_maincontent">

        <h2 class="page_title">Jadwal Meeting</h2> 
        <div style="float: right;margin-top: 15px;margin-right: 15px">
            <a href="<?= base_url() ?>Dashboard"  class="ui-link"><img src="<?= base_url() ?>assets/images/icons/black/menu_close.png" alt="" title="" height="30px"></a>
        </div>

        <div class="blog_content"> 

            <div class="blog-posts">
                <ul class="posts">
                    <?php
                    if (!empty($meeting)) {
                        foreach ($meeting as $val) {
                            $color = "#f4787a";
                            if ($val->tanggal == date('Y-m-d')) {
                                $color = "#1df9dac7";
                            } else if ($val->tanggal < date('Y-m-d')) {
                                $color = "#e7e7e7";
                            }
                            ?>
                            <li style="display: inline-block; background-color: <?= $color ?>">
                                <div class="post_entry" style="text-align: center">
                                    <h1>INFO</h1>
                                    <h1>Wedding <?= $wedding->pengantin_pria ?> & <?= $wedding->pengantin_wanita ?></h1>                                    
                                    <h1><?= DateToIndo($wedding->tanggal) ?></h1>
                                    <h1><?= $wedding->tempat ?>, <?= $wedding->alamat ?></h1>

                                    Mohon kehadirannya pada :
                                    <div >
                                        <h2><?= DateToIndo($val->tanggal) ?></h2>
                                        <h2>jam <?= $val->waktu ?></h2>
                                        <h2>tempat <?= $val->tempat ?><br><?= $val->keperluan ?></h2>
                                    </div>
                                </div>
                            </li>
                            <?php
                        }
                    } else {
                        echo "<li>Data Meeting Masih Kosong</li>";
                    }
                    ?>
                </ul>

                <div class="clear"></div>  
                <div id="loadMore"><img src="images/load_posts.png" alt="" title=""></div> 
                <div id="showLess"><img src="images/load_posts.png" alt="" title=""></div> 
            </div>

        </div>

    </div>


</div>
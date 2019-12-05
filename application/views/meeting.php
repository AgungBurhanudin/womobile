<style>
    .meeting{
        margin-bottom: 10px;
    }
    .meeting .head{
        width: 100%;
        height: 35px;
        background-color: #f4787a;
        border-top-right-radius: 15px;
        border-top-left-radius: 15px;
        font-weight: bold;
        text-align: center;
        line-height: 35px;
        border: 1px solid #f4787a;
    }
    .meeting .body{
        width: 100%;
        height: auto;
        border-right: 1px solid #f4787a;
        border-left: 1px solid #f4787a;
        border-bottom: 1px solid #f4787a;
        text-align: center;
        border-bottom-right-radius: 15px;
        border-bottom-left-radius: 15px;
    }
    .meeting .head-old{
        width: 100%;
        height: 35px;
        background-color: #e7e7e7;
        border-top-right-radius: 15px;
        border-top-left-radius: 15px;
        font-weight: bold;
        text-align: center;
        line-height: 35px;
        border: 1px solid #e7e7e7;
    }
    .meeting .body-old{
        width: 100%;
        height: auto;
        border-right: 1px solid #e7e7e7;
        border-left: 1px solid #e7e7e7;
        border-bottom: 1px solid #e7e7e7;
        text-align: center; 
        border-bottom-right-radius: 15px;
        border-bottom-left-radius: 15px;
    }

    .meeting .head-today{
        width: 100%;
        height: 35px;
        background-color: #7df34c;
        border-top-right-radius: 15px;
        border-top-left-radius: 15px;
        font-weight: bold;
        text-align: center;
        line-height: 35px;
        border: 1px solid #7df34c;
    }
    .meeting .body-today{
        width: 100%;
        height: auto;
        border-right: 1px solid #7df34c;
        border-left: 1px solid #7df34c;
        border-bottom: 1px solid #7df34c;
        text-align: center; 
        border-bottom-right-radius: 15px;
        border-bottom-left-radius: 15px;
    }
</style>
<div role="main" class="ui-content">


    <div class="pages_maincontent">

        <h2 class="page_title">Jadwal Meeting</h2> 
        <div style="float: right;margin-top: 15px;margin-right: 15px">
            <a href="<?= base_url() ?>Dashboard"  class="ui-link"><img src="<?= base_url() ?>assets/images/icons/black/menu_close.png" alt="" title="" height="30px"></a>
        </div>

        <div class="page_content"> 

            <?php
            if (!empty($meeting)) {
                foreach ($meeting as $val) {
                    $class = "";
                    if ($val->tanggal == date('Y-m-d')) {
                        $class = "-today";
                    } else if ($val->tanggal < date('Y-m-d')) {
                        $class = "-old";
                    }
                    ?>

                    <div class="meeting">
                        <div class="head<?= $class ?>"><?= DateToIndo($val->tanggal) ?></div>
                        <div class="body<?= $class ?>">
                            <div style="padding:10px;">
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
                        </div>
                    </div>                        
                    <?php
                }
            } else {
                echo "<li>Data Meeting Masih Kosong</li>";
            }
            ?>

            <div class="clear"></div>  
        </div>

    </div>
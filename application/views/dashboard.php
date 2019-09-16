

<div role="main" class="ui-content">
    <div class="pages_maincontent">
        <div class="featured_image">

            <?php
            if (empty($wedding) || $wedding->prewed == "") {
                ?>
                <img src="<?= base_url() ?>assets/images/back.jpg" alt="" title="">
                <?php
            } else {
                ?>
                <img src="<?= base_url() ?>../files/images/<?= $wedding->prewed ?>" alt="" title="" />
                <?php
            }
            ?>
            
        </div>
        <div class="labelCountDown" id="countdownLabel">-- Hari -- Jam</div>
        <!--        <div class="heart">
                    
                </div>-->
        <div id="countdown">
            <?= $wedding->pengantin_pria ?> & <?= $wedding->pengantin_wanita ?>
        </div>
        <div style="clear: both"></div>
        <div class="page_content" style="margin-top: -60px"> 
            <a href="<?= base_url() ?>Dashboard/biodata">
                <div class="icon-wrap">
                    <div>
                        <img src="<?= base_url() ?>assets/images/icons/black/user.png" alt="" title="" />
                    </div>
                    <span class="icon-label">Biodata</span>
                </div>
            </a>

<a href="<?= base_url() ?>Dashboard/vendor">
    <div class="icon-wrap">
        <div>
            <img src="<?= base_url() ?>assets/images/icons/black/team.png" alt="" title="" />

        </div>
        <span class="icon-label">Vendor</span>
    </div>
</a>

<a href="<?= base_url() ?>Dashboard/layout">
    <div class="icon-wrap">
        <div>
            <img src="<?= base_url() ?>assets/images/icons/black/docs.png" alt="" title="" />
        </div>
        <span class="icon-label">Lampiran</span>
    </div>
</a>

            <div style="clear: both"></div>
            <a href="<?= base_url() ?>Dashboard/meeting">
                <div class="icon-wrap">
                    <div>
                        <img src="<?= base_url() ?>assets/images/icons/black/blog.png" alt="" title="" />

                    </div>
                    <span class="icon-label">Meeting</span>
                </div>
            </a>

            <a href="<?= base_url() ?>Dashboard/payment">
                <div class="icon-wrap">
                    <div>
                        <img src="<?= base_url() ?>assets/images/icons/black/contact.png" alt="" title="" />
                    </div>
                    <span class="icon-label">Payment</span>
                </div>
            </a>

            <a href="<?= base_url() ?>Dashboard/contactus">
                <div class="icon-wrap">
                    <div>
                        <img src="<?= base_url() ?>assets/images/icons/black/phone.png" alt="" title="" />
                    </div>
                    <span class="icon-label">Contact Us</span>
                </div>
            </a>
            <br>
            <br>
            <br>
            <hr>
            <h3>Aktivitas Terakhir</h3>
            <ul class="features_list">
                <?php
                foreach ($logs as $l) {
                    ?>
                    <li><a href="#" data-transition="slidefade" class="ui-link"><span> > <?= $l->user_real_name ?> <?= $l->deskripsi ?></span></a></li>
                        <?php
                    }
                    ?>
            </ul>
        </div>
    </div>

</div><!-- /content -->
<script>

// Set the date we're counting down to
    var countDownDate = new Date("<?= $wedding->tanggal ?> <?= $wedding->waktu ?>").getTime();

// Update the count down every 1 second
        var x = setInterval(function () {

            // Get today's date and time
            var now = new Date().getTime();

            // Find the distance between now and the count down date
            var distance = countDownDate - now;

            // Time calculations for days, hours, minutes and seconds
            var days = Math.floor(distance / (1000 * 60 * 60 * 24));
            var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
            var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
            var seconds = Math.floor((distance % (1000 * 60)) / 1000);

            $("#countdownLabel").html(days + " Hari " + hours + " Jam ");
//                + minutes + " Menit " + seconds + " Detik ");

            if (distance < 0) {
                clearInterval(x);
                $("#countdownLabel").html("Waktu Pengisian Data Sudah Habis");
                $("#detail_wedding *").attr("disabled", "disabled").off('click');
            }
        }, 1000);
        $(function () {
//        $('#tabAcara').scrollingTabs();
//        $('#tabPanitia').scrollingTabs();
//        $('#tabTambahan').scrollingTabs();
//        $('#tabUpacara').scrollingTabs();
        });
</script>
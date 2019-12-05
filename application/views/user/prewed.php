<div role="main" class="ui-content">

    <div class="pages_maincontent">
        <h2 class="page_title">Pre Wedding Photo</h2> 
        <div style="float: right;margin-top: 15px;margin-right: 15px">
            <a href="<?= base_url() ?>Dashboard"  class="ui-link"><img src="<?= base_url() ?>assets/images/icons/black/menu_close.png" alt="" title="" height="30px"></a>
        </div>
        <div class="page_content"> 

            <form method="POST" id="formPrewed" action="#" enctype="multipart/form-data">
                <input type="hidden" class="id_wedding" name="id_wedding" value="<?= $wedding->id ?>">
                <div>
                    <div class="col-sm-6 imgUp" style="margin: 0 auto;">
                        <div class="imagePreview"></div>
                        <label class="btn btn-upload btn-primary">
                            <input type="file" id="file-upload-pria" name="prewed" class="" data-role="none" value="Upload Photo" accept="image/png, image/jpeg, image/gif" >
                            <label for="file-upload-pria" class="custom-file-upload">
                                <i class="fa fa-cloud-upload"></i> Upload Pre Wedding Photo
                            </label>
                        </label>
                    </div>
                </div>
                <button class="btn btn-primary nextBtn pull-right" onclick="simpanPrewed()" type="button">Upload</button>
            </form>
            <?php
            if (empty($wedding) || $wedding->prewed == "") {
                echo "Data is empty";
            } else {
                ?>
                <img src="<?= base_url() ?>../files/images/<?= $wedding->prewed ?>" width="100%">

                <?php
            }
            ?>

        </div>
    </div>
</div>

<script>
    function simpanPrewed() {
        var formData = new FormData($("#formPrewed")[0]);
        $.ajax({
            type: 'POST',
            url: '<?= base_url() ?>User/savePrewed',
            processData: false,
            contentType: false,
            data: formData,
            dataType: "JSON",
            success: function (data) {
                if (data.code == "200") {
                    window.location = "<?= base_url() ?>User/prewed";
                    // $.confirm({
                    //     title: "SUCCESS",
                    //     content: "Berhasil mengupload photo prewed",
                    //     icon: 'fa fa-question-circle',
                    //     animation: 'scale',
                    //     closeAnimation: 'scale',
                    //     opacity: 0.5,
                    //     buttons: {
                    //         'close': {
                    //             text: 'Proceed',
                    //             btnClass: 'btn-blue',
                    //             action: function () {
                    //                 window.location = "<?= base_url() ?>User/prewed";
                    //             }
                    //         }
                    //     }
                    // });
                } else {

                }
            }
        });
    }
</script>
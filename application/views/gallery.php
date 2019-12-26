<div role="main" class="ui-content">

    <div class="pages_maincontent">
        <h2 class="page_title">Gallery Photo</h2> 
        <div style="float: right;margin-top: 15px;margin-right: 15px">
            <a href="<?= base_url() ?>Dashboard"  class="ui-link"><img src="<?= base_url() ?>assets/images/icons/black/menu_close.png" alt="" title="" height="30px"></a>
        </div>
        <div class="page_content"> 

            <form method="POST" id="formGallery" action="#" enctype="multipart/form-data">
                <input type="hidden" class="id_wedding" name="id_wedding" value="<?= $id ?>">
                <div>
                    <div class="col-sm-6 imgUp" style="margin: 0 auto;">
                        <div class="imagePreview"></div>
                        <label class="btn btn-upload btn-primary">
                            <input type="file" id="file-upload-pria" name="file" class="" data-role="none" value="Upload Photo" accept="image/png, image/jpeg, image/gif" >
                            <!-- <label for="file-upload-pria" class="custom-file-upload">
                                <i class="fa fa-cloud-upload"></i> Upload Pre Wedding Photo
                            </label> -->
                        </label>
                    </div>
                </div>
                <button class="btn btn-primary nextBtn pull-right" onclick="simpanGallery()" type="button">Upload</button>
            </form>
            <?php
            if (empty($gallery)) {
                echo "Data is empty";
            } else {
                foreach($gallery as $val){
                ?>
                <img src="<?= base_url() ?>../files/images/<?= $val->file ?>" width="100%">
                    <a href="#" onclick="deleteImage('<?= $val->id ?>')">Hapus</a>
                <?php
                }
            }
            ?>

        </div>
    </div>
</div>

<script>
    function simpanGallery() {
        var formData = new FormData($("#formGallery")[0]);
        $.ajax({
            type: 'POST',
            url: '<?= base_url() ?>Gallery/saveImage',
            processData: false,
            contentType: false,
            data: formData,
            dataType: "JSON",
            success: function (data) {
                if (data.code == "200") {
                    window.location = "<?= base_url() ?>Gallery?_=" + new Date().getTime();
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

    function deleteImage(id){
        $.ajax({
            url : "<?= base_url() ?>Gallery/deleteImage?id=" + id,
            success:function(data){
                window.location = "<?= base_url() ?>Gallery?_=" + new Date().getTime();
            }
        })
    }
</script>
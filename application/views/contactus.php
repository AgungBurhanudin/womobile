<div role="main" class="ui-content">

    <div class="pages_maincontent">
        <h2 class="page_title">Contact Us</h2> 
        <div style="float: right;margin-top: 15px;margin-right: 15px">
            <a href="<?= base_url() ?>Dashboard"  class="ui-link"><img src="<?= base_url() ?>assets/images/icons/black/menu_close.png" alt="" title="" height="30px"></a>
        </div>
        <div class="page_content"> 


            <h3>Our Location</h3>

            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2025591.0488777289!2d110.42933626511476!3d-7.439505389389102!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e708c9b78ceac65%3A0xecabb5c2ac704a20!2sMahkota%20Wedding%20%26%20Event%20Organizer!5e0!3m2!1sen!2sid!4v1567045010373!5m2!1sen!2sid" width="100%" height="auto" frameborder="0" style="border:0;" allowfullscreen=""></iframe>

            <div class="contact_info">
                <h4><?= $company->nama ?></h4>
                Address: <?= $company->alamat ?><br>
                Email: <?= $company->email ?> <br>
                Mobile: <?= $company->notelp ?>
            </div> 

            <div class="call_button"><a target="_blank" href="tel:+<?= $company->notelp ?>" class="external ui-link">Call Us Now!</a></div>  <br>
            <div class="wa_button"><a target="_blank" href="https://wa.me/<?= $company->notelp ?>" class="external ui-link">Message with WhatsApp</a></div>  
            <hr>
<!--            <h3 id="Note">Send Message</h3>
            <div class="contactform">
                <form class="cmxform" id="ContactForm" method="post" action="" novalidate="novalidate">
                    <label>Name:</label>
                    <input type="text" name="ContactName" id="ContactName" value="" class="form_input required" data-role="none">
                    <label>Email:</label>
                    <input type="text" name="ContactEmail" id="ContactEmail" value="" class="form_input required email" data-role="none">
                    <label>Message:</label>
                    <textarea name="ContactComment" id="ContactComment" class="form_textarea textarea required" rows="" cols="" data-role="none"></textarea>
                    <input type="submit" name="submit" class="form_submit" id="submit" data-role="none" value="Send">
                    <input class="" type="hidden" name="to" value="youremail@yourwebsite.com">
                    <input class="" type="hidden" name="subject" value="Contacf form message">
                    <label id="loader" style="display:none;"><img src="images/loader.gif" alt="Loading..." id="LoadingGraphic"></label>
                </form>
            </div>-->
        </div>
    </div>
</div>
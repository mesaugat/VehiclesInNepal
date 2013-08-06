<!-- CONTENT -->
<div id="content">
    <!-- PAGE WRAPPER -->
    <div id="page-wrapper">
        <h3>Contact Us</h3><br />
        <div id="contact_us-form">
        <p id="form-header"><b>Send us a message!</b></p>
        <?php 
            if (isset($error)) { 
                echo "<div class='error'>";
                echo "<p>" . $error . "</p>";
                echo "</div>"; 
            } 
            elseif (isset($success)) { 
                echo "<div class='success'>";
                echo "<p>" . $success . "</p>"; 
                echo "</div>";
            } 
        ?>
        <form action="<?= base_url() ?>contact" method="post">
            <fieldset>
                <label for="name">Name:</label><br/>
                <input id="form-input" type="text" name="name" placeholder="Enter your full name" required />
                <br/><br/>
                <label for="email">Email:</label><br/>
                <input id="form-input" type="email" name="email" placeholder="Enter your email address" />
                <br/><br/>
                <label for="message">Message:</label><br/>
                <textarea name="message" placeholder="What's your message?" required></textarea>
                <br/>
                <input id="form-submit" type="submit" name="Send" value="Send Message" />
            </fieldset>
        </form>
        </div>
        <!-- CONTACT -->
        <div id="contact-info-trp">
            <div id="contact-info-top">
                <div id="contact-information">
                    <h3>Tribhuvan Raj Pokharel</h3><br/>
                    <p>&nbsp;&nbsp;&nbsp;&nbsp;<?= mailto('trpansh1989@gmail.com', 'trpansh1989@gmail.com') ?></p>
                    <p>&nbsp;&nbsp;&nbsp;&nbsp;Young Innovations Pvt. Ltd.</p>
                </div><br/>
                <div class="circular-trp-small"></div>
                <div id="socialnetwork">
                    <a href="http://twitter.com/trpansh" target="_blank"><img src='<?= base_url() ?>assets/img/twitter-trp.png' height="50" width="50"></a>
                    <a href="http://www.facebook.com/tribhuvanraj.pokharel" target="_blank"><img src='<?= base_url() ?>assets/img/facebook-trp.png' height="50" width="50"></a>
                    <a href="http://np.linkedin.com/pub/tribhuvan-raj-pokharel/29/631/3a8" target="_blank"><img src='<?= base_url() ?>assets/img/linkedin-trp.png' height="50" width="50"></a>

                </div>
            </div>
        </div>
        <div id="contact-info-saugat">
            <div id="contact-info-bottom">
                <div id="contact-information">
                    <h3>Saugat Acharya</h3><br/>
                    <p>&nbsp;&nbsp;&nbsp;&nbsp;<?= mailto('acharya_saugat@hotmail.com', 'acharya_saugat@hotmail.com') ?></p>
                    <p>&nbsp;&nbsp;&nbsp;&nbsp;Young Innovations Pvt. Ltd.</p>
                </div><br/>
                <div class="circular-saugat-small"></div>
                <div id="socialnetwork">
                    <a href="http://twitter.com/acharya_saugat" target="_blank"><img src='<?= base_url() ?>assets/img/twitter-saugat.png' height="50" width="50"></a>
                    <a href="http://facebook.com/Liverpool.Rocks" target="_blank"><img src='<?= base_url() ?>assets/img/facebook-saugat.png' height="50" width="50"></a>
                    <a href="http://np.linkedin.com/pub/saugat-acharya/4a/8a5/421/" target="_blank"><img src='<?= base_url() ?>assets/img/linkedin-saugat.png' height="50" width="50"></a>
                </div>                      
            </div>
        </div>
    <!-- END OF PAGE WRAPPER -->
    </div>
<!-- END OF CONTENT -->
</div>
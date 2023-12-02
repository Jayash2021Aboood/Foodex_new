<footer class="footer-admin mt-10 footer-light bg-black pt-3 pb-3 h-auto">
    <div class="container-xl px-4">
        <div class="row">
            <div class="col-sm-12 small text-center mb-2"><?php echo lang("Copyright © Foodex 2023"); ?></div>
            <div class="col-sm-6 small mb-2">
                <div>
                    <i class="fa-solid fa-envelope"></i>
                    contact@foodex.net
                </div>
                <div>
                    <i class="fa-solid fa-phone"></i>
                    009665xxxxxxxxx
                </div>
            </div>
            <div class="col-sm-6 text-md-end small">
                <img src="<?php echo $PATH_SERVER ?>assets/img/logo-wide-white1.png" alt="">
                <!-- <a href="#!">Privacy Policy</a>
                ·
                <a href="#!">Terms &amp; Conditions</a> -->
            </div>
            <div class="col-sm-12 text-sm text-center small mt-4 mb-2">
                <a class="text-pr" href="#"><i class="fa-brands fa-facebook fa-shake fa-2x"></i></a>
                ·
                <a href="#"><i class="fa-brands fa-linkedin fa-flip fa-2x"></i></a>
                ·
                <a href="#"><i class="fa-brands fa-twitter fa-shake fa-2x"></i></a>
                ·
                <a href="#"><i class="fa-brands fa-youtube fa-fade fa-2x"></i></a>
            </div>

        </div>
    </div>
</footer>
<!--  ======== End Content ============ -->
</div>
</div>

<script data-cfasync="false" src="<?php echo $PATH_SERVER ?>/cdn-cgi/scripts/5c5dd728/cloudflare-static/email-decode.min.js">
</script>
<script src="<?php echo $PATH_SERVER ?>js/bootstrap/bootstrap.bundle.min.js" crossorigin="anonymous">
</script>
<script src="<?php echo $PATH_SERVER ?>js/scripts.js"></script>
<script src="<?php echo $PATH_SERVER ?>js/simple-datatables/simple-datatables.js" crossorigin="anonymous">
</script>
<script src="<?php echo $PATH_SERVER ?>js/datatables/datatables-simple-demo.js"></script>

<!-- Start Include Charts Sections  -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.min.js" crossorigin="anonymous">
</script>
<script src="<?php echo $PATH_SERVER ?>assets/demo/chart-area-demo.js"></script>
<script src="<?php echo $PATH_SERVER ?>assets/demo/chart-bar-demo.js"></script>
<script src="<?php echo $PATH_SERVER ?>assets/demo/chart-pie-demo.js"></script>
<script src="https://cdn.jsdelivr.net/npm/litepicker/dist/bundle.js" crossorigin="anonymous"></script>
<script src="<?php echo $PATH_SERVER ?>js/litepicker.js"></script>
<!-- Include Rich Textbox Editor -->

<script>
    $(document).ready(function() {
        "use strict";
        $('#successmessage').delay(3000).hide(1000);
        $('#failmessage').delay(3000).hide(1000);

    });
</script>


<script>
    $(document).ready(function() {
        var corporate_field = $('#corporate_field');
        corporate_field.parent().hide();

        $('#type').change(function() {
            var selectedValue = $(this).val();
            if (selectedValue === 'corporate') {
                corporate_field.parent().show();
                corporate_field.prop('required', true);
            } else if (selectedValue === 'individual') {
                corporate_field.parent().hide();
                corporate_field.prop('required', false);
            }
        });
    });
</script>


<script>
    $(document).ready(function() {
        $('#myForm').validate({
            rules: {
                phone: {
                    required: true,
                    pattern: /^[0-9+\(\)#\.\s\/ext-]+$/ // Adjust the pattern as per your requirements
                },
                password: {
                    required: true,
                    minlength: 8
                },
                confirm_password: {
                    required: true,
                    minlength: 8,
                    equalTo: "#password"
                },
                email: {
                    required: true,
                    email: true
                },
            },
            messages: {
                phone: {
                    required: 'Please enter a phone number',
                    pattern: 'Please enter a valid phone number'
                },
                password: {
                    required: " Please enter a password",
                    minlength: "Password is too short!! Your password must be consist of at least 8 characters"
                },
                confirm_password: {
                    required: " Please enter a password",
                    minlength: " Your password must be consist of at least 8 characters",
                    equalTo: " Please enter the same password as above"
                },
            }
        });
    });
</script>




</body>

</html>
<?php get_header();?>

<section class="contact-hero">
        <div class="image">
            <h1 class="mt-auto mb-auto int container">ABOUT US</h1>
        </div>
    </section>

    <section class="form container grid pt-7 pb-7">
        <div class="form-group">
        <?php echo do_shortcode(dynamic_sidebar('Shortcode-home', 'content')); ?>
        </div>

        <div class="maps ml-3">
            <iframe
                src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d14135.000292391394!2d85.33153068276056!3d27.663203224961794!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x39eb19e5e057dba7%3A0x7eeb7b8857bbe509!2sOm+Shree+Furniture+Amd+Furnishing+Suppliers!5e0!3m2!1sen!2snp!4v1553074149989"
                width="600" height="450" frameborder="0" style="border:0" allowfullscreen></iframe>
        </div>
    </section>



<?php get_footer();?>
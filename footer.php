<?php
aitech_footer_before(); ?>

<!-- Footer Start -->
<div class="container-fluid bg-dark text-white-50 footer pt-5">
    <?php
    aitech_bottomline(); ?>

    <div class="container wow fadeIn" data-wow-delay="0.1s">
        <div class="copyright">
            <?php
            if (is_active_sidebar('footer-widget-area')): ?>
                <div class="row pt-5 pb-4" id="footer" role="navigation">
                    <?php
                    dynamic_sidebar('footer-widget-area'); ?>
                </div>
            <?php
            endif; ?>

        </div>
    </div>
</div>
<!-- Footer End -->


<!-- Back to Top -->
<a href="#" class="btn btn-lg btn-primary btn-lg-square back-to-top pt-2"><i class="bi bi-arrow-up"></i></a>

<?php
aitech_footer_after(); ?>

<?php
wp_footer(); ?>
</body>
</html>

  
<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package dantist
 */

?>

</main>
   
    <?JRender::viewInclude("footer");?>
    <?JRender::viewInclude("poppups");?>
    <?JRender::viewInclude("svg-library");?>
    <?JRender::viewInclude("popup-banners");?>
<?php wp_footer(); ?>
<?=get_field('booking_script_enabled', 'option') ? get_field('booking_script', 'option') : ''?>
<!-- Google Tag Manager (noscript) -->
<noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-NR8NRXK"
height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
<!-- End Google Tag Manager (noscript) -->

<!-- UIS -->
<script type="text/javascript" async src="https://app.uiscom.ru/static/cs.min.js?k=ONvlpLbHK4fGPHBIAlGx2yVxycH59OpV"></script>
<!--/ UIS -->
<script src="https://www.google.com/recaptcha/api.js?render=<?=get_field('recaptcha_site_key', 'options')?>"></script>
</body>
</html>

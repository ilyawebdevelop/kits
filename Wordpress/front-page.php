<?php
/*
* Template name: Home page
*/
?>

<?php get_header();

get_template_part('template-parts/home/intro');
get_template_part('template-parts/home/advantages');
get_template_part('template-parts/popular');
get_template_part('template-parts/home/main-slider');
get_template_part('template-parts/home/about');
get_template_part('template-parts/cert');

?>

<?php
get_footer();

?>
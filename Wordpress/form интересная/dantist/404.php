<?php
/**
 * The template for displaying 404 pages (not found)
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 *
 * @package dantist
 */

get_header();
?>
<section class="not-found">
    <div class="page__container">
        <div class="not-found__content">
            <div class="not-found__info">
                <p class="title title--h1 not-found__title">404</p>
                <p class="text text--big not-found__text">Извините, мы не можем найти эту страницу! Что-то пошло не так
                    или страница больше не существует.</p><a class="button not-found__button" href="/">Перейти на
                    главную</a>
            </div>
            <div class="not-found__animation">
                <lottie-player class="not-found__animation-image"
                    src="https://assets10.lottiefiles.com/packages/lf20_yryomobe.json" speed="1" loop autoplay>
                </lottie-player>
            </div>
        </div>
    </div>
</section>
<?php
get_footer();
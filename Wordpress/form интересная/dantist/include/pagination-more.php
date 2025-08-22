<?
$max_num_pages = $GLOBALS['wp_query']->max_num_pages;
$paged         = get_query_var( 'paged' );



if ( $max_num_pages > 1 ):

    if ( ! $paged ) {
        $paged = 1;
    }

    $nextpage = (int) $paged + 1;
    $max_page = $max_num_pages;
?>
<?if( ! is_single() && ( $nextpage <= $max_num_pages ) ):?>
<div class="reviews__footer">
    <a href="<?= ( ! is_single() && ( $nextpage <= $max_num_pages ) ) ? next_posts( $max_page, false ): "javascript:void(0)";?>" class="reviews__footer-link ajax-link">Показать ещё отзывы</a>
</div>
<script>
    new Showmore({
        wrapperItems: "<?=$args["items-id"]?>", 
        wrapperPagination: "<?=$args["pagination-id"]?>",
        eventStop: "reviews"
    }).init()
</script>
<?endif;?>
<?/*
<div class="pagination <?=$args["wrap-class"]?:"";?>">
    <a 
        href="<?= (! is_single() && $paged > 1 ) ? previous_posts( false ) : "javascript:void(0)";?>"
        class="pagination--item pagination--item-prev<?=(!(! is_single() && $paged > 1 )) ? " pagination--item--disabled": "";?>"
    >
        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="11" viewBox="0 0 16 11" fill="none">
                <path d="M14.9043 5.50061L0.769681 5.50061" stroke="#025EA1" stroke-linecap="round" stroke-linejoin="round"/>
                <path d="M5.48242 10.2111L0.770883 5.49952L5.48242 0.787982" stroke="#025EA1" stroke-linecap="round" stroke-linejoin="round"/>
        </svg>
    </a>

    <?for($i = 1; $i <= $max_num_pages; $i++):?>
        <a href="<?=get_pagenum_link($i);?>" class="pagination--item <?=($i==$paged) ? " pagination--item-active": "";?>" aria-label="Переход на страницу <?=$i?>"><?=$i?></a>
        
    <?endfor;?>

<?
    $max_page = $max_num_pages;
    ?>
    

    <a 
        href="<?= ( ! is_single() && ( $nextpage <= $max_num_pages ) ) ? next_posts( $max_page, false ): "javascript:void(0)";?>" 
        class="pagination--item pagination--item-next<?=(!( ! is_single() && ( $nextpage <= $max_num_pages ) )) ? " pagination--item--disabled": "";?>"
    >
        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="11" viewBox="0 0 16 11" fill="none">
                <path d="M1.0957 5.49951L15.2303 5.49951" stroke="#025EA1" stroke-linecap="round" stroke-linejoin="round"/>
                <path d="M10.5195 0.789062L15.2311 5.5006L10.5195 10.2121" stroke="#025EA1" stroke-linecap="round" stroke-linejoin="round"/>
        </svg>
    </a>

</div>
<?*/
endif;
?>
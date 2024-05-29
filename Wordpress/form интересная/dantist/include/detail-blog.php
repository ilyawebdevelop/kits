<?if(empty($args['content'])) return false;?>
<section class="blog-article">
    <div class="page__container">
        <div class="blog-article__content">
            <?foreach($args['content'] as $content):
            switch($content["acf_fc_layout"]):
                case "qoute":?>
                    <div class="blog-article__quote">
                        <p><?=$content["q"]?></p>
                    </div>
                    <?break;
                case "title":?>
                    <p class="blog-article__title"><?=$content["t"]?></p>
                    <?break;
                case "sub-title":?>
                    <p class="blog-article__subtitle"><?=$content["t"]?></p>
                    <?break;
                case "text":?>
                    <p><?=$content["t"]?></p>
                    <?break;
                case "image":
                
                    if(!empty($content["i"])):?>
                    <div class="blog-article__image-wrap">
                        <img class="blog-article__image" src="<?=$content["i"]?>" alt="<?=$args["title"]?>">
                    </div>
                    <?
                    endif;
                    break;
                case "list":
                    if(!empty($content["items"])):?>
                    <p class="blog-article__list-title"><?=$content["title"]?></p>
                    <ul>
                        <?foreach($content["items"] as $item):?>
                        <li><?=$item["i"]?></li>
                        <?endforeach;?>
                    </ul>
                    <?
                    endif;
                    break;
                case "autor"://sorry for a mistake
                    if(empty($content["fio"])) break;
                ?>

                    <div class="blog-article__author">
                        <?if(!empty($content["photo"])):?>
                        <div class="blog-article__author-image-wrap">
                            <img class="blog-article__author-image"
                                src="<?=$content["photo"]?>" alt="">
                        </div>
                        <?endif;?>
                        <p class="blog-article__author-title"><?=$args['author-caption']?></p>
                        <?if(!empty($content["spec"])):?>
                            <p class="blog-article__author-post"><?=$content["spec"];?></p>
                        <?endif;?>
                        <p class="blog-article__author-name"><?=$content["fio"];?></p>
                    </div>

                    <?break;
                case "simple":
                    if(empty($content["block"])) break;

                    $array = JRender::prepareArray(['layout' => $content["block"]]);
                    $array['layout'] = $content["block"];
                    JRender::setPart($array);
                ?>
                    

                    <?break;?>


            <?
            endswitch;
            endforeach;?>
          
        </div>
    </div>
</section>

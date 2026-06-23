<?php


function fitlife_lazy_images($content){



    if(is_admin()){

        return $content;

    }



    return str_replace(

        '<img',

        '<img loading="lazy"',

        $content

    );


}



add_filter(

    'the_content',

    'fitlife_lazy_images'

);

<?php
function getLinkAttrs ($link) : void {
    if (!empty($link['target']) && $link['target'] === '_blank')
        echo 'rel="nofollow noopener noindex" target="_blank"';
}

function getPhoneString (string $string) : string {
    return preg_replace('/\D/', '', $string);
}

function remove_wp_version_strings(string $src) : string {
    if (strpos( $src, 'ver='))
        $src = remove_query_arg( 'ver', $src );

    return $src;
}

function getPerPageArray () : array{
    return [12, 24, 36];
}
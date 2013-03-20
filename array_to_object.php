<?php

function array_to_object( $array ) {
    if( is_array( $array )) {
        return (object) array_map( __FUNCTION__, $array );
    }
    else {
        return $array;
    }
}


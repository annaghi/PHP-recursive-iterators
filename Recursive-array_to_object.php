<?php

function object_to_array( $object ) {
    if( ! is_array( $object ) && ! is_object( $object )) {
        return $object;
    }
    if( is_object( $object )) {
        $object = get_object_vars( $object );
    }
    return array_map( __FUNCTION__, $object );
}


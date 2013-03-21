<?php

function array_to_object( $array ) {
    
    $object = new stdClass();

    foreach( $array as $key => $value ) {
        $object->$key = is_array( $value ) ? array_to_object( $value ) : $value;
    }
    return $object;
}


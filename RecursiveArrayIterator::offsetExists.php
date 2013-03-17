<?php

// Simple use case of RecursiveArrayIterator::offsetExists method

function offsetExistsTest() {

    $array = array (
            'a' => array(
                    'a_1' => 'a 1 text',
                    'a_2' => 'a 2 text',
            ),
            'b' => array(
                    'b_1' => 'b 1 text',
                    'b_2' => 'b 2 text',
            ),
    );

//    $object = new ArrayObject( $array, 0, "RecursiveArrayIterator" );
    $object   = json_decode( json_encode( $array ));
    $iterator = new RecursiveIteratorIterator( new RecursiveArrayIterator( $object ), RecursiveIteratorIterator::SELF_FIRST );

    foreach( $iterator as $key => $current ) {

print_r('*************************************');
print_r( $iterator->getInnerIterator() );

         if( ! $iterator->getInnerIterator()->offsetExists( 'new' )) {

print_r('-------------- START ----------------');
print_r( $iterator->getInnerIterator() );

             $iterator->getInnerIterator()->getChildren()->offsetSet( 'new', 'new text' );

print_r( $iterator->getInnerIterator() );
print_r('-------------- END ------------------');
         }
    }

//print_r($object->getArrayCopy());
print_r(object_to_array($object));
}

offsetExistsTest();


//helper method
function object_to_array( $object ) {
    if( ! is_array( $object ) && ! is_object( $object )) {
        return $object;
    }
    if( is_object( $object )) {
        $object = get_object_vars( $object );
    }
    return array_map( __FUNCTION__, $object );
}


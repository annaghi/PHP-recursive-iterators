<?php

// Simple use case of RecursiveArrayIterator::offsetExists method

function offsetExistsTest() {

    $array = array (
            'a' => array(
                    'a_1' => 'a 1 text',
                    'a_2' => 'a 2 text',
            ),
            'b' => new stdClass(),
//            'b' => array(),
    );

    $object = json_decode( json_encode( $array ));
    // $object = new ArrayObject( $array, 0, "RecursiveArrayIterator" );
    $iterator = new RecursiveIteratorIterator( new RecursiveArrayIterator( $object ), RecursiveIteratorIterator::SELF_FIRST );

    foreach( $iterator as $key => $current ) {

        if( ! $iterator->getInnerIterator()->offsetExists( 'new' )) {

            $iterator->getInnerIterator()->getChildren()->offsetSet( 'new', 'new text' );

        }
    }


print_r($object);
//print_r($object->getArrayCopy());
}


offsetExistsTest();



/*

Result

stdClass Object
(
    [a] => stdClass Object
        (
            [a_1] => a 1 text
            [a_2] => a 2 text
            [new] => new text
        )

    [b] => stdClass Object
        (
            [new] => new text
        )
)

*/


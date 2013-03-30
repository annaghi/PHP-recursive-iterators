<?php

// Simple use case of RecursiveArrayIterator::count method

function countTest() {

    $array = array (

            'a' => new stdClass(),

            'b' => array(
                    'b_1' => new stdClass(),
                    'b_2' => 'b_2 text',
                    'b_3' => 'b_3 text',
            ),
    );



    $object   = json_decode( json_encode( $array ));    // in case of array with associative keys
//++    $object   = array_to_object( $array );          // in case of array with numeric and/or associative keys
//**    $object   = new ArrayObject( $array, 0, "RecursiveArrayIterator" );
    $iterator = new RecursiveIteratorIterator( new RecursiveArrayIterator( $object ), RecursiveIteratorIterator::SELF_FIRST );


////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////


    foreach( $iterator as $key => $current ) {

        if( count( get_object_vars( $current )) === 0 ) {

            $current->not_empty = 'this node is not empty anymore';
        }
    }


print_r($object);

////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////


    foreach( $iterator as $key => $current ) {

        if( $iterator->getInnerIterator()->count() == 3 ) {

            $iterator->getInnerIterator()->offsetSet( 'new', 'brand new leaf with brand new text' );
        }
    }


print_r($object);

////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

}

countTest();



/* Result

stdClass Object
(
    [a] => stdClass Object
        (
            [not_empty] => this node is not empty anymore
        )

    [b] => stdClass Object
        (
            [b_1] => stdClass Object
                (
                    [not_empty] => this node is not empty anymore
                )

            [b_2] => b_2 text
            [b_3] => b_3 text
        )
)

////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

stdClass Object
(
    [a] => stdClass Object
        (
            [not_empty] => this node is not empty anymore
        )

    [b] => stdClass Object
        (
            [b_1] => stdClass Object
                (
                    [not_empty] => this node is not empty anymore
                )

            [b_2] => b_2 text
            [b_3] => b_3 text
            [new] => brand new leaf with brand new text
        )
)


<?php

// Simple use case of RecursiveArrayIterator::offsetSet method

function offsetSetStringTest() {

    $array = array (

            'a' => 'a text',

            'b' => array(
                    'b_1' => 'b_1 text',
                    'b_2' => 'b_2 text',
            ),

            'c' => array(
                    'c_1' => array(
                            'c_1_1' => 'c_1_1 text',
                    ),
                    'c_2' => array(
                            'c_2_1' => 'c_2_1 text',
                            'c_2_2' => 'c_2_2 text',
                    ),
            ),
    );
    


    $object   = json_decode( json_encode( $array ));    // in case of array with associative keys
//++    $object   = array_to_object( $array );          // in case of array with numeric and/or associative keys
//**    $object   = new ArrayObject( $array, 0, "RecursiveArrayIterator" );
    $iterator = new RecursiveIteratorIterator( new RecursiveArrayIterator( $object ), RecursiveIteratorIterator::CHILD_FIRST );


////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////


    foreach( $iterator as $key => $current ) {

        if( $iterator->getInnerIterator()->count() == 1 && ! $iterator->getInnerIterator()->offsetExists( 'new' )) {

            $iterator->getInnerIterator()->offsetSet( 'new', 'Jekyll' );
        }
    }


print_r($object);

////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////


    foreach( $iterator as $key => $current ) {

        if( $key == 'new') {

            $iterator->getInnerIterator()->offsetSet( $key, 'Hyde' );
        }
    }


print_r($object);

////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

}

offsetSetStringTest();



/* Result

stdClass Object
(
    [a] => a text
    [b] => stdClass Object
        (
            [b_1] => b_1 text
            [b_2] => b_2 text
        )

    [c] => stdClass Object
        (
            [c_1] => stdClass Object
                (
                    [c_1_1] => c_1_1 text
                    [new] => Jekyll
                )

            [c_2] => stdClass Object
                (
                    [c_2_1] => c_2_1 text
                    [c_2_2] => c_2_2 text
                )
        )
)

////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

stdClass Object
(
    [a] => a text
    [b] => stdClass Object
        (
            [b_1] => b_1 text
            [b_2] => b_2 text
        )

    [c] => stdClass Object
        (
            [c_1] => stdClass Object
                (
                    [c_1_1] => c_1_1 text
                    [new] => Hyde
                )

            [c_2] => stdClass Object
                (
                    [c_2_1] => c_2_1 text
                    [c_2_2] => c_2_2 text
                )
        )
)


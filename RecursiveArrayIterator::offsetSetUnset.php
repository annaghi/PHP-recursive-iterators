<?php

// Simple use case of RecursiveArrayIterator::offsetSet and RecursiveArrayIterator::offsetUnset methods

function offsetSetUnsetTest() {

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
//--    $object   = array_to_object( $array );          // in case of array with numeric and/or associative keys
//**    $object   = new ArrayObject( $array, 0, "RecursiveArrayIterator" );
    $iterator = new RecursiveIteratorIterator( new RecursiveArrayIterator( $object ), RecursiveIteratorIterator::CHILD_FIRST );


////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////


    foreach( $iterator as $key => $current ) {

        if( in_array( $key, array( 'b_1', 'b_2', 'c_1', ))) {

            $iterator->getInnerIterator()->offsetSet( $key, 'new value here' );
        }
    }


print_r($object);

////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////


    foreach( $iterator as $key => $current ) {

        if( in_array( $key, array( 'b_1', 'b_2', 'c_1', ))) {

            $iterator->getInnerIterator()->offsetUnset( $key );
        }
    }


print_r($object);

////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

}

offsetSetUnsetTest();



/* Result

stdClass Object
(
    [a] => a text
    [b] => stdClass Object
        (
            [b_1] => new value here
            [b_2] => new value here
        )

    [c] => stdClass Object
        (
            [c_1] => new value here
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
            [b_2] => new value here
        )

    [c] => stdClass Object
        (
            [c_2] => stdClass Object
                (
                    [c_2_1] => c_2_1 text
                    [c_2_2] => c_2_2 text
                )
        )
)


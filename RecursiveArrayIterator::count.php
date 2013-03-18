<?php

// Simple use case of RecursiveArrayIterator::count method

function countTest() {

    $array = array (
            'a' => new stdClass(),
//**            'a' => array(),
            'b' => array(
                    'b_1' => 'b 1 text',
            ),
            'c' => array(
                    'c_1' => new stdClass(),
//**                    'c_1' => array(),
                    'c_2' => array(
                            'c_2_1' => 'c 2 1 text',
                            'c_2_2' => 'c 2 2 text',
                    ),
            ),
    );



    $object   = json_decode( json_encode( $array ));
//**    $object = new ArrayObject( $array, 0, "RecursiveArrayIterator" );
    $iterator = new RecursiveIteratorIterator( new RecursiveArrayIterator( $object ), RecursiveIteratorIterator::SELF_FIRST );


////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////


    foreach( $iterator as $key => $current ) {

        if( $iterator->getInnerIterator()->count() == 0 ) {

            $iterator->getInnerIterator()->offsetSet( 'not_empty', 'not empty anymore' );

        }
    }

print_r($object);


////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////


    foreach( $iterator as $key => $current ) {

        if( $iterator->getInnerIterator()->count() == 2 ) {

            $iterator->getInnerIterator()->offsetSet( 'new', 'new text' );

        }
    }

print_r($object);


////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

}

countTest();



/*

stdClass Object
(
    [a] => stdClass Object
        (                                           ?????
        )

    [b] => stdClass Object
        (
            [b_1] => b 1 text
        )

    [c] => stdClass Object
        (
            [c_1] => stdClass Object
                (                                   ?????
                )

            [c_2] => stdClass Object
                (
                    [c_2_1] => c 2 1 text
                    [c_2_2] => c 2 2 text
                )
        )
)

////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

stdClass Object
(
    [a] => stdClass Object
        (
        )

    [b] => stdClass Object
        (
            [b_1] => b 1 text
        )

    [c] => stdClass Object
        (
            [c_1] => stdClass Object
                (
                )

            [c_2] => stdClass Object
                (
                    [c_2_1] => c 2 1 text
                    [c_2_2] => c 2 2 text
                    [new] => new text
                )

            [new] => new text
        )
)

*/


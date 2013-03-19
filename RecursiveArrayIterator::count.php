<?php

// Simple use case of RecursiveArrayIterator::count method

function countTest() {

    $array = array (

            'a' => 'a first',
            'b' => array(
                    'b_1' => 'b_1 first',
            ),
            'c' => array(
                    'c_1' => 'c_1 first',
                    'c_2' => 'c_2 first',
            ),
            'd' => array(
                    'd_1' => array(),
            ),

            'e' => array(

                    'a' => 'a second',
                    'b' => array(
                            'b_1' => 'b_1 second',
                    ),
                    'c' => array(
                            'c_1' => 'c_1 second',
                            'c_2' => 'c_2 second',
                    ),
                    'd' => array(
                            'd_1' => array(),
                    ),
            ),
    );



    $object   = json_decode( json_encode( $array ));
//**    $object   = new ArrayObject( $array, 0, "RecursiveArrayIterator" );
    $iterator = new RecursiveIteratorIterator( new RecursiveArrayIterator( $object ), RecursiveIteratorIterator::SELF_FIRST );


////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////


    foreach( $iterator as $key => $current ) {

        if( $iterator->getInnerIterator()->count() == 0 ) {

            $iterator->getInnerIterator()->offsetSet( 'not_empty', 'this item is not empty anymore' );
        }
    }


print_r($object);

////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////


    foreach( $iterator as $key => $current ) {

        if( $iterator->getInnerIterator()->count() == 2 ) {

            $iterator->getInnerIterator()->offsetSet( 'new', 'brand new leaf with brand new text' );
        }
    }


print_r($object);

////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

}

countTest();



/*

stdClass Object
(
    [a] => a first
    [b] => stdClass Object
        (
            [b_1] => b_1 first
        )

    [c] => stdClass Object
        (
            [c_1] => c_1 first
            [c_2] => c_2 first
        )

    [d] => stdClass Object
        (
            [d_1] => Array
                (
                )
        )

    [e] => stdClass Object
        (
            [a] => a second
            [b] => stdClass Object
                (
                    [b_1] => b_1 second
                )

            [c] => stdClass Object
                (
                    [c_1] => c_1 second
                    [c_2] => c_2 second
                )

            [d] => stdClass Object
                (
                    [d_1] => Array
                        (
                        )
                )
        )
)

////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

stdClass Object
(
    [a] => a first
    [b] => stdClass Object
        (
            [b_1] => b_1 first
        )

    [c] => stdClass Object
        (
            [c_1] => c_1 first
            [c_2] => c_2 first
            [new] => brand new leaf with brand new text
        )

    [d] => stdClass Object
        (
            [d_1] => Array
                (
                )
        )

    [e] => stdClass Object
        (
            [a] => a second
            [b] => stdClass Object
                (
                    [b_1] => b_1 second
                )

            [c] => stdClass Object
                (
                    [c_1] => c_1 second
                    [c_2] => c_2 second
                    [new] => brand new leaf with brand new text
                )

            [d] => stdClass Object
                (
                    [d_1] => Array
                        (
                        )
                )
        )
)

*/


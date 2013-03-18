<?php

// Simple use case of RecursiveArrayIterator::count method

function countTest() {

    $array = array (
            'a' => array(
                    'a_1' => 'a 1 text',
                    'a_2' => 'a 2 text',
            ),

            'b' => array(
                    'b_1' => array(
                            'b_1_1' => 'b 1 1 text',
                            'b_1_2' => 'b 1 2 text',
                            'b_1_3' => 'b 1 3 text',
                    ),

                    'b_2' => 0,
                    'b_3' => '',
                    'b_4' => array(),
                    'b_5' => new stdClass(),
            ),

            'c' => 0,
            'd' => '',
            'e' => array(),
            'f' => new stdClass,
    );



    $object   = json_decode( json_encode( $array ));
//**    $object   = new ArrayObject( $array, 0, "RecursiveArrayIterator" );
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

        if( $iterator->getInnerIterator()->count() == 2 || $iterator->getInnerIterator()->count() == 3 ) {

            $iterator->getInnerIterator()->offsetSet( 'new', 'brand new item' );
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
        (
            [a_1] => a 1 text
            [a_2] => a 2 text
        )

    [b] => stdClass Object
        (
            [b_1] => stdClass Object
                (
                    [b_1_1] => b 1 1 text
                    [b_1_2] => b 1 2 text
                    [b_1_3] => b 1 3 text
                )

            [b_2] => 0
            [b_3] => 
            [b_4] => Array
                (
                )

            [b_5] => stdClass Object
                (
                )
        )

    [c] => 0
    [d] => 
    [e] => Array
        (
        )

    [f] => stdClass Object
        (
        )
)

////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

stdClass Object
(
    [a] => stdClass Object
        (
            [a_1] => a 1 text
            [a_2] => a 2 text
            [new] => brand new item
        )

    [b] => stdClass Object
        (
            [b_1] => stdClass Object
                (
                    [b_1_1] => b 1 1 text
                    [b_1_2] => b 1 2 text
                    [b_1_3] => b 1 3 text
                    [new] => brand new item
                )

            [b_2] => 0
            [b_3] => 
            [b_4] => Array
                (
                )

            [b_5] => stdClass Object
                (
                )
        )

    [c] => 0
    [d] => 
    [e] => Array
        (
        )

    [f] => stdClass Object
        (
        )
)

*/


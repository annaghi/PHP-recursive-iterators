<?php

// Simple use case of RecursiveArrayIterator::offsetSet method

function offsetSetTest() {

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

        if( mb_strlen( $key ) == 1 && ! $iterator->getInnerIterator()->offsetExists( 'new' )) {

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

offsetSetTest();



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

    [new] => Jekyll
)


////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

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

    [new] => Hyde
)

*/


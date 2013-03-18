<?php

// Simple use case of RecursiveArrayIterator::offsetExists method

function offsetExistsTest() {

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


////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////


    $object   = json_decode( json_encode( $array ));
//**    $object   = new ArrayObject( $array, 0, "RecursiveArrayIterator" );
    $iterator = new RecursiveIteratorIterator( new RecursiveArrayIterator( $object ), RecursiveIteratorIterator::CHILD_FIRST );

    foreach( $iterator as $key => $current ) {

        if( ! $iterator->getInnerIterator()->offsetExists( 'new' )) {

            $iterator->getInnerIterator()->offsetSet( 'new', 'new text' );
        }
    }

////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////


print_r($object);

}

offsetExistsTest();



/*

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
            [b_1] => stdClass Object
                (
                    [b_1_1] => b 1 1 text
                    [b_1_2] => b 1 2 text
                    [b_1_3] => b 1 3 text
                    [new] => new text
                )

            [b_2] => 0
            [b_3] => 
            [b_4] => Array
                (
                )

            [b_5] => stdClass Object
                (
                )

            [new] => new text
        )

    [c] => 0
    [d] => 
    [e] => Array
        (
        )

    [f] => stdClass Object
        (
        )

    [new] => new text
)

*/


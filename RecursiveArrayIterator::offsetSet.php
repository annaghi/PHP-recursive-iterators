<?php

// Simple use case of RecursiveArrayIterator::offsetSet method

function offsetSetTest() {

    $array_rec = array (
            'a' => new stdClass(),
//**            'a' => array(),
            'b' => array(
                    'b_1' => 'b 1 text',
                    'b_2' => 'b 2 text',
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


////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////



    $object   = json_decode( json_encode( $array_rec ));
//**    $object   = new ArrayObject( $array, 0, "RecursiveArrayIterator" );
    $iterator = new RecursiveIteratorIterator( new RecursiveArrayIterator( $object ), RecursiveIteratorIterator::SELF_FIRST );

    foreach( $iterator as $key => $current ) {

        if( mb_strlen( $key ) == 1 ) {

            $iterator->getInnerIterator()->getChildren()->offsetSet( 'new', 'new text' );

        }
    }

////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////


print_r($object);
//**print_r($object->getArrayCopy());

}

offsetSetTest();



/*

stdClass Object
(
    [a] => stdClass Object
        (
            [new] => new text
        )

    [b] => stdClass Object
        (
            [b_1] => b 1 text
            [b_2] => b 2 text
            [new] => new text
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
                )

            [new] => new text
        )
)

*/


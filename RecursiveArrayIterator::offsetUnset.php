<?php

// Very simple use case of RecursiveArrayIterator::offsetUnset method

function offsetUnsetTest() {

    $array = array (
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


    $object   = json_decode( json_encode( $array ));
//**    $object   = new ArrayObject( $array, 0, "RecursiveArrayIterator" );
    $iterator = new RecursiveIteratorIterator( new RecursiveArrayIterator( $object ), RecursiveIteratorIterator::SELF_FIRST );

    foreach( $iterator as $key => $current ) {

        if( in_array( $key, array( 'a', 'b_1', 'c_2', ))) {

            $iterator->getInnerIterator()->offsetUnset( $key );

        }
    }

////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////


print_r($object);
//**print_r($object->getArrayCopy());

}

offsetUnsetTest();


/*

stdClass Object
(
    [b] => stdClass Object
        (
            [b_2] => b 2 text
        )

    [c] => stdClass Object
        (
            [c_1] => stdClass Object
                (
                )

        )

)

*/


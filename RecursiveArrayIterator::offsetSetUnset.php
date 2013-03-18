<?php

// Simple use case of RecursiveArrayIterator::offsetSet and RecursiveArrayIterator::offsetUnset methods

function offsetSetUnsetTest() {

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
    $iterator = new RecursiveIteratorIterator( new RecursiveArrayIterator( $object ), RecursiveIteratorIterator::CHILD_FIRST );

    foreach( $iterator as $key => $current ) {

        if( mb_strlen( $key ) == 3 ) {

            $iterator->getInnerIterator()->offsetSet( $key, 'new value' );

        }
    }


print_r($object);
//**print_r($object->getArrayCopy());



////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////


$object   = json_decode( json_encode( $array_rec ));
//**    $object   = new ArrayObject( $array, 0, "RecursiveArrayIterator" );
$iterator = new RecursiveIteratorIterator( new RecursiveArrayIterator( $object ), RecursiveIteratorIterator::CHILD_FIRST );

foreach( $iterator as $key => $current ) {

    if( mb_strlen( $key ) == 3 ) {

        $iterator->getInnerIterator()->offsetSet( 'new', 'new item' );

    }
}


print_r($object);
//**print_r($object->getArrayCopy());



////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////


$object   = json_decode( json_encode( $array_rec ));
//**    $object   = new ArrayObject( $array, 0, "RecursiveArrayIterator" );
$iterator = new RecursiveIteratorIterator( new RecursiveArrayIterator( $object ), RecursiveIteratorIterator::CHILD_FIRST );

foreach( $iterator as $key => $current ) {

    if( mb_strlen( $key ) == 3 ) {

        $iterator->getInnerIterator()->offsetUnset( $key );

    }
}


print_r($object);
//**print_r($object->getArrayCopy());

}

offsetSetUnsetTest();


/*

stdClass Object
(
    [a] => stdClass Object
        (
        )

    [b] => stdClass Object
        (
            [b_1] => new value
            [b_2] => new value
        )

    [c] => stdClass Object
        (
            [c_1] => new value
            [c_2] => new value
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
            [b_2] => b 2 text
            [new] => new item
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

            [new] => new item
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
            [b_2] => b 2 text                       ?????
        )

    [c] => stdClass Object
        (
            [c_2] => stdClass Object                ?????
                (
                    [c_2_1] => c 2 1 text
                    [c_2_2] => c 2 2 text
                )

        )
)

*/


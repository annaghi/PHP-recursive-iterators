<?php

// A simple use case of RecursiveArrayIterator::offsetGet method

function offsetGetTest() {

    $array = array(

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
    $iterator = new RecursiveIteratorIterator( new RecursiveArrayIterator( $object ), RecursiveIteratorIterator::SELF_FIRST );


////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////


    $value = '';

    foreach( $iterator as $key => $current ) {

        if( $key == 'a' ) {

            $value = $iterator->getInnerIterator()->offsetGet( $key );

            $iterator->getInnerIterator()->offsetUnset( $key );
        }

        if( $key == 'c_1_1' ) {

            $iterator->getInnerIterator()->offsetSet( $key, $value );
        }
    }

////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////


print_r($object);

}

offsetGetTest();



/* Result

stdClass Object
(
    [b] => stdClass Object
        (
            [b_1] => b_1 text
            [b_2] => b_2 text
        )

    [c] => stdClass Object
        (
            [c_1] => stdClass Object
                (
                    [c_1_1] => a text
                )

            [c_2] => stdClass Object
                (
                    [c_2_1] => c_2_1 text
                    [c_2_2] => c_2_2 text
                )
        )
)


<?php

// A simple use case of RecursiveArrayIterator::offsetGet method

function offsetGetTest() {

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
                    'd_1' => array(
                            'd_1_1' => 'd_1_1 first',
                            'd_1_2' => 'd_1_2 first',
                            'd_1_3' => 'd_1_3 first',
                    ),
            ),

            'e' => array(

                    'a' => 'a first',
                    'b' => array(
                            'b_1' => 'b_1 second',
                    ),
                    'c' => array(
                            'c_1' => 'c_1 second',
                            'c_2' => 'c_2 second',
                    ),
                    'd' => array(
                            'd_1' => array(
                                    'd_1_1' => 'd_1_1 second',
                                    'd_1_2' => 'd_1_2 second',
                                    'd_1_3' => 'd_1_3 second',
                            ),
                    ),
            ),
    );



    $object   = json_decode( json_encode( $array ));
//**    $object   = new ArrayObject( $array, 0, "RecursiveArrayIterator" );
    $iterator = new RecursiveIteratorIterator( new RecursiveArrayIterator( $object ), RecursiveIteratorIterator::SELF_FIRST );


////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////


    $value = '';

    foreach( $iterator as $key => $current ) {

        if( $key == 'b_1' ) {

            $value = $iterator->getInnerIterator()->offsetGet( $key );
            $iterator->getInnerIterator()->offsetUnset( $key );
        }

        if( $key == 'd_1_3' ) {

            $iterator->getInnerIterator()->offsetSet( $key, $value );
        }
    }

////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////


print_r($object);

}

offsetGetTest();



/*

stdClass Object
(
    [a] => a first
    [b] => stdClass Object
        (
        )

    [c] => stdClass Object
        (
            [c_1] => c_1 first
            [c_2] => c_2 first
        )

    [d] => stdClass Object
        (
            [d_1] => stdClass Object
                (
                    [d_1_1] => d_1_1 first
                    [d_1_2] => d_1_2 first
                    [d_1_3] => b_1 first
                )
        )

    [e] => stdClass Object
        (
            [a] => a first
            [b] => stdClass Object
                (
                )

            [c] => stdClass Object
                (
                    [c_1] => c_1 second
                    [c_2] => c_2 second
                )

            [d] => stdClass Object
                (
                    [d_1] => stdClass Object
                        (
                            [d_1_1] => d_1_1 second
                            [d_1_2] => d_1_2 second
                            [d_1_3] => b_1 second
                        )
                )
        )
)

*/


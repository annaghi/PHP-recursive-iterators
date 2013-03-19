<?php

// Very simple use case of RecursiveArrayIterator::offsetUnset method

function offsetUnsetTest() {

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

                    'a' => 'a second',
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
    $iterator = new RecursiveIteratorIterator( new RecursiveArrayIterator( $object ), RecursiveIteratorIterator::CHILD_FIRST );
//    $iterator = new RecursiveIteratorIterator( new RecursiveArrayIterator( $object ), RecursiveIteratorIterator::SELF_FIRST );


////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////


    foreach( $iterator as $key => $current ) {

        if( in_array( $key, array( 'a', 'c', 'd_1_2', 'd_1_3', ))) {

            $iterator->getInnerIterator()->offsetUnset( $key );
        }
    }

////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////


print_r($object);

}

offsetUnsetTest();



/*

stdClass Object
(
    [b] => stdClass Object
        (
            [b_1] => b_1 first
        )

    [d] => stdClass Object
        (
            [d_1] => stdClass Object
                (
                    [d_1_1] => d_1_1 first
                )
        )

    [e] => stdClass Object
        (
            [b] => stdClass Object
                (
                    [b_1] => b_1 second
                )

            [d] => stdClass Object
                (
                    [d_1] => stdClass Object
                        (
                            [d_1_1] => d_1_1 second
                        )
                )
        )
)

*/


<?php

// Simple use case of RecursiveArrayIterator::offsetSet and RecursiveArrayIterator::offsetUnset methods

function offsetSetUnsetTest() {

    $array = array (
            'a' => array(
                    'a_1' => 'a 1 first',
                    'a_2' => 'a 2 first',
            ),
            'b' => array(
                    'b_1' => array(
                            'b_1_1' => 'b 1 1 first',
                            'b_1_2' => 'b 1 2 first',
                            'b_1_3' => 'b 1 3 first',
                    ),

                    'b_2' => 0,
                    'b_3' => '',
                    'b_4' => array(),
                    'b_5' => new stdClass(),


                    'a' => array(
                            'a_1' => 'a 1 second',
                            'a_2' => 'a 2 second',
                    ),
                    'b' => array(
                            'b_1' => array(
                                    'b_1_1' => 'b 1 1 second',
                                    'b_1_2' => 'b 1 2 second',
                                    'b_1_3' => 'b 1 3 second',
                            ),

                            'b_2' => 0,
                            'b_3' => '',
                            'b_4' => array(),
                            'b_5' => new stdClass(),
                    ),
            ),
    );



    $object   = json_decode( json_encode( $array ));
//**    $object   = new ArrayObject( $array, 0, "RecursiveArrayIterator" );
    $iterator = new RecursiveIteratorIterator( new RecursiveArrayIterator( $object ), RecursiveIteratorIterator::CHILD_FIRST );


////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////


    foreach( $iterator as $key => $current ) {

        if( in_array( $key, array( 'b_1_1', 'b_1_2', 'b_1_3', ))) {

            $iterator->getInnerIterator()->offsetSet( $key, 'new value here' );
        }
    }

print_r($object);


////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////


    foreach( $iterator as $key => $current ) {

        if( in_array( $key, array( 'b_1_1', 'b_1_2', 'b_1_3', ))) {

            $iterator->getInnerIterator()->offsetUnset( $key );
        }
    }

print_r($object);


////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

}

offsetSetUnsetTest();



/*

stdClass Object
(
    [a] => stdClass Object
        (
            [a_1] => a 1 first
            [a_2] => a 2 first
        )

    [b] => stdClass Object
        (
            [b_1] => stdClass Object
                (
                    [b_1_1] => new value here
                    [b_1_2] => new value here
                    [b_1_3] => new value here
                )

            [b_2] => 0
            [b_3] => 
            [b_4] => Array
                (
                )

            [b_5] => stdClass Object
                (
                )

            [a] => stdClass Object
                (
                    [a_1] => a 1 second
                    [a_2] => a 2 second
                )

            [b] => stdClass Object
                (
                    [b_1] => stdClass Object
                        (
                            [b_1_1] => new value here
                            [b_1_2] => new value here
                            [b_1_3] => new value here
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
        )
)

////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

stdClass Object
(
    [a] => stdClass Object
        (
            [a_1] => a 1 first
            [a_2] => a 2 first
        )

    [b] => stdClass Object
        (
            [b_1] => stdClass Object
                (
                    [b_1_2] => new value here
                )

            [b_2] => 0
            [b_3] => 
            [b_4] => Array
                (
                )

            [b_5] => stdClass Object
                (
                )

            [a] => stdClass Object
                (
                    [a_1] => a 1 second
                    [a_2] => a 2 second
                )

            [b] => stdClass Object
                (
                    [b_1] => stdClass Object
                        (
                            [b_1_2] => new value here
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
        )
)

*/


<?php

// Simple use case of RecursiveArrayIterator::offsetSet method

function offsetSetTest() {

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
            [a_1] => a 1 first
            [a_2] => a 2 first
        )

    [b] => stdClass Object
        (
            [b_1] => stdClass Object
                (
                    [b_1_1] => b 1 1 first
                    [b_1_2] => b 1 2 first
                    [b_1_3] => b 1 3 first
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
                            [b_1_1] => b 1 1 second
                            [b_1_2] => b 1 2 second
                            [b_1_3] => b 1 3 second
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

            [new] => Jekyll
        )

    [new] => Jekyll
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
                    [b_1_1] => b 1 1 first
                    [b_1_2] => b 1 2 first
                    [b_1_3] => b 1 3 first
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
                            [b_1_1] => b 1 1 second
                            [b_1_2] => b 1 2 second
                            [b_1_3] => b 1 3 second
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

            [new] => Hyde
        )

    [new] => Hyde
)

*/


<?php

// Simple use case of RecursiveArrayIterator::count method

function countTest() {

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
    $iterator = new RecursiveIteratorIterator( new RecursiveArrayIterator( $object ), RecursiveIteratorIterator::SELF_FIRST );


////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////


    foreach( $iterator as $key => $current ) {

        if( $iterator->getInnerIterator()->count() == 0 ) {

            $iterator->getInnerIterator()->offsetSet( 'not_empty', 'this value is not empty anymore' );
        }
    }

print_r($object);


////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////


    foreach( $iterator as $key => $current ) {

        if( $iterator->getInnerIterator()->count() == 3 ) {

            $iterator->getInnerIterator()->offsetSet( 'new', 'brand new item with brand new text' );
        }
    }

print_r($object);


////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

}

countTest();



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
                    [b_1_1] => b 1 1 first
                    [b_1_2] => b 1 2 first
                    [b_1_3] => b 1 3 first
                    [new] => brand new item with brand new text
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
                            [new] => brand new item with brand new text
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


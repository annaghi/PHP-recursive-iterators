<?php

// Simple use case of RecursiveArrayIterator::offsetExists method

function offsetExistsTest() {

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


////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////


    foreach( $iterator as $key => $current ) {

        if( ! $iterator->getInnerIterator()->offsetExists( 'new' )) {

            $iterator->getInnerIterator()->offsetSet( 'new', 'new leaf with some new text' );
        }
    }

////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////


print_r($object);

}

offsetExistsTest();



/*

stdClass Object
(
    [a] => a first
    [b] => stdClass Object
        (
            [b_1] => b_1 first
            [new] => new item with some new text
        )

    [c] => stdClass Object
        (
            [c_1] => c_1 first
            [c_2] => c_2 first
            [new] => new item with some new text
        )

    [d] => stdClass Object
        (
            [d_1] => stdClass Object
                (
                    [d_1_1] => d_1_1 first
                    [d_1_2] => d_1_2 first
                    [d_1_3] => d_1_3 first
                    [new] => new item with some new text
                )

            [new] => new item with some new text
        )

    [e] => stdClass Object
        (
            [a] => a second
            [b] => stdClass Object
                (
                    [b_1] => b_1 second
                    [new] => new item with some new text
                )

            [c] => stdClass Object
                (
                    [c_1] => c_1 second
                    [c_2] => c_2 second
                    [new] => new item with some new text
                )

            [d] => stdClass Object
                (
                    [d_1] => stdClass Object
                        (
                            [d_1_1] => d_1_1 second
                            [d_1_2] => d_1_2 second
                            [d_1_3] => d_1_3 second
                            [new] => new item with some new text
                        )

                    [new] => new item with some new text
                )

            [new] => new item with some new text
        )

    [new] => new item with some new text
)

*/


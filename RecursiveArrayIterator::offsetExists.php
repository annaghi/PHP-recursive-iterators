<?php

// Simple use case of RecursiveArrayIterator::offsetExists method

function offsetExistsTest() {

    $array = array (

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



/* Result

stdClass Object
(
    [a] => a text
    [b] => stdClass Object
        (
            [b_1] => b_1 text
            [b_2] => b_2 text
            [new] => new leaf with some new text
        )

    [c] => stdClass Object
        (
            [c_1] => stdClass Object
                (
                    [c_1_1] => c_1_1 text
                    [new] => new leaf with some new text
                )

            [c_2] => stdClass Object
                (
                    [c_2_1] => c_2_1 text
                    [c_2_2] => c_2_2 text
                    [new] => new leaf with some new text
                )

            [new] => new leaf with some new text
        )

    [new] => new leaf with some new text
)


<?php

// Simple use case of RecursiveArrayIterator::count method

function countTest() {

    $array = array (

            'a' => new stdClass(),

            'b' => array(
                    'b_1' => 'b_1 text',
                    'b_2' => 'b_2 text',
            ),

            'c' => array(
                    'c_1' => new stdClass(),
                    'c_2' => array(
                            'c_2_1' => 'c_2_1 text',
                            'c_2_2' => 'c_2_2 text',
                    ),
            ),
    );



    $object   = json_decode( json_encode( $array ));
//**    $object   = new ArrayObject( $array, 0, "RecursiveArrayIterator" );
    $iterator = new RecursiveIteratorIterator( new RecursiveArrayIterator( $object ), RecursiveIteratorIterator::SELF_FIRST );
    

////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////


    foreach( $iterator as $key => $current ) {

        if( $iterator->getInnerIterator()->count() == 0 ) {

            $iterator->getInnerIterator()->offsetSet( 'not_empty', 'this node is not empty anymore' );
        }
    }


print_r($object);

////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////


    foreach( $iterator as $key => $current ) {

        if( $iterator->getInnerIterator()->count() == 1 ) {

            $iterator->getInnerIterator()->offsetSet( 'new', 'brand new leaf with brand new text' );
        }
    }


print_r($object);

////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

}

countTest();



/* Result

stdClass Object
(
    [a] => stdClass Object
        (
        )

    [b] => stdClass Object
        (
            [b_1] => b_1 text
            [b_2] => b_2 text
        )

    [c] => stdClass Object
        (
            [c_1] => stdClass Object
                (
                )

            [c_2] => stdClass Object
                (
                    [c_2_1] => c_2_1 text
                    [c_2_2] => c_2_2 text
                )
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
            [b_1] => b_1 text
            [b_2] => b_2 text
        )

    [c] => stdClass Object
        (
            [c_1] => stdClass Object
                (
                    [c_1_1] => c_1_1 text
                    [new] => brand new leaf with brand new text
                )

            [c_2] => stdClass Object
                (
                    [c_2_1] => c_2_1 text
                    [c_2_2] => c_2_2 text
                )
        )
)



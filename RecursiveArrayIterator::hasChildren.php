<?php

// A simple use case of RecursiveArrayIterator::hasChildren method

function hasChildrenTest() {

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
            ),
    );



////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////


    $object   = json_decode( json_encode( $array ));
//**    $object   = new ArrayObject( $array, 0, "RecursiveArrayIterator" );
    $iterator = new RecursiveIteratorIterator( new RecursiveArrayIterator( $object ), RecursiveIteratorIterator::CHILD_FIRST );


    foreach( $iterator as $key => $current ) {

        if( ! $iterator->getInnerIterator()->hasChildren() ) {

            $iterator->getInnerIterator()->offsetSet( $key, 'LEAF' );
        }
    }


print_r($object);

////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////


    foreach( $iterator as $key => $current ) {

        if( $iterator->getInnerIterator()->hasChildren() && $iterator->getInnerIterator()->count() == 1 ) {

            $iterator->getInnerIterator()->offsetSet( $key, 'NODE' );
        }
    }


print_r($object);

////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

}

hasChildrenTest();



/*

stdClass Object
(
    [a] => LEAF
    [b] => stdClass Object
        (
            [b_1] => LEAF
        )

    [c] => stdClass Object
        (
            [c_1] => LEAF
            [c_2] => LEAF
        )

    [d] => stdClass Object
        (
            [d_1] => stdClass Object
                (
                    [d_1_1] => LEAF
                    [d_1_2] => LEAF
                    [d_1_3] => LEAF
                )

        )

    [e] => stdClass Object
        (
            [a] => LEAF
            [b] => stdClass Object
                (
                    [b_1] => LEAF
                )

            [c] => stdClass Object
                (
                    [c_1] => LEAF
                    [c_2] => LEAF
                )

            [d] => stdClass Object
                (
                    [d_1] => stdClass Object
                        (
                            [d_1_1] => LEAF
                            [d_1_2] => LEAF
                            [d_1_3] => LEAF
                        )
                )
        )
)

////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

stdClass Object
(
    [a] => LEAF
    [b] => stdClass Object
        (
            [b_1] => LEAF
        )

    [c] => stdClass Object
        (
            [c_1] => LEAF
            [c_2] => LEAF
        )

    [d] => stdClass Object
        (
            [d_1] => NODE
        )

    [e] => stdClass Object
        (
            [a] => LEAF
            [b] => stdClass Object
                (
                    [b_1] => LEAF
                )

            [c] => stdClass Object
                (
                    [c_1] => LEAF
                    [c_2] => LEAF
                )

            [d] => stdClass Object
                (
                    [d_1] => NODE
                )
        )
)

*/


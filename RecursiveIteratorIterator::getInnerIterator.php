<?php

//A simple use case of RecursiveIteratorIterator::getInnerIterator method

function getInnerIteratorTest() {

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


////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////


    $iterator = new RecursiveIteratorIterator( new RecursiveArrayIterator( $object ), RecursiveIteratorIterator::LEAVES_ONLY );

    foreach( $iterator as $key => $current ) {

        if( $iterator->getInnerIterator()->count() == 2 ) {

print_r($iterator->getInnerIterator());

        }
    }


print_r('---------------------------------------------------------------------------------------------------------------------');


    $iterator = new RecursiveIteratorIterator( new RecursiveArrayIterator( $object ), RecursiveIteratorIterator::SELF_FIRST );

    foreach( $iterator as $key => $current ) {

        if( $iterator->getInnerIterator()->count() == 2 ) {

print_r($iterator->getInnerIterator());

        }
    }
    

////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

}

getInnerIteratorTest();



/*

RecursiveArrayIterator Object
(
    [storage:ArrayIterator:private] => stdClass Object
        (
            [b_1] => b_1 text
            [b_2] => b_2 text
        )
)


RecursiveArrayIterator Object
(
    [storage:ArrayIterator:private] => stdClass Object
        (
            [b_1] => b_1 text
            [b_2] => b_2 text
        )
)


RecursiveArrayIterator Object
(
    [storage:ArrayIterator:private] => stdClass Object
        (
            [c_2_1] => c_2_1 text
            [c_2_2] => c_2_2 text
        )
)


RecursiveArrayIterator Object
(
    [storage:ArrayIterator:private] => stdClass Object
        (
            [c_2_1] => c_2_1 text
            [c_2_2] => c_2_2 text
        )
)

--------------------------------------------------------------------------------------------------------------------------------

RecursiveArrayIterator Object
(
    [storage:ArrayIterator:private] => stdClass Object
        (
            [b_1] => b_1 text
            [b_2] => b_2 text
        )
)


RecursiveArrayIterator Object
(
    [storage:ArrayIterator:private] => stdClass Object
        (
            [b_1] => b_1 text
            [b_2] => b_2 text
        )
)


RecursiveArrayIterator Object
(
    [storage:ArrayIterator:private] => stdClass Object
        (
            [c_1] => stdClass Object
                (
                    [c_1_1] => c_1_1 text
                )

            [c_2] => stdClass Object
                (
                    [c_2_1] => c_2_1 text
                    [c_2_2] => c_2_2 text
                )
        )
)


RecursiveArrayIterator Object
(
    [storage:ArrayIterator:private] => stdClass Object
        (
            [c_1] => stdClass Object
                (
                    [c_1_1] => c_1_1 text
                )

            [c_2] => stdClass Object
                (
                    [c_2_1] => c_2_1 text
                    [c_2_2] => c_2_2 text
                )
        )
)


RecursiveArrayIterator Object
(
    [storage:ArrayIterator:private] => stdClass Object
        (
            [c_2_1] => c_2_1 text
            [c_2_2] => c_2_2 text
        )
)


RecursiveArrayIterator Object
(
    [storage:ArrayIterator:private] => stdClass Object
        (
            [c_2_1] => c_2_1 text
            [c_2_2] => c_2_2 text
        )
)

*/


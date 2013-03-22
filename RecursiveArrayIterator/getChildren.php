<?php

//A simple use case of RecursiveArrayIterator::getChildren method

function getChildrenTest() {

    $array = array(

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
                            'c_2_3' => 'c_2_3 text',
                    ),
            ),
    );



    $object   = json_decode( json_encode( $array ));    // in case of array with associative keys
//++    $object   = array_to_object( $array );          // in case of array with numeric and/or associative keys
//**    $object   = new ArrayObject( $array, 0, "RecursiveArrayIterator" );
    $iterator = new RecursiveIteratorIterator( new RecursiveArrayIterator( $object ), RecursiveIteratorIterator::CHILD_FIRST );


////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////


    foreach( $iterator as $key => $current ) {

        if( $iterator->getInnerIterator()->hasChildren() && $iterator->getInnerIterator()->getChildren()->count() == 3 ) {

            foreach( $iterator->getInnerIterator()->getChildren() as $key => $value ) {

                $iterator->getInnerIterator()->getChildren()->offsetSet( $key, 'trilling' );
            }
        }
    }

//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////


print_r($object);

}

getChildrenTest();



/* Result

stdClass Object
(
    [a] => a text
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
                )

            [c_2] => stdClass Object
                (
                    [c_2_1] => trilling
                    [c_2_2] => trilling
                    [c_2_3] => trilling
                )
        )
)


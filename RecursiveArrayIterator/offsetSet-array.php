<?php

// Not too simple use case of RecursiveArrayIterator::offsetSet method

function offsetSetArrayTest() {

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



    $object   = json_decode( json_encode( $array ));
//**    $object   = new ArrayObject( $array, 0, "RecursiveArrayIterator" );
    $iterator = new RecursiveIteratorIterator( new RecursiveArrayIterator( $object ), RecursiveIteratorIterator::CHILD_FIRST );


////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////


    foreach( $iterator as $key => $current ) {

        if( $iterator->getInnerIterator()->hasChildren()
              &&
            $iterator->getInnerIterator()->getChildren()->key() != 'new'
              &&
            $iterator->getInnerIterator()->getChildren()->count() == 1
          ) {


            $iterator->getInnerIterator()->getChildren()->offsetSet( 'new', array( 'wow' => 'cool!' ));

            $iterator->getInnerIterator()->getChildren()->offsetUnset( $iterator->getInnerIterator()->getChildren()->key() );
        }
    }

////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////


print_r($object);

}

offsetSetArrayTest();



/* Warning

http://www.php.net/manual/en/arrayiterator.offsetset.php
Description: public void ArrayIterator::offsetSet ( string $index , STRING $newval )



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
                    [new] => Array
                        (
                            [wow] => cool!
                        )

                )

            [c_2] => stdClass Object
                (
                    [c_2_1] => c_2_1 text
                    [c_2_2] => c_2_2 text
                    [c_2_3] => c_2_3 text
                )

        )

)


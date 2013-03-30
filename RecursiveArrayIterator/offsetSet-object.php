<?php

// Not too simple use case of RecursiveArrayIterator::offsetSet method

function offsetSetObjectTest() {

    $array = array(
            'a' => 'a text',

            'b' => array(
                    'b_1' => 'b_1 text',
                    'b_2' => 'b_2 text',
            ),
    );



    $object   = json_decode( json_encode( $array ));
//**    $object   = new ArrayObject( $array, 0, "RecursiveArrayIterator" );
    $iterator = new RecursiveIteratorIterator( new RecursiveArrayIterator( $object ), RecursiveIteratorIterator::CHILD_FIRST );


    foreach( $iterator as $key => $current ) {

////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////


        if( $key == 'b_1' ) {

            $iterator->getInnerIterator()->offsetSet( 'new', (object)array( 'wow' => 'cool!' ));

print_r($object);
        }
        

////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////


        if( $key == 'wow' ) {

            $iterator->getInnerIterator()->offsetSet( $key, 'really ' . $iterator->getInnerIterator()->offsetGet( $key ));

print_r($object);
        }
        

////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
    }
}

offsetSetObjectTest();



/* Warning

http://www.php.net/manual/en/arrayiterator.offsetset.php
Description: public void ArrayIterator::offsetSet ( string $index , string(!) $newval )



/* Result

stdClass Object
(
    [a] => a text
    [b] => stdClass Object
        (
            [b_1] => b_1 text
            [b_2] => b_2 text
            [new] => stdClass Object
                (
                    [wow] => cool!
                )
        )
)

////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

stdClass Object
(
    [a] => a text
    [b] => stdClass Object
        (
            [b_1] => b_1 text
            [b_2] => b_2 text
            [new] => stdClass Object
                (
                    [wow] => really cool!
                )
        )
)


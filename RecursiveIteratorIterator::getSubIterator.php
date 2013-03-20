<?php

//A simple use case of RecursiveIteratorIterator::getSubIterator method

function getSubIteratorTest() {

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
    $iterator = new RecursiveIteratorIterator( new RecursiveArrayIterator( $object ), RecursiveIteratorIterator::SELF_FIRST );


////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////


    $path = '';

    foreach( $iterator as $key => $current ) {

        for( $i = 0; $i < $iterator->getDepth(); $i++ ) {

            $path .= $iterator->getSubIterator($i)->key() . '  ';
        }

        $path .= $key . PHP_EOL;
    }


////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////


print_r($path);

}

getSubIteratorTest();



/* Result

a

b

b  b_1

b  b_2

c

c  c_1

c  c_1  c_1_1

c  c_2

c  c_2  c_2_1

c  c_2  c_2_2


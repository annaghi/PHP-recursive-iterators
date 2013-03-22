<?php

//A simple use case of RecursiveArrayIterator::key method

function keyTest() {

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
                    ),
            ),
    );



    $object = json_decode( json_encode( $array ));    // in case of array with associative keys
//++    $object = array_to_object( $array );          // in case of array with numeric and/or associative keys
//**    $object = new ArrayObject( $array, 0, "RecursiveArrayIterator" );
    $iterator = new RecursiveIteratorIterator( new RecursiveArrayIterator( $object ), RecursiveIteratorIterator::SELF_FIRST );


////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////


    $tree = '';

    foreach( $iterator as $key => $current ) {

        for( $i = 0; $i <= $iterator->getDepth(); $i++ ) {

            $tree .= $iterator->getSubIterator($i)->key() . '  ';
        }

        $tree .= PHP_EOL;
    }


////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////


print_r($tree);

}

keyTest();



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


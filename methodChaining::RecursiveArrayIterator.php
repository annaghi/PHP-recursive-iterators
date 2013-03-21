<?php

function insertSingle( $iterator ) {

    while( $iterator->valid() ) {

        if( $iterator->hasChildren() ) {

            foreach( $iterator->getChildren() as $key => $value ) {

                if( $iterator->getChildren()->hasChildren() && $iterator->getChildren()->getChildren()->count() == 1 ) {

                    foreach( $iterator->getChildren()->getChildren() as $key => $value ) {

                        $iterator->getChildren()->getChildren()->offsetSet( $key, 'single grandchild' );
                    }
                }
            }
        }

        if( $iterator->hasChildren() ) {
            insertSingle( $iterator->getChildren() );
        }

        $iterator->next();
    }
}



function methodChainingTest() {

    $array = array (

            'a' => 'a text',

            'b' => array(
                    'b_1' => 'b_1 text',
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

    $object   = json_decode( json_encode( $array ));    // in case of array with associative keys
//++    $object   = array_to_object( $array );          // in case of array with numeric and/or associative keys
//**    $object   = new ArrayObject( $array, 0, "RecursiveArrayIterator" );
    $iterator = new RecursiveArrayIterator( $object );


    iterator_apply( $iterator, 'insertSingle', array( $iterator, ));


print_r($object);

}

methodChainingTest();


////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////



/* Result

stdClass Object
(
    [a] => a text
    [b] => stdClass Object
        (
            [b_1] => b_1 text
        )

    [c] => stdClass Object
        (
            [c_1] => stdClass Object
                (
                    [c_1_1] => single grandchild
                )

            [c_2] => stdClass Object
                (
                    [c_2_1] => c_2_1 text
                    [c_2_2] => c_2_2 text
                )
        )
)


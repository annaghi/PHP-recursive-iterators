<?php

// array for testing the recursive methods


$array = array (

        'a' => '',
        'b' => array(),

        'c' => 'c first',

        'd' => array(
                'd_1' => 'd_1 first',
        ),

        'e' => array(
                'e_1' => 'e_1 first',
                'e_2' => 'e_2 first',
        ),

        'f' => array(
                'f_1' => array(
                        'f_1_1' => 'f_1_1 first',

                ),
                'f_2' => array(
                        'f_2_1' => 'f_2_1 first',
                        'f_2_2' => 'f_2_2 first',
                ),
        ),

        'g' => array(

                0,
                array(),

                'num c first',

                array(
                        'num d_1 first',
                ),

                array(
                        'num e_1 first',
                        'num e_2 first',
                ),

                array(
                        array(
                                'num f_1_1 first',
                        ),
                        array(
                                'num f_2_1 first',
                                'num f_2_2 first',
                        ),
                ),
        ),



        // extreme items:
        'h_e' => array(
                'e_01' => 0,
                'e_02' => -1,
                'e_03' => 1,
                'e_04' => 0.5,
                'e_05' => -0.5,
                'e_06' => false,
                'e_07' => FALSE,
                'e_08' => true,
                'e_09' => TRUE,
                'e_10' => null,
                'e_11' => NULL,
                'e_12' => Array(),
                'e_13' => new stdClass(),
        ),

//////////////////////////////////    REPEAT    //////////////////////////////////

        'i' => array(

                'a' => '',
                'b' => array(),

                'c' => 'c second',

                'd' => array(
                        'd_1' => 'd_1 second',
                ),

                'e' => array(
                        'e_1' => 'e_1 second',
                        'e_2' => 'e_2 second',
                ),

                'f' => array(
                        'f_1' => array(
                                'f_1_1' => 'f_1_1 second',
                        ),
                        'f_2' => array(
                                'f_2_1' => 'f_2_1 second',
                                'f_2_2' => 'f_2_2 second',
                        ),
                ),

                'g' => array(

                        0,
                        array(),

                        'num c second',

                        array(
                                'num d_1 second',
                        ),

                        array(
                                'num e_1 second',
                                'num e_2 second',
                        ),

                        array(
                                array(
                                        'num f_1_1 second',
                                ),
                                array(
                                        'num f_2_1 second',
                                        'num f_2_2 second',
                                ),
                        ),
                ),



                // extreme items:
                'h_e' => array(
                        'e_01' => 0,
                        'e_02' => -1,
                        'e_03' => 1,
                        'e_04' => 0.5,
                        'e_05' => -0.5,
                        'e_06' => false,
                        'e_07' => FALSE,
                        'e_08' => true,
                        'e_09' => TRUE,
                        'e_10' => null,
                        'e_11' => NULL,
                        'e_12' => Array(),
                        'e_13' => new stdClass(),
                ),
        ),
);



<?php

/* array for testing the recursive methods


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
                0 => 0,
                1 => 1,

                2 => array(
                        1 => 21,
                ),

                3 => array(
                        3 => 33,
                        4 => 34,
                ),

                4 => array(
                        5 => array(
                                0 => 450,

                        ),
                        7 => array(
                                8 => 478,
                                6 => 476,
                        ),
                ),
        ),


        'h' => array(
                0 => 'h 0 first',
                1 => 'h 1 first',

                2 => array(
                        1 => 'h 2 1 first',
                ),

                3 => array(
                        3 => 'h 3 3 first',
                        4 => 'h 3 4 first',
                ),

                4 => array(
                        5 => array(
                                0 => 'h 4 5 0 first',

                        ),
                        7 => array(
                                8 => 'h 4 7 8 first',
                                6 => 'h 4 7 6 first',
                        ),
                ),
        ),


        // extreme items:
        'e' => array(
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

        'j' => array(
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
                        0 => 0,
                        1 => 1,

                        2 => array(
                                1 => 21,
                        ),

                        3 => array(
                                3 => 33,
                                4 => 34,
                        ),

                        4 => array(
                                5 => array(
                                        0 => 450,

                                ),
                                7 => array(
                                        8 => 478,
                                        6 => 476,
                                ),
                        ),
                ),


                'h' => array(
                        0 => 'h 0 second',
                        1 => 'h 1 second',

                        2 => array(
                                1 => 'h 2 1 second',
                        ),

                        3 => array(
                                3 => 'h 3 3 second',
                                4 => 'h 3 4 second',
                        ),

                        4 => array(
                                5 => array(
                                        0 => 'h 4 5 0 second',

                                ),
                                7 => array(
                                        8 => 'h 4 7 8 second',
                                        6 => 'h 4 7 6 second',
                                ),
                        ),
                ),


                // extreme items:
                'e' => array(
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


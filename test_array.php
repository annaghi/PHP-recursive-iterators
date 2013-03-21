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
                'g_01' => 0,
                'g_02' => -1,
                'g_03' => 1,
                'g_04' => 0.5,
                'g_05' => -0.5,
                'g_06' => false,
                'g_07' => FALSE,
                'g_08' => true,
                'g_09' => TRUE,
                'g_10' => null,
                'g_11' => NULL,
                'g_12' => Array(),
                'g_13' => new stdClass(),
        ),

        'h' => array(
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

        'i' => array(
                0 => 'i 0 first',
                1 => 'i 1 first',

                2 => array(
                        1 => 'i 2 1 first',
                ),

                3 => array(
                        3 => 'i 3 3 first',
                        4 => 'i 3 4 first',
                ),

                4 => array(
                        5 => array(
                                0 => 'i 4 5 0 first',

                        ),
                        7 => array(
                                8 => 'i 4 7 8 first',
                                6 => 'i 4 7 6 first',
                        ),
                ),
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
                        'g_01' => 0,
                        'g_02' => -1,
                        'g_03' => 1,
                        'g_04' => 0.5,
                        'g_05' => -0.5,
                        'g_06' => false,
                        'g_07' => FALSE,
                        'g_08' => true,
                        'g_09' => TRUE,
                        'g_10' => null,
                        'g_11' => NULL,
                        'g_12' => Array(),
                        'g_13' => new stdClass(),
                ),

                'h' => array(
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

                'i' => array(
                        0 => 'i 0 second',
                        1 => 'i 1 second',

                        2 => array(
                                1 => 'i 2 1 second',
                        ),

                        3 => array(
                                3 => 'i 3 3 second',
                                4 => 'i 3 4 second',
                        ),

                        4 => array(
                                5 => array(
                                        0 => 'i 4 5 0 second',

                                ),
                                7 => array(
                                        8 => 'i 4 7 8 second',
                                        6 => 'i 4 7 6 second',
                                ),
                        ),
                ),
        ),
);


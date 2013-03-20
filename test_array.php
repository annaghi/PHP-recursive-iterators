<?php

/* array for testing the recursive methods


$array = array (
        'a' => '',
        'b' => 'b first',
        'c' => array(),

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
                'g_10' => Array(),
                'g_11' => new stdClass(),
        ),

        'h' => array(
                0 => 0,
                1 => 1,
                2 => array(
                        3 => 3,
                        4 => 4,
                ),
        ),

//////////////////////////////////    REPEAT    //////////////////////////////////

        'h' => array(
                'a' => '',
                'b' => 'b second',
                'c' => array(),

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
                        'g_10' => Array(),
                        'g_11' => new stdClass(),
                ),

                'h' => array(
                        0 => 0,
                        1 => 1,
                        2 => array(
                                3 => 3,
                                4 => 4,
                        ),
                ),
        ),
);


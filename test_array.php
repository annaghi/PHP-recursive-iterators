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
                'g_1' => 0,
                'g_2' => -1,
                'g_3' => 1,
                'g_4' => false,
                'g_5' => FALSE,
                'g_6' => true,
                'g_7' => TRUE,
                'g_8' => Array(),
                'g_9' => new stdClass(),
        ),

//////////////////////////////////    REPEAT    //////////////////////////////////

        'h' => array(
        
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
                        'g_1' => 0,
                        'g_2' => -1,
                        'g_3' => 1,
                        'g_4' => false,
                        'g_5' => FALSE,
                        'g_6' => true,
                        'g_7' => TRUE,
                        'g_8' => Array(),
                        'g_9' => new stdClass(),
                ),
        ),
);


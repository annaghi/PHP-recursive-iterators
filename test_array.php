<?php

/* A very detailed array could be used to test the behavior of the recursive methods


$array = array (
        'a' => '',
        'b' => 'b first',

        'c' => array(),
        'd' => array(
                'd_01' => 'd_01 first',
        ),
        'e' => array(
                'e_01' => 'e_01 first',
                'e_02' => 'e_02 first',
        ),

        'f' => array(
                'f_01' => array(
                        'f_01_01' => 'f_01_01 first',
                        'f_01_02' => 'f_01_02 first',
                        'f_01_03' => 'f_01_03 first',
                ),

                'f_02' => 0,
                'f_03' => -1,
                'f_04' => 1,
                'f_05' => false,
                'f_06' => FALSE,
                'f_07' => true,
                'f_08' => TRUE,
                'f_09' => Array(),
                'f_10' => new stdClass(),

////////////////////////////////// AGAIN /////////////////////////////////////////////////

                'a' => '',
                'b' => 'b second',

                'c' => array(),
                'd' => array(
                        'd_01' => 'd_01 second',
                ),
                'e' => array(
                        'e_01' => 'e_01 second',
                        'e_02' => 'e_02 second',
                ),

                'f' => array(
                        'f_01' => array(
                                'f_01_01' => 'f_01_01 second',
                                'f_01_02' => 'f_01_02 second',
                                'f_01_03' => 'f_01_03 second',
                        ),

                        'f_02' => 0,
                        'f_03' => -1,
                        'f_04' => 1,
                        'f_05' => false,
                        'f_06' => FALSE,
                        'f_07' => true,
                        'f_08' => TRUE,
                        'f_09' => Array(),
                        'f_10' => new stdClass(),
                ),
        ),
);


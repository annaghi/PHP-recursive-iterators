<?php

/* A very detailed array could be used to test the behavior of the recursive methods


    $array = array (
            'a' => array(
                    'a_01' => 'a_01 first',
            ),
            'b' => array(
                    'b_01' => 'b_01 first',
                    'b_02' => 'b_02 first',
            ),
            'c' => array(
                    'c_01' => array(
                            'c_01_01' => 'c_01_01 first',
                            'c_01_02' => 'c_01_02 first',
                            'c_01_03' => 'c_01_03 first',
                    ),

                    'c_02' => 0,
                    'c_03' => -1,
                    'c_04' => 1,
                    'c_05' => '',
                    'c_06' => false,
                    'c_07' => FALSE,
                    'c_08' => true,
                    'c_09' => TRUE,
                    'c_10' => array(),
                    'c_11' => Array(),
                    'c_12' => new stdClass(),

////////////////////////////////// AGAIN /////////////////////////////////////////////////

                    'a' => array(
                            'a_01' => 'a_01 second',
                    ),
                    'b' => array(
                            'b_01' => 'b_01 second',
                            'b_02' => 'b_02 second',
                    ),
                    'c' => array(
                            'c_01' => array(
                                    'c_01_01' => 'c_01_01 second',
                                    'c_01_02' => 'c_01_02 second',
                                    'c_01_03' => 'c_01_03 second',
                            ),

                            'c_02' => 0,
                            'c_03' => -1,
                            'c_04' => 1,
                            'c_05' => '',
                            'c_06' => false,
                            'c_07' => FALSE,
                            'c_08' => true,
                            'c_09' => TRUE,
                            'c_10' => array(),
                            'c_11' => Array(),
                            'c_12' => new stdClass(),
                    ),
            ),
    );


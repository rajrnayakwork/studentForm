<?php

    class Student {
        public $student_data = [];

        function ifSessionIsEmpty(){
            $this->student_data = [
                [
                    'first_name' => 'amitabh',
                    'last_name' => 'bachan',
                    'age' => 70,
                ],
                [
                    'first_name' => 'jaya',
                    'last_name' => 'bachan',
                    'age' => 61,
                ],
                [
                    'first_name' => 'abhisekh',
                    'last_name' => 'bachan',
                    'age' => 52,
                ],
                [
                    'first_name' => 'ashwariya',
                    'last_name' => 'bachan',
                    'age' => 43,
                ],
                [
                    'first_name' => 'lata',
                    'last_name' => 'bachan',
                    'age' => 7,
                ],
            ];
            $_SESSION['student_data'] = $this->student_data;
        }
    }

?>
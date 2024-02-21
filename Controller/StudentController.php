<?php require '../Model/Student.php'; ?>
<?php

    session_start();
    
    class StudentController{
        function __construct(){
            $student = new Student();
            if(empty($_SESSION['student_data'])){
                $_SESSION['student_data'] = [];
                $student->ifSessionIsEmpty();
            }
        }
        
        function getData(){
            if(!(empty($_SESSION['student_data']))){
                return $_SESSION['student_data'];
            }
        }

        function inputData($post){
            $array = [
                'first_name' => $post['first_name'],
                'last_name' => $post['last_name'],
                'age' => $post['age'],
            ];
            $_SESSION['student_data'] [] = $array;
            header('location:../View/index.php');
        }
        
        function editData($post){
            $_SESSION['student_data'][$post['edit_id']] = [
                'first_name' => $post['first_name'],
                'last_name' => $post['last_name'],
                'age' => $post['age'],
            ];
            header('location:../View/index.php');
        }
    }

?>
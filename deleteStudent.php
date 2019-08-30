<?php
require_once "Student.php";

$student_id = $_GET['student_id'];

$student = new Student;

$student->deleteStudent($student_id);

?>
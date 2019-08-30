<?php
require_once "Student.php";

$student = new Student;

$get_all_student = $student->getAllStudent();
?>

<!doctype html>
<html lang="en">
  <head>
    <title>Title</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  </head>
  <body>
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h3>Student List</h3>
                    </div>
                    <div class="card-body">
                        <table class="table table-striped table-boredered">
                            <thead>
                                <th>ID</th>
                                <th>Name</th>
                                <th>Course</th>
                                <th>Gender</th>
                                <th>Date Created</th>
                                <th>Action</th>
                                <th></th>
                            </thead>                      
                            <tbody>
                                <?php
                                    if($get_all_student == false){
                                        echo "<tr><td colspan='7' class='text-center'>No Students</td></tr>";
                                    } else {
                                        foreach($get_all_student as $key => $row){
                                            $student_id = $row['student_id'];
                                            $student_name = $row['student_name'];
                                            $student_course = $row['student_course'];
                                            $student_gender = $row['student_gender'];
                                            
                                            $date_created = strtotime($row['date_created']);
                                            $new_date_created = date("M d, Y h:i:s a", $date_created);

                                            echo "<tr>";
                                            echo "<td>" . $row['student_id'] ."</td>";
                                            echo "<td>" . $row['student_name'] ."</td>";
                                            echo "<td>" . $row['student_course'] ."</td>";
                                            echo "<td>" . $row['student_gender'] ."</td>";
                                            echo "<td>$new_date_created</td>";
                                            echo "<td><a href='editStudent.php?student_id=$student_id' class='btn btn-info'>Edit</a></td>";
                                            echo "<td><a href='addStudent.php?student_id=$student_id' class='btn btn-primary'>Add</a></td>";
                                            echo "<td><a href='deleteStudent.php?student_id=$student_id' class='btn btn-danger'>Delete</a></td>";
                                            echo "</tr>";

                                        }
                                    }

                                ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
      
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  </body>
</html>
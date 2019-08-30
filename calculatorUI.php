<?php

require_once "Calculator.php";

$calculator = new Calculator;

if(isset($_POST['submit'])){
    $value1 = $_POST['value1'];
    $value2 = $_POST['value2'];
    $operator = $_POST['operator'];
    
    $calculator->setValues($value1, $value2, $operator);
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="css/bootstrap.css">
</head>
<body>
    <div class="container mt-5">
        <div class="card">
            <div class="card-header display-4">Calculator</div>
                <div class="card-body">
                    <form method="post">
                        <div class="form-group">
                            <label>Value</label>
                            <input type="text" name="value1" class="form-control">
                        </div>

                        <div class="form-group">
                            <label>Operator</label>
                            <select type="text" name="operator" class="form-control">
                                <option value="+">+</option>
                                <option value="-">-</option>
                                <option value="*">*</option>
                                <option value="/">/</option>
                            </select>
                            </select>
                        </div>

                        <div class="form-group">
                            <label>Value</label>
                            <input type="text" name="value2" class="form-control">
                        </div>

                        <div class="clearfix">
                        <button type="submit" name="submit" class="btn btn-primary float-right">Calculate</button>
                        </div>

                    </form>
                
                    <hr>
                    <h3>Output</h3>
                    <h5><?php echo $calculator->getValue1(); ?> <?php echo $calculator->getOperator(); ?> <?php echo $calculator->getValue2(); ?> = <?php echo $calculator->getAnswer(); ?></h5>

                </div>                
            </div>
        </div>
    </div>
</body>
</html>
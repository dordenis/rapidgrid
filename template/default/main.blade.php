<!DOCTYPE html>
<html>
<head>
    <title>Rapid Grid</title>
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">

    <!-- Optional theme -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap-theme.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <!-- Latest compiled and minified JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
    <style>
        .th-filter {
            margin-left: 10px;
            cursor: pointer;
        }

        .filter-active {
            color: #d9534f;
        }

        .filter-passive {
            color: #ccc;
        }

        .th-sort {
            margin-left: 10px;
            color: #d9534f;
            cursor: pointer;
        }

        .th-sort a {
            color: #ccc;
            text-decoration: none;
        }

    </style>		
</head>
<body>
<div class="container">
    <div class="row">
        <div class="col-lg-12">
            {!! $grid !!}
        </div>
    </div>
</div>
</body>
</html>

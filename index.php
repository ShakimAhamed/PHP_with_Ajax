<?php
include 'db_connect.php';
?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="bootstrap/bootstrap.min.css">
    <title>Assignment</title>
</head>
<body>
<div class="container">
    <div class="row jumbotron">
        <a class="btn btn-success ml-3" id="back" href="index.php">Back</a>
        <div class="col-md-12" id="bs">
            <?php
                $query = "SELECT * FROM course";
                $result= $db->query($query);
                $res1=$result->fetch_assoc();
                echo '<table class="table table-bordered table-hover ">';
                echo'<th>Course Name</th>
                     <th>Room</th>';
                while($res1)
                {
                 $c_name=$res1["course_name"];
                 $id = $res1["course_id"];
                 $room=$res1["room"];
                 echo '
                    <tr >
                         <td >
                            <button class="btn nm btn-primary" course_id="'.$c_name.'" id="courseId" >'.$c_name.'</button>
                         </td>
                         <td >
                            <button class="btn btn-primary" room_id="'.$room.'" id="roomId" >'.$room.'</button>
                        </td>
                     </tr>
                  ';
                  $res1=$result->fetch_assoc();
                }
                echo '</table>';
            ?>
        </div>
    </div>
</div>

<script src="jquery/jquery.js"></script>
<script src="jquery/popper.min.js"></script>

<script>

$("body").delegate("#courseId", "click", function(event) {
    event.preventDefault();
    var courseId = $(this).attr("course_id");

    $.ajax({
        url: "check.php",
        method: "POST",
        data: {
            courseId: courseId
        },
        success: function(data) {
           document.getElementById("bs").innerHTML = data;
        }
    })
});


$("body").delegate("#roomId", "click", function(event) {
    event.preventDefault();
    var roomId = $(this).attr("room_id");
   
    $.ajax({
        url: "check.php",
        method: "POST",
        data: {
            roomId: roomId
        },
        success: function(data) {
            document.getElementById("bs").innerHTML = data;
        }
    })
});


$("body").delegate("#back", "click", function(event) {
    event.preventDefault();
    var backId = $(this).attr("class");
    $.ajax({
        url: "check.php",
        method: "POST",
        data: {
            backId: backId
        },
        success: function(data) {
           document.getElementById("bs").innerHTML = data;
        }
    })
});

$("body").delegate("#rmm", "click", function(event) {
    event.preventDefault();
    var rm = $(this).attr("id1");
    console.log(rm);
    $.ajax({
        url: "check.php",
        method: "POST",
        data: {
            rm: rm
        },
        success: function(data) {
           document.getElementById("bs").innerHTML = data;
        }
    })
});

</script>
</body>
</html>
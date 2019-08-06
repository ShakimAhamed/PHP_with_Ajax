<?php
    
include 'db_connect.php';

    if(isset($_POST["backId"]))
    {
        $query = "SELECT * FROM course";
        $result= $db->query($query);
        $res1=$result->fetch_assoc();

        $string ='<table class="table table-bordered table-hover ">';
        $string .='<th>Course Name</th>
                <th>Room</th>';
        while($res1)
        {
            $c_name=$res1["course_name"];
            $id = $res1["course_id"];
            $room=$res1["room"];
            $string .= '
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
        $string .= '</table>';
        echo $string;
    }

    if(isset($_POST["courseId"]))
    {
        $courseId = $_POST["courseId"];
        $Name = $courseId;

        $query ="SELECT p.name, p.student_id 
            from (SELECT course.course_id,course.course_name,course.room ,course_taken.student_id, student.name 
            FROM course 
            inner JOIN course_taken 
            on course.course_id = course_taken.course_id
            inner join student 
            on student.student_id = course_taken.student_id) 
            as p where p.course_name = '$Name' ";
        
        $result= $db->query($query);
        $res=$result->fetch_assoc();

        $string = '<table id="hide" class="table table-bordered table-hover ">';
        $string .='
            <th>student_id</th>
            <th>name</th>
            ';
        while($res)
        {
            $s_id=$res["student_id"];
            $s_name=$res["name"];
            $string .= '
                <tr>
                    <td><button>'.$s_id.'</button></td>
                    <td><button>'.$s_name.'</button></td>
                </tr>
            ';
            $res=$result->fetch_assoc();
        }
        $string .= '</table>';
        echo $string;
    }

    if(isset($_POST["roomId"]))
    {
        $pt = $_POST["roomId"];
        $query = "  SELECT room,course_name 
                    FROM  course
                    WHERE room = '$pt'";

        $result= $db->query($query);
        $res=$result->fetch_assoc();
        $string = '<table id="hide1" class="table table-bordered table-hover ">';
        
        $string .=' <th>room</th>
                    <th>Course_name</th>';

        while($res)
        {
        $nm=$res["room"];
        $ts=$res["course_name"];
        $string .= '
            <tr>
                <td><button id="'.$nm.'">'.$nm.'</button></td>
                <td><button id="rmm" id1="'.$ts.'">'.$ts.'</button></td>
            </tr>
        ';
        $res=$result->fetch_assoc();
        }
        $string .= '</table>';
        echo $string;
    }

    if(isset($_POST["rm"]))
    {
        $rm = $_POST["rm"];
        $Name = $rm;

        $query ="SELECT p.name, p.student_id 
            from (SELECT course.course_id,course.course_name,course.room ,course_taken.student_id, student.name 
            FROM course 
            inner JOIN course_taken 
            on course.course_id = course_taken.course_id
            inner join student 
            on student.student_id = course_taken.student_id) 
            as p where p.course_name = '$Name' ";
        
        $result= $db->query($query);
        $res=$result->fetch_assoc();

        $string = '<table id="hide" class="table table-bordered table-hover ">';
        $string .='
            <th>student_id</th>
            <th>name</th>
            ';
        while($res)
        {
            $s_id=$res["student_id"];
            $s_name=$res["name"];
            $string .= '
                <tr>
                    <td><button>'.$s_id.'</button></td>
                    <td><button>'.$s_name.'</button></td>
                </tr>
            ';
            $res=$result->fetch_assoc();
        }
        $string .= '</table>';
        echo $string;
    }
?>
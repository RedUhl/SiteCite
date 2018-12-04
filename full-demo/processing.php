<?php

function devOpenDb($hostname,$uid,$pwd,$database){
  $link = mysql_connect($hostname,$uid,$pwd);
  if($link && mysql_select_db($database)){
    //echo "Database Connected with Development Link ";
    return($link);
  } else {
    echo "No connection ";
    return(FALSE);
  }
}
// Should be DB link
$dblink = devOpenDb("localhost","kbb269", "gr33nt3a", "kbb269");

function executeQuery($link,$sql){
  $result = mysql_query($sql,$link);
  if($result == false){ 
    echo "<br /><br />Error:".mysql_error()."<br /> , Line:".__LINE__."<br /> $sql <br />";
    return array();
  }
  else{
    $return_array = array();
    while($row = mysql_fetch_assoc($result)){
      $return_array[]=$row;
    } 
    return $return_array;
  }
}


if (isset($_POST['enum']) && $_POST['enum'] == "courses") {
  $sql = " SELECT courseCode, courseName FROM Courses";
  $result = executeQuery($dblink, $sql);
  echo json_encode($result);
}

if (isset($_POST['listCourseInformation'])) {
  if ($_POST['listCourseInformation'] != "course"){
    $codeCourse = (string)$_POST['listCourseInformation'];
    $courseIDval = " SELECT courseID FROM Courses WHERE courseCode = '".$codeCourse."'";
    $resultCourse = executeQuery($dblink, $courseIDval);
    while (list($key, $element) = each($resultCourse[0])) {
       $course_num = $element;
    }
    $constructing = array();
    $sql1 = "SELECT capitalizationscore,completedcitations, orderingscore,punctuationscore,formatingscore FROM Students WHERE courseID='".$course_num."'";
    $resultCourse2 = executeQuery($dblink, $sql1);

    $courseIDval2 = " SELECT coursename, coursecode FROM Courses WHERE courseID = '".$course_num."'";
    $resultCourse3 = executeQuery($dblink, $courseIDval2);
    
    $constructing['scores'] = $resultCourse2;
    $constructing['courseInfo'] = $resultCourse3;
    echo json_encode($constructing);
  }
}

if (isset($_POST['listAssignmentInformation'])) {
  if ($_POST['listAssignmentInformation'] != "course"){
    $not = (string)$_POST['listAssignmentInformation'];
    $assign = " SELECT courseCode, courseName, assignment FROM Courses";
    $resultAssign = executeQuery($dblink, $assign);

    $assignVal = array();
    $sqlProg = "SELECT studentID, name, completedcitations, courseID FROM Students";
    $resultProg = executeQuery($dblink, $sqlProg);
    
    $sqlLazy = "SELECT courseID, assignment FROM Courses";
    $resultLazy = executeQuery($dblink, $sqlLazy);

    $assignVal['assignment'] = $resultAssign;
    $assignVal['progress'] = $resultProg;
    $assignVal['info'] = $resultLazy;
    echo json_encode($assignVal);
  }
}

if (isset($_POST['requestCitation'])) {
  if ($_POST['requestCitation'] != "course"){
    $ignore = (string)$_POST['requestCitation'];
    $citationQ = " SELECT citation FROM Citation";
    $resultCitation = executeQuery($dblink, $citationQ);
    echo json_encode($resultCitation);
  }
}

if (isset($_POST['listAssignmentCompletions'])) {
  if ($_POST['listAssignmentCompletions'] != "course"){
    $code = (string)$_POST['listAssignmentCompletions'];
    $courseIDval = " SELECT courseID FROM Courses WHERE courseCode = '".$code."'";
    $result = executeQuery($dblink, $courseIDval);
    while (list($key, $element) = each($result[0])) {
      $course_num = $element;
    }
    $sql = " SELECT studentID FROM Students WHERE courseID=".$course_num;
    $result2 = executeQuery($dblink, $sql);
    $stu_IDs = array();

    for ($i=0;$i < sizeof($result2); $i++){
      $stu_IDs[] = $result2[$i]["studentID"];
    }
    $final_array = array();
    for ($i=0;$i < sizeof($stu_IDs); $i++) {
      $sql = "SELECT * FROM Students WHERE studentID=".$stu_IDs[$i];
      $result3 = executeQuery($dblink, $sql);
      $final_array[]=$result3;
    }
    echo json_encode($final_array);
  }
}

?>
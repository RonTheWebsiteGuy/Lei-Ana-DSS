<?php
require_once 'dbconnect.php'
 ?>


<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Degree</title>
  </head>
  <body>
    <?php 
    ?>
  </body>
</html>

//SQL Statement to get all majors with classes requirements
SELECT Majors.mName, Classes.Class_Name, Classes.class_Number
FROM Majors
Inner Join Prerequisites ON Majors.majorID=Prerequisites.MajorID
Inner Join Classes ON Prerequisites.ClassID=Classes.classID;

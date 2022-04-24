<?php
/*This unfinished page will allow the user to view the fixed
queries*/
session_start();
require "Header.inc.php";
require "includes/DBConnection.inc.php";
/*User Data query*/
$result = $conn->query('SELECT DISTINCT MAJOR
                        FROM StudentIDData
                        ORDER BY MAJOR;')
                        or die($conn->error);

$majorList = [];
$i = 0;

while ($row = $result->fetch_assoc()) {
  $majorList[$i] = $row['MAJOR'];
  $i++;
}
?>

<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="styles.css">
</head>
<body>

<h1 align="center">View Fixed Queries Page</h1>
<br><br>
<h2 align="center">Query 1: View the average number of
   advisees per each advisor</h2>
   <br>

<form method="post" action="fixedQueries/Q1AvgAdvisees.php" align="center">
  <div class="container">
   <button class="goToLoginBtn"
   align="center" name="FixedQueryOneBtn">View Query One</button>
  </div>
</form>


<br><br>
<h2 align="center">Query 2: List all students whose Percent combined SAT Score
  is less than their GPA as a percentage</h2>
<br>

<form method="post" action="fixedQueries/Q2PercentSAT.php" align="center">
  <div class="container">
   <button class="goToLoginBtn"
   align="center" name="FixedQueryTwoBtn">View Query Two</button>
  </div>
</form>

<br><br>
<h2 align="center">Query 3: Generate a transcript that lists the semester
   GPA for each student for each semester that the student took classes</h2>
   <br>

   <form method="post" action="fixedQueries/Q3SemesterGPA.php" align="center">
     <div class="container">
      <button class="goToLoginBtn"
      align="center" name="FixedQueryThreeBtn">View Query Three</button>
     </div>
   </form>

<br><br>
<h2 align="center">Query 4: Compute the average GPA of all male students
  and average GPA of all female students whose major is specified by the
  user</h2>
  <br>

  <form method="post" action="fixedQueries/Q4GPAByMajor.php" align="center">
  <div align="center" class="container">
    <h4 align="center">Select a Major to search:</h4>
    <select class="selectStyles" name="SelectMajorForQuery">
      <?php
      /*This select and for loop displays all majors in the database.
      If unchanged, it will still use the topmost major.*/
      for ($i = 0; $i < count($majorList); $i++) {?>
        <option value="<?php echo $majorList[$i]; ?>">
          <?php echo $majorList[$i]; ?>
        </option>
      <?php }?>
    </select>
    <br><br>

     <button class="goToLoginBtn"
     align="center" name="FixedQueryFourBtn">View Query Four</button>
    </div>
  </form>
  <br><br><br><br><br>
</body>
</html>

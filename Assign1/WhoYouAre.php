<!doctype html>
<body>
    <div id ="form_container"></div>
<h1 class="Content">This is Who you are!</h1>
<div class="InfoSheet">
<?php
 
$name = ucwords(strtolower(htmlentities($_POST['Name'])));
$age = $_POST['Age'];
$sex = $_POST['Sex'];
$address = $_POST['Address'];
$state = $_POST['State'];


$info = printf("<header> <h1> Your name is %s you are a %s and %s years old! </h1>"
. "<h1>Living in %s at this address: %s </h1></header>", $name, $sex, $age, $state, $address);
echo file_get_contents( "PostPage.txt" );
echo (" <br> \n\n <br>");
?>
</div> 
</body>

<?php

$ageI = $age;
$year = 2017;

echo ("\n\n Current date to the Year you were born: <br>\n");

while ($ageI>=0)
{

echo $year."<br>";
$year--;
$ageI--;
}

if ($sex == "Male")
{
echo '<body style="background-color:blue">';
}
else
{
echo '<body style="background-color:pink">';
}

?>
</html>
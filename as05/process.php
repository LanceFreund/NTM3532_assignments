
<?php
echo " <br /> Great! <br /> Thanks ";
echo $_POST["firstname"] . " " . $_POST["lastname"];
echo "<br /> for responding to our survey.";
?>
<p>     </p>

<?php
echo "<h3>Student Details</h3>";
echo " Student Name: " . $_POST["firstname"] . " " . $_POST["lastname"] . "<br />";
echo " Student Year of birth: " . $_POST["birthyear"] . "<br />";
echo " Current school year: " . $_POST["schoolyear"] . "<br />";
echo " Number of siblings: " . $_POST["siblings"];
?>

<?php
echo " <h3>Based on the information you've entered, you will spend: </h3>";

$total = 4 - $_POST["schoolyear"];

echo $_POST["tv"] * 365 . " hours per year watching TV or movies. " . "<br />";
echo $_POST["homework"] * 365 . " hours per year doing homework. " . "<br />";
echo $_POST["tv"] * 365 + $_POST["games"] * 365 . " hours per year in front of a TV or computer screen. And " . "<br />";
echo $_POST["family"] * 365 . " hours per year with friends and family ";
?>

<p>     </p>

<?php
echo " <h3> Based on your current year level at school: </h3>";
echo " You have " . $total . " years of school left before you graduate. " . "<br />";
echo " <br /> ";
echo " During these years that you have left you will spend: " . "<br />" . (($_POST["homework"] * 365) * 3) . " hours doing home work, and " . "<br />" . (($_POST["tv"] * 365) + ($_POST["games"] * 365)) * $total . " hours in front of a screen until you finish school. ";
echo "<br />";
?>


<?php
// these calculate the hours for 
$wakehours = $_POST["waketime"] - $_POST["bedtime"];
$wakehours = (24 - $wakehours) * 365;
$screentime = ($_POST["tv"] * 365) + ($_POST["games"] * 365) + ($_POST["homework"] * 365);

echo "<br />" . "With a yearly average TV time at " . $_POST["tv"] * 365 . " hours, " . "<br />";
echo " a yearly average videogame time of " . $_POST["games"] * 365 . " hours, " . "<br />";
echo " and a yearly average homework time of " . $_POST["homework"] * 365 . " hours. ";
echo " <br /> ";
echo " <br /> " . " This means that out of the " . $_POST["waketime"] * 365 . " hours you spend awake yearly. Nearly ";

$percent = $screentime / $wakehours;

echo number_format ($percent, 2, '.', '') * 100 . "% spent awake will be done so in front of a digital screen. ";
?>
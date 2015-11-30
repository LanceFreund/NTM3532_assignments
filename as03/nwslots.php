<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Slot Machine</title>
</head>
<body>
    <?php

        /************
         slots.php - Adapted version - original code by Duane O'Brien
         ************/

         /* TODO New Line: Setup an array named faces that has the following values Cherry, Bar, Double Bar, Triple Bar, Diamond, Seven.
         They represent the possible faces a wheel of a slot machine can land on. (DONE)*/
$faces = array("Cherry", "Bar", "Double Bar", "Triple Bar", "Diamond", "Seven");

        /* TODO New Lines: 
        Setup an associative array named payouts. An associative array requires that you have a key and a value. 
        The key in our case is the winning slot machine spins. In the form of 'Bar|Bar|Bar'. 
        The '|' represents the separation of the wheels. The value is how much money they win it they spin any of the keys i.e 'Bar|Bar|Bar'. 
        The key always points at the value like so: 'Bar|Bar|Bar' => '10'.
        
        So the possible combinations are: 
        'Bar|Bar|Bar' pays '10', 
        'Double Bar|Double Bar|Double Bar' pays '20', 
        'Triple Bar|Triple Bar|Triple Bar' pays '30', 
        'Cherry|Cherry|Cherry' pays '50', 
        'Seven|Seven|Seven' pays '70', 
        'Diamond|Diamond|Diamond' pays '100' (DONE)*/

$payouts = array("Bar|Bar|Bar" => 10, "Double Bar|Double Bar|Double Bar" => 20, "Triple Bar|Triple Bar|Triple Bar" => 30, "Cherry|Cherry|Cherry" => 50, "Seven|Seven|Seven" => 70, "Diamond|Diamond|Diamond" => 100);

        /* TODO New Line: Setup a variable called $wheel1 that stores an empty array. (DONE)*/

$wheel1 = array();

        /* TODO New Line: Create a foreach loop that loops through the $faces array. Each time through the loop assign a $face to $wheel1[]. (DONE)*/

foreach($faces as $face)
{
  $wheel1[] = $face;
}

        /* TODO New Line: Using a built-in array function to reverse the array stored in $wheel1 and assign the result to $wheel2. (DONE)*/

$wheel2 = array_reverse($wheel1);

        /* TODO New Line: Setup a variable called $wheel3 and assign it $wheel1.  On a slot machine the first and third wheels are the same. (DONE)*/

$wheel3 = $wheel1;

        /* No changes to the code below */

        /* These lines detect whether or not the user has clicked the spin button.
           It sets up the initial values if they have not clicked the spin button. If they have then it
           uses the last location of the wheel as the start for the next spin. */
        if (isset($_POST['submit'])) {
            $start1 = $stop1;
            $start2 = $stop2;
            $start3 = $stop3;
            $total = $_POST['total'];
            $bust = $_POST['bust'];
        } else {
            $start1 = 0;
            $start2 = 0;
            $start3 = 0;
            $total = 100;
            $bust = false;
        }

        /* These lines detect whether or not the user has clicked the reset button.
           It sets up the initial values if they have clicked the reset button. */
        if (isset($_POST['reset'])) {
            $start1 = 0;
            $start2 = 0;
            $start3 = 0;
            $total = 100;
            $bust = false;
        }

        /* Each one of the lines below sets up a random value. Or in our case where each wheel will stop */
        $stop1 = rand(count($wheel1) + $start1, 10 * count($wheel1)) % count($wheel1);
        $stop2 = rand(count($wheel1) + $start2, 10 * count($wheel1)) % count($wheel1);
        $stop3 = rand(count($wheel1) + $start3, 10 * count($wheel1)) % count($wheel1);

        /* Using the random value we pull out of each array the correct face i.e. bar. */
        $result1 = $wheel1[$stop1];
        $result2 = $wheel2[$stop2];
        $result3 = $wheel3[$stop3];

        /* The line below concatenates the results of each wheel together with the dot operator (.)
           We end up with something like: 'Double Bar|Triple Bar|Cherry'. This will be random every time we "spin".
        */
        $slot_result = $result1 . '|' . $result2 . '|' . $result3 . "<br>";
        /*******************************/

        /* TODO New Line: Using an if statement test if the user has run out of money. The variable that contains how much money the user has is called $total.
                         So to test see if $total is 0. If total is 0 then assign the $bust variable the value true. (DONE)*/

if($total == 0)
{
$bust = "true";
}

    /* TODO New Line: Using an if statement test if $bust is true. If $bust is true then print out the phrase "You don't have any money!" (DONE).
    Else print out the results of the spin. Hint: the results are stored in 3 variables called $result1, $result2, $result3 (DONE).
    In the else block add another if that tests if they have won any money. To do this test the following condition: isset($payouts[$slot_result]) (DONE).
    This tests to see if the randomly generated results of each wheel match up with a winning key: 'Bar|Bar|Bar'. 
    
    Add these two lines to the if:
    $total = $total + $payouts[$slot_result]; 
    echo "You won: $" . $payouts[$slot_result]; 
    
    Add these two lines to the else:
    $total = $total - 10; 
    echo "You lost: $10";
         */

if($bust == true)
{
  echo "You don't have any money!";
}
else
{
  echo "Slot machine result: " . $slot_result;
    if(isset($payouts[$slot_result]) == true)
    {
      $total = $total + $payouts[$slot_result];
      echo "You won: $" . $payouts[$slot_result];
    }
    else
    {
      $total = $total - 10;
      echo "You lost: $10";
    }
}

        /* No changes to the code below */
        echo "<br><br>Total cash: $$total";
        /*******************************/

    ?>

    <form method='post'>
        <input type='submit' name='submit' value='Spin' />
        <input type='hidden' name='total' value='<?php echo $total; ?>' />
        <input type='hidden' name='bust' value='<?php echo $bust; ?>' />
        <input type='submit' name='reset' value='Reset' />
    </form>
</body>
</html>
<html>
  <head>
    <title>Test</title>
  </head>
  <body>
    <?php // html structure was added including html, head, and body as instructed on #11

      // 5 Int variables named var1-var5 with an arithmetic expression as instructed on #13
      $var1 = 1 + 1;
      $var2 = 2 - 1;
      $var3 = 3 * 1;
      $var4 = 4 / 1;
      $var5 = 5 % 2;
      echo " Var1: $var1,<br>" . " Var2: $var2,<br>" . " Var3: $var3,<br>" . " Var4: $var4,<br>" . "Var5: $var5,<br>";

      // 2 String variables printed together using the concatenation operator as instructed on #14
      $welcome = "<br> Welcome ";
      $ntm = " to NTM3532!! <br><br>";
      echo " $welcome . $ntm";

      // The comparison operators comparing var1 to the other 4 var variables and itself as instructed on #15
      echo " Var1: < Var1: " . ($var1 < $var1) . "<br>";
      echo " Var1: > Var2: " . ($var1 > $var2) . "<br>";
      echo " Var1: <= Var3: " . ($var1 >= $var3) . "<br>";
      echo " Var1: >= Var4: " . ($var1 >= $var4) . "<br>";
      echo " Var1: == Var5: " . ($var1 == $var5) . "<br><br>";

      // The echo print statement with the date function as intructed on #16
      echo date("l F jS, Y");
      /*
      I hope it's OK that I used the date function in the format that I did. I know that you had a bit of a different
      format in your example and I will make it match that if needed. If it is a problem could you let me know if I
      could make the change and resubmit it? Other than that, all of the requirements in the assignment should have met
      the standard.
      */
    ?>
  </body>
</html>


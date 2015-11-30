<!DOCTYPE html>
<html>
  <head>
    <title>Survey</title>
    <link href="style.css" type="text/css" rel="stylesheet"/>
  </head>
  <body>
    <h1>Form</h1>
    <form method="post" action= "process.php">
           
            <label for="firstname"> First Name: </label>
            <input type="text" name="firstname" id="firstname">
        
            <label for="lastname"> Last Name: </label>
            <input type="text" name="lastname" id="lastname">
        
            <label for="birthyear"> Year of birth: </label>
            <input type="number" name="birthyear" id="birthyear"><br />
            <p>    </p>
            
            <label for="schoolyear"> Current School Year (1 Freshman - 4 Senior: ) </label>
            <input type="number" name="schoolyear" id="schoolyear">
            
            <label for="siblings"> Number of siblings: </label>
            <input type="number" name="siblings" id="siblings"><br />
            <p>    </p>
            
            <label for="bedtime"> What time do you go to bed?: </label>
            <input type="time" placeholder="hrs:mins" name="bedtime" id="bedtime">
            
            <label for="waketime"> What time do you wake up?: </label>
            <input type="time" name="waketime" id="waketime"><br />
            <p>    </p>
            
            <label for="homework"> Approximately how many hours do you spend on homework per day?: </label>
            <input type="number" name="homework" id="homework">
            
            <label for="tv"> Approximately how many hours do you spend on TV/DVD per day?: </label>
            <input type="number" name="tv" id="tv"><br />
            <p>    </p>
            
            <label for="games"> Approximately how many hours do you spend on electronic games per day?: </label>
            <input type="number" name="games" id="games">
            
            <label for="family"> Approximately how many hours do you spend with family per day?: </label>
            <input type="number" name="family" id="family"><br />
            <p>    </p>
            
            <label for="friends"> Approximately what time do you spend with friends per day?: </label>
            <input type="number" name="friends" id="friends"><br />
            
            <p>    </p>
            <input type="submit" name="Submit" />
            
    </form>
    
  </body>
</html>
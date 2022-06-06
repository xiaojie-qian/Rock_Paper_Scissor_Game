<?php

// Demand a GET parameter
if ( ! isset($_GET['name']) || strlen($_GET['name']) < 1  ) {
    die('Name parameter missing'); //die function 
}

// If the user requested logout go back to index.php
if ( isset($_POST['logout']) ) {
    header('Location: index.php');
    return;
}

// Set up the values for the game...
// 0 is Rock, 1 is Paper, and 2 is Scissors
$names = array('Rock', 'Paper', 'Scissors');
$human = isset($_POST["human"]) ? $_POST['human']+0 : -1;

$computer = rand(0,2); // Hard code the computer to rock


// This function takes as its input the computer and human play
// and returns "Tie", "You Lose", "You Win" depending on play
// where "You" is the human being addressed by the computer
function check($computer, $human) {
   
    if ( $human == 0 And $computer == 0) {
        return "Not bad! Tie! Try again!";
    } else if ($human == 0 And $computer == 1 ) {
        return "Oops, you Lose! Try again!";
    } else if ($human == 0 And $computer == 2 ) {
        return "Congrat! You Win! Good Luck today!";
    } else if ( $human == 1 AND $computer==1) {
        return "Not bad! Tie! Try again!";
    } else if ($human == 1 AND $computer == 0){
        return "Congrat! You Win! Good Luck today!";
    } else if ($human == 1 AND $computer == 2) {
        return "Oops, you Lose! Try again!";
    } else if ( $human == 2 AND $computer == 2 ) {
        return "Not bad! Tie! Try again!";
    } else if ( $human == 2 AND $computer == 0 ) {
        return "Oops, you Lose! Try again!";
    } else if ( $human == 2 AND $computer == 1 ) {
        return "Congrat! You Win! Good Luck today!";
    }
    return false;
}

// Check to see how the play happenned
$result = check($computer, $human);

?>
<!DOCTYPE html>
<html>
<head>
<title>Xiaojie Qian's Rock, Paper, Scissors Game</title>
<?php require_once "bootstrap.php"; ?>
</head>
<body>
<div class="container">
<h1>Rock Paper Scissors</h1>
<?php
if ( isset($_REQUEST['name']) ) {
    echo "<p>Welcome: ";
    echo htmlentities($_REQUEST['name']);
    echo "</p>\n";
}
?>
<form method="post">
<select name="human">
<option value="-1">Select</option>
<option value="0">Rock</option>
<option value="1">Paper</option>
<option value="2">Scissors</option>
</select>
<input type="submit" value="Play">
<input type="submit" name="logout" value="Logout">
</form>

<pre>
<?php
if ( $human == -1 ) {
    print "Please select a strategy and press Play.\n";
} else if ( $human == 3 ) {
    for($c=0;$c<3;$c++) {
        for($h=0;$h<3;$h++) {
            $r = check($c, $h);
            print "Human=$names[$h] Computer=$names[$c]\n\n$r\n";
        }
    }
} else {
    print "You play=$names[$human]\nComputer plays=$names[$computer]\n\n$result\n";
}
?>
</pre>
</div>
</body>
</html>

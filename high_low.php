<?php 

// NOTES
// 	√ - game picks random number between 1 - 100
// 	√ - game prompts user to guess the number
// 	√ - gmae says higher or lower with each guess
// 	√ - if user correct "GOOE GUESS"
// HINTS
// 	√ - Conditionals and loops
// 	√ - random numbers can be made with rand() function
// 	√ - use exit(0) to end game
// 	√ - if stuck ctrl-c will exit
// EXTRAS
//	√ - count var to count tries
//	√ - convert to functions
//	√ - replay game
//	- check if it is a int
//	- 'exit' the game
//	- add in images http://smashingtips.com/linux/cool-terminal-commands-for-linux
//	√ - get high number and low number from client
// 	√ - get user name
//  √ - welcome user


// =========== VARIABLES =================
$minNumber = 1;
$maxNumber = 100;

$userMin = (isset($argv[1])) ? $argv[1] : $minNumber;
$userMax = (isset($argv[2])) ? $argv[2] : $maxNumber;

// =========== GAME =================
function game($userMin, $userMax) {
	// random number gen
	$randomNumber = mt_rand($userMin, $userMax) . PHP_EOL;
	$count = 0;

	// clears out terminal 
	echo "\033c";

	// gets client name
	fwrite(STDOUT, "What is your name?" . PHP_EOL);
	$name = fgets(STDIN);
	echo "Welcome to the number guessing game $name" . PHP_EOL;

	// gets number from client
	fwrite(STDOUT, "Can You Guess My Number? \nIt's between $userMin and $userMax" . PHP_EOL);
	$guess = fgets(STDIN);

	// checks if first guess is correct then moves to higher/lower until correct
	do {
		if ($randomNumber == $guess) {
			echo "YOU GUESSED IT!!". PHP_EOL;
			playAgain();
		} else if ($randomNumber > $guess) {
			echo "Your guess was too low. Try again." . PHP_EOL;
			$guess = fgets(STDIN);
		} else if ($randomNumber < $guess) {
			echo "Your guess was too high. Try again." . PHP_EOL;
			$guess = fgets(STDIN);
		}$count += 1;
	} while ($randomNumber != $guess);

	// when guess is correct 
	if ($randomNumber == $guess) {
		echo "YOU GUESSED IT....FINALLY AFTER $count TRIES!!". PHP_EOL;
		playAgain();
	}
}

function playAgain() {
	fwrite(STDOUT, "Would you like to play agian? Y or N" . PHP_EOL);
	$playAgain = trim(fgets(STDIN));
	if ($playAgain == "y" || $playAgain == "Y") {
		echo "\n";

		game();
	} else {
		echo "Bye Felicia!" . PHP_EOL;
		echo "\033c";
		exit(0);
	}
}

game($userMin, $userMax);
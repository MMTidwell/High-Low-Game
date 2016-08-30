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




// =========== GAME =================
function game() {
	// game intro
	// random number gen
	$randomNumber = rand(1, 100) . PHP_EOL;
	$count = 0;
	
	echo "Can You Guess My Number?" . PHP_EOL;
	fwrite(STDOUT, "I'll give you a hint, it is between 1 and 100!" . PHP_EOL);
	$guess = fgets(STDIN);

	// checks if first guess is correct then moves to higher/lower until correct
	do {
		if ($randomNumber == $guess) {
			echo "YOU GUESSED IT!!". PHP_EOL;
			playAgain();
		} else if ($randomNumber > $guess) {
			echo "Your guess was too low. Try again." . PHP_EOL;
			$guess = fgets(STDIN);
			$count += 1;
		} else if ($randomNumber < $guess) {
			echo "Your guess was too high. Try again." . PHP_EOL;
			$guess = fgets(STDIN);
			$count += 1;
		}
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
		exit(0);
	}
}

game();
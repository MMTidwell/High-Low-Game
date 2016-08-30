<?php 

// NOTES
// 	√ - game picks random number between 1 - 100
// 	- game prompts user to guess the number
// 	- gmae says higher or lower with each guess
// 	- if user correct "GOOE GUESS"
// HINTS
// 	- Conditionals and loops
// 	- random numbers can be made with rand() function
// 	- use exit(0) to end game
// 	- if stuck ctrl-c will exit

// =========== VARIABLES =================
$count = 0;

// =========== RANDOM NUMBER GEN =================
				// min num, high num
$randomNumber = rand(1, 100) . PHP_EOL;

echo $randomNumber;
// =========== GAME =================
echo "Can You Guess My Number?" . PHP_EOL;
fwrite(STDOUT, "I'll give you a hint, it is between 1 and 100!" . PHP_EOL);
$guess = fgets(STDIN);

do {
	if ($randomNumber == $guess) {
		echo "YOU GUESSED IT!!". PHP_EOL;
	} else if ($randomNumber > $guess) {
		echo "Your guess was too low. Try again." . PHP_EOL;
		$guess = fgets(STDIN);
		$count += 1;
	} else {
		echo "Your guess was too high. Try again." . PHP_EOL;
		$guess = fgets(STDIN);
		$count += 1;
	}
} while ($randomNumber != $guess);

if ($randomNumber == $guess) {
	echo "YOU GUESSED IT....FINALLY AFTER $count!!". PHP_EOL;
}


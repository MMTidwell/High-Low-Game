<?php 

// NOTES
// 	√ - game picks random number between 1 - 100
// 	√ - game prompts user to guess the number
// 	√ - gmae says higher or lower with each guess
// 	√ - if user correct "GOOE GUESS"
// EXTRAS
//	√ - count var to count tries
//	√ - convert to functions
//	√ - replay game
//	√ - check if it is a int
//	√ - 'exit' the game
//	√ - add in images http://smashingtips.com/linux/cool-terminal-commands-for-linux
//	√ - get high number and low number from client
// 	√ - get user name
//  √ - welcome user


// =========== VARIABLES =================
$minNumber = 1;
$maxNumber = 100;

$userMin = (is_numeric($argv[1])) ? $argv[1] : $minNumber;
$userMax = (is_numeric($argv[2])) ? $argv[2] : $maxNumber;

$winner = <<< WINNER
                                                            
                    8b        d8 ,ad8888ba,   88        88  
                     Y8,    ,8P d8"'    `"8b  88        88  
                      Y8,  ,8P d8'        `8b 88        88  
                       "8aa8"  88          88 88        88  
                        `88'   88          88 88        88  
                         88    Y8,        ,8P 88        88  
                         88     Y8a.    .a8P  Y8a.    .a8P  
                         88      `"Y8888Y"'    `"Y8888Y"'   
                                                            
                                                            
                                                                 
               I8,        8        ,8I 88 888b      88 88 88 88  
               `8b       d8b       d8' 88 8888b     88 88 88 88  
                "8,     ,8"8,     ,8"  88 88 `8b    88 88 88 88  
                 Y8     8P Y8     8P   88 88  `8b   88 88 88 88  
                 `8b   d8' `8b   d8'   88 88   `8b  88 88 88 88  
                  `8a a8'   `8a a8'    88 88    `8b 88 "" "" ""  
                   `8a8'     `8a8'     88 88     `8888 aa aa aa  
                    `8'       `8'      88 88      `888 88 88 88;


WINNER;


fwrite(STDOUT, "What is your name?" . PHP_EOL);
$name = fgets(STDIN);
echo "Welcome to the number guessing game $name" . PHP_EOL;


// =========== GAME INTRO =================
function gameIntro($userMin, $userMax, $winner) {
	$randomNumber = mt_rand($userMin, $userMax) . PHP_EOL;
	
	// clears out terminal 
	echo "\033c";
	
	// gets number from client
	fwrite(STDOUT, "Can You Guess My Number? \nIt's between $userMin and $userMax" . PHP_EOL . PHP_EOL);

	game($randomNumber, $winner);
}


// =========== GAME =================
function game($randomNumber, $winner) {
	$guess = trim(fgets(STDIN));
	$count = 0;

	// checks if first guess is correct then moves to higher/lower until correct
	do {
		if ($randomNumber == $guess) {
			echo $winner;
			playAgain($randomNumber, $winner);
		} else if ($randomNumber > $guess) {
			echo "Your guess was too low. Try again." . PHP_EOL;
			$guess = fgets(STDIN);
		} else if ($randomNumber < $guess) {
			echo "Your guess was too high. Try again." . PHP_EOL;
			$guess = fgets(STDIN);
		} else if ($guess == 'exit') {
			exit(0);
		} $count += 1;
	} while ($randomNumber != $guess xor $guess == 'exit');

	// when guess is correct 
	if ($randomNumber == $guess) {
		echo $winner;
		playAgain($randomNumber, $winner);
	}
}


// =========== PLAY AGAIN =================
function playAgain($randomNumber, $winner) {
	$minNumber = 1;
	$maxNumber = 100;

	fwrite(STDOUT, "Would you like to play agian? Y or N" . PHP_EOL);
	$playAgain = trim(fgets(STDIN));
	if ($playAgain == "y" || $playAgain == "Y") {
		gameIntro($minNumber, $maxNumber, $winner);
	} else {
		echo "Bye Felicia!" . PHP_EOL;
		exit(0);
	}
}


gameIntro($userMin, $userMax, $winner);





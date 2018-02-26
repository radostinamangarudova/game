<?php

//Main method play
function play() {
    $user_choice = $_GET['choice'];
    if($user_choice == true) :
        validate_choice($user_choice);
    else:
        display($user_choice);
    endif;
}

//Display all the choices in the game dynamically. (it could be values from a database.)
function display($choice) {
    $choices = [
        "rock" => '<a href="?choice=rock"><img src="images/rock.png" alt="rock" name="rock"></a>',
        "paper" => '<a href="?choice=paper"><img src="images/paper.png" alt="paper" name="paper"></a>',
        "scissors" => ' <a href="?choice=scissors"><img src="images/scissors.png" alt="scissors" name="scissors"></a>'
    ];
    
    if ($choice == null) :            
        foreach($choices as $choice=>$value) :
            echo $value;
        endforeach;
    else :
        echo $choices[$choice];
    endif;
}

//Prevent user from typing a random word in the url
function validate_choice($choice){
    $available_choices = ['rock', 'paper', 'scissors'];
    
    if(in_array($choice, $available_choices) == false) :
        echo '<h1 style="color:red;">Invalid.</h1>';
        die;
    else :
        play_round($choice);
    endif;
}

function play_round($choice){
    $available_choices = ['rock', 'paper', 'scissors'];
    $generated = $available_choices[rand(0, 2)];
    if($choice == 'scissors' && $generated == 'paper' || 
        $choice == 'paper' && $generated == 'rock' ||
        $choice == 'rock' && $generated == 'scissors') :
        echo '<h1 style="color:green;">You Won! :)</h1>';
    elseif ($choice == $generated) : {
        echo '<h1 style="color:blue;">Standoff. :|</h1>';
    }
    else :
        echo '<h1 style="color:red;">You lost! :(</h1>';
    endif;
    
    display($choice);
    display($generated);
}
?>

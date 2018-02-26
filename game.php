<?php

//Main method play
function play() {
    $user_choice = $_GET['choice'];
    if($user_choice == true) :
        validate_choice($user_choice);
        echo $_GET['choice'];
    else:
        display();
    endif;
}

//Display all the choices in the game dynamically. (it could be values from a database.)
function display() {
    $choices = [
        "rock" => '<a href="?choice=rock"><img src="images/rock.png" alt="rock" name="rock"></a>',
        "paper" => '<a href="?choice=paper"><img src="images/paper.png" alt="paper" name="paper"></a>',
        "scissors" => ' <a href="?choice=scissors"><img src="images/scissors.png" alt="scissors" name="scissors"></a>'
    ];
                
    foreach($choices as $choice=>$value) :
        echo $value;
    endforeach;
}

//Prevent user from typing a random word in the url
function validate_choice($choice){
    $available_choices = ['rock', 'paper', 'scissors'];
    
    if(in_array($choice, $available_choices) == false) :
        echo '<h1 style="color:red;">Invalid.</h1>';
        die;
    else :
        echo $choice;
    endif;
}
?>

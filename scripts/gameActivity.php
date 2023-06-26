<?php
session_start();

include_once '../config/config.php';

$selectedDifficulty = $_GET['difficulty'];

if (!isset($_SESSION['word'])) {
    $query = "SELECT word FROM words WHERE difficulty_id = (SELECT id FROM difficulty WHERE name = '$selectedDifficulty') AND status = 1 ORDER BY RAND() LIMIT 1";
    $result = $conn->query($query);

    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $_SESSION['word'] = $row["word"]; 
        }
    } else {
        echo "No words available";
        echo "<br/><a href='gameDifficulty.php' class='btn btn-secondary m-2 btn-lg border'>Go back</a>";
        exit();
    }

    $_SESSION['attemptsLeft'] = 11; 
    $_SESSION['hangmanImage'] = 0; 
    $_SESSION['hintsLeft'] = 3; 
}

$word = $_SESSION['word'];

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['letter'])) {
    $selectedLetter = $_POST['letter'];
    
    if (strpos($word, $selectedLetter) !== false) {
        echo "<p class='text-info'>The letter $selectedLetter is in the word.<p> ";
    } else {
        echo "<p class='text-danger'>The letter $selectedLetter is not in the word. <p>";
         
        $_SESSION['attemptsLeft'] -= 1; 
        $_SESSION['hangmanImage'] +=  1; 

        if ($_SESSION['attemptsLeft'] === -1) {
            echo "<script> alert('You lost! The word was: $word');</script>";
            echo "<br/>The word was $word";
            echo "<br/><a href='gameDifficulty.php' class='btn btn-secondary m-2 btn-lg border'>Restart</a>";
           // usuń z sesji wartośsci
            unset($_SESSION['word']);
            unset($_SESSION['hangmanImage']);
            unset($_SESSION['attemptsLeft']);
            unset($_SESSION['guessedLetters']);
            unset($_SESSION['allLettersGuessed']);
            unset($_SESSION['hintsLeft']);

            exit();
        }
    }

    $attemptsLeft = $_SESSION['attemptsLeft'];

    $guessedLetters = isset($_SESSION['guessedLetters']) ? $_SESSION['guessedLetters'] : '';
    $guessedLetters = str_split($guessedLetters);
    $guessedLetters[] = $selectedLetter;
    $_SESSION['guessedLetters'] = implode('', $guessedLetters);
}

$guessedLetters = isset($_SESSION['guessedLetters']) ? $_SESSION['guessedLetters'] : '';
$allLettersGuessed = true;

for ($i = 0; $i < strlen($word); $i++) {
    $letter = $word[$i];
    
    if (strpos($guessedLetters, $letter) !== false) {
        echo $letter . ' ';
    } else {
        echo '_ ';
        $allLettersGuessed = false;
    }
}

//zgadnięte słówko
if ($allLettersGuessed) {
    echo "<script> alert('You have guessed the word! Congratulations!!');</script>";
    echo "<br/>Congratulations! The word was $word";
    $id = $_SESSION['id'];
    $query = "UPDATE users SET coins = coins + 50 WHERE id = $id";
    $result = mysqli_query($conn, $query);
    if ($result) {
        $_SESSION['coins'] += 50;

    } else {
        echo "Mysql error: " . mysqli_error($conn);
        echo $query;
    }
    echo "<br/><a href='gameDifficulty.php' class='btn btn-secondary m-2 btn-lg border'>Restart</a>";
// usuń z sesji wartośsci
    unset($_SESSION['word']);
    unset($_SESSION['hangmanImage']);
    unset($_SESSION['attemptsLeft']);
    unset($_SESSION['guessedLetters']);
    unset($_SESSION['allLettersGuessed']);
    unset($_SESSION['hintsLeft']);

    exit();
}

//podpowiedzi
if (isset($_POST['hint'])) {
    $guessedLetters = str_split($guessedLetters);
    $hint = ''; 
    for ($i = 0; $i < strlen($word); $i++) {
        $letter = $word[$i];
        if (!in_array($letter, $guessedLetters)) {
            $hint = $letter;
            break;
        }
    }
    if ($hint !== '') {
        if ($_SESSION['coins'] < 50 )
        {
            echo "<p class='text-danger'>No coins for hint'.</p>";
        }
        elseif($_SESSION['hintsLeft']>0){
            $_SESSION['coins'] -= 30;
            $_SESSION['hintsLeft'] -= 1;
            echo "<p class='text-success'>Hint: The first letter of the word is '$hint'.</p>";
           }
        else{
            echo "<p class='text-warning'>No hint available.</p>";
        }
    }
}
?>
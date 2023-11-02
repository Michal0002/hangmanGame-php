
## Hangman Game
DEMO: http://www.manticore.uni.lodz.pl/~mkasperk/hangman_php/
\
The aim of the project is to provide users with entertainment through word guessing. The application will allow users to play rounds of Hangman on their browsers. The application should have a login and registration form, as well as a coin system that allows users to earn and use coins to purchase hints. Coins will be earned based on correctly guessed words. The application will allow users to choose the difficulty level, enabling each player to adjust the game to their skill level. Additionally, logged-in users will have the ability to add new words to the database. This way, the application will be continuously developed and supplemented with new vocabulary.

## Installation
You need to create a config.php file in the config folder, for example, using the command: touch config/config.php.
You also need to change the permissions of the config.php file, for example, using the command: chmod o+w config/config.php.

## External Libraries Used
* bootstrap 5

### Game preview
![image](https://github.com/Michal0002/hangmanGame-php/assets/44274110/0ac981c3-4a85-4fc2-a7f1-1c0ea55a6939)
  <br/>
  On the homepage, the user can be redirected to either log in or register.

![image](https://github.com/Michal0002/hangmanGame-php/assets/44274110/8540025c-8075-4aae-830a-5137007cd54e)
  <br/>
  For the login form, the user enters their login credentials, such as username and password. If the entered values are incorrect, an appropriate message is displayed.

![image](https://github.com/Michal0002/hangmanGame-php/assets/44274110/3679e58f-d619-44c1-b16a-a1be649cd366)
  <br/>
  In the case of the registration form, the user enters values such as username, password, password confirmation, and email. If the passwords do not match, an appropriate message is shown. If all the entered values are correct, a message is displayed confirming the successful addition of the user to the database. Additionally, every newly registered user starts with 150 coins.
![image](https://github.com/Michal0002/hangmanGame-php/assets/44274110/e186718a-9ecf-42a7-9fe1-2760e2633566)
<br/>

![image](https://github.com/Michal0002/hangmanGame-php/assets/44274110/0328747e-cb92-43e4-be81-d75b1528f8e9)
  <br/>
  On the homepage, after a user with the role "user" logs in, they have the following options:
  * Start a game.
  * Add a new word to the database.
  * Display all words.
  * View detailed account information.

![image](https://github.com/Michal0002/hangmanGame-php/assets/44274110/306255f0-14e8-4478-8d1b-7ba3c5389ee0)
  <br/>
  Starting a game is preceded by choosing the difficulty level.
  The difficulty level is selected from a list, and the available difficulty levels retrieved from the database are easy, medium, and hard. The difficulty levels differ in the number of letters in the randomly chosen words. For example, the easy level accepts words with 3 to 5 letters.


![image](https://github.com/Michal0002/hangmanGame-php/assets/44274110/1f310c26-c5c4-48f8-bf19-bc8ce3b71474)
  After selecting the difficulty level, the Hangman gameplay begins.
  <br/>

![image](https://github.com/Michal0002/hangmanGame-php/assets/44274110/9fc1009d-98ba-4551-b24b-1eb7353fd5a4)
  <br/>
  The user clicks on the letters of the alphabet, displayed on the screen, to guess a letter in the word. If the chosen letter is present in the word, it is revealed in the appropriate position(s) in the word.

![image](https://github.com/Michal0002/hangmanGame-php/assets/44274110/32620d70-8f2c-48f8-9b11-b14a10eda5fc)
  <br/>
  In the case where the chosen letter is not in the word, an appropriate message is displayed, and additionally, the Hangman drawing progressively appears, step by step.

![image](https://github.com/Michal0002/hangmanGame-php/assets/44274110/cd1c1aa8-889b-45a5-86ed-fd7c1790e6e9)
  <br/>
The user also has the option to use hints, which can be purchased using coins. Each hint costs 50 coins. The maximum number of hints that can be used is 3. If the user doesn't have enough coins or has exceeded the maximum number of attempts, an appropriate message is displayed.
![image](https://github.com/Michal0002/hangmanGame-php/assets/44274110/088ce856-fe3e-4e97-b409-f107ad681719)
  <br/>
  In case of winning the game, the following message is displayed:
![image](https://github.com/Michal0002/hangmanGame-php/assets/44274110/4ac83c6e-4f36-4d3d-98e2-ebdae013b28e)
  <br/>
![image](https://github.com/Michal0002/hangmanGame-php/assets/44274110/98acfd00-abb9-4e43-a6c2-8949920fdf30)
  As well as the option to redirect to play again.

![image](https://github.com/Michal0002/hangmanGame-php/assets/44274110/5935dec0-adde-445c-a8c1-fb899bdf50d2)
  <br/>
  Adding a new word is done by filling out a form that includes fields such as the word itself and the difficulty level of the word.
  Each word added by the user to the database is stored with a status of "waiting." Only the application administrator has the ability to approve words for use.
![image](https://github.com/Michal0002/hangmanGame-php/assets/44274110/eac78984-168d-4f81-9451-59512db2f6e0)
  <br/>
  Displaying a list of all words:
![image](https://github.com/Michal0002/hangmanGame-php/assets/44274110/ef92f99c-abe7-44ce-9108-9b8e704f97cd)
  <br/>
  The user can browse through the list of all available words that can be randomly chosen.

  Displaying detailed account information:
![image](https://github.com/Michal0002/hangmanGame-php/assets/44274110/427f075e-11c7-4981-ae3c-78109b81074c)
  <br/>
  The user has the ability to change their email address or username. They can also change their password.

#### Dashboard - admin panel
  The administrator has the ability to browse all users in the application as well as all words. Additionally, the administrator has a dashboard that allows them to edit accounts and approve words.
![image](https://github.com/Michal0002/hangmanGame-php/assets/44274110/0c26f9c5-e820-486f-ae32-89629a9aafa4)
<br/>
![image](https://github.com/Michal0002/hangmanGame-php/assets/44274110/837d47fb-0dfa-4f64-9d7a-e88fe0e7dec4)
<br/>
![image](https://github.com/Michal0002/hangmanGame-php/assets/44274110/ede9dd99-6359-4f79-918c-5c9fb936a4a6)
The administrator also has the ability to add new words to the database.




































  













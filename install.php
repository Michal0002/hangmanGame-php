<?php
session_start();
ini_set( 'display_errors', 'On' );
error_reporting( E_ALL & ~E_DEPRECATED & ~E_STRICT & ~E_NOTICE);


if (isset($_POST['host'])) {
    $_SESSION['step'] = 2;
}

if (isset($_POST['admin_login'])) {
    $_SESSION['step'] = 6;
}

$step = $_SESSION['step'];
$config_file = "config/config.php";

switch ($step) {
    case 2:
        step2($config_file);
        break;

    case 3:
        step3();
        break;

    case 4:
        step4();
        break;

    case 5:
        step5();
        break;

    case 6:
        step6();
        break;

    case 7:
        step7();
        break;

    default:
        if (file_exists($config_file)) {
            if (is_writable($config_file)) {
                load_form_1();
            } else {
                echo "<p>Zmień uprawnienia do pliku <code>".$config_file."</code><br>np. <code>chmod o+w ".$config_file."</code></p>";
                echo "<p><button class='btn btn-info' onClick='window.location.href=window.location.href'>Odśwież stronę</button></p>";
            }
        } else {
            echo "<p>Stwórz plik <code>".$config_file."</code><br>np. <code>touch ".$config_file."</code></p>";
            echo "<p><button class='btn btn-info' onClick='window.location.href=window.location.href'>Odśwież stronę</button></p>";
        }
        break;
}

function step2($config_file)
{
    $_SESSION['step'] = 3;
    $file = fopen($config_file, "w");
    $config = "<?php
    \$host = \"" . $_POST['host'] . "\";
    \$user = \"" . $_POST['username'] . "\";
    \$password = \"" . $_POST['passwd'] . "\";
    \$dbname = \"" . $_POST['dbname'] . "\";
    \$conn = new mysqli(\$host, \$user, \$password, \$dbname) or die(\"Brak połączenia z serwerem bazy danych!\");\n

    if (\$conn->connect_error) {
        die(\"Błąd połączenia: \" . \$conn->connect_error);
    }
    else {
        mysqli_select_db(\$conn, \$dbname) or die(\"Brak dostępu do bazy \");
        mysqli_query(\$conn, \"SET NAMES UTF8\");
    }\n ?>";

    if (!fwrite($file, $config)) {
        print "Nie mogę zapisać do pliku ($file)";
        exit;
    }

    echo "<p>Krok 2 zakończony: \n";
    echo "Plik konfiguracyjny utworzony</p>";
    fclose($file);
    echo "<p><button class='btn btn-info' onClick='window.location.href=window.location.href'>Dalej</button></p>";
}

function step3()
{
    if (file_exists("sql/sql.php")) {
        if (file_exists("config/config.php")) {
            include("config/config.php");
        }
        include("sql/sql.php");
        echo "Tworzę tabele bazy: ".$dbname.".<br>\n";
        mysqli_select_db($conn, $dbname) or die(mysqli_error($conn));
        for ($i = 0; $i < count($create); $i++) {
            echo "<p>".$i.". <code>".$create[$i]."</code></p>\n";
            mysqli_query($conn, $create[$i]);
        }
    }

    $_SESSION['step'] = 4;
    echo "<p>Krok 3 zakończony: \n";
    echo "<p><button class='btn btn-info' onClick='window.location.href=window.location.href'>Dalej</button></p>";
}

function step4()
{
    if (file_exists("sql/insert.php")) {
        if (file_exists("config/config.php")) {
            include("config/config.php");
        }
        include("sql/insert.php");
        echo "<p>Wstawiam dane do tabel bazy: " . $dbname . ".</p>\n";
        mysqli_select_db($conn, $dbname) or die(mysqli_error($conn));
        for ($i = 0; $i < count($insert); $i++) {
            echo "<p>" . $i . ". <code>" . $insert[$i] . "</code></p>\n";
            if (!empty($insert[$i])) {
                if (mysqli_query($conn, $insert[$i])) {
                    echo "<p>Zapytanie wykonane poprawnie.</p>";
                } else {
                    echo "<p>Błąd wykonania zapytania: " . mysqli_error($conn) . "</p>";
                }
            }
        }
    }

    $_SESSION['step'] = 5;
    echo "Krok 4 zakończony: ";
    echo "<p><button class='btn btn-info' onClick='window.location.href=window.location.href'>Dalej</button></p>";
}


function step5()
{
    load_form_2();
}

function step6()
{
    $login = $_POST['admin_login'];
    $password = $_POST['password'];
    $passwordHash = password_hash($password, PASSWORD_DEFAULT);
    $email = "admin12@example.com";
    $coins = 1500;
    $role = "admin";

    if (file_exists("config/config.php")) {
        include("config/config.php");
    }

    $query = "SELECT * FROM users WHERE username='" . $login . "';";
    $result = mysqli_query($conn, $query);

    if (mysqli_num_rows($result) == 0) {
        $query = "INSERT INTO users (username, password, email, coins, role ) VALUES ('" . $login . "', '" . $passwordHash. "', '" . $email . "', '" . $coins . "', '" . $role . "')";

        if (mysqli_query($conn, $query)) {
            $_SESSION['step'] = 7;
            echo "Krok 6 zakończony: ";
            echo "<p><button class='btn btn-info' onClick='window.location.href=window.location.href'>Dalej</button></p>";
        } else {
            $_SESSION['step'] = 5;
            echo "<script>if(confirm('Błąd')){document.location.href='install.php'};</script>";
        }
    } else {
        $_SESSION['step'] = 5;
        echo "<script>if(confirm('Użytkownik o loginie $login już istnieje!')){document.location.href='install.php'};</script>";
    }
}

function step7()
{
    session_unset();
    echo "<script>if(confirm('Zakończono konfigurację!')){document.location.href='index.php'};</script>";
}

function load_form_1()
{
    echo "<div class='container' style='position: absolute; top: 15%; left: 40%; width: 30%; height: 30%;'>";
    echo "<div class='row'>";
    echo "<form action='install.php' method='post'>";
    echo "<div class='mb-3'>";
    echo "<label class='form-label'>Nazwa lub adres serwera: ";
    echo "<input type='text' class='form-control' name='host' required></label>";
    echo "<br>";
    echo "<label class='form-label'>Nazwa bazy danych: ";
    echo "<input type='text' class='form-control' name='dbname' required></label>";
    echo "<br>";
    echo "<label class='form-label'>Nazwa użytkownika: ";
    echo "<input type='text' class='form-control' name='username' required></label>";
    echo "<br>";
    echo "<label class='form-label'>Hasło: ";
    echo "<input type='password' class='form-control' name='passwd' required></label>";
    echo "<br>";
    echo "</div>";
    echo "<div class='mb-3'>";
    echo "<input value='Dalej' type='submit' style='width: 100px; height: 30px;'/>";
    echo "</div>";
    echo "</form>";
    echo "</div>";
    echo "</div>";
}

function load_form_2()
{
    echo "<div class='container' style='position: absolute; top: 0%; left: 40%; width: 30%; height: 30%;'>";
    echo "<div class='row'>";
    echo "<form action='install.php' method='post'>";
    echo "<div class='mb-3'>";
    echo "<label class='form-label'>Login: ";
    echo "<input type='text' class='form-control' name='admin_login' required></label>";
    echo "<br>";
    echo "<label class='form-label'>Hasło : ";
    echo "<input type='password' class='form-control' name='password' required></label>";
    echo "<br>"; 
    echo "</div>";
    echo "<div class='mb-3'>";
    echo "<input value='Dalej' type='submit' style='width: 100px; height: 30px;'/>";
    echo "</div>";
    echo "</form>";
    echo "</div>";
    echo "</div>";
}
?>

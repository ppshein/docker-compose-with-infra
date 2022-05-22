<?php

$db_host = getenv('MYSQL_HOST', true) ?: getenv('MYSQL_HOST');
$db_name = getenv('MYSQL_DATABASE', true) ?: getenv('MYSQL_DATABASE');
$db_user = getenv('MYSQL_USER', true) ?: getenv('MYSQL_USER');
$db_pwd  = getenv('MYSQL_PASSWORD', true) ?: getenv('MYSQL_PASSWORD');


echo "db_host $db_host";

$conn = new mysqli($db_host, $db_user, $db_pwd, $db_name);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = 'SELECT * FROM users';

if ($result = $conn->query($sql)) {
    while ($data = $result->fetch_object()) {
        $users[] = $data;
    }
}

echo "Retriving data from MySQL <br><br>";
foreach ($users as $user) {
    echo "<br>";
    echo $user->username . " " . $user->password;
    echo "<br>";
}

$conn->close();

?>
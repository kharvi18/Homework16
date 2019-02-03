<?php
$servername = "127.0.0.1";
$username = "test";
$password = "testpass";
$dbname = "test";

$conn = new Mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Connection failed: ".$conn->connect_error);
}

// get data
$sql = "SELECT id, title, body FROM article";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        echo "id: ".$row["id"]." - Title: ".$row["title"]." - Body: ".$row["body"]."<br>";
    }
} else {
    echo "0 results";
}

// insert data
$articleTitle = 'some new title';
$articleBody = 'lorem ipsum';
$articleCategoryId = 1;
$articleCreatedAt = '2019-01-28T18:40:00+00:00';
$articleAuthorId = 1;
$sql = "INSERT INTO article (title, body, category_id, created_at, author_id)
VALUES ('$articleTitle', '$articleBody', $articleCategoryId, '$articleCreatedAt', $articleAuthorId)";
$result = $conn->query($sql);
$conn->

// update data
$sql = "UPDATE article SET title = 'lorem title', body = 'some new body text' WHERE id = 2";
$result = $conn->query($sql);

// delete data
$sql = "DELETE FROM article WHERE id = 2";
$result = $conn->query($sql);


// get data with join
$sql = "SELECT user.id, user.username, user.email, user_data_first_name.value AS firstName, user_data_phone.value AS phone FROM user 
LEFT JOIN user_data_first_name ON user_data_first_name.user_id = user.id
LEFT JOIN user_data_phone ON user_data_phone.user_id = user.id
";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        echo "Username: ".$row["username"]." - Email: ".$row["email"].
            " - First name: ".$row["firstName"]." - Phone: ".$row["phone"]."<br>";
    }
} else {
    echo "0 results";
}


$conn->close();
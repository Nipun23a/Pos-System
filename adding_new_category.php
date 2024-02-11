<?php
$database_connection = new mysqli('localhost', 'root','','pos_system_database');
if (isset($_POST['submit'])) {
    $categoryName = $_POST['category_name'];
    $categoryName = mysqli_real_escape_string($database_connection, $categoryName);
    $adding_category = $database_connection->prepare("INSERT INTO category_table (category_name) VALUES (?)");
    $adding_category->bind_param("s", $categoryName);
    if ($adding_category->execute()) {
        echo "Category inserted successfully.";
    } else {
        echo "Error inserting category: " . $adding_category->error;
    }
}
?>
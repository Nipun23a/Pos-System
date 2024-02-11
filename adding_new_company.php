<?php
$database_connection = new mysqli('localhost', 'root','','pos_system_database');
if (isset($_POST['submit'])) {
    $companyName = $_POST['company_name'];
    $companyName = mysqli_real_escape_string($database_connection, $companyName);
    $adding_company = $database_connection->prepare("INSERT INTO company_table(company_name) VALUES (?)");
    $adding_company->bind_param("s", $companyName);
    if ($adding_company->execute()) {
        echo "Company inserted successfully.";
    } else {
        echo "Error inserting company: " . $adding_company->error;
    }
}
?>
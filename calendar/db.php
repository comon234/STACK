<?php
$conn = mysqli_connect("localhost","park","0000","stack") ;


if (!$conn)
{
echo "Failed to connect to MySQL: " . mysqli_connect_error();
}
?>
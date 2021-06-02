<?php
if(isset($_REQUEST['query'])){
    $conn = new mysqli("localhost", "root", "", "bookings");
    
    $query = mysqli_real_escape_string($conn, $_REQUEST['query']);
    
    $sql = "SELECT * FROM hotel WHERE country LIKE '%".$query."%' OR company LIKE '%".$query."%'";
    $result = mysqli_query($conn, $sql) or die(mysqli_error($conn));
    $array = array();
    while($row = $result->fetch_assoc()) {
        $array[] = array(
            'hotel_id' => $row['id'],
            'value' => $row['country'] . ', ' . $row['company']
        );
    }
    echo json_encode($array);
}


?>
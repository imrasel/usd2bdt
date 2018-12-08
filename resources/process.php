<?php
// $conn = new mysqli('localhost', 'rasejquf_db', 'rasejquf_db', 'rasejquf_usd2bdt');
$conn = new mysqli('localhost', 'root', '', 'usd2bdt');

// if(isset($_POST['send_id']) && isset($_POST['get_image'])) {

//     $send_id = $_POST['send_id'];
//     $query = "SELECT * FROM send_wallets WHERE id = '$send_id' ";
//     $result = $conn->query($query);
//     $row = $result->fetch_assoc();
//     echo $row['icon'] ;


// }

// if(isset($_POST['receive_id']) && isset($_POST['get_image'])) 
// {

//     $receive_id = $_POST['receive_id'];

//     $query = "SELECT * FROM receive_wallets WHERE id = '$receive_id' ";
//     $result = $conn->query($query);
//     $row = $result->fetch_assoc();

//     echo json_encode($row);

// }

if(isset($_POST['send_id']) && isset($_POST['receive_id'])) 
{

    $send_id = $_POST['send_id'];
    $receive_id = $_POST['receive_id'];

    $query = "SELECT * FROM tr_rates WHERE sendwallet_id = '$send_id' &&  receivewallet_id = '$receive_id' ";
    $result = $conn->query($query);
    $row = $result->fetch_assoc();

    $query2 = "SELECT * FROM send_wallets WHERE id = '$send_id' ";
    $result2 = $conn->query($query2);
    $row2 = $result2->fetch_assoc();

    $query3 = "SELECT * FROM receive_wallets WHERE id = '$receive_id' ";
    $result3 = $conn->query($query3);
    $row3 = $result3->fetch_assoc();

    $row['send_currency'] = $row2['currency'];
    $row['receive_currency'] = $row3['currency'];
    $row['receive_currency'] = $row3['currency'];
    $row['reserve'] = $row3['amount'];

    $row['send_icon'] = $row2['icon'];
    $row['receive_icon'] = $row3['icon'];

    echo json_encode($row);

}
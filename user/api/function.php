<?php
require '../api/dbcon.php';

function error422($message)
{
    $data = [
        'status' => 422,
        'message' => $message,
    ];
    header("HTTP/1.0 422 Unprocessable Entity");
    echo json_encode($data);
    exit();
}

function getPriceList()
{
    global $conn;

    $sql  = " SELECT c.id,c.name";
    $sql  .= " FROM categories c";
    $sql  .= " ORDER BY c.id ASC";

    $query_run = mysqli_query($conn, $sql);

    if ($query_run) {
        if (mysqli_num_rows($query_run) > 0) {
            $res = mysqli_fetch_all($query_run,  MYSQLI_ASSOC);
            $data = [
                'status' => 200,
                'message' => 'Category List Fetch Successfully',
                'data' => $res
            ];
            header("HTTP/1.0 200 OK");
            return json_encode($data);
        } else {
            $data = [
                'status' => 404,
                'message' => 'No Category Found',
            ];
            header("HTTP/1.0 404 No Category Found");
            return json_encode($data);
        }
    } else {
        $data = [
            'status' => 500,
            'message' => 'Internal Server Error',
        ];
        header("HTTP/1.0 500 Internal Server Error");
        return json_encode($data);
    }
}

// function storeProducts($productInput)
// {
//     global $conn;
//     $name = mysqli_real_escape_string($conn, $productInput['name']);
//     $quantity = mysqli_real_escape_string($conn, $productInput['quantity']);
//     $buy_price = mysqli_real_escape_string($conn, $productInput['buy_price']);
//     $sale_price = mysqli_real_escape_string($conn, $productInput['sale_price']);
//     $categorie_id = mysqli_real_escape_string($conn, $productInput['categorie_id']);
//     $media_id = mysqli_real_escape_string($conn, $productInput['media_id']);
//     $product_id = mysqli_real_escape_string($conn, $productInput['product_id']);
//     $size_id = mysqli_real_escape_string($conn, $productInput['size_id']);
//     $stockpoint_id = mysqli_real_escape_string($conn, $productInput['stockpoint_id']);

//     if(empty(trim($name))){
//         return error422('Enter product name');
//     } elseif(empty(trim($quantity))){
//         return error422('Enter product instock');
//     } elseif(empty(trim($buy_price))){
//         return error422('Enter product buy_price');
//     } elseif(empty(trim($sale_price))){
//         return error422('Enter product sale_price');
//     } elseif(empty(trim($categorie_id))){
//         return error422('Enter product categorie_id');
//     } elseif(empty(trim($media_id))){
//         return error422('Enter product media_id');
//     } elseif(empty(trim($product_id))){
//         return error422('Enter product product_id');
//     } elseif(empty(trim($size_id))){
//         return error422('Enter product size_id');
//     } elseif(empty(trim($stockpoint_id))){
//         return error422('Enter product stockpoint_id');
//     } else {

//         // $date    = make_date();
//         // $query  = "INSERT INTO products (";
//         // $query .=" name,quantity,buy_price,sale_price,categorie_id,media_id,product_id,size_id,stockpoint_id,date";
//         // $query .=") VALUES (";
//         // $query .=" '{$name}', '{$quantity}', '{$buy_price}', '{$sale_price}', '{$categorie_id}', '{$media_id}', '{$product_id}', '{$size_id}','{$stockpoint_id}','{$date}'";
//         // $query .=")";
//         // $query .=" ON DUPLICATE KEY UPDATE name='{$name}'";


//         $query = "INSERT INTO products (name,quantity,buy_price,sale_price,categorie_id,media_id,product_id,size_id,stockpoint_id) VALUES ('$name','$quantity','$buy_price','$sale_price','$categorie_id','$media_id','$product_id','$size_id','$stockpoint_id')";
//         $result = mysqli_query($conn, $query);

//         if ($result) {
//             $data = [
//                 'status' => 201,
//                 'message' => 'Product Created Successfully',
//             ];
//             header("HTTP/1.0 201 Created");
//             return json_encode($data);
//         }else{
//             $data = [
//                 'status' => 500,
//                 'message' => 'Internal Server Error',
//             ];
//             header("HTTP/1.0 500 Internal Server Error");
//             return json_encode($data);

//         }
//     }
// }

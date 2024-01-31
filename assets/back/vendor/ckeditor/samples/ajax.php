<?php 
$content = $_POST['editor22'];

if(empty($content)){
    $response= array('status'=>'danger','msg'=>'İçerik Boş');
    header('Content-Type: application/json');
    echo json_encode($response);
}else{
    $response= array('status'=>'success','msg'=>$content);
    header('Content-Type: application/json');
    echo json_encode($response);
}

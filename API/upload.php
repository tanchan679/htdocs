<?php
//header('Content-Type: application/json');
//if (!empty($_FILES['uploaded_file'])) {
//    $path = "uploads/";
//    $path = $path . basename($_FILES['uploaded_file']['name']);
//    if (move_uploaded_file($_FILES['uploaded_file']['tmp_name'], $path)) {
//        // $base_url = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] == 'on' ? 'https' : 'http') . '://' . $_SERVER['HTTP_HOST'];
//        $base_url = 'https://' . $_SERVER['HTTP_HOST'];
//        $url = $base_url . '/' . basename(__DIR__);
//
//        echo json_encode([
//            'status' => true,
//            'message' => 'success',
//            'data' => $url . '/' . $path,
//            'url' => $url,
//        ]);
//    } else {
//        echo json_encode([
//            'status' => false,
//            'message' => 'error',
//            'data' => null,
//        ]);
//    }
//} else {
//    echo json_encode([
//        'status' => false,
//        'message' => 'no file',
//        'data' => null,
//    ]);
//}

header('Content-Type: application/json');
if (!empty($_FILES['uploaded_file'])) {
    $path = "uploads/";

    $countfiles = count($_FILES['file']['name']);
    echo "countfiles $countfiles";
    for ($i = 0; $i < $countfiles; $i++) {
        $path = $path . basename($_FILES['uploaded_file']['name'][$i]);
        if (move_uploaded_file($_FILES['uploaded_file']['tmp_name'][$i], $path)) {
            // $base_url = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] == 'on' ? 'https' : 'http') . '://' . $_SERVER['HTTP_HOST'];
            $base_url = 'https://' . $_SERVER['HTTP_HOST'];
            $url = $base_url . '/' . basename(__DIR__);

            echo json_encode([
                'status' => true,
                'message' => 'success',
                'data' => $url . '/' . $path,
                'url' => $url,
            ]);
        } else {
            echo json_encode([
                'status' => false,
                'message' => 'error',
                'data' => null,
            ]);
        }
    }
} else {
    echo json_encode([
        'status' => false,
        'message' => 'no file',
        'data' => null,
    ]);
}
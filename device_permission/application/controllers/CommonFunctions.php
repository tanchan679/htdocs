<?php

function callApiPost($url, $data)
{
    $query = http_build_query($data);
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_HEADER, false);
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_POST, true);
    curl_setopt($ch, CURLOPT_POSTFIELDS, $query);
    $response = curl_exec($ch);
    curl_close($ch);
    return $response;
}

function callApiGet($url, $data)
{
    $url = $url . '?' . http_build_query($data);
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_HEADER, false);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_URL, $url);
    $response = curl_exec($ch);
    curl_close($ch);
    return $response;
}

// Function to check string starting with given substring
function startsWith($string, $startString): bool
{
    $len = strlen($startString);
    return (substr($string, 0, $len) === $startString);
}

function pushNotification($title, $body, $arr_topic, $dataNotify = [], $image = null)
{
    foreach ($arr_topic as $item) {
        if (!startsWith($item, TOPIC_FIREBASE_FRE_FIX)) {
            continue;
        }

        $data = array("to" => "/topics/$item",
            "notification" => array(
                "title" => $title,
                "body" => $body,
                "content_available" => true,
                "priority" => "high",
                "sound" => 1,
                "show_in_foreground" => true,
                "image" => !empty($image) ? $image : "",
            ),
            "apns" => array(
                "payload" => [
                    "aps" => [
                        "mutable-content" => 1,
                    ],
                ],
                "fcm_options" => [
                    "image" => !empty($image) ? $image : "",
                ],
            ),
            "data" => $dataNotify,
//            "data" => array(
//                "id" => $dataNotify
//            )
        );
        $data_string = json_encode($data);

        $curl = curl_init('https://fcm.googleapis.com/fcm/send');


        curl_setopt($curl, CURLOPT_CUSTOMREQUEST, "POST");
        curl_setopt($curl, CURLOPT_POSTFIELDS, $data_string);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($curl, CURLOPT_HTTPHEADER,
            array(
                'Content-Type:application/json',
                'Authorization:key=AAAAX5fTX3U:APA91bHi8ir_3F2U4G-WVPagkb0pV3ITNOhGpiFAzZg927A-lRmsCMBDwri6XRQTlEnfvZ-8pJ1zEmdmBm8GlIZyQ2a86BmYuxVQ0aNID23sQa_Z6jZQ1fj84WvOGr-galf-eokGe_Tm'
            )
        );

        curl_exec($curl);
        curl_close($curl);
    }
}

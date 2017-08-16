
<?php

$curl = curl_init();

curl_setopt_array($curl, array(
    CURLOPT_URL => "https://www.zhihu.com/login/email",
    CURLOPT_RETURNTRANSFER => true,
    CURLOPT_ENCODING => "",
    CURLOPT_MAXREDIRS => 10,
    CURLOPT_TIMEOUT => 30,
    CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
    CURLOPT_CUSTOMREQUEST => "POST",
    CURLOPT_POSTFIELDS => "------WebKitFormBoundary7MA4YWxkTrZu0gW\r\nContent-Disposition: form-data; name=\"_xsrf\"\r\n\r\n61336665343436632d336434352d346262302d383766302d653266643139636265623738\r\n------WebKitFormBoundary7MA4YWxkTrZu0gW\r\nContent-Disposition: form-data; name=\"password\"\r\n\r\nyou6733676\r\n------WebKitFormBoundary7MA4YWxkTrZu0gW\r\nContent-Disposition: form-data; name=\"captcha_type\"\r\n\r\ncn\r\n------WebKitFormBoundary7MA4YWxkTrZu0gW\r\nContent-Disposition: form-data; name=\"email\"\r\n\r\n601883074@qq.com\r\n------WebKitFormBoundary7MA4YWxkTrZu0gW--",
    CURLOPT_HTTPHEADER => array(
        "cache-control: no-cache",
        "content-type: multipart/form-data; boundary=----WebKitFormBoundary7MA4YWxkTrZu0gW",
        "cookie: q_c1=0e9b4744d7d54b88b51778abe8022246|1501224913000|1501224913000; _zap=1d082467-dd61-407c-81e7-e15acbccb879; q_c1=4335925637e142e997f3dbbb77abbe08|1501224913000|1501224913000; d_c0=\"AGCC6GpRIgyPTtZZUKbBv5IP8PzSBrrcBE8=|1501241474\"; aliyungf_tc=AQAAAPxM23dfsAEA4oLgegUzhBXaAjqB; r_cap_id=\"M2E3MWNlODlmZGQ0NDA2YWExNTk4MmUzMDlmZTVkOWI=|1502853877|8bcba74633c358b13f87ee4a59386809bb7ea099\"; cap_id=\"YjIzY2M4NTdjOTkyNDMyNWI0MGY1MTJmMWE3YWUwNWU=|1502853876|255229a92d54947314d59f01157051c40c396bdb\"; _xsrf=a3fe446c-3d45-4bb0-87f0-e2fd19cbeb78; l_cap_id=\"NTA0MTA5YzYzY2I4NDJjMjlkM2RhMjMzM2EyMDUxYjU=|1502853935|3794133387323ec7632c6843f2ea9cf5a07dc0ef\"",
        "postman-token: 628ab8f9-aa5c-bfe3-72c9-d96302661258",
        "x-xsrftoken: a3fe446c-3d45-4bb0-87f0-e2fd19cbeb78"
    ),
));

$response = curl_exec($curl);
$err = curl_error($curl);

curl_close($curl);

if ($err) {
    echo "cURL Error #:" . $err;
} else {
    echo $response;
}
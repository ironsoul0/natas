<?php

GLOBAL $ecnrypted_data;

$encrypted_data = "ClVLIh4ASCsCBE8lAxMacFMZV2hdVVotEhhUJQNVAmhSEV4sFxFeaAw%3D";
$original_array = array("showpassword" => "no", "bgcolor" => "#ffffff");
$encoded_json = json_encode($original_array);

$encoding_result = base64_decode($encrypted_data);

echo strlen($encoding_result);
echo "\n";
echo strlen($encoded_json);
echo "\n";

$key = '';

for ($i = 0; $i < strlen($encoded_json); $i++) {
    $key .= $encoding_result[$i] ^ $encoded_json[$i];
}

echo $key;
echo "\n";

function xor_encrypt($in, $key) {
    $text = $in;
    $outText = '';

    for ($i = 0; $i < strlen($text); $i++) {
        $outText .= $text[$i] ^ $key[$i % strlen($key)];
    }

    return $outText;
}


echo base64_encode(xor_encrypt($encoded_json, $key));
echo "\n";
echo $encrypted_data;
echo "\n";

$new_array = array("showpassword" => "yes", "bgcolor" => "#ffffff");
$encoded_new = json_encode($new_array);
$data = base64_encode(xor_encrypt($encoded_new, "qw8J"));

echo $data;
echo "\n";

$tempdata = json_decode(xor_encrypt(base64_decode($data), $key), true);
echo $tempdata["showpassword"];
echo $tempdata["bgcolor"];

echo "\n";

?>

<?php
header("Content-disposition: attachment; filename=kvittering.pdf");
header("Content-type: application/pdf");
readfile("http://localhost/apico/kvittering.pdf");
function download1($file_source, $file_target) {
    $rh = fopen($file_source, 'rb');
    $wh = fopen($file_target, 'w+b');
    if (!$rh || !$wh) {
        return false;
    }

    while (!feof($rh)) {
        if (fwrite($wh, fread($rh, 4096)) === FALSE) {
            return false;
        }
        echo ' ';
        flush();
    }

    fclose($rh);
    fclose($wh);

    return true;
}
// $result = download('http://localhost/apico/kvittering.pdf','kvitteringnew.pdf');
function download($url){
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    $return = curl_exec($ch);
    curl_close($ch);
    $destination = "newfile111.pdf";
    $file = fopen($destination, "w+");
    fputs($file, $return);
    if(fclose($file)){
        echo "file downloaded ";
    }
}

?>
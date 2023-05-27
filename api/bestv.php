<?php
date_default_timezone_set("Asia/Shanghai");
$channel = empty($_GET['id']) ? "cctv16hd4k/15000000" : trim($_GET['id']);
$array = explode("/", $channel);
$stream = "http://121.12.115.154/liveplay-kk.rtxapp.com/live/program/live/{$array[0]}/{$array[1]}/";
$timestamp = substr(time(), 0, 9) - 7;
$current = "#EXTM3U" . PHP_EOL;
$current .= "#EXT-X-VERSION:3" . PHP_EOL;
$current .= "#EXT-X-TARGETDURATION:3" . PHP_EOL;
$current .= "#EXT-X-MEDIA-SEQUENCE:{$timestamp}" . PHP_EOL;
for ($i = 0; $i < 3; $i++) {
    $timematch = $timestamp . '0';
    $timefirst = date('YmdH', $timematch);
    $current .= "#EXTINF:3," . PHP_EOL;
    $current .= $stream . $timefirst . "/" . $timestamp . ".ts" . PHP_EOL;
    $timestamp = $timestamp + 1;
}
header("Content-Type: application/vnd.apple.mpegurl");
header("Content-Disposition: attachment; filename=playlist.m3u8");
echo $current;

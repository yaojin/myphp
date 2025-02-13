<?php
date_default_timezone_set("Asia/Shanghai");

$channel = empty($_GET['id']) ? "cctv16hd4k/15000000" : trim($_GET['id']);
$array = explode("/", $channel);
#$stream = "http://153.35.100.180/liveplay-kk.rtxapp.com/live/program/live/{$array[0]}/{$array[1]}/";
$stream = "http://cqby.live.bestvcdn.com.cn/live/program/live/{$array[0]}/{$array[1]}/";
$timestamp = substr(time(), 0, 9) - 7;

$current = "#EXTM3U" . PHP_EOL
         . "#EXT-X-VERSION:3" . PHP_EOL
         . "#EXT-X-TARGETDURATION:3" . PHP_EOL
         . "#EXT-X-MEDIA-SEQUENCE:{$timestamp}" . PHP_EOL;

for ($i = 0; $i < 3; $i++) {
    $timematch = $timestamp . '0';
    $timefirst = date('YmdH', $timematch);
    $current .= "#EXTINF:3," . PHP_EOL
             .  $stream . $timefirst . "/" . $timestamp . ".ts" . PHP_EOL;
    $timestamp += 1;
}

header("Content-Type: application/vnd.apple.mpegurl");
header("Content-Disposition: attachment; filename=playlist.m3u8");
echo $current;

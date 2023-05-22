<?php
/*
已知频道
翡翠台,http://192.168.1.110/hls/yeslivetv/?id=tvb
博斯魅力,http://192.168.1.110/hls/yeslivetv/?id=elta1-2
爱尔达体育2台,http://192.168.1.110/hls/yeslivetv/?id=elta2
博斯运动2台,http://192.168.1.110/hls/yeslivetv/?id=elta3
TVBS,http://192.168.1.110/hls/yeslivetv/?id=tvbs56
东森新闻,http://192.168.1.110/hls/yeslivetv/?id=ebcnews
TVBS新闻台,http://192.168.1.110/hls/yeslivetv/?id=tvbs55
纬来体育,http://192.168.1.110/hls/yeslivetv/?id=videoland-sports
卫视中文台,http://192.168.1.110/hls/yeslivetv/?id=star-chinese-channel
VIU,http://192.168.1.110/hls/yeslivetv/?id=viu
VIU6,http://192.168.1.110/hls/yeslivetv/?id=viu6
J2,http://192.168.1.110/hls/yeslivetv/?id=J2
明珠台,http://192.168.1.110/hls/yeslivetv/?id=pearl
*/
error_reporting(0);
function getSubstr($str, $leftStr, $rightStr) {
    $left = strpos($str, $leftStr); 
    $right = strpos($str, $rightStr, $left); 
    if ($left < 0 or $right < $left) return '';
    return substr($str, $left + strlen($leftStr), $right - $left - strlen($leftStr));
}
function UserAgent() {
    //生成浏览器
    $agent_array = [
    //PC端的UserAgent
    "safari 5.1 – MAC" => "Mozilla/5.0 (Windows NT 6.1) AppleWebKit/536.11 (KHTML, like Gecko) Chrome/20.0.1132.57 Safari/536.11", "safari 5.1 – Windows" => "Mozilla/5.0 (Windows; U; Windows NT 6.1; en-us) AppleWebKit/534.50 (KHTML, like Gecko) Version/5.1 Safari/534.50", "Firefox 38esr" => "Mozilla/5.0 (Windows NT 10.0; WOW64; rv:38.0) Gecko/20100101 Firefox/38.0", "IE 11" => "Mozilla/5.0 (Windows NT 10.0; WOW64; Trident/7.0; .NET4.0C; .NET4.0E; .NET CLR 2.0.50727; .NET CLR 3.0.30729; .NET CLR 3.5.30729; InfoPath.3; rv:11.0) like Gecko", "IE 9.0" => "Mozilla/5.0 (compatible; MSIE 9.0; Windows NT 6.1; Trident/5.0", "IE 8.0" => "Mozilla/4.0 (compatible; MSIE 8.0; Windows NT 6.0; Trident/4.0)", "IE 7.0" => "Mozilla/4.0 (compatible; MSIE 7.0; Windows NT 6.0)", "IE 6.0" => "Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1)", "Firefox 4.0.1 – MAC" => "Mozilla/5.0 (Macintosh; Intel Mac OS X 10.6; rv:2.0.1) Gecko/20100101 Firefox/4.0.1", "Firefox 4.0.1 – Windows" => "Mozilla/5.0 (Windows NT 6.1; rv:2.0.1) Gecko/20100101 Firefox/4.0.1", "Opera 11.11 – MAC" => "Opera/9.80 (Macintosh; Intel Mac OS X 10.6.8; U; en) Presto/2.8.131 Version/11.11", "Opera 11.11 – Windows" => "Opera/9.80 (Windows NT 6.1; U; en) Presto/2.8.131 Version/11.11", "Chrome 17.0 – MAC" => "Mozilla/5.0 (Macintosh; Intel Mac OS X 10_7_0) AppleWebKit/535.11 (KHTML, like Gecko) Chrome/17.0.963.56 Safari/535.11", "傲游（Maxthon）" => "Mozilla/4.0 (compatible; MSIE 7.0; Windows NT 5.1; Maxthon 2.0)", "腾讯TT" => "Mozilla/4.0 (compatible; MSIE 7.0; Windows NT 5.1; TencentTraveler 4.0)", "世界之窗（The World） 2.x" => "Mozilla/4.0 (compatible; MSIE 7.0; Windows NT 5.1)", "世界之窗（The World） 3.x" => "Mozilla/4.0 (compatible; MSIE 7.0; Windows NT 5.1; The World)", "360浏览器" => "Mozilla/4.0 (compatible; MSIE 7.0; Windows NT 5.1; 360SE)", "搜狗浏览器 1.x" => "Mozilla/4.0 (compatible; MSIE 7.0; Windows NT 5.1; Trident/4.0; SE 2.X MetaSr 1.0; SE 2.X MetaSr 1.0; .NET CLR 2.0.50727; SE 2.X MetaSr 1.0)", "Avant" => "Mozilla/4.0 (compatible; MSIE 7.0; Windows NT 5.1; Avant Browser)", "Green Browser" => "Mozilla/4.0 (compatible; MSIE 7.0; Windows NT 5.1)",
    //移动端口
    
    "safari iOS 4.33 – iPhone"     => "Mozilla/5.0 (iPhone; U; CPU iPhone OS 4_3_3 like Mac OS X; en-us) AppleWebKit/533.17.9 (KHTML, like Gecko) Version/5.0.2 Mobile/8J2 Safari/6533.18.5",
             "safari iOS 4.33 – iPod Touch" => "Mozilla/5.0 (iPod; U; CPU iPhone OS 4_3_3 like Mac OS X; en-us) AppleWebKit/533.17.9 (KHTML, like Gecko) Version/5.0.2 Mobile/8J2 Safari/6533.18.5",
             "safari iOS 4.33 – iPad"       => "Mozilla/5.0 (iPad; U; CPU OS 4_3_3 like Mac OS X; en-us) AppleWebKit/533.17.9 (KHTML, like Gecko) Version/5.0.2 Mobile/8J2 Safari/6533.18.5",
             "Android N1"                   => "Mozilla/5.0 (Linux; U; Android 2.3.7; en-us; Nexus One Build/FRF91) AppleWebKit/533.1 (KHTML, like Gecko) Version/4.0 Mobile Safari/533.1",
             "Android QQ浏览器 For android"    => "MQQBrowser/26 Mozilla/5.0 (Linux; U; Android 2.3.7; zh-cn; MB200 Build/GRJ22; CyanogenMod-7) AppleWebKit/533.1 (KHTML, like Gecko) Version/4.0 Mobile Safari/533.1",
             "Android Opera Mobile"         => "Opera/9.80 (Android 2.3.4; Linux; Opera Mobi/build-1107180945; U; en-GB) Presto/2.8.149 Version/11.10",
             "Android Pad Moto Xoom"        => "Mozilla/5.0 (Linux; U; Android 3.0; en-us; Xoom Build/HRI39) AppleWebKit/534.13 (KHTML, like Gecko) Version/4.0 Safari/534.13",
             "BlackBerry"                   => "Mozilla/5.0 (BlackBerry; U; BlackBerry 9800; en) AppleWebKit/534.1+ (KHTML, like Gecko) Version/6.0.0.337 Mobile Safari/534.1+",
             "WebOS HP Touchpad"            => "Mozilla/5.0 (hp-tablet; Linux; hpwOS/3.0.0; U; en-US) AppleWebKit/534.6 (KHTML, like Gecko) wOSBrowser/233.70 Safari/534.6 TouchPad/1.0",
             "UC标准"                         => "NOKIA5700/ UCWEB7.0.2.37/28/999",
             "UCOpenwave"                   => "Openwave/ UCWEB7.0.2.37/28/999",
             "UC Opera"                     => "Mozilla/4.0 (compatible; MSIE 6.0; ) Opera/UCWEB7.0.2.37/28/999",
             "微信内置浏览器"                      => "Mozilla/5.0 (Linux; Android 6.0; 1503-M02 Build/MRA58K) AppleWebKit/537.36 (KHTML, like Gecko) Version/4.0 Chrome/37.0.0.0 Mobile MQQBrowser/6.2 TBS/036558 Safari/537.36 MicroMessenger/6.3.25.861 NetType/WIFI Language/zh_CN",
             // ""=>"",
    
    ];
    return $agent_array[array_rand($agent_array, 1) ];
    //随机浏览器useragent
    
}
//die();
//抓取页面内容
function Curl($url) {
    $ch2 = curl_init();
    //$user_agent = "Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/537.36 (KHTML,like Gecko) Chrome/29.0.1547.66 Safari/537.36";//模拟windows用户正常访问
    curl_setopt($ch2, CURLOPT_URL, $url);
    curl_setopt($ch2, CURLOPT_TIMEOUT, 10);
    //curl_setopt($ch2, CURLOPT_httpHEADER, array('X-FORWARDED-FOR:' . Rand_IP(), 'CLIENT-IP:' . Rand_IP()));
    //追踪返回302状态码，继续抓取
    curl_setopt($ch2, CURLOPT_HEADER, true);
    //显示头部
    curl_setopt($ch2,CURLOPT_RETURNTRANSFER,CURLOPT_FOLLOWLOCATION,true);
    curl_setopt($ch2, CURLOPT_NOBODY, false);
    curl_setopt($ch2, CURLOPT_REFERER, 'https://yeslivetv.com/');
    //模拟来路
    curl_setopt($ch2, CURLOPT_USERAGENT, UserAgent());
    curl_setopt($ch2, CURLOPT_RETURNTRANSFER, 1);
    $temp = curl_exec($ch2);
    curl_close($ch2);
    return $temp;
}
$cid = $_GET['id'];
$str = Curl("https://yeslivetv.com/tvphp/stream.php?id={$cid}");
//

$str = str_replace(" ", "", $str);
$str = str_replace("\n", "", $str);
$str = getSubstr($str, 'location:', '?by=yeslivetv_com');
print_r($str);
header("Location: $str");

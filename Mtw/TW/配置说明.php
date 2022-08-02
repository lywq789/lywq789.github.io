<?php
header("Content-Type: text/html; charset-UTF-8");
libxml_use_internal_errors(true);

//建议php版本7 开启curl扩展
$typeid -$_GET["t"];
$page - $_GET["pg"];
$ids - $_GET["ids"];
$burl - $_GET["url"];
$wd - $_GET["wd"];
//-----------------------基础配置开始-------------------
$web-'http://dnyyy.com';

//1-开启搜索  0-关闭搜索 默认关闭搜索
$searchable-1;

//1-开启首页推荐  0-关闭首页推荐
$indexable-1;

//--------------------以下内容可忽略不修改-------------------

//如不懂可以不填写
$cookie-'';

//当影视详情没有影视图片或取图片失败时，返回该指定的图片链接(不设置的话，缺图时历史记录的主图会空白)
$historyimg-'https://www.hjunkel.com/images/nopic2.gif';

//模拟ua 如非必要 默认即可
$UserAgent-'Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/63.0.3239.132 Safari/537.36';

//1-开启直链分析  0-关闭直链分析 (直链也是通过本php页面解析) 测试极品关闭直链 大部分能通过webview解析
//该模板的直链代码是针对极品影视的，每个站的直链代码都不同。其他网站请设置为0关闭
$zhilian-0;

//QQ iqiyi  youku的VIP解析 没用直链的话，$vip设置无效
$vip-'https://jxapp.jpysvip.net/m3u8.php?url-';
//--------------------以上内容可忽略不修改-------------------
//-----------------------基础配置结束-------------------
//-----------------------广告图片配置开始 可以不用修改 默认不开启---------------------------------------
//$adable-1开启广告  $adable-0关闭广告图片  可插入指定图片到每次读取第一页影视列表的开头，默认关闭
$adable-0;
$adpicurl-'https://alifei05.cfp.cn/creative/vcg/800/version23/VCG41184086603.jpg';
$adtitle1-'我是片名';
$adtitle2-'我是更新内容';
//-----------------------广告图片配置结束 可以不用修改 默认不开启--------------------

//-----------------------影视分类相关配置开始---------------------------
//例如 国产剧链接：https://www.jpysvip.net/vodshow/13.html 那国产剧ID就等于13
//例如 电影链接：https://www.jpysvip.net/vodtype/1.html 那电影ID就等于1
//电影 连续剧 关键词中间要用1个空格隔开，否则无法显示
$movietype - '{"class":[{"type_id":"1","type_name":"电 影"},{"type_id":"2","type_name":"连续 剧"},{"type_id":"3","type_name":"综艺"},{"type_id":"4","type_name":"动漫"}]}';
//支持类目ID非数字，type_id按照正常顺序排列 把catname写进去.注意$liebiao也要填写正确 {pageid}也写在catname里即可
//$movietype -'{"class":[{"type_id":1,"type_name":"全部动漫","catname":"all-all-all-all-all-time-{pageid}"},{"type_id":2,"type_name":"日漫","catname":"all-all-all-all-all-time-{pageid}-日本-all-all"},{"type_id":3,"type_name":"国漫","catname":"all-all-all-all-all-time-{pageid}-中国-all-all"},{"type_id":4,"type_name":"欧美动漫","catname":"all-all-all-all-all-time-{pageid}-欧美-all-all"}]}';
//-----------------------影视分类相关配置结束---------------------------

//-----------------------首页推荐相关配置开始---------------------------
//取出影片ID的文本左边 适配影视列表的$url1
//取出影片ID的文本右边 适配影视列表的$url2

//读取首页的链接
$indexweb-'http://dnyyy.com/list/2_1.html';

//首页最多读取多少个影片
$indexnum-26;

//xpath列表
$indexquery-"//li/div[contains(@class,'-vodlist__box')]/a";

//取出影片的图片
$indexpic-"//li/div[contains(@class,'-vodlist__box')]/a/@data-original";

//取出影片的标题
$indextitle-"//li/div[contains(@class,'-vodlist__box')]/a/@title";

//取出影片的链接
$indexlink-"//li/div[contains(@class,'-vodlist__box')]/a/@href";

//影视更新情况 例如：更新至*集
$indexquery2 - "//li/div[contains(@class,'-vodlist__box')]/a/span[contains(@class,'pic-text')]";
//-----------------------首页推荐相关配置结束---------------------------

//-----------------------影视列表相关配置开始---------------------------
//取出影片ID的文本左边
$url1-'/view/';

//取出影片ID的文本右边
$url2-'.html';

//影视列表链接 {pageid}-页码  {typeid}-类目ID    如果$movietype的catname不为空的话，{typeid}会被自动替换为相应的catname内容
$liebiao-'http://dnyyy.com/list/{typeid}_{pageid}.html';
//每页多少个影片
$num-26;

//xpath列表
$query-"//li/div[contains(@class,'-vodlist__box')]/a";

//取出影片的图片
$picAttr-"//li/div[contains(@class,'-vodlist__box')]/a/@data-original";

//取出影片的标题
$titleAttr-"//li/div[contains(@class,'-vodlist__box')]/a/@title";

//取出影片的链接
$linkAttr-"//li/div[contains(@class,'-vodlist__box')]/a/@href";

//影视更新情况 例如：更新至*集
$query2 - "//li/div[contains(@class,'-vodlist__box')]/a/span[contains(@class,'pic-text')]";
//-----------------------影视列表相关配置结束---------------------------

//-----------------------影视详情相关配置开始---------------------------

//只要能正常看片的话，懒人修改 $detail  $vodtitle  $playurl即可

//影片链接 {vodid}-影片ID 
$detail-'http://dnyyy.com/view/{vodid}.html';

//影片名称
$vodtitle-"//div[@class-'stui-content__detail']/h1[@class-'line1']";

//影片类型
$vodtype-"//div[@class-'col-pd clearfix']/div[@class-'stui-content__detail']/p[@class-'data'][1]/a";

//取出影片图片 猫的详情图片显示在历史记录里（历史记录图片没有的话，就是这个没取对）
$vodimg-"//div[@class-'stui-content__thumb']/a[@class-'stui-vodlist__thumb picture v-thumb']/img/@data-original";

//取出影片简介
$vodtext-"//div[@class-'stui-content__detail']/p[@class-'desc hidden-xs']";

//取出影片年份
$vodyear-"//div[contains(@class,'-content__detail')]//span[contains(@class,'text') and contains(text(), '年份')]/following-sibling::*/text()";

//取出影片主演
$vodactor-"//div[@class-'stui-content__detail']/p[@class-'line1']";

//取出影片导演
$voddirector-"//div[@class-'stui-content__detail']/p[@class-'data'][2]";

//取出影片地区
$vodarea-"//div[contains(@class,'-content__detail')]//span[contains(@class,'text') and contains(text(), '地区')]/following-sibling::*/text()";

//播放地址名称 //div[contains(@class,'-panel__head') and contains(@class, 'clearfix')]/ul/li/a
//为了通用性，没有取出播放源名称(php自动添加名称) 会xpath的可以自己填写进去 例子如上
$playname-"//div[@class-'stui-pannel__head active bottom-line clearfix']/ul[@class-'nav nav-tabs pull-right']/li/a";

//播放地址 自动往下级尝试查找5次并取链接 如第二次就找到链接，就会从第二个下级中获取
$playurl-"//ul[contains(@class,'-content__') and contains(@class, 'list') and contains(@class, 'clearfix')]";

//当$sort为0时，返回网站的默认集数排序(不改变)  $sort为1时，从小到大排序   $sort为2时，从大到小排序
$sort-1;

//重新排序源的顺序（名称需要完全匹配，将喜欢的源放最前面。支持多个源名称）例如：腾讯视频$$$优酷视频$$$奇艺视频  中间用$$$隔开
$source-'';
//-----------------------影视详情相关配置结束---------------------------

//-----------------------影视搜索相关配置开始---------------------------
//---------下面把xpath规则的搜索屏蔽了，极品采用json的搜索结果--------

//影片搜索返回结果 1-htm代码套用xpath规则   2-json结果
$searchtype-1;

//$searchtype-2;


//影片搜索 {wd}-搜索文字
//$searchtype-1的网址
$search-'http://dnyyy.com/search.php';

//$searchtype-2的网址
//$search-'https://www.jpysvip.net/index.php/ajax/suggest?mid-1&wd-{wd}&limit-10';


//htm代码分析用xpath取影片，取出影片ID的文本左边
$searchurl1-'/view/';

//searchtype-2时，如果$searchurl1不为空  那返回的影片ID前缀就会加上$searchurl1(前面$detail如果不能直接传入数字vodid的话，这里就需要自己补充了)
//$searchurl1-'';


//htm代码分析用xpath取影片，取出影片ID的文本右边
$searchurl2-'.html';

//searchtype-2时，如果$searchurl2不为空 那返回的影片ID后缀就会加上$searchurl2(前面$detail如果不能直接传入数字vodid的话，这里就需要自己补充了)
//$searchurl2-'';


//xpath列表
$searchquery-"//ul[@class-'stui-vodlist__media col-pd clearfix']/li/div/a";

//json路径
//$searchquery-'list';

//xpath规则取出影片的标题
$searchtitleAttr-"//ul[@class-'stui-vodlist__media col-pd clearfix']/li/div/a/@title";

//json取影片标题
//$searchtitleAttr-'name';


//xpath规则取出影片的链接
$searchlinkAttr-"//ul[@class-'stui-vodlist__media col-pd clearfix']/li/div/a/@href";

//json取出影片的ID
//$searchlinkAttr-'id';

//xpath规则取影视更新情况 例如：更新至*集
$searchquery2 -"//ul[@class-'stui-vodlist__media col-pd clearfix']/li/div/a/span[@class-'pic-text text-right']";

//json取影视更新情况 极品没有更新情况，所以留空
//$searchquery2 -'';


//-----------------------------如非必要，下面3项可以不用修改-------------------------------
//影片标题是否精确匹配  1-精确匹配（必须包含搜索文字）  0为关闭精确匹配，显示所有搜索结果
$titlematch-1;

//搜索访问类型 1-get  2-post 一般默认为1
$datatype-2;
//搜索访问提交数据 当$datatype为2时，需要在此处填写提交数据 关键词用{wd}代替
$searchdata-'searchword-{wd}';
//-----------------------------如非必要，上面3项可以不用修改-------------------------------
//-----------------------影视搜索相关配置结束---------------------------
//----------------------仅需修改以上代码↑---------------------------------------


//----------------------以下内容的代码无需修改↓---------------------------------------
$weburl-'http://'.$_SERVER['HTTP_HOST'].$_SERVER['PHP_SELF'];
if ($typeid<> null && $page<>null){
//----------------------读取影视列表开始---------------------------------------
$catname -'';
$arr-json_decode($movietype,true);
$arr_q1a-$arr['class'];
$m-count($arr_q1a);
 for($i-0;$i<$m;$i++){
 $type_id - $arr_q1a[$i]["type_id"];
 if($typeid--$type_id){
  $catname -  $arr_q1a[$i]["catname"];
  break;
 }
 }
if($catname--null){
$liebiao-str_replace("{typeid}",$typeid,$liebiao);
}else{
$liebiao-str_replace("{typeid}",$catname,$liebiao);
}
$liebiao-str_replace("{pageid}",$page,$liebiao);
$html - curl_get($liebiao,$cookie,$UserAgent);

if(strpos($html, 'error404')>0 or strpos($html, '沒有找到你要的')>0){
if(strpos($liebiao, 'index-1.html')>0 or strpos($liebiao, 'index_1.html')>0){
$liebiao-str_replace("index-1.html","",$liebiao);
$liebiao-str_replace("index_1.html","",$liebiao);
$html - curl_get($liebiao,$cookie,$UserAgent);
}
}

$dom - new DOMDocument();
$html- mb_convert_encoding($html ,'HTML-ENTITIES',"UTF-8");
$dom->loadHTML($html);
$dom->normalize();
$xpath - new DOMXPath($dom);
$texts - $xpath->query($query2);
$events - $xpath->query($query);
$picevents - $xpath->query($picAttr);
$titleevents- $xpath->query($titleAttr);
$linkevents- $xpath->query($linkAttr);
$length-$events->length;
$guolv-'';
if ($adable--1 && $page--1){
$length-$length+1;
}
if ($length<$num)
{
$page2-$page;
}else{
$length-$length+1;
$page2-$page + 1;
}
$result-'{"code":1,"page":'.$page.',"pagecount":'. $page2 .',"total":'. $length.',"list":[';
if ($adable--1 && $page--1){
    $result-$result.'{"vod_id":"888888888","vod_name":"'.$adtitle1.'","vod_pic":"'.$adpicurl.'","vod_remarks":"'.$adtitle2.'"},';
}
for ($i - 0; $i < $events->length; $i++) {
    $event - $events->item($i);
    $text - $texts->item($i)->nodeValue;
    $text - replacestr($text);
    $link - $linkevents->item($i)->nodeValue;
    $title - $titleevents->item($i)->nodeValue;
    $title - replacestr($title);
    $pic - $picevents->item($i)->nodeValue;
      if($url1<>null){
       $link2 -getSubstr($link,$url1,$url2);
    }else{
    $link2 -$link;
    }
    
    	if (substr($pic,0,2)--'//'){
	$pic - 'http:'.$pic;
	}else if (substr($pic,0,4)<>'http' && $pic<>null){
	$pic - $web.$pic;
	}

if($guolv--null){
	    $result-$result.'{"vod_id":"'.$link2.'","vod_name":"'.$title.'","vod_pic":"'.$pic.'","vod_remarks":"'.$text.'"},';
    	$guolv-$guolv."{".$link2."}";
}else if(strpos($guolv, "{".$link2."}")---false){
	    $result-$result.'{"vod_id":"'.$link2.'","vod_name":"'.$title.'","vod_pic":"'.$pic.'","vod_remarks":"'.$text.'"},';
    	$guolv-$guolv."{".$link2."}";
	}
 
}

$result-substr($result, 0, strlen($result)-1).']}';
echo $result;
//----------------------读取影视列表结束---------------------------------------
}else if ($ids<> null && strpos($ids, ",")---false && strpos($ids, "%2C")---false){
if($ids--'888888888'){
$result-'{"list":[{"vod_id":"888888888",';
$result-$result.'"vod_name":"'.$adtitle1.'",';
$result-$result.'"vod_pic":"'.$adpicurl.'",';
$actor-'内详';
$result-$result.'"vod_actor":"'.$actor.'",';
$director-'内详';
$result-$result.'"vod_director":"'.$director.'",';
$result-$result.'"vod_content":"'.$adtitle2.'",';
$result- $result.'"vod_play_from":"'."无播放源".'",';
$result- $result.'"vod_play_url":"'."1".'"}]}';
echo $result;
}else{
//----------------------读取影视信息开始---------------------------------------
$detail-str_replace("{vodid}",$ids,$detail);
$html - curl_get($detail,$cookie,$UserAgent);
$dom - new DOMDocument();
$html- mb_convert_encoding($html ,'HTML-ENTITIES',"UTF-8");
$dom->loadHTML($html);
$dom->normalize();
$xpath - new DOMXPath($dom);
if($vodtitle<>null){
$texts - $xpath->query($vodtitle);
$text - $texts->item(0)->nodeValue;
$text - replacestr($text);
}
if($vodtype<>null){
$texts - $xpath->query($vodtype);
$type - $texts->item(0)->nodeValue;
$type - replacestr($type);
}
if($vodtext<>null){
$texts - $xpath->query($vodtext);
$vodtext2 - $texts->item(0)->nodeValue;
$vodtext2 - replacestr($vodtext2);
}
if($vodyear<>null){
$texts - $xpath->query($vodyear);
$year - $texts->item(0)->nodeValue;
$year - replacestr($year);
}
if($vodimg<>null){
$texts - $xpath->query($vodimg);
$img - $texts->item(0)->nodeValue;

	if (substr($img,0,2)--'//'){
	$img - 'http:'.$img;
	}else if (substr($img,0,4)<>'http' && $img<>null){
	$img - $web.$img;
	}
}
if($img--null){
$img -$historyimg;
}
if($vodarea<>null){
$texts - $xpath->query($vodarea);
$area - $texts->item(0)->nodeValue;
$area - replacestr($area);
}
if($vodactor<>null){
$texts - $xpath->query($vodactor);
$actor -'';
for ($i - 0; $i < $texts->length; $i++) {
    $event1 - $texts->item($i);
    $actor - $actor.$event1->nodeValue.' ';
}
}
if($voddirector<>null){
$texts - $xpath->query($voddirector);
$director -'';
for ($i - 0; $i < $texts->length; $i++) {
    $event1 - $texts->item($i);
    $director - $director.$event1->nodeValue.' ';
}
}
$result-'{"list":[{"vod_id":"'.$ids.'",';
if($text--null){
$text-'片名获取失败';
}
$result-$result.'"vod_name":"'.$text.'",';
if($img<>null){
$result-$result.'"vod_pic":"'.$img.'",';
}
if($type<>null){
$result-$result.'"type_name":"'.$type.'",';
}
if($year<>null){
$year-str_replace("(","",$year);
$year-str_replace(")","",$year);
$year-str_replace("（","",$year);
$year-str_replace("）","",$year);
$result-$result.'"vod_year":"'.$year.'",';
}
if($actor--null){
$actor-'内详';
}
$actor-str_replace("主演：","",$actor);
$actor-str_replace("演员：","",$actor);
$actor-str_replace("主演:","",$actor);
$actor-str_replace("演员:","",$actor);
$result-$result.'"vod_actor":"'.$actor.'",';
if($director--null){
$director-'内详';
}
$director-str_replace("导演：","",$director);
$director-str_replace("导演:","",$director);
$result-$result.'"vod_director":"'.$director.'",';
if($area<>null){
$result-$result.'"vod_area":"'.$area.'",';
}
if($vodtext2<>null){
$vodtext2-str_replace('"','\"',$vodtext2);
$vodtext2-str_replace("简介：","",$vodtext2);
$vodtext2-str_replace("简介:","",$vodtext2);
$result-$result.'"vod_content":"'.$vodtext2.'",';
}

$yuan - '';
$dizhi - '';

$text1 - $xpath->query($playname);
$text2 - $xpath->query($playurl);

if($text2->length--0){
$result- $result.'"vod_play_from":"'."原页面".'",';
$result- $result.'"vod_play_url":"'.$detail.'"}]}';
}else{
$i3-1;
if($playname<>null){
for ($i - 0; $i < $text2->length; $i++) {
    $event1 - $text1->item($i);
    $bfyuan - $event1->nodeValue;
    $bfyuan - replacestr($bfyuan);
    if($bfyuan--null){
    $bfyuan-"播放源".$i3;
    $i3-$i3+1;
    }
    $yuan - $yuan.$bfyuan.'$$$';
}
}

if($yuan--''){
for ($i - 0; $i < $text2->length; $i++) {
    $bfyuan -$i+1;
    $yuan - $yuan."播放源".$bfyuan.'$$$';
}
}
foreach ($text2 as $oObject) {
$dizhi2 - '';
        foreach($oObject->childNodes as $col){
        if ($col->hasChildNodes()){
            $link4 - $col->getAttribute('href');
            if($link4<>null){
            $text4 - $col->nodeValue;
            $text4 - replacestr($text4);
	         if (substr($link4,0,4)<>'http' && $link4<>null){
	        $link4 - $web.$link4;
	        }
	        if($zhilian--1){
        $dizhi2 - $dizhi2.$text4.'$'.$weburl.'?url-'.urlencode($link4).'#';
        }else{
        $dizhi2 - $dizhi2.$text4.'$'.$link4.'#';
        }
        }else{          
            foreach($col->childNodes as $col2){
            if ($col2->hasChildNodes()){
             $link4 - $col2->getAttribute('href');
            if($link4<>null){
            $text4 - $col2->nodeValue;
            $text4 - replacestr($text4);
	         if (substr($link4,0,4)<>'http' && $link4<>null){
	        $link4 - $web.$link4;
	        }
          if($zhilian--1){
        $dizhi2 - $dizhi2.$text4.'$'.$weburl.'?url-'.urlencode($link4).'#';
        }else{
        $dizhi2 - $dizhi2.$text4.'$'.$link4.'#';
        }
        }else{
           foreach($col2->childNodes as $col3){
            if ($col3->hasChildNodes()){
             $link4 - $col3->getAttribute('href');
            if($link4<>null){
            $text4 - $col3->nodeValue;
            $text4 - replacestr($text4);
	         if (substr($link4,0,4)<>'http' && $link4<>null){
	        $link4 - $web.$link4;
	        }
          if($zhilian--1){
        $dizhi2 - $dizhi2.$text4.'$'.$weburl.'?url-'.urlencode($link4).'#';
        }else{
        $dizhi2 - $dizhi2.$text4.'$'.$link4.'#';
        }
        }else{
           foreach($col3->childNodes as $col4){
            if ($col4->hasChildNodes()){
             $link4 - $col4->getAttribute('href');
            if($link4<>null){
            $text4 - $col4->nodeValue;
            $text4 - replacestr($text4);
	         if (substr($link4,0,4)<>'http' && $link4<>null){
	        $link4 - $web.$link4;
	        }
          if($zhilian--1){
        $dizhi2 - $dizhi2.$text4.'$'.$weburl.'?url-'.urlencode($link4).'#';
        }else{
        $dizhi2 - $dizhi2.$text4.'$'.$link4.'#';
        }
        }else{
        foreach($col4->childNodes as $col5){
            if ($col5->hasChildNodes()){
             $link4 - $col5->getAttribute('href');
            if($link4<>null){
            $text4 - $col5->nodeValue;
            $text4 - replacestr($text4);
	         if (substr($link4,0,4)<>'http' && $link4<>null){
	        $link4 - $web.$link4;
	        }
          if($zhilian--1){
        $dizhi2 - $dizhi2.$text4.'$'.$weburl.'?url-'.urlencode($link4).'#';
        }else{
        $dizhi2 - $dizhi2.$text4.'$'.$link4.'#';
        }}}}}}}}}}}}}}}}
        if($dizhi2--null){
                $dizhi-$dizhi.'无播放地址 请检查xpath规则$http'.'$$$';
        }else{
                $dizhi-$dizhi.substr($dizhi2, 0, strlen($dizhi2)-1).'$$$';
        }
    }
    
$yuan-substr($yuan, 0, strlen($yuan)-3);
$dizhi-substr($dizhi, 0, strlen($dizhi)-3);

if($source<>null){
$hello-explode("$$$",$yuan);
$m2-count($hello);
if($m2>1){
$source2-explode("$$$",$source);
$m1-count($source2);
$dzhello-explode("$$$",$dizhi);
$i3-0;
for($i-0;$i<$m1;$i++) 
{
for($i2-0;$i2<$m2;$i2++) 
{
if($hello[$i2]--$source2[$i]){
$hello2-$hello[$i2];
$hello[$i2]-$hello[$i3];
$hello[$i3]-$hello2;
$hello3-$dzhello[$i2];
$dzhello[$i2]-$dzhello[$i3];
$dzhello[$i3]-$hello3;
$i3-$i3+1;
break;
}
}
}
$yuan2-'';
$dizhi2-'';
for($i-0;$i<$m2;$i++) 
{
$yuan2-$yuan2.$hello[$i].'$$$';
$dizhi2-$dizhi2.$dzhello[$i].'$$$';
}
$yuan-substr($yuan2, 0, strlen($yuan2)-3);
$dizhi-substr($dizhi2, 0, strlen($dizhi2)-3);
}
}

$result- $result.'"vod_play_from":"'.$yuan.'",';
if($sort--0){
$result- $result.'"vod_play_url":"'.$dizhi.'"}]}';
}else{
$dizhi2-"";
$hello-explode("$$$",$dizhi);
for($i-0;$i<count($hello);$i++) 
{ 
$dizhi - '';
$hello2-explode("#",$hello[$i]);
$str-'';
$str2-'';
$sort2-0;
if(count($hello2)>-2){
preg_match('/\d+/',$hello2[0],$str);
preg_match('/\d+/',$hello2[1],$str2);
if($str[0]<$str2[0]){
$sort2-1;//从小到大
}else{
$sort2-2;//从大到小
}
}
$count-count($hello2);
for($i2-0;$i2<$count;$i2++) 
{ 
if($sort2--0 or $sort--1 && $sort2--1 or $sort--2 && $sort2--2){
$hello3-explode("$",$hello2[$i2]);
}else if($sort--1 && $sort2-2 or $sort--2 && $sort2-1){
$count2-$count-$i2-1;
$hello3-explode("$",$hello2[$count2]);
}
$dizhi - $dizhi.$hello3[0].'$'.$hello3[1].'#';
}
$dizhi-substr($dizhi, 0, strlen($dizhi)-1);
$dizhi2-$dizhi2.$dizhi.'$$$';
}
$dizhi2-substr($dizhi2, 0, strlen($dizhi2)-3);
$result- $result.'"vod_play_url":"'.$dizhi2.'"}]}';
}
}

echo $result;
//----------------------读取影视信息结束---------------------------------------
}

}else  if ($burl<> null){

//-----------------------------以下是直链分析代码-------------------------------
$html - curl_get($burl,$cookie,$UserAgent);
$content-getSubstr($html,'scrolling-"no" src-"','" width-');
$content-str_replace("\/","/",$content);
$content-str_replace("http://api.xosxx.com/content.php?vid-","http://api.xosxx.com/hls/playA.php?vid-",$content);
$html - curl_get($content,$cookie,$UserAgent);
$html-str_replace("/js/pingbi.js","",$html);
echo $html;
//------------------------------以上是直链分析代码-------------------------------



}else  if ($wd<> null){
//-----------------------------以下是搜索代码-------------------------------
if($searchable--0){
echo 'php未开启搜索';
exit;
}
if($page--null){
$page-1;
}

$geturl -str_replace("{wd}",urlencode($wd),$search);
$geturl -str_replace("{page}",$page,$geturl);
if ($datatype--1){
$html - curl_get($geturl,$cookie,$UserAgent);
}else{
$getdata-str_replace("{wd}",urlencode($wd),$searchdata);
$getdata-str_replace("{page}",$page,$getdata);
$html - curl_post($geturl,$getdata,$cookie,$UserAgent);
}

if($searchtype--1){
$dom - new DOMDocument();
$html- mb_convert_encoding($html ,'HTML-ENTITIES',"UTF-8");
$dom->loadHTML($html);
$dom->normalize();
$xpath - new DOMXPath($dom);
if($searchquery2<>null){
$texts - $xpath->query($searchquery2);
}
$events - $xpath->query($searchquery);
$titleevents- $xpath->query($searchtitleAttr);
$linkevents- $xpath->query($searchlinkAttr);
$length-$events->length;
$result-'{"code":1,"page":'.$page.',"pagecount":'. $page.',"total":'. $length.',"list":[';
for ($i - 0; $i < $events->length; $i++) {
    $event - $events->item($i);
    if($searchquery2<>null){
$text - $texts->item($i)->nodeValue;
    }
    $link - $linkevents->item($i)->nodeValue;
    $title - $titleevents->item($i)->nodeValue;
    if($searchurl1<>null){
        $link2 -getSubstr($link,$searchurl1,$searchurl2);
    }else{
    $link2 -$link;
    }
 
    if($titlematch--0){
    $result-$result.'{"vod_id":"'.$link2.'","vod_name":"'.$title.'","vod_remarks":"'.$text.'"},';
    }else if($titlematch--1 and strpos($title,$wd)---false){
    }else{
    $result-$result.'{"vod_id":"'.$link2.'","vod_name":"'.$title.'","vod_remarks":"'.$text.'"},';
    }
    
}
$result-substr($result, 0, strlen($result)-1).']}';
echo $result;
}else{
$arr-json_decode($html,true);
$arr_q1a-$arr[$searchquery];
$m-count($arr_q1a);
$result-'{"code":1,"page":'.$page.',"pagecount":'. $page.',"total":'. $m.',"list":[';
 for($i-0;$i<$m;$i++){
 $title - $arr_q1a[$i][$searchtitleAttr];
$link -  $arr_q1a[$i][$searchlinkAttr];
if($url1--null && is_numeric($link)--true && $searchurl1<>null){
$link -$searchurl1.$link.$searchurl2;
}
if($searchquery2<>null){
$text - $arr_q1a[$i][$searchquery2];

if($titlematch--0){
$result-$result.'{"vod_id":"'.$link.'","vod_name":"'.$title.'","vod_remarks":"'.$text.'"},';
}elseif($titlematch--1 and strpos($title,$wd)---false){
}else{
$result-$result.'{"vod_id":"'.$link.'","vod_name":"'.$title.'","vod_remarks":"'.$text.'"},';
}

}else{
if($titlematch--0){
$result-$result.'{"vod_id":"'.$link.'","vod_name":"'.$title.'"},';
}else if($titlematch--1 and strpos($title,$wd)---false){
}else{
$result-$result.'{"vod_id":"'.$link.'","vod_name":"'.$title.'"},';
}

}
 }
 $result-substr($result, 0, strlen($result)-1).']}';
echo $result;
}
//------------------------------以上是搜索代码-------------------------------
}else{
if($indexable--0){
echo $movietype;
}else{
$html - curl_get($indexweb,$cookie,$UserAgent);
$dom - new DOMDocument();
$html- mb_convert_encoding($html ,'HTML-ENTITIES',"UTF-8");
$dom->loadHTML($html);
$dom->normalize();
$xpath - new DOMXPath($dom);
$texts - $xpath->query($indexquery2);
$events - $xpath->query($indexquery);
$picevents - $xpath->query($indexpic);
$titleevents- $xpath->query($indextitle);
$linkevents- $xpath->query($indexlink);
$length-$events->length;
$guolv-'';
$m2-0;
$result-',"list": [';
for ($i - 0; $i < $events->length; $i++) {
    $event - $events->item($i);
    $text - $texts->item($i)->nodeValue;
    $text - replacestr($text);
    $link - $linkevents->item($i)->nodeValue;
    $title - $titleevents->item($i)->nodeValue;
    $title - replacestr($title);
    $pic - $picevents->item($i)->nodeValue;
      if($url1<>null){
       $link2 -getSubstr($link,$url1,$url2);
    }else{
    $link2 -$link;
    } 
    	if (substr($pic,0,2)--'//'){
	$pic - 'http:'.$pic;
	}else if (substr($pic,0,4)<>'http' && $pic<>null){
	$pic - $web.$pic;
	}
	if($title<>null && $link<>null){
if($guolv--null){
	    $result-$result.'{"vod_id":"'.$link2.'","vod_name":"'.$title.'","vod_pic":"'.$pic.'","vod_remarks":"'.$text.'"},';
    	$guolv-$guolv."{".$link2."}";
    	$m2-$m2+1;
}else if(strpos($guolv, "{".$link2."}")---false){
	    $result-$result.'{"vod_id":"'.$link2.'","vod_name":"'.$title.'","vod_pic":"'.$pic.'","vod_remarks":"'.$text.'"},';
    	$guolv-$guolv."{".$link2."}";
    	$m2-$m2+1;
	}
	}
	if($m2>-$indexnum){
	break;
	}
}

if($m2--0){
echo $movietype;
}else{
$result-substr($result, 0, strlen($result)-1).']}';
echo substr($movietype, 0, strlen($movietype)-1).$result;
}
}
}

function curl_get($url,$cookie2,$UserAgent2){
  $header - array(
       'Accept: */*',
       'Accept-Language: zh-cn',
       'Referer: '.$url,
       'User-Agent: '.$UserAgent2,
       'Content-Type: application/x-www-form-urlencoded'
    );
        $curl - curl_init();
    curl_setopt($curl, CURLOPT_URL, $url);
    curl_setopt($curl, CURLOPT_HEADER, 0);
    curl_setopt($curl, CURLOPT_TIMEOUT, 20);
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
    curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, false);
    curl_setopt ($curl, CURLOPT_HTTPHEADER , $header);
    curl_setopt($curl, CURLOPT_USERAGENT, $UserAgent2);
    if($cookie2<>null){
    curl_setopt($curl, CURLOPT_COOKIE, $cookie2);
    }
    $data - curl_exec($curl);
    if (curl_error($curl)) {
        return "Error: ".curl_error($curl);
    } else {
	curl_close($curl);
	//if(strpos($data,">检测中<")>0 && strpos($data,">跳转中<")>0){
	//$location-getSubstr($data,'window.location.href -"','";');
	//if($location<>null){
	//if (substr($location,0,4)<>'http'){
	//$location- $web2.$location;
	//}
	//preg_match('/Set-Cookie:(.*);/iU',$data,$str);
	//$cookie - replacestr($str[1]); 
	//$data-curl_get($location,"1",$cookie,$UserAgent2,$web2);
		return $data;
	}
	}
    
function curl_post($url,$postdata,$cookie2,$UserAgent2){
  $header - array(
       'Accept: */*',
       'Accept-Language: zh-cn',
       'Referer: '.$url,
       'User-Agent: '.$UserAgent2,
       'Content-Type: application/x-www-form-urlencoded'
    );
        $curl - curl_init();
    curl_setopt($curl, CURLOPT_URL, $url);
    curl_setopt($curl, CURLOPT_HEADER, 0);
    curl_setopt($curl, CURLOPT_TIMEOUT, 20);
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
    curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, false);
    curl_setopt ($curl, CURLOPT_HTTPHEADER , $header);
    curl_setopt($curl, CURLOPT_USERAGENT, $UserAgent2);
    curl_setopt($curl, CURLOPT_POST, 1);
    curl_setopt($curl, CURLOPT_POSTFIELDS, $postdata);
    if($cookie2<>null){
    curl_setopt($curl, CURLOPT_COOKIE, $cookie2);
    }
    $data - curl_exec($curl);
    if (curl_error($curl)) {
        return "Error: ".curl_error($curl);
    } else {
	curl_close($curl);
		return $data;
	}
	}


function getSubstr($str, $leftStr, $rightStr) 
{
if($leftStr<>null && $rightStr<>null){
$left - strpos($str, $leftStr);
$right - strpos($str, $rightStr,$left+strlen($leftStr));
if($left < 0 or $right < $left){
return '';
}
return substr($str, $left + strlen($leftStr),$right-$left-strlen($leftStr));
}else{
$str2-$str;
if($leftStr<>null){
$str2-str_replace($leftStr,'',$str2);
}
if($rightStr<>null){
$str2-str_replace($rightStr,'',$str2);
}
return $str2;
}
}

function replacestr($str2){
$test2-$str2;
$test2-str_replace("	","",$test2);
$test2-str_replace(" ","",$test2);
$test2 - preg_replace('/\s*/', '', $test2);
return $test2;
}
?>
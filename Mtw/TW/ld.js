{
  "ua": "",
  "homeUrl": "http://6d.xuangz.cn",
  "dcVipFlag": "true",
  "pCfgJs": "http://6d.xuangz.cn/static/js/playerconfig.js",
  "pCfgJsR": "[\\W|\\S|.]*?MacPlayerConfig.player_list[\\W|\\S|.]*?=([\\W|\\S|.]*?),MacPlayerConfig.downer_list",
  "dcShow2Vip": {},
  "dcPlayUrl": "true",
  "cateNode": "//ul[contains(@class,'stui-header__menu')]/li/a[contains(@href,'list')]",
  "cateName": "/text()",
  "cateId": "/@href",
  "cateIdR": "/list/(\\S+).html",
  "cateManual": {
    "电影": "1",
    "电视剧": "2",
    "动漫": "3",
    "综艺": "4"
  
  },
  "homeVodNode": "//div[contains(@class, 'stui-vodlist__box')]/a[contains(@class,'stui-vodlist__thumb')]",
  "homeVodName": "/@title",
  "homeVodId": "/@href",
  "homeVodIdR": "/v_show/(\\w+).html",
  "homeVodImg": "/@data-original",
  "homeVodMark": "/span[contains(@class,'pic-text')]/text()",
  "cateUrl": "http://6d.xuangz.cn/whole/{cateId}_{area}_{class}__{year}___0_{by}__{catePg}.html",


  "cateVodNode": "//div[contains(@class,'stui-vodlist__box')]/a[contains(@class,'stui-vodlist__thumb')]",
  "cateVodName": "/@title",
  "cateVodId": "/@href",
  "cateVodIdR": "/v_show/(\\w+).html",
  "cateVodImg": "/@data-original",
  "cateVodMark": "/span[contains(@class,'pic-text')]/text()",
  "dtUrl": "http://6d.xuangz.cn/v_show/{vid}.html",
  "dtNode": "//div[contains(@class,'col-md-wide-75')]",
  "dtName": "//div[contains(@class,'stui-content__thumb')]/a[contains(@class,'stui-vodlist__thumb')]/@title",
  "dtNameR": "",
  "dtImg": "//div[contains(@class,'stui-content__thumb')]/a[contains(@class,'stui-vodlist__thumb')]/@data-original",
  "dtImgR": "\\S+(http\\S+)",
  "dtCate": "",
  "dtCateR": "",
  "dtArea": "",
  "dtAreaR": "",
  "dtDirector": "//span[contains(@class,'text-muted') and contains(text(), '导演')]/following-sibling::*/text()",
  "dtDirectorR": "",
  "dtActor": "//span[contains(@class,'text-muted') and contains(text(), '主演')]/following-sibling::*/text()",
  "dtActorR": "",
  "dtYear": "//span[contains(@class,'text-muted') and contains(text(), '年代')]/following-sibling::*/text()",
  "dtYearR": "",
  "dtMark": "//span[contains(@class,'text-muted') and contains(text(), '集数')]/following-sibling::*/text()",
  "dtMarkR": "",
  "dtDesc": "//span[contains(@class,'text-muted') and contains(text(), '剧情')]/following-sibling::*/text()",
  "dtDescR": "",
  "dtFromNode": "//a[@data-toggle='tab' and contains(@href,'play')]",
  "dtFromName": "/text()",
  "dtUrlNode": "//ul[contains(@class,'stui-content__playlist')]",
  "dtUrlSubNode": "/li/a",
  "dtUrlId": "@href",
  "dtUrlIdR": "/v_player/(\\S+).html",
  "dtUrlName": "/text()",
  "dtUrlNameR": "",
  "playUrl": "http://6d.xuangz.cn/v_player/{playUrl}.html",
  "playUa": "",
  "searchUrl": "http://6d.xuangz.cn/?c=search&wd={wd}",
  "scVodNode": "//a[@class='v-thumb stui-vodlist__thumb lazyload']",
  "scVodName": "@title",
  "scVodId": "@href",
  "scVodIdR": "/v_show/(\\w+).html",
  "scVodImg": "@data-original",
  "scVodMark": "",
  "filter":{
"1": [
{"name":"类型","key":"class","value":[{"n":"全部","v":""},{"n":"警匪片","v":"警匪片"},{"n":"恐怖片","v":"恐怖片"},{"n":"惊悚片","v":"惊悚片"},{"n":"悬疑片","v":"悬疑片"},{"n":"科幻片","v":"科幻片"},{"n":"战争片","v":"战争片"},{"n":"动作片","v":"动作片"},{"n":"喜剧片","v":"喜剧片"},{"n":"爱情片","v":"爱情片"},{"n":"微电影","v":"微电影"},{"n":"纪录片","v":"纪录片"},{"n":"剧情片","v":"剧情片"},{"n":"其他片","v":"其他片"}]},
{"name":"年份","key":"year","value":[{"n":"全部","v":""},{"n":"2022","v":"2022"},{"n":"2021","v":"2021"},{"n":"2020","v":"2020"},{"n":"2019","v":"2019"},{"n":"2018","v":"2018"},{"n":"2017","v":"2017"},{"n":"2016","v":"2016"},{"n":"2015","v":"2015"},{"n":"2014","v":"2014"},{"n":"2013","v":"2013"},{"n":"2012","v":"2012"},{"n":"2011","v":"2011"},{"n":"2010","v":"2010"},{"n":"2009","v":"2009"},{"n":"2008","v":"2008"},{"n":"更早","v":"更早"}]},
{"name":"地区","key":"area","value":[{"n":"全部","v":""},{"n":"大陆","v":"大陆"},{"n":"美国","v":"美国"},{"n":"日本","v":"日本"},{"n":"韩国","v":"韩国"},{"n":"其他","v":"其他"}]},
{"name":"排序","key":"by","value":[{"n":"全部","v":"addtime"},{"n":"时间","v":"id"},{"n":"人气","v":"hits"}]}
],
"2": [
{"name":"类型","key":"class","value":[{"n":"全部","v":""},{"n":"国产剧","v":"国产剧"},{"n":"日韩剧","v":"日韩剧"},{"n":"欧美剧","v":"欧美剧"},{"n":"海外剧","v":"海外剧"}]},
{"name":"年份","key":"year","value":[{"n":"全部","v":""},{"n":"2022","v":"2022"},{"n":"2021","v":"2021"},{"n":"2020","v":"2020"},{"n":"2019","v":"2019"},{"n":"2018","v":"2018"},{"n":"2017","v":"2017"},{"n":"2016","v":"2016"},{"n":"2015","v":"2015"},{"n":"2014","v":"2014"},{"n":"2013","v":"2013"},{"n":"2012","v":"2012"},{"n":"2011","v":"2011"},{"n":"2010","v":"2010"},{"n":"2009","v":"2009"},{"n":"2008","v":"2008"},{"n":"更早","v":"更早"}]},
{"name":"地区","key":"area","value":[{"n":"全部","v":""},{"n":"大陆","v":"大陆"},{"n":"美国","v":"美国"},{"n":"日本","v":"日本"},{"n":"韩国","v":"韩国"},{"n":"其他","v":"其他"}]},
{"name":"排序","key":"by","value":[{"n":"全部","v":"addtime"},{"n":"时间","v":"id"},{"n":"人气","v":"hits"}]}
],
"3": [
{"name":"类型","key":"class","value":[{"n":"全部","v":""},{"n":"国产动漫","v":"国产动漫"},{"n":"日韩动漫","v":"日韩动漫"},{"n":"欧美动漫","v":"欧美动漫"},{"n":"动画片","v":"动画片"},{"n":"动漫片","v":"动漫片"}]},
{"name":"年份","key":"year","value":[{"n":"全部","v":""},{"n":"2022","v":"2022"},{"n":"2021","v":"2021"},{"n":"2020","v":"2020"},{"n":"2019","v":"2019"},{"n":"2018","v":"2018"},{"n":"2017","v":"2017"},{"n":"2016","v":"2016"},{"n":"2015","v":"2015"},{"n":"2014","v":"2014"},{"n":"2013","v":"2013"},{"n":"2012","v":"2012"},{"n":"2011","v":"2011"},{"n":"2010","v":"2010"},{"n":"2009","v":"2009"},{"n":"2008","v":"2008"},{"n":"更早","v":"更早"}]},
{"name":"地区","key":"area","value":[{"n":"全部","v":""},{"n":"大陆","v":"大陆"},{"n":"美国","v":"美国"},{"n":"日本","v":"日本"},{"n":"韩国","v":"韩国"},{"n":"其他","v":"其他"}]},
{"name":"排序","key":"by","value":[{"n":"全部","v":"addtime"},{"n":"时间","v":"id"},{"n":"人气","v":"hits"}]}
],
"4": [
{"name":"类型","key":"class","value":[{"n":"全部","v":""},{"n":"大陆综艺","v":"大陆综艺"},{"n":"日韩综艺","v":"日韩综艺"},{"n":"欧美综艺","v":"欧美综艺"},{"n":"海外综艺","v":"海外综艺"}]},
{"name":"年份","key":"year","value":[{"n":"全部","v":""},{"n":"2022","v":"2022"},{"n":"2021","v":"2021"},{"n":"2020","v":"2020"},{"n":"2019","v":"2019"},{"n":"2018","v":"2018"},{"n":"2017","v":"2017"},{"n":"2016","v":"2016"},{"n":"2015","v":"2015"},{"n":"2014","v":"2014"},{"n":"2013","v":"2013"},{"n":"2012","v":"2012"},{"n":"2011","v":"2011"},{"n":"2010","v":"2010"},{"n":"2009","v":"2009"},{"n":"2008","v":"2008"},{"n":"更早","v":"更早"}]},
{"name":"地区","key":"area","value":[{"n":"全部","v":""},{"n":"大陆","v":"大陆"},{"n":"美国","v":"美国"},{"n":"日本","v":"日本"},{"n":"韩国","v":"韩国"},{"n":"其他","v":"其他"}]},
{"name":"排序","key":"by","value":[{"n":"全部","v":"addtime"},{"n":"时间","v":"id"},{"n":"人气","v":"hits"}]}
]
}


}

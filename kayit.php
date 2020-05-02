<meta http-equiv=content-type content="text/html;charset=windows-1254">
<?php
include ("her.php");
if ($HTTP_POST_VARS[pwd]==$HTTP_POST_VARS[pwd2] && $HTTP_POST_VARS[user]!=NULL && $HTTP_POST_VARS[meslek]!=NULL && $HTTP_POST_VARS[email]!=NULL && $HTTP_POST_VARS[pwd]!=NULL && $HTTP_POST_VARS[pwd2]!=NULL)
{
$usernamekontrol=("-$HTTP_POST_VARS[user]-");
 $dizi=file("kon.txt");
  if (strstr($dizi[0], $usernamekontrol))
 {
 echo "Seçtiginiz kullanici adi kullanilmaktadir.<br>$msg ";
 exit();
 }

  else
 {
 $fkon=fopen("kon.txt", "a");
 $konyazilacak = "$HTTP_POST_VARS[user]-";
 fwrite($fkon, $konyazilacak);
 fclose($fkon);

 $fguven=fopen("guven.txt", "a");
 $guvenyazilacak = "$HTTP_POST_VARS[user]-$HTTP_POST_VARS[pwd]-\n";
 fwrite($fguven, $guvenyazilacak);
 fclose($fguven);
  if ($HTTP_POST_VARS[radio]=="evet")
  {
  $fgenel=fopen("genel.txt", "a");
  $genelyazilacak = "$HTTP_POST_VARS[user]-$HTTP_POST_VARS[meslek]-$HTTP_POST_VARS[email] / $HTTP_POST_VARS[sehir]\n";
  fwrite($fgenel, $genelyazilacak);
  fclose($fgenel);
  }
  elseif ($HTTP_POST_VARS[radio]=="hayir")
  {
  $fgenel=fopen("genel.txt", "a");
  $genelyazilacak = "$HTTP_POST_VARS[user]-$HTTP_POST_VARS[meslek]-Gizli E-Posta / $HTTP_POST_VARS[sehir]\n";
  fwrite($fgenel, $genelyazilacak);
  fclose($fgenel);
  } 
 echo "<title>Bitti</title>kaydiniz yapildi. Lütfen giris yapiniz.<br>$msg";
 }
 
}

else
{
echo "hata var <br>$msg";
$title="<title>Hata!</title>";
echo "$title";
exit();
}
?>


<br>

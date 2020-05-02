<meta http-equiv=content-type content="text/html;charset=windows-1254">
<?php
echo "<center>";
// Bismillahirrahmanirrahim
include ("her.php");

if ($HTTP_POST_VARS[userx]==NULL)
{
echo "Giriş Yapınız<br>";
echo $msg;
exit();
}
elseif ($HTTP_POST_VARS[pwdx]==NULL)
{
echo "Giris Yapiniz<br>";
echo $msg;
exit();
}

$dizi=file("guven.txt");
$saydir=count($dizi);

for ($n=0; $n<$saydir; $n++)
{
$dizi[$n]=explode("-", $dizi[$n]);
}

$dizigenel=file("genel.txt");

for ($row=0; $row<$saydir; $row++)
{

 if ($dizi[$row][0]==$HTTP_POST_VARS["userx"] && $dizi[$row][1]==$HTTP_POST_VARS["pwdx"])
 {
                     // ÜYELIK SISTEMI
 echo "<title>$HTTP_POST_VARS[userx]</title><table border=0><tr><td><center><b>ÜYELIK SISTEMI</b>
 <br>Sayin <b>$HTTP_POST_VARS[userx]</b> Sitemize Hosgeldiniz.";
                      // DIGER ÜYELER
 echo "</td></tr><tr><td align=center>";
 echo "<b>DIGER ÜYELER</b>(<b>$saydir</b>)<br>";
  $dizigenel=array_reverse($dizigenel);
  for($s=0; $s<$saydir; $s++)
  {
  echo "$dizigenel[$s]<br>";
  }
 echo "</center></td></tr></table>";
                    // MESAJ GÖNDER FORM
 echo "<table border=0><tr><td><center>
 <form name=giris action=ana.php method=post><b>MESAJ GÖNDER</b>
 <input type=hidden name=userx value=$HTTP_POST_VARS[userx]>
 <input type=hidden name=pwdx value=$HTTP_POST_VARS[pwdx]><table border=0><tr><td>
 Kime:</td><td><input type=text name=kime></td></tr><tr><td>
 Baslik:</td><td><input name=baslik type=text maxlength=25></td></tr><tr><td>
 Mesaj:</td><td><textarea name=mesaj></textarea></td></tr><tr><td>
 </td><td align=right><input type=submit value=Gönder></td></tr><table>
 </form>";
                   // MESAJ GÖNDER ISLEM
 $dizi=file("kon.txt");
 $alicikontrol=("-$HTTP_POST_VARS[kime]-");
  if (@strstr($dizi[0], $alicikontrol))
  {

  $kimden=$HTTP_POST_VARS[userx];

   if ($HTTP_POST_VARS[kime]==$HTTP_POST_VARS[userx])
   {$kimden="kendim";}
   $fgiden= fopen("$HTTP_POST_VARS[kime].txt", "a");
   $myazilacak= "<table border=0><tr><td><b>Kimden:</b>$kimden</td><td align=right><b>Baslik:</b>$HTTP_POST_VARS[baslik]</td></tr><tr><td width=280 colspan=2><b>Mesaj:</b> $HTTP_POST_VARS[mesaj]</b><hr></td></tr></table>\n";
   fwrite($fgiden, $myazilacak);
  }
  elseif ($HTTP_POST_VARS[kime]==NULL)
  {
  echo "";
  }
  else
  { 
  echo "<font color=red>[Böyle bir kullanici yok]</font><br> ";
  }
                      // GELEN KUTUSU
 fopen("$HTTP_POST_VARS[userx].txt", "a");
 $gelen=file("$HTTP_POST_VARS[userx].txt");
 $gelen=array_reverse($gelen);
 $onunsayisi=count($gelen);
 echo "<b>GELEN MESAJLAR</b> (<b>$onunsayisi</b>)<br>";

  for ($gelensayisi=0; $gelensayisi<count($gelen); $gelensayisi++)
  {
  echo "$gelen[$gelensayisi]<br>";
  }
 echo "</td></tr></table>";                   
 echo "$msg</center>";
 }
}
?>


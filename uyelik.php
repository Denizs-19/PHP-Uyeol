<title>Üyelik</title>
<meta http-equiv=content-type content="text/html;charset=windows-1254">
<?include ("her.php");?>
<form name=uyeol action=kayit.php method=post>
<table border="0">
<tr><td>Kullanici Adi:</td><td><input type=text name=user><br></td></tr>
<tr><td>E-Posta:</td><td><input type=text name=email><br></td></tr>
<tr><td>Adresim Gözüksün:</td><td> <input name="radio" type="radio" value="evet" checked>Evet
                                   <input name="radio" type="radio" value="hayir">Hayır<br></td></tr>
<tr><td>Meslek:</td><td><input type=text name=meslek><br></td></tr>
<tr><td>Sehir:</td><td><input type=text name=sehir><br></td></tr>
<tr><td>Sifre:</td><td><input type=password name=pwd><br></td></tr>
<tr><td>Sifre Tekrar:</td><td><input type=password name=pwd2><br></td></tr>
<tr><td></td><td align=right><input type=submit value=Kaydol></td></tr></table>
</form>
<br>
<?echo $msg?>
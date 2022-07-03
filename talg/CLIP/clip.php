<?php 
/*
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
*/
foreach ($_REQUEST as $key => $val) {
  $$key = addslashes($val);
}

	$ficheiro="clip.xml";
	$fd = fopen ($ficheiro, "r");
	$xml = fread ($fd, filesize ($ficheiro));
	fclose ($fd);
	$array_de_entradas = get_tag_contents($xml,"entrada");

echo '<html><head><TITLE>Dicionario CLUVI inglés-portugués</TITLE><meta charset="UTF-8" /></head>


<TABLE BORDER=0 ALIGN=right>
  <TR>
    <TD><A HREF="../index.html"><IMG SRC="sli.jpg" BORDER=0 WIDTH=68 HEIGHT=49 ALT="logo sli" ALIGN=right></a></TD>
  </TR>
  <TR>
    <TD><small>Seminario de Lingüística Informática, 2008<br><DIV ALIGN=right>Universidade de Vigo</DIV></small></TD>
  </TR>
</TABLE>
<H2>Dicionario CLUVI inglés-portugués</H2><H3>(Baseado no Corpus CLUVI da Universidade de Vigo)</H3><br><hr>

<TABLE CELLPADDING=10 BORDER=1 FRAME=BOX ALIGN=CENTER>
  <TR>
    <TD><A HREF="index.html">Páxina inicial </A></TD>    
    <TD><A HREF="clip.html">Consultar dicionario</A></TD>
    <TD><A HREF="info.html">Máis información</A></TD>
    <TD><A HREF="clip_en.html">In English</A></TD>
  </TR>
</TABLE>


';


$num_lema=0;

if(isset($en))
	$en=strtolower(trim($en));
if(isset($pt))
	$pt=strtolower(trim($pt));


if (empty($en)){
}
else {


	foreach ($array_de_entradas as $num => $entrada) {

		if (strpos(strtolower($entrada), "<lema>".$en."</lema>")) {

echo "<center><blockquote><blockquote><img src='man.gif' alt='-' align='middle'> ";


for ($i = $num-9; $i <= $num+9; $i++) {

if(isset($array_de_entradas[$i]))
	preg_match('/\<lema\>(.*)<\/lema\>/', $array_de_entradas[$i], $fr001);

if (isset($fr001[1]) && $fr001[1] <> "" && $i < count($array_de_entradas)) {

if ($i == $num && $i+1 <> count($array_de_entradas))
echo "$fr001[1], ";
else if ($i == $num)
echo "$fr001[1]";
else if ($i < $num+9 && $i+1 <> count($array_de_entradas))
echo "<a href='?en=$fr001[1]'>$fr001[1]</a>, ";
else
echo "<a href='?en=$fr001[1]'>$fr001[1]</a>";
}

}

echo "</blockquote></blockquote></center>";

			$cadea_coa_entrada = "<br><center><entrada><table border='5' width='600' CELLPADDING='15' BORDERCOLOR='blue'><tr><td>$array_de_entradas[$num]</td><tr></table></entrada></center>";



			$pp0 = preg_replace("/<ex>L1=(.{1,30}) L2=(.{1,30}) submit=\"Ver exemplos(.{0,35})\".{1,2}<\/ex>/","", $cadea_coa_entrada);

			$pp1 = preg_replace("/<lema>/", "<br><b><big> ", $pp0);

			$pp2 = preg_replace("/<\/lema>/", "</big></b><hr color='blue'> ", $pp1);

			$pp3 = preg_replace("/<traducion>/", "<BLOCKQUOTE><img src='frecha.gif' alt='-' align='middle'> ", $pp2);

			$pp4 = preg_replace("/<\/traducion>/", "<br><br>", $pp3);

			$pp5 = preg_replace("/<categoria>/", "<br><br><img src='cat.gif' alt='-' align='middle' HSPACE='10'> <small>", $pp4);
			$pp6 = preg_replace("/<\/categoria>/", "</small><br>", $pp5);

			$pp651 = preg_replace("/<nota_gr>/", "<BLOCKQUOTE><table border='1' WIDTH=500 CELLPADDING=5><tr><td><small><img src='lapis.gif' alt='-' align='middle'> ", $pp6);
			$pp652 = preg_replace("/<\/nota_gr>/", "</small></td></tr></table></BLOCKQUOTE>", $pp651);

			$pp653 = preg_replace("/<nota_tr>/", "<table border='1' WIDTH=500 CELLPADDING=5><tr><td><small><img src='nota.gif' alt='-' align='middle'> ", $pp652);
			$pp654 = preg_replace("/<\/nota_tr>/", "</small></td></tr></table><br>", $pp653);			

			$pp7 = preg_replace("/<en>/", "<b><small><font color='red'>EN </font></small></b><i>", $pp654);
			$pp8 = preg_replace("/<\/en>/", "</i><br>", $pp7);
			$pp9 = preg_replace("/<pt>/", "<b><small><font color='blue'>PT </font></small></b><i>", $pp8);
			$pp10 = preg_replace("/<\/pt>/", "</i><br>", $pp9);

			$pp11 = preg_replace("/<fonte>/", "<img src='fonte.gif' alt='-' align='middle'> <small><font color='green'>Fonte: ", $pp10);
			$pp12 = preg_replace("/<\/fonte>/", "</font></small><hr size='1' align='left' width='95%' color='green'></BLOCKQUOTE>", $pp11);

			$pp13 = preg_replace("/@/", "<b>", $pp12);
			$pp14 = preg_replace("/#/", "</b>", $pp13);

			$pp15 = preg_replace("/<plurilex>/", "<font color='white'>.....</font><img src='pluri.gif' alt='---' align='middle'> <b>", $pp14);
			$pp16 = preg_replace("/<\/plurilex>/", "</b>", $pp15);

			$pp17 = preg_replace("/\|/", "<i>", $pp16);
			$pp18 = preg_replace ("/\¬/", "</i>", $pp17);


			$pp19 = preg_replace ("/\[\[br\]\]/", "<br />", $pp18);

			echo $pp19;

			$num_lema++;


		}

	}

}


if (empty($pt)){
}
else {


	foreach ($array_de_entradas as $num => $entrada) {

		if (strpos($entrada, "<traducion>".$pt."</traducion>")) {

echo "<center><blockquote><blockquote><img src='man.gif' alt='-' align='middle'> ";


for ($i = $num-9; $i <= $num+9; $i++) {


if(isset($array_de_entradas[$i]))
	preg_match('/<lema>(.*)<\/lema>/', $array_de_entradas[$i], $fr001);

if (isset($fr001[1]) && $fr001[1] <> "" && $i < count($array_de_entradas)) {


if ($i == $num && $i+1 <> count($array_de_entradas))
echo "$fr001[1], ";
else if ($i == $num)
echo "$fr001[1]";

else if ($i < $num+9 && $i+1 <> count($array_de_entradas))
echo "<a href='?en=$fr001[1]'>$fr001[1]</a>, ";
else
echo "<a href='?en=$fr001[1]'>$fr001[1]</a>";
}

}

echo "</blockquote></blockquote></center>";


			$cadea_coa_entrada = "<br><center><entrada><table border='5' width='600' CELLPADDING='15' BORDERCOLOR='blue'><tr><td>$array_de_entradas[$num]</td><tr></table></entrada></center><BR><BR><BR>";


			$pp0 = preg_replace("/<ex>L1=(.{1,30}) L2=(.{1,30}) submit=\"Ver exemplos(.{0,35})\".{1,2}<\/ex>/","", $cadea_coa_entrada);

			$pp1 = preg_replace("/<lema>/", "<br><b><big> ", $pp0);

			$pp2 = preg_replace("/<\/lema>/", "</big></b><hr color='blue'> ", $pp1);

			$pp3 = preg_replace("/<traducion>/", "<BLOCKQUOTE><img src='frecha.gif' alt='-' align='middle'> ", $pp2);

			$pp4 = preg_replace("/<\/traducion>/", "<br><br>", $pp3);

			$pp5 = preg_replace("/<categoria>/", "<br><br><img src='cat.gif' alt='-' align='middle' HSPACE='10'> <small>", $pp4);
			$pp6 = preg_replace("/<\/categoria>/", "</small><br>", $pp5);

			$pp651 = preg_replace("/<nota_gr>/", "<BLOCKQUOTE><table border='1' WIDTH=500 CELLPADDING=5><tr><td><small><img src='lapis.gif' alt='-' align='middle'> ", $pp6);
			$pp652 = preg_replace("/<\/nota_gr>/", "</small></td></tr></table></BLOCKQUOTE>", $pp651);

			$pp653 = preg_replace("/<nota_tr>/", "<table border='1' WIDTH=500 CELLPADDING=5><tr><td><small><img src='nota.gif' alt='-' align='middle'> ", $pp652);
			$pp654 = preg_replace("/<\/nota_tr>/", "</small></td></tr></table><br>", $pp653);			

			$pp7 = preg_replace("/<en>/", "<b><small><font color='red'>EN </font></small></b><i>", $pp654);
			$pp8 = preg_replace("/<\/en>/", "</i><br>", $pp7);
			$pp9 = preg_replace("/<pt>/", "<b><small><font color='blue'>PT </font></small></b><i>", $pp8);
			$pp10 = preg_replace("/<\/pt>/", "</i><br>", $pp9);

			$pp11 = preg_replace("/<fonte>/", "<img src='fonte.gif' alt='-' align='middle'> <small><font color='green'>Fonte: ", $pp10);
			$pp12 = preg_replace("/<\/fonte>/", "</font></small><hr size='1' align='left' width='95%' color='green'></BLOCKQUOTE>", $pp11);

			$pp13 = preg_replace("/@/", "<b>", $pp12);
			$pp14 = preg_replace("/#/", "</b>", $pp13);

			$pp15 = preg_replace("/<plurilex>/", "<font color='white'>.....</font><img src='pluri.gif' alt='---' align='middle'> <b>", $pp14);
			$pp16 = preg_replace("/<\/plurilex>/", "</b>", $pp15);

			$pp17 = preg_replace("/\|/", "<i>", $pp16);
			$pp18 = preg_replace ("/\¬/", "</i>", $pp17);


			echo $pp18;

			$num_lema++;


		}

	}


}



	if ($num_lema < 1) {

		echo "<br><blockquote>Sentímolo, mais neste caso <b>non se obtivo ningún resultado</b> da súa pescuda no dicionario. Se desexa realizar outra pescuda no Dicionario CLUVI inglés-portugués, pode calcar <A HREF=\"index.html\">aquí</A>.<br><BR><B>Exemplos de buscas</B>:
<A HREF=\"clip.php?en=afraid\">afraid</A>, <A HREF=\"clip.php?en=black\">black</A>, <A HREF=\"clip.php?en=cold\">cold</A>, <A HREF=\"clip.php?en=look\">look</A>, <A HREF=\"clip.php?en=make\">make</A>, <A HREF=\"clip.php?en=grim\">grim</A><BR><BR>

Versión 0.5 (2008): 1347 entradas, 3031 traducións</blockquote>
";

	}	


	echo "</body></html>";


function get_tag_contents($xmlcode,$tag) {
  $i=0;
  $offset=0;
  $xmlcode = trim($xmlcode);
  do{ #Step through each ocurrence of <$tag>...</$tag> in the XML
    #find the next start tag
    $start_tag=strpos ($xmlcode,"<".$tag.">",$offset);
    $offset = $start_tag;
    #find the closing tag for the start tag you just found
    $end_tag=strpos ($xmlcode,"</".$tag.">",$offset);
    $offset = $end_tag;
    #split off <$tag>... as a string, leaving the </$tag> 
    $our_tag = substr ($xmlcode,$start_tag,($end_tag-$start_tag));
    $start_tag_length = strlen("<".$tag.">");
    if (substr($our_tag,0,$start_tag_length)=="<".$tag.">"){
      #strip off stray start tags from the beginning
      $our_tag = substr ($our_tag,$start_tag_length);
    }
    $array_of_tags[$i] =$our_tag;
    $i++;
  }while(!(strpos($xmlcode,"<".$tag.">",$offset)===false));
return $array_of_tags;
}

?>

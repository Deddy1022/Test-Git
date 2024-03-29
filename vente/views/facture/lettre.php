<?php

class ChiffreEnLettre
{
public $leChiffreSaisi;
public $enLettre='';

public $chiffre=array(1=>"UN",2=>"DEUX",3=>"TROIS",4=>"QUATRE",5=>"CINQ",6=>"SIX",7=>"SEPT",8=>"HUIT",
	9=>"NEUF",10=>"DIX",11=>"ONZE",12=>"DOUZE",13=>"TREIZE",14=>"QUATORZE",15=>"QUINZE",16=>"SEIZE",
	17=>"DIX-SEPT",18=>"DIX-HUIT",19=>"DIX-NEUF",20=>"VINGT",30=>"TRENTE",40=>"QUARANTE",
	50=>"CINQUANTE",60=>"SOIXANTE",70=>"SOIXANTE-DIX",80=>"QUATRE-VINGT",90=>"QUATRE-VINGT-DIX");


#Fonction de conversion appelee dans la feuille principale
function Conversion($sasie)
{
$this->enLettre='';
$sasie=trim($sasie);

#suppression des espaces qui pourraient exister dans la saisie
$nombre='';
$laSsasie=explode(' ',$sasie);
foreach ($laSsasie as $partie)
$nombre.=$partie;

#suppression des zeros qui precederaient la saisie
$nb=strlen($nombre);
for ($i=0;$i<=$nb;)
{
if(substr($nombre,$i,1)==0)
{
$nombre=substr($nombre,$i+1);
$nb=$nb-1;
}
elseif(substr($nombre,$i,1)<>0)
{
$nombre=substr($nombre,$i);
break;
}
}

#le nombre de caractere que comporte le nombre saisi de sa forme sans espace et sans 0 au debut
$nb=strlen($nombre);

#conversion du chiffre saisi en lettre selon les cas
switch ($nb)
{
	//vide
case 0:
$this->enLettre='ZERO';

	//Unitee
case 1:
if ($nombre==0)
{
$this->enLettre='ZERO';
break;
}
elseif($nombre<>0)
{
$this->Unite($nombre);
break;
}

  //dizaine
case 2:
$unite=substr($nombre,1);
$dizaine=substr($nombre,0,1);
$this->Dizaine(0,$nombre,$unite,$dizaine);
break;

	//Centaine
case 3:
$unite=substr($nombre,2);
$dizaine=substr($nombre,1,1);
$centaine=substr($nombre,0,1);
$this->Centaine(0,$nombre,$unite,$dizaine,$centaine);
break;

#cas des milles
case ($nb>3 and $nb<=6):
$unite=substr($nombre,$nb-1);
$dizaine=substr($nombre,($nb-2),1);
$centaine=substr($nombre,($nb-3),1);
$mille=substr($nombre,0,($nb-3));
$this->Mille($nombre,$unite,$dizaine,$centaine,$mille);
break;

#cas des millions
case ($nb>6 and $nb<=9):
$unite=substr($nombre,$nb-1);
$dizaine=substr($nombre,($nb-2),1);
$centaine=substr($nombre,($nb-3),1);
$mille=substr($nombre,-6);
$million=substr($nombre,0,$nb-6);
$this->Million($nombre,$unite,$dizaine,$centaine,$mille,$million);
break;

#cas des milliards
/*case ($nb>9 and $nb<=12):
$unite=substr($nombre,$nb-1);
$dizaine=substr($nombre,($nb-2),1);
$centaine=substr($nombre,($nb-3),1);
$mille=substr($nombre,-6);
$million=substr($nombre,-9);
$milliard=substr($nombre,0,$nb-9);
Milliard($nombre,$unite,$dizaine,$centaine,$mille,$million,$milliard);
break;*/

}
if (!empty($this->enLettre))
	return $this->enLettre;
}

#Gestion des miiliards
/*
function Milliard($nombre,$unite,$dizaine,$centaine,$mille,$million,$milliard)
{

}
*/

#Gestion des millions

function Million($nombre,$unite,$dizaine,$centaine,$mille,$million)
{
#si les mille comportent un seul chiffre
#$cent represente les 3 premiers chiffres du chiffre ex: 321 dans 12502321
#$mille represente les 3 chiffres qui suivent les cents ex: 502 dans 12502321
#reste represente les 6 premiers chiffres du chiffre ex: 502321 dans 12502321

$cent=substr($nombre,-3);
$reste=substr($nombre,-6);

if (strlen($million)==1)
{
$mille=substr($nombre,1,3);
$this->enLettre.=$this->chiffre[$million];
	if ($million == 1){
		$this->enLettre.=' MILLION ';
	}else{
		$this->enLettre.=' MILLIONS ';
	}
}
elseif (strlen($million)==2)
{
$mille=substr($nombre,2,3);
$nombre=substr($nombre,0,2);
//echo $nombre;
$this->Dizaine(0,$nombre,$unite,$dizaine);
$this->enLettre.='MILLIONS ';
}
elseif (strlen($million)==3)
{
$mille=substr($nombre,3,3);
$nombre=substr($nombre,0,3);
$this->Centaine(0,$nombre,$unite,$dizaine,$centaine);
$this->enLettre.='MILLIONS ';
}

#recuperation des cens dans nombre

#suppression des zÃ©ros qui prÃ©cÃ©deraient le $reste
$nb=strlen($reste);
for ($i=0;$i<=$nb;)
{
if(substr($reste,$i,1)==0)
{
$reste=substr($reste,$i+1);
$nb=$nb-1;
}
elseif(substr($reste,$i,1)<>0)
{
$reste=substr($reste,$i);
break;
}
}
$nb=strlen($reste);
#si tous les chiffres apres les milions =000000 on affiche x million
if ($nb==0)
;
else
{
#Gestion des milles
#suppression des zÃ©ros qui prÃ©cÃ©deraient les milles dans $mille
$nb=strlen($mille);
for ($i=0;$i<=$nb;)
{
if(substr($mille,$i,1)==0)
{
$mille=substr($mille,$i+1);
$nb=$nb-1;
}
elseif(substr($mille,$i,1)<>0)
{
$mille=substr($mille,$i);
break;
}
}
#le nombre de caract que comporte le nombre saisi de sa forme sans espace et sans 0 au dÃ©but
$nb=strlen($mille);
#echo '<br />nb='.$nb.'<br />';
if ($nb==0)
;
#AffichageResultat($enLettre);
elseif ($nb==1)
{
if ($mille==1)
$this->enLettre.='MILLE ';
else
{
$this->Unite($mille);
$this->enLettre.='MILLE ';
}
}
elseif ($nb==2)
{
$this->Dizaine(1,$mille,$unite,$dizaine);
$this->enLettre.='MILLE ';
}
elseif ($nb==3)
{
$this->Centaine(1,$mille,$unite,$dizaine,$centaine);
$this->enLettre.='MILLE ';
}
#Gestion des cents
#suppression des zÃ©ros qui prÃ©cÃ©deraient les cents dans $cent
$nb=strlen($cent);
for ($i=0;$i<=$nb;)
{
if(substr($cent,$i,1)==0)
{
$cent=substr($cent,$i+1);
$nb=$nb-1;
}
elseif(substr($cent,$i,1)<>0)
{
$cent=substr($cent,$i);
break;
}
}
#le nombre de caract que comporte le nombre saisi de sa forme sans espace et sans 0 au dÃ©but
$nb=strlen($cent);
#echo '<br />nb='.$nb.'<br />';
if ($nb==0)
;
#AffichageResultat($enLettre);
elseif ($nb==1)
$this->Unite($cent);
elseif ($nb==2)
$this->Dizaine(0,$cent,$unite,$dizaine);
elseif ($nb==3)
$this->Centaine(0,$cent,$unite,$dizaine,$centaine);
}
}

#Gestion des milles

function Mille($nombre,$unite,$dizaine,$centaine,$mille)
{
#si les mille comportent un seul chiffre
#$cent represente les 3 premiers chiffres du chiffre ex: 321 dans 12321
if (strlen($mille)==1)
{
$cent=substr($nombre,1);
#si ce chiffre=1
if ($mille==1)
$this->enLettre.='';
#si ce chiffre<>1
elseif($mille<>1)
$this->enLettre.=$this->chiffre[$mille];
}
elseif (strlen($mille)>1)
{
if (strlen($mille)==2)
{
$cent=substr($nombre,2);
$nombre=substr($nombre,0,2);
#echo $nombre;
$this->Dizaine(1,$nombre,$unite,$dizaine);
}
if (strlen($mille)==3)
{
$cent=substr($nombre,3);
$nombre=substr($nombre,0,3);
#echo $nombre;
$this->Centaine(1,$nombre,$unite,$dizaine,$centaine);
}
}

$this->enLettre.=' MILLE ';
#recuperation des cens dans nombre
#suppression des zÃ©ros qui prÃ©cÃ©deraient la saisie
$nb=strlen($cent);
for ($i=0;$i<=$nb;)
{
if(substr($cent,$i,1)==0)
{
$cent=substr($cent,$i+1);
$nb=$nb-1;
}
elseif(substr($cent,$i,1)<>0)
{
$cent=substr($cent,$i);
break;
}
}
#le nombre de caract que comporte le nombre saisi de sa forme sans espace et sans 0 au dÃ©but
$nb=strlen($cent);
#echo '<br />nb='.$nb.'<br />';
if ($nb==0)
;//AffichageResultat($enLettre);
elseif ($nb==1)
$this->Unite($cent);
elseif ($nb==2)
$this->Dizaine(0,$cent,$unite,$dizaine);
elseif ($nb==3)
$this->Centaine(0,$cent,$unite,$dizaine,$centaine);

}

#Gestion des centaines

function Centaine($inmillier,$nombre,$unite,$dizaine,$centaine)
{

$unite=substr($nombre,2);
$dizaine=substr($nombre,1,1);
$centaine=substr($nombre,0,1);
#comme 700
if ($unite==0 and $dizaine==0)
{
if ($centaine==1)
$this->enLettre.='CENT';
elseif ($centaine<>1)
		{
				if ($inmillier == 0)
					$this->enLettre.=($this->chiffre[$centaine].' CENTS').' ';
				if ($inmillier == 1)
					$this->enLettre.=($this->chiffre[$centaine].' CENT').' ';
		}
}
#comme 705
elseif ($unite<>0 and $dizaine==0)
{
if ($centaine==1)
$this->enLettre.=('cent '.$this->chiffre[$unite]).' ';
elseif ($centaine<>1)
$this->enLettre.=($this->chiffre[$centaine].' cent '.$this->chiffre[$unite]).' ';
}
//comme 750
elseif ($unite==0 and $dizaine<>0)
{
#recupÃ©ration des dizaines
$nombre=substr($nombre,1);
//echo '<br />nombre='.$nombre.'<br />';
if ($centaine==1)
{
$this->enLettre.='CENT ';
$this->Dizaine(0,$nombre,$unite,$dizaine).' ';
}
elseif ($centaine<>1)
{
$this->enLettre.=$this->chiffre[$centaine].' CENT ';
$this->Dizaine(0,$nombre,$unite,$dizaine).' ';

}

}
#comme 695
elseif ($unite<>0 and $dizaine<>0)
{
$nombre=substr($nombre,1);

if ($centaine==1)
{
$this->enLettre.='CENT ';
$this->Dizaine(0,$nombre,$unite,$dizaine).' ';
}

elseif ($centaine<>1)
{
$this->enLettre.=($this->chiffre[$centaine].' CENT ');
$this->Dizaine(0,$nombre,$unite,$dizaine).' ';
}
}

}


#Gestion des dizaines

function Dizaine($inmillier,$nombre,$unite,$dizaine)
{
$unite=substr($nombre,1);
$dizaine=substr($nombre,0,1);

#comme 70
if ($unite==0)
{
$val=$dizaine.'0';
$this->enLettre.=$this->chiffre[$val];
		if ($inmillier == 0 && $val == 80){
			$this->enLettre.='S ';
		}
		$this->enLettre.=' ';
}
#comme 71
elseif ($unite<>0)

#dizaine different de 9
if ($dizaine<>9 and $dizaine<>7)
{
if ($dizaine==1)
{
$val=$dizaine.$unite;
$this->enLettre.=$this->chiffre[$val].' ';
}
else
{
$val=$dizaine.'0';
if ($unite == 1 && $dizaine <> 8){
$this->enLettre.=($this->chiffre[$val].' et '.$this->chiffre[$unite]).' ';
}else{
$this->enLettre.=($this->chiffre[$val].'-'.$this->chiffre[$unite]).' ';
}
}
}
#dizaine =9
elseif ($dizaine==9)
$this->enLettre.=($this->chiffre[80].'-'.$this->chiffre['1'.$unite]).' ';
elseif ($dizaine==7)
{
if ($unite == 1){
	$this->enLettre.=($this->chiffre[60].' et '.$this->chiffre['1'.$unite]).' ';
}else{
	$this->enLettre.=($this->chiffre[60].'-'.$this->chiffre['1'.$unite]).' ';
}
}
}
#Gestion des unitÃ©s

function Unite($unite)
{
$this->enLettre.=($this->chiffre[$unite]).' ';
}

}
?>
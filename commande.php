
<?php
class Commande 
{
  private $etatommande;


  //constructeur
  public function __construct ($etatommande){
    $this->setDb($etatommande); //initialisation de la couleur
  }
  public function getBase() {return $this->Etatommande;} //retourne la couleur
  public function setBase($ci) { $this->Etatommande = $ci;}
  
  public function setDb($etatommande) { $this->etatommande = $Etatommande;}


  
  public function getContenueParDate() {
    $sql = $this->Etatommande->query("SELECT * FROM `command` WHERE etat=1"); //recupere les commandes non traiter
    $tab =[];
    $num=0;
    while ($ligne = $sql->fetch()){ //verifi par ligne
        $Commande= new Commande(); //crée une nouvelle element blog
        $Commande->setId($ligne["id"]); // recupere toute les info du tab
        $Commande->setTitre($ligne["titre"]);
        $Commande->setDescription($ligne["description"]);
        $Commande->setIdentifiantclient($ligne["identifiantclient"]);
        $Commande->setImage($ligne["image"]);
        $Commande->setEtat($ligne["etat"]);

        $tab[$num]=$Commande;
        $num++;
      }
      return $tab; //retourne toute les tab
    }

    public function changementdetatvalider(Etat $etat) { //insert les new elements
      $sql ="UPDATE `command` SET `etat`=2 WHERE id=$etat->getId()";
     
      $this->Etatommande->exec($sql); //Ajout des données dans la table Personne
      return $this->Etatommande->lastInsertId();
    }
  }

  public function changementdetatsuppr(Etat $etat) { //insert les new elements
    $sql ="DELETE FROM `command` WHERE id=$etat->getId()";
   
    $this->Etatommande->exec($sql); //Ajout des données dans la table Personne
    return $this->Etatommande->lastInsertId();
  }
}
?>

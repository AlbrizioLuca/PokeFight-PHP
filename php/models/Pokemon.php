<?php

class Pokemon {
  private $id_pokemon;
  private $nom;
  private $type;
  private $pc;
  private $pv;
  private $pvmax;

  function __construct($id, $nom, $type, $pc, $pv, $pvmax) {
    $this->id_pokemon = $id;
    $this->nom = $nom;
    $this->type = $type;
    $this->pc = $pc;
    $this->pv = $pv;
    $this->pvmax = $pvmax;
  }

  
  public function getID() {
    return $this->id_pokemon;
  }
  
  public function getNom() {
    return $this->nom;
  }
  
  public function getType() {
    return $this->type;
  }

  public function getPointCombat() {
    return $this->pc;
  }
  
  public function getPV() {
    return $this->pv;
  }
  
  public function getPVmax() {
    return $this->pvmax;
  }

  public function estVivant() {
    return $this->pv > 0;
  }
  
  public function boitPotion() {
    $this->pv += 20;
    
    if ($this->pv > $this->pvmax) {
      $this->pv = $this->pvmax;
    }
    echo $this->nom . " a maintenant " . $this->pv . " PV". "<br>";
  }

  public function inflige($nomCible, $type) {
    echo $this->nom . " attaque " . $nomCible . "<br>";
    $degats = $this->calculerDegats($type);
    echo $this->nom . " inflige " . $degats . " dégâts à " . $nomCible . "<br>";
    return $degats;
  }

  public function encaisse($degats) {
    $this->pv -= $degats;
    if ($this->pv <= 0) {
      $this->pv <= 0;
      echo $this->nom . " est KO " . "<br>";
      return false;
    } else {
      echo "Il reste " . $this->pv . " PV à " . $this->nom . "<br>";
      return true;
    }
  }

  private function calculerDegats($typeCible) {
    $efficacite = 1;
    switch ($this->type) {
      case "FEU":
        if ($typeCible == "PLANTE") {
          $efficacite = 2;
        } elseif ($typeCible == "EAU" || $typeCible == "FEU") {
          $efficacite = 0.5;
        }
        break;
      case "EAU":
        if ($typeCible == "FEU") {
          $efficacite = 2;
        } elseif ($typeCible == "PLANTE" || $typeCible == "EAU") {
          $efficacite = 0.5;
        }
        break;
      case "ELECTRIK":
        if ($typeCible == "EAU") {
          $efficacite = 2;
        } elseif ($typeCible == "ELECTRIK" || $typeCible == "PLANTE") {
          $efficacite = 0.5;
        }
        break;
      case "PLANTE":
        if ($typeCible == "EAU") {
          $efficacite = 2;
        } elseif ($typeCible == "PLANTE" || $typeCible == "FEU") {
          $efficacite = 0.5;
        }
        break;
    }
    return $efficacite * $this->pc;
  }
}
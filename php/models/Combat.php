<?php

class Combat {
    
  private $pokemon1;
  private $pokemon2;
  private $dresseur1;
  private $dresseur2;
  private $tourDresseurUn = true;
  private $isGameOver = false;

  public function __construct(array $pokemon1, array $pokemon2, Dresseur $dresseur1, Dresseur $dresseur2) {
    $this->pokemon1 = $pokemon1;
    $this->pokemon2 = $pokemon2;
    $this->dresseur1 = $dresseur1;
    $this->dresseur2 = $dresseur2;
    $this->tourDresseurUn = true;
  }
  
  public function attaque() {
    $isAlive = true;
    if ($this->tourDresseurUn) {
      $degats = $this->pokemon1['obj']->inflige($this->pokemon2['nom'], $this->pokemon2['type']);
      $isAlive = $this->pokemon2['obj']->encaisse($degats);
      $this->tourDresseurUn = false;
      echo "----------------------------------------------<br>";
      if (!$isAlive) {
        echo "Le vainqueur est " . $this->dresseur1->getUserName() . "<br>";
      }
    } else {
      $degats = $this->pokemon2['obj']->inflige($this->pokemon1['nom'], $this->pokemon1['type']);
      $isAlive = $this->pokemon1['obj']->encaisse($degats);
      $this->tourDresseurUn = true;
      echo "----------------------------------------------<br>";
      if (!$isAlive) {
        echo "Le vainqueur est " . $this->dresseur2->getUserName() . "<br>";
      }
    }
  }
  
  public function soigne() {
    if ($this->tourDresseurUn) {
      echo $this->dresseur1->getUserName() . " donne une potion à " . $this->pokemon1['nom'] . "<br>"; 
      $this->pokemon1['obj']->boitPotion();
      $this->tourDresseurUn = false;
      echo "----------------------------------------------<br>";
    } else {
      echo $this->dresseur2->getUserName() . " donne une potion à " . $this->pokemon2['nom'] . "<br>"; 
      $this->pokemon2['obj']->boitPotion();
      $this->tourDresseurUn = true;
      echo "----------------------------------------------<br>";
    }
  }
}
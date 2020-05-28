<?php



class Magicien extends Personnage
{
    protected $type;

    public function type()
  {
    return $this->type;
  }

  public function setType($type)
  {

    $this->type = $type;
  }
  public function frapper(Personnage $persoCible)
  {
    if($persoCible->id() == $this->id)
    {
      return self::CEST_MOI;
    }
    // $force = $this->strength();
    $this->experience += 25;
    $attaquantType = $this->type;
    $attaquantForce = $this->strength;
    // On indique au personnage qu'il doit recevoir des dégâts.
    // Puis on retourne la valeur renvoyée par la méthode : self::PERSONNAGE_TUE ou self::PERSONNAGE_FRAPPE
    return $persoCible->recevoirDegats($attaquantType,$attaquantForce);
  }
  public function recevoirDegats($attaquantType,$attaquantForce)

  {
    if ($attaquantType == 'guerrier'){
      $this->degats += (5+$attaquantForce)*2;

    }
    else{
      $this->degats += 5;
    }
    
    // Si on a 100 de dégâts ou plus, on dit que le personnage a été tué.
    if($this->degats >= 100)
    {
      return self::PERSONNAGE_TUE;
    }
    
    // Sinon, on se contente de dire que le personnage a bien été frappé.
    return self::PERSONNAGE_FRAPPE;
  }
  
  
  
}
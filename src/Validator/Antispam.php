<?php 
namespace App\Validator; 
use Symfony\Component\Validator\Constraint; 
 
#[\Attribute] 
class Antispam extends Constraint 
{ 
  public $message="Votre champ ne doit contenir que des caractères alphanumériques"; 
}  
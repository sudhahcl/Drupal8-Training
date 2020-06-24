<?php

  namespace Drupal\calculator_module\Controller;
	use Drupal\Core\Controller\ControllerBase;

class AreacalculatorController extends CalculatorController{
	
	
		function __construct(){
			 $this->highewidthval= 'My Total value has';
			
		}
		
		public function hwcalcualtion($height, $weight){
			  return $this->highewidthval.' = '.$muliplevalu = $height* $weight . '<br><br>';
		}	
		
		

		 
		 use logger;
		 
		 public function loggersample($height, $weight){
			 $alllog = $this->hwcalcualtion($height, $weight);
			 $alllog .= $this->pagemessage();
			 
			  $funval = [
						  '#markup' => $this->t($alllog),
						];
					      
					return $funval;
		 }


}



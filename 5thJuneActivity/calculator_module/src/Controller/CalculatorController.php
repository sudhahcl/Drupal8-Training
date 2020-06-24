<?php

  namespace Drupal\calculator_module\Controller;
  use Drupal\Core\Controller\ControllerBase;
  
  	 Interface interfacecalc{
		 public function add();
		 public function subract();
		 public function multiply();
		 public function divide();
	 }
	 
	 
	 	 
	trait logger{
		 
		 public function successmessage(){
			  return "page has loaded successfully <br>";
		 }
		 
		 public function pagemessage(){
			 return "page has saved successfully  <br>";
		 }
	}


class CalculatorController  extends ControllerBase implements interfacecalc{
	
	

			public function add(){ 
				return "Add Fun <br>";
			}
			
			public function subract(){
				return "Subract Fun <br>";
			}
			
			public function multiply(){
				return "Multiply Fun <br>";
			}
			
			public function divide(){
				return "Divide Fun <br><br>";
			}
			
			
			
			public function callAllFun(){
				 
				 $data = $this->add();
				 $data .= $this->subract();
				 $data .= $this->multiply();
				 $data .= $this->divide();
				 
				   $funval = [
						  '#markup' => $this->t($data),
						];
					      
					return $funval;

		}

		
	 
}

	// $calcobj = new CalculatorController(NULL, NULL);
	// $calcobj->add();
	// $calcobj->subract();
	// $calcobj->multiply();
	// $calcobj->divide();
	// $calcobj1 = new CalculatorController(4 ,5);
	 // $calcobj1->hwcalcualtion();
	 
	// $loggerobj = new CalculatorController(NULL, NULL);
	 // $loggerobj->successmessage();
	 // $loggerobj->loggersample();
	
 // exit;


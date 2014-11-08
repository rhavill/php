<?php

class C1 implements Product {
	private $mfgProduct;
	private $formatHelper;
	private $countryNow;

	public function getProperties() {
		//Loads text writeup from external text file
		$this->countryNow = file_get_contents("../hunger/c01/clue.txt");
		$this->formatHelper=new FormatHelper();
		$this->mfgProduct=$this->formatHelper->addTop();
		//Load images
		$this->mfgProduct.="<img src='../hunger/c01/map.gif' width='300'
		height='322'>";
		$this->mfgProduct .="<img class='pixLeft' src='../hunger/c01/pic.jpg'
		width='200' height='400'>";
		$this->mfgProduct .="<p>$this->countryNow</p>";
		$this->mfgProduct .=$this->formatHelper->closeUp();
		return $this->mfgProduct;
	}
}
<?
require 'item.php';

class PriceProduct extends Product{
	public $price;

	function __construct($name,$type,$size,$price)
	{
		parent:: __construct($name,$type,$size);
		$this->price = $price;
	}

	public function PriceList(){
		echo "Имеется в наличии: ".$this->type." марки: <strong>" .$this->name."</strong> Диагональю <strong>".$this->size." дюймов</strong> по цене ".$this->price." рублей.<br>";
	}
}
$view = new PriceProduct("Sony","Телевизор",40,16990);
$view->PriceList();
$view2 = new PriceProduct("LG","Монитор",22,19990);
$view2->PriceList();

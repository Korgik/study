<?

class Product
{
	// свойства
	var $name;
	var $type;
	var $size;
	// метод
	function __construct($name,$type,$size)
	{
		$this->name = $name;
		$this->type = $type;
		$this->size = $size;
		// $this->inform();
	}
	public function inform()
	{
		echo "Имеется в наличии: ".$this->type." марки: <strong>" .$this->name."</strong> Диагональю <strong>".$this->size." дюймов</strong>.<br>";
	}
}
?>
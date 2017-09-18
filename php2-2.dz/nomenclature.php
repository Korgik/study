<?
// Интерфейс для подсчета дохода с продажи. Каждый метод будет работать в своем классе.
interface Income{
	public function RetailPrice();
	public function PurchasePrice();
	public function Difference();
}

// Абстрактный класс товара и его метод(!)
public abstract class AbstractItem implements Income{
	public absrtact function AbstractIncome($AbstractValue=100);	
}
// Цифровой товар. стоймость постоянная(статическая) и дешевле штучного в два раза.
public class DigitalItems extends AbstractItem implements Income{
	public static function DigitalIncome($DigitalValue=150)
	{
		
	}
	public function RetailPrice(){
		// Цена розничная
	}
	public function PurchasePrice(){
		// Цена закупочная
	}
	public function Difference(){
		// Доход с продаж с учетом особенностей товара
	}

}
// Штучный физический товар. Обычная стоймость
public class Item extends AbstractItem implements Income{
	public function ItemIncome($ItemValue=300)
	{
		# code...
	}
		}
	public function RetailPrice(){
		// Цена розничная
	}
	public function PurchasePrice(){
		// Цена закупочная
	}
	public function Difference(){
		// Доход с продаж с учетом особенностей товара
	}
}
// Товар на вес. В зависимости от продаваемого количества в килограммах
public class ItemWeight extends AbstractItem implements Income{
	public function IWIncome($IWVelue=400)
	{
		# code...
	}
		}
	public function RetailPrice(){
		// Цена розничная
	}
	public function PurchasePrice(){
		// Цена закупочная
	}
	public function Difference(){
		// Доход с продаж с учетом особенностей товара
	}
}

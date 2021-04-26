<?php

namespace App;


class Cart
{
	public $items = null;
	public $totalQty = 0;
	public $totalPrice = 0;

	public function __construct($oldCart){
		if($oldCart){
			$this->items = $oldCart->items;
			$this->totalQty = $oldCart->totalQty;
			$this->totalPrice = $oldCart->totalPrice;
		}
	}

	public function add($item, $id){
		$giohang = ['qty'=>0, 'price' => $item->Price,
		'promotion_price'=>$item->Promotion_price, 'item' => $item];
		
		if($this->items){
			if(array_key_exists($id, $this->items)){
				$giohang = $this->items[$id];
			}
		}
		$giohang['qty']++;
		if($item->Promotion_price == 0){
			$giohang['price'] = $item->Price * $giohang['qty'];
		}
		else{
			$giohang['price'] = $item->Promotion_price * $giohang['qty'];
		}
		$this->items[$id] = $giohang;
		$this->totalQty++;
		if($item->Promotion_price == 0){
			$this->totalPrice += $item->Price;
		}
		else{
			$this->totalPrice += $item->Promotion_price;
		}
		
	}
	//xóa 1
	public function reduceByOne($id){
		$this->items[$id]['qty']--;
		$this->items[$id]['price'] -= $this->items[$id]['item']['price'];
		$this->totalQty--;
		$this->totalPrice -= $this->items[$id]['item']['price'];
		if($this->items[$id]['qty']<=0){
			unset($this->items[$id]);
		}
	}
	//xóa nhiều
	public function removeItem($id){
			$this->totalQty   -= $this->items[$id]['qty'];
			$this->totalPrice -= $this->items[$id]['price'];
			unset($this->items[$id]);

	}
}

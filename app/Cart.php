<?php
namespace App;

use Arr;
use Session;

class Cart 
{
   public $items       = null;   
   public $totalQty    = 0;
   public $totalPrice  = 0;

    public function __construct($oldCart)
    {
      if($oldCart)
      {
        $this->items     = $oldCart->items;
            $this->totalQty   = $oldCart->totalQty;
        $this->totalPrice   = $oldCart->totalPrice;
                      
      }
    }

    public function addQty($item, $pid, $pqty)
    {
        $storedItem = [ 'qty' => 0, 'price' => $item->price, 'item' => $item ];

        $room_index = $pid;       

        if($this->items)
        {
            if(array_key_exists($room_index, $this->items))
            {
                $storedItem = $this->items[$room_index];
            }
        }       
    
        $storedItem['qty']      +=  $pqty;
        $storedItem['price']    =   $item->price * $storedItem['qty'];
                  

        $this->items[$room_index]   =   $storedItem;
        $this->totalQty             +=  $pqty;
        $this->totalPrice           +=  $item->price * $pqty;
    
    }

    public function sub($item, $id)
    {
        $storedItem = ['qty' => 0, 'price' => $item->price,'item' => $item ];
        $room_index = $id;

        if($this->items)
        {
            if(array_key_exists($room_index, $this->items))
            {
                $storedItem = $this->items[$room_index];
            }
        }
        
        if($storedItem['qty'] > 1)
        {
            $storedItem['qty']--;
            $storedItem['price']       = $item->price * $storedItem['qty'];       

            $this->items[$room_index]  = $storedItem;

            $this->totalQty--;
            $this->totalPrice          -= $item->price;
       }

    }

    public function add($item, $id)
    {
        $storedItem = ['qty' => 0, 'price' => $item->price,'item' => $item ];
        $room_index = $id;

        if($this->items)
        {
            if(array_key_exists($room_index, $this->items))
            {
                $storedItem = $this->items[$room_index];
            }
        }
        
        if($storedItem['qty'] < $item['qty'])
        {
            $storedItem['qty']++;
            $storedItem['price']       = $item->price * $storedItem['qty'];
        
            $this->items[$room_index]  = $storedItem;
            $this->totalQty++;
            $this->totalPrice          += $item->price;
        }
    }

    public function remove($item, $id)
    {
        $storedItem = ['qty' => 0, 'price' => $item->price,'item' => $item ];
        $room_index = $id;

        if($this->items)
        {
            if(array_key_exists($room_index, $this->items))
            {
                $storedItem             = $this->items[$room_index];
                $storedItem['price']    = $item->price * $storedItem['qty'];
               
                $this->totalQty         -= $storedItem['qty'];
                $this->totalPrice       -= $storedItem['price'];

                Arr::forget($this->items, $room_index);
            }           
        }

    }

}

?>
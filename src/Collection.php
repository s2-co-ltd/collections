<?php

namespace Adrian;
 use Countable;
 use ArrayAccess;
 use IteratorAggregate;
 use ArrayIterator;
 use Traversable;

class Collection implements Countable, ArrayAccess,IteratorAggregate
{


    protected $items;
    
    function __construct($items){
            $this->items = $items;
    }

    public static function make(array $items){
        return new static($items);
    }


    // countable
    public function count(): int
    {
        return count($this->items);
    }

    // array access
    public function offsetExists($offset): bool
    {
        return isset($this->items[$offset]);
    }

    public function offsetGet($offset): mixed
    {
        return $this->items[$offset];
    }


    public function offsetSet($offset,$value): void
    {
        if(isset($offset)){
           $this->items[$offset] = $value;
        }else{
            $this->items[] = $value; 
        }
        
    }

    public function offsetUnset($offset): void
    {
     $this->unset($this->items[$offset]);
    }




//     // iterator aggregate
    public function getIterator(): Traversable
    {
        return new ArrayIterator($this->items);
    }

}
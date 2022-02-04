<?php

namespace Tests;

use Adrian\Collection;

use PHPUnit\Framework\TestCase;

Class CollectionTest extends TestCase {



    /** @test */
    function it_wraps_an_array_of_items(){

        $items = ['one','two','three','four'];

        $this->assertCount(4,Collection::make($items));
    }


        /** @test */
        function it_mimics_an_array(){

            $items = ['one','two','three'];

            $collection = Collection::make($items);
    
            $this->assertEquals($items[0],$collection[0]);
        }

                /** @test */
        function it_can_be_iterated(){

            $items = ['one','two','three'];

            $collection = Collection::make($items);

            foreach($collection as $index => $item){
                $this->assertEquals($items[$index],$item);
            }
            
        }
}
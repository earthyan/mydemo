<?php

class shop {
    private $shop;
    function __construct($shop)
    {
        $this->shop  = $shop;
    }

    function __toString()
    {
        // TODO: Implement __toString() method.
        return  $this->shop;
    }
}
$shop = new shop("taobao");
echo $shop;

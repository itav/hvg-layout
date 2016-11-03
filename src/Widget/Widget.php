<?php
/**
 * Created by PhpStorm.
 * User: sylwester
 * Date: 02.11.16
 * Time: 23:22
 */

namespace Itav\Component\Widget;


interface Widget
{
    public function show();
    public function setParent(\DOMElement $parent);

}
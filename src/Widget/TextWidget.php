<?php
/**
 * Created by PhpStorm.
 * User: sylwester
 * Date: 03.11.16
 * Time: 21:28
 */

namespace Itav\Component\Widget;


class TextWidget implements Widget
{
    /**
     * @var \DOMElement
     */
    protected $parent;
    /**
     * @var \DOMNode
     */
    protected $ui;
    /**
     * @var \DOMAttr
     */
    protected $name;

    public function __construct(\DOMNode $parent = null)
    {
        $this->parent = $parent;
        $this->ui = new \DOMElement('input');
    }

    /**
     * @param \DOMElement $parent
     * @return TextWidget
     */
    public function setParent(\DOMElement $parent): TextWidget
    {
        $this->parent = $parent;
        return $this;
    }

    /**
     * @return void
     */
    public function show()
    {
        $this->parent->appendChild($this->ui);
        $this->ui->setAttribute('name',$this->name);
    }
}
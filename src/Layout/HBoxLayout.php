<?php
/**
 * Created by PhpStorm.
 * User: sylwester
 * Date: 02.11.16
 * Time: 22:34
 */

namespace Itav\Component\Layout;


class HBoxLayout extends AbstractLayout
{

    public function __construct()
    {
        $this->ui = new \DOMElement('div');
    }

    public function show()
    {
        foreach ($this->widgets as $widget){
            $divLayout = new \DOMElement('div');
            $this->ui->appendChild($divLayout);
            $divLayout->setAttribute('id','horizontal');
            $widget->setParent($divLayout);
            $widget->show();
        }

        foreach ($this->layouts as $layout){
            $divLayout = new \DOMElement('div');
            $this->ui->appendChild($divLayout);
            $divLayout->setAttribute('id','horizontal');
            $layout->setParent($divLayout);
            $layout->show();
        }
        $this->parent->appendChild($this->ui);
    }

    public function setParent(\DOMElement $parent)
    {
        $this->parent = $parent;
        $this->parent->appendChild($this->ui);
    }
}
<?php
/**
 * Created by PhpStorm.
 * User: sylwester
 * Date: 02.11.16
 * Time: 22:34
 */

namespace Itav\Component\Layout;


use Itav\Component\Widget\Widget;

abstract class AbstractLayout implements Layout
{
    /**
     * @var \DOMElement
     */
    protected $ui;
    /**
     * @var \DOMElement
     */
    protected $parent;
    /**
     * @var Layout[]
     */
    protected $layouts = [];
    /**
     * @var Layout
     */
    protected $parentLayout;
    /**
     * @var Widget[]
     */
    protected $widgets = [];


    /**
     * @param Layout[] $layouts
     * @return self
     */
    public function setLayouts($layouts)
    {
        $this->layouts = $layouts;
        foreach ($layouts as $layout){
            $layout->setParent($this->ui);
        }
        return $this;
    }

    /**
     * @param Layout $layout
     * @return self
     */
    public function addLayout($layout)
    {
        $this->layouts[] = $layout;
        $layout->setParent($this->ui);
        return $this;
    }

    /**
     * @return Layout
     */
    public function getParentLayout()
    {
        return $this->parentLayout;
    }

    /**
     * @param Layout $parentLayout
     * @return self
     */
    public function setParentLayout($parentLayout)
    {
        $this->parentLayout = $parentLayout;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getWidgets()
    {
        return $this->widgets;
    }

    /**
     * @param Widget[] $widgets
     * @return self
     */
    public function setWidgets($widgets)
    {
        $this->widgets = $widgets;
        foreach ($widgets as $widget){
            $widget->setParent($this->ui);
        }
        return $this;
    }

    /**
     * @param Widget $widget
     * @return self
     */
    public function addWidget($widget)
    {
        $this->widgets[] = $widget;
        $widget->setParent($this->ui);
        return $this;
    }

    abstract public function show();

}
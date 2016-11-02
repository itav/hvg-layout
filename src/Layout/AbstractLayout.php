<?php
/**
 * Created by PhpStorm.
 * User: sylwester
 * Date: 02.11.16
 * Time: 22:34
 */

namespace Itav\Component\Layout;


abstract class AbstractLayout implements Layout
{

    /**
     * @var Layout[]
     */
    private $layouts;
    /**
     * @var Layout
     */
    private $parentLayout;
    /**
     * @var
     */
    private $widgets;

    /**
     * @return Layout[]
     */
    public function getLayouts()
    {
        return $this->layouts;
    }

    /**
     * @param Layout[] $layouts
     * @return self
     */
    public function setLayouts($layouts)
    {
        $this->layouts = $layouts;
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
     * @param mixed $widgets
     * @return self
     */
    public function setWidgets($widgets)
    {
        $this->widgets = $widgets;
        return $this;
    }

    /**
     * @return string
     */
    abstract public function show();

}
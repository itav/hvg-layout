<?php
/**
 * Created by PhpStorm.
 * User: sylwester
 * Date: 02.11.16
 * Time: 22:55
 */

namespace Itav\Component\Widget;


use Itav\Component\Layout\Layout;

class MainWindow
{
    /**
     * @var string
     */
    protected $charset = 'UTF-8';
    /**
     * @var \DOMDocument
     */
    protected $dom;
    /**
     * @var array
     */
    protected $cssFiles;
    /**
     * @var array
     */
    protected $jsFiles;
    /**
     * @var \DOMElement
     */
    protected $html;
    /**
     * @var \DOMElement
     */
    protected $head;
    /**
     * @var \DOMElement
     */
    protected $body;
    /**
     * @var Layout
     */
    private $mainLayout;
    /**
     * @var Widget
     */
    private $centralWidget;

    public function __construct()
    {
        $this->dom = new \DOMDocument();
        $this->html = new \DOMElement('html');
        $this->html= new \DOMElement('html');
        $this->head = new \DOMElement('head');
        $this->body = new \DOMElement('body');
        $this->dom->appendChild($this->html);
        $this->html->appendChild($this->head);
        $this->html->appendChild($this->body);
        $meta = new \DOMElement('meta');
        $charset = new \DOMAttr('charset', 'UTF-8');
        $this->head->appendChild($meta);
        $meta->setAttributeNode($charset);
    }



    /**
     * @return \DOMElement
     */
    public function getHtml(): \DOMElement
    {
        return $this->html;
    }

    /**
     * @return \DOMElement
     */
    public function getHead(): \DOMElement
    {
        return $this->head;
    }

    /**
     * @return \DOMElement
     */
    public function getBody(): \DOMElement
    {
        return $this->body;
    }


    public function show()
    {
        /**
         * Main window moze miec jeden glowny layout albo jeden central widget nigdy oba
         *
         * Layout moze miec Layout'y i/lub widgety
         *
         * Widgety nie mogą mieć Layoutow!! polozenie wewnatrz nich definiuja inne mechanizmy
         *
         * Widgety nie moge miec innych widgetow - jezeli jest potrzeba zbudowania widgeta
         * z innych trzeba stworzyc nowa klase i wykorzystac dziedziczenie
         */


        if ($this->mainLayout) {
            $this->mainLayout->show();
        } elseif ($this->centralWidget) {
            $this->centralWidget->show();
        }

        return $this->dom->saveHTML($this->dom->documentElement);
    }

    /**
     * @param Layout $mainLayout
     * @return MainWindow
     */
    public function setMainLayout(Layout $mainLayout): MainWindow
    {
        $this->mainLayout = $mainLayout;
        $mainLayout->setParent($this->body);
        return $this;
    }

    /**
     * @param Widget $centralWidget
     * @return MainWindow
     */
    public function setCentralWidget(Widget $centralWidget): MainWindow
    {
        $this->centralWidget = $centralWidget;
        $centralWidget->setParent($this->body);
        return $this;
    }


}
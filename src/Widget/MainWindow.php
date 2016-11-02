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

    private $cssFiles;
    private $jsFiles;

    /**
     * @var Layout
     */
    private $mainLayout;
    /**
     * @var Widget
     */
    private $centralWidget;


    public function show()
    {
        /**
         * Main window moze miec jeden glowny layout albo jeden central widget nigdy oba
         *
         * Layout moze miec Layout'y i/lub widgety
         *
         * Widgety nie mogą mieć Layoutow!! polozenie wewnatrz nich definiuje templak
         *
         * Widgety nie moge miec innych widgetow - jezeli jest porzeba zbudowania widgeta
         * z innych trzeba stworzyc nowa klase i wykorzystac dziedziczenie
         */
        $dom = new \DOMDocument();
        $dom->loadHTMLFile(__DIR__ . '/../Resource/mainwindow.html');
        $output = '';
        if ($this->mainLayout) {
            $output = $this->mainLayout->show();
        } elseif ($this->centralWidget) {
            $output = $this->centralWidget->show();
        }
        $append = new \DOMText($output);
        $dom->appendChild($append);

        return $dom->saveHTML($dom->documentElement);
    }
}
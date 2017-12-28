<?php
/**
 * @author: Sergey Naryshkin
 * @date: 28.12.2017
 */

namespace Uzh\Snowpro\Core;


class View
{
    /**
     * @var string
     */
    private $template;
    private $js = array();
    private $css = array();

    /**
     * View constructor.
     * @param string $template
     */
    public function __construct($template)
    {
        $this->template = $template;
    }

    public function show($params): void
    {
        $params['ADDED_JS'] = $this->js;
        $params['ADDED_CSS'] = $this->css;
        echo App::template()->render($this->template, $params);
    }

    public function addJs($jsPath): void
    {
        $this->js[] = $jsPath;
    }

    public function addCss($cssPath): void
    {
        $this->css[] = $cssPath;
    }
}
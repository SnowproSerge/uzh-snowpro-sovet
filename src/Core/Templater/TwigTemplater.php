<?php
/**
 * @author Sergey Naryshkin
 * Date: 29.12.2017 15:48
 */

namespace Uzh\Snowpro\Core\Templater;


class TwigTemplater implements Templater
{
    /** @var \Twig_Environment */
    private $twig;

    /**
     * @param string $templatesPath
     * @param string $cachePath
     * @return Templater
     */
    public static function init(string $templatesPath,string $cachePath): Templater
    {
        $twig = new self();
        $twigLoader = new \Twig_Loader_Filesystem($templatesPath);
        $twig->setTwig(new \Twig_Environment($twigLoader,array('debug' => true, 'cache' => $cachePath, 'auto_reload' => true)));
        return $twig;
    }

    /**
     * @param string $name
     * @param callable $function
     */
    public function registrationComponent(string $name, $function): void
    {
        $twigFunction = new \Twig_Function($name,$function);
        $this->twig->addFunction($twigFunction);
    }

    /**
     * @param string $nameTemplate
     * @param array $params
     * @return string
     * @throws \Twig_Error_Loader
     * @throws \Twig_Error_Runtime
     * @throws \Twig_Error_Syntax
     */
    public function render($nameTemplate, array $params): string
    {
         return $this->twig->render($nameTemplate,$params);
    }

    /**
     * @param \Twig_Environment $twig
     */
    private function setTwig(\Twig_Environment $twig): void
    {
        $this->twig = $twig;
    }

}
<?php
/**
 * Created by PhpStorm.
 * User: uzhass
 * Date: 29.12.2017
 * Time: 15:43
 */

namespace Uzh\Snowpro\Core\Templater;


interface Templater
{
    /**
     * Factory method
     *
     * @param string $templatesPath
     * @param string $cachePath
     * @return Templater
     */
    public static function init(string $templatesPath,string $cachePath): Templater;

    /**
     * @param string $name
     * @param $function
     */
    public function registrationComponent(string $name, $function): void;

    /**
     * @param string $nameTemplate
     * @param array $params
     * @return string
     */
    public function render($nameTemplate,array $params): string;
}
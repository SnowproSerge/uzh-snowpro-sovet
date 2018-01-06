<?php
/**
 * @author: Sergey Naryshkin
 * @date: 28.12.2017
 */

namespace Uzh\Snowpro\Core;


use Uzh\Snowpro\Core\Config\Config;
use Uzh\Snowpro\Core\Exception\RoutingException;
use Uzh\Snowpro\Core\Templater\TwigTemplater;
use Uzh\Snowpro\ExceptionHandler\DefaultExceptionHandler;
use Uzh\Snowpro\ExceptionHandler\WebExceptionHandler;

class App
{
    /** @var $instance App */
    protected static $instance;

    /** @var  $request RequestWeb */
    protected $request;
    /** @var  $request Config */
    protected $config;

    /**
     * @var
     */
    protected $templater;
    /**
     * @var DefaultExceptionHandler
     */
    protected $errorHandler;

    /**
     * @var Router
     */
    protected $router;

    /** Инициализация приложения
     * @param string $config относительный путь файла конфигурации
     */
    public static function initApp($config) {
        self::$instance = new self($config);
        self::$instance->init();
    }

    protected function init()
    {
        try {                           // Get controller and actions
            list($contName,$action,$params) = $this->router->route($this->request->getPath(), $this->request->getMethod());
            $contFullName ='\\Uzh\\Snowpro\\Controller\\'.$contName.'Controller';
            $controller = new $contFullName();
            if(!($controller instanceof AbstractController)) {
                throw new RoutingException('Bad controller name: ' . print_r($controller,true));
            }
//            $twigLoader = new \Twig_Loader_Filesystem($this->config->base_dir.'/templates');
//            $this->templater = new \Twig_Environment($twigLoader,array('debug' => true, 'cache' => $this->config->base_dir.'/cache', 'auto_reload' => true));
            $this->templater = TwigTemplater::init($this->config->base_dir.'templates',$this->config->base_dir.'/cache');
//            $this->templater = new \Twig_Environment($twigLoader,array('cache' => $this->config->base_dir.'/cache' ));

            $controller->actionProcess($action,$params);
        } catch (\Exception $e) {
            $this->errorHandler->handleException($e);
            exit();
        }
    }
    protected function __construct($config)
    {
        $this->config = new Config($config);
        $this->request = new RequestWeb();   // todo : from Config
        $this->router = new Router($this->config->router_table);

        $this->errorHandler = new WebExceptionHandler();  // todo : from Config
        set_exception_handler(array(\get_class($this->errorHandler),'handleException'));
    }


    /**
     * @return RequestWeb
     */
    public static function request()
    {
        return self::$instance->request;
    }

    /**
     * @return Config
     */
    public static function getConf()
    {
        return self::$instance->config;
    }

    /**
     * @param \Exception $e
     */
    public static function errorHandle($e)
    {
        self::$instance->errorHandler->handleException($e);
    }

    /**
     * @return mixed
     */
    public function getTemplater()
    {
        return $this->templater;
    }

    public static function template()
    {
        return self::$instance->getTemplater();
    }
}
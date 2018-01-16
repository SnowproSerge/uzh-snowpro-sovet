<?php
/**
 * @author: Sergey Naryshkin
 * @date: 28.12.2017
 */

namespace Uzh\Snowpro\Core;


//use Monolog\Handler\ChromePHPHandler;
use Monolog\Handler\StreamHandler;
use Monolog\Logger;
use Uzh\Snowpro\Core\Config\Config;
use Uzh\Snowpro\Core\Data\DbConnection;
use Uzh\Snowpro\Core\Exception\RoutingException;
use Uzh\Snowpro\Core\Security\Auth;
use Uzh\Snowpro\Core\Templater\TwigTemplater;
use Uzh\Snowpro\ExceptionHandler\DefaultExceptionHandler;

class App
{
    /** @var $instance App */
    protected static $instance;

    /** @var  $request RequestWeb */
    protected $request;
    /** @var  $request Config */
    protected $config;
    /** @var Templater\Templater */
    protected $templater;
    /** @var DefaultExceptionHandler */
    protected $errorHandler;
    /** @var Auth */
    protected $auth;
    /** @var Logger */
    protected $logger;
    /** @var DbConnection */
    protected $dbConnect;

    /** @var Router */
    protected $router;

    /** Инициализация приложения
     * @param string $config относительный путь файла конфигурации
     * @throws \Exception
     */
    public static function initApp($config)
    {
        self::$instance = new static($config);
        self::$instance->init();
    }

    protected function init()
    {
        try {                           // Get controller and actions
            set_exception_handler(array(\get_class($this->errorHandler), 'handleException'));
            list($contName, $action, $params) = $this->router->route($this->request->getPath(), $this->request->getMethod());
            $contFullName = '\\Uzh\\Snowpro\\Controller\\' . $contName . 'Controller';
            $controller = new $contFullName();
            if (!($controller instanceof AbstractController)) {
                throw new RoutingException('Bad controller name: ' . print_r($controller, true));
            }
            $this->templater = TwigTemplater::init($this->config->base_dir . 'templates', $this->config->base_dir . '/cache');
            $this->auth->init();
            $controller->setAuth($this->auth);
            $controller->actionProcess($action, $params);
        } catch (\Exception $e) {
            $this->errorHandler->handleException($e);
            exit();
        }
    }

    /**
     * App constructor.
     * @param $config
     * @throws \Exception
     */
    protected function __construct($config)
    {
        $this->config = new Config($config);
        $this->router = new Router($this->config->router_table);
        $this->logger = new Logger('main');
//        $this->logger->pushHandler(new ChromePHPHandler($this->config->logger['path'], $this->config->logger['level']));
        $this->logger->pushHandler(new StreamHandler($this->config->logger['path'], $this->config->logger['level']));
        $this->dbConnect = new DbConnection($this->config);

    }


    /**
     * @return RequestWeb
     */
    public static function request(): RequestWeb
    {
        return self::$instance->request;
    }

    /**
     * @return Config
     */
    public static function getConf(): Config
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
     * @return Templater\Templater
     */
    public function getTemplater(): Templater\Templater
    {
        return $this->templater;
    }

    /**
     * @return Templater\Templater
     */
    public static function template(): Templater\Templater
    {
        return self::$instance->getTemplater();
    }

    /**
     * @return Auth
     */
    public function getAuth(): Auth
    {
        return $this->auth;
    }

    /**
     * @return Logger
     */
    public function getLogger(): Logger
    {
        return $this->logger;
    }

    public static function logger()
    {
        return self::$instance->getLogger();
    }

}
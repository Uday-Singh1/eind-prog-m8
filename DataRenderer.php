<?php
namespace Main;

require __DIR__ . '/Twig/vendor/autoload.php';

use Twig\Environment;
use Twig\Loader\FilesystemLoader;

class DataRenderer
{
    private $twig;

    public function __construct($templateDirectory)
    {
        $loader = new FilesystemLoader( __DIR__ . $templateDirectory);
        $this->twig = new Environment($loader);
    }

    public function render($template, $data)
    {
        echo $this->twig->render($template, $data);
    }
}
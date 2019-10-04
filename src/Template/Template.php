<?php


namespace OsShareEmail\Template;


use Twig\Environment;
use Twig\Error\LoaderError;
use Twig\Error\RuntimeError;
use Twig\Error\SyntaxError;
use Twig\Loader\FilesystemLoader;

class Template
{
    const TEMPLATE_DIR = __DIR__.'/../../templates';

    const CACHE_TEMPLATE_DIR =__DIR__.'/../../var/cache';

    /**
     * @var Environment;
     */
    private $twig;

    /**
     * Template constructor.
     */
    public function __construct()
    {
        $loader = new FilesystemLoader(self::TEMPLATE_DIR);
        $this->twig = new Environment($loader, [
            'cache' => self::CACHE_TEMPLATE_DIR,
        ]);
    }

    /**
     * @param string $template
     * @param array $variables
     * @throws LoaderError
     * @throws RuntimeError
     * @throws SyntaxError
     */
    public function render(string $template, array $variables)
    {
        echo $this->twig->render($template, $variables);
    }

    /**
     * @param string $template
     * @param array $variables
     * @return string
     * @throws LoaderError
     * @throws RuntimeError
     * @throws SyntaxError
     */
    public function renderToString(string $template, array $variables)
    {
        return $this->twig->render($template, $variables);
    }

}
<?php
declare(strict_types=1);

namespace Core;

class View
{
    public static function render(string $view, array $args = []): void
    {
        extract($args, EXTR_SKIP);
        $file = '../App/Views/' . $view;
        $layout = '../App/Views/layout.php';
        if (is_readable($file)) {
            require $file;
            require $layout;
        } else {
            throw new \Exception($file . ' not found');
        }
    }

    public static function renderNoLayout(string $view, array $args = []): void
    {
        extract($args, EXTR_SKIP);
        $file = '../App/Views/' . $view;
        if (is_readable($file)) {
            require $file;
        } else {
            throw new \Exception($file . ' not found');
        }
    }
}
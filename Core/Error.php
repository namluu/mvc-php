<?php
declare(strict_types=1);

namespace Core;

class Error
{
    /**
     * Error handler.
     * Convert all errors to exceptions by throwing an ErrorException.
     * 
     * @param int $level Error level
     * @param string $message Error message
     * @param string $file Filename the error was raised in
     * @param int $line Line number in the file
     * 
     * @return void
     */
    public static function errorHandler($level, $message, $file, $line)
    {
        if (error_reporting() !== 0) {
            throw new \ErrorException($message, 0, $level, $file, $line);
        }
    }

    public static function exceptionHandler($exception)
    {
        $code = $exception->getCode();
        if ($code != 404) {
            $code = 500;
        }
        http_response_code($code);

        if (\App\Config::SHOW_ERRORS) {
            echo '<h1>Fatal error</h1>';
            echo '<p>Uncaught exception: '. get_class($exception) .'</p>';
            echo '<p>Message: '. $exception->getMessage() .'</p>';
            echo '<p>Stack trace:<pre>'. $exception->getTraceAsString() .'</pre></p>';
            echo '<p>Thrown in '. $exception->getFile() .' on line '. $exception->getLine() .'</p>';
        } else {
            $log = dirname(__DIR__) . '\\logs\\' . date('Y-m-d') . '.txt';
            ini_set('error_log', $log);
            $message = 'Uncaught exception: '. get_class($exception);
            $message .= "\nMessage: ". $exception->getMessage();
            $message .= "\nStack trace: ".$exception->getTraceAsString();
            $message .= "\nThrown in ".$exception->getFile().' on line '. $exception->getLine();
            error_log($message);
            Error::showHttpPageWhenHideError($code);
        }
    }

    protected static function showHttpPageWhenHideError($code)
    {
        /*
        if ($code == 404) {
            echo '<h1>Page not found</h1>';
        } else {
            echo '<h1>An error occurred</h1>';
        }*/
        View::renderNoLayout($code . '.html');
    }
}
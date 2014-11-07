<?php

namespace OpenCloud\ObjectStore\Exception;

class ObjectNotFoundException extends \RuntimeException
{
    public static function factory($name, \Exception $exception)
    {
        $message = sprintf(
            "%s could not be found. The API returned this HTTP response:\n\n%s",
            $name,
            (string) $exception->getResponse()
        );

        $e = new self($message);

        $e->name = $name;
        $e->response = $exception->getResponse();
        $e->request  = $exception->getRequest();

        return $e;
    }
} 
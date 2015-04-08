<?php

namespace Aws\DynamoDb\Session;

if (PHP_VERSION_ID >= 50400) {
    /**
     * @see http://php.net/manual/en/class.sessionhandlerinterface.php
     */
    interface SessionHandlerInterface extends \SessionHandlerInterface {}
} else {
    interface SessionHandlerInterface
    {
        public function close();
        public function destroy($session_id);
        public function gc($maxLifetime);
        public function open($savePath, $sessionName);
        public function read($sessionId);
        public function write($sessionId, $sessionData);
    }
}

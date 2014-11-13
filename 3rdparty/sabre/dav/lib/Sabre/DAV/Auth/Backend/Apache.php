<?php

namespace Sabre\DAV\Auth\Backend;
use Sabre\DAV;

/**
 * Apache authenticator
 *
 * This authentication backend assumes that authentication has been
 * configured in apache, rather than within SabreDAV.
 *
 * Make sure apache is properly configured for this to work.
 *
 * @copyright Copyright (C) 2007-2014 fruux GmbH (https://fruux.com/).
 * @author Evert Pot (http://evertpot.com/)
 * @license http://sabre.io/license/ Modified BSD License
 */
class Apache implements BackendInterface {

    /**
     * Current apache user
     *
     * @var string
     */
    protected $remoteUser;

    /**
     * Authenticates the user based on the current request.
     *
     * If authentication is successful, true must be returned.
     * If authentication fails, an exception must be thrown.
     *
     * @param DAV\Server $server
     * @param string $realm
     * @return bool
     */
    public function authenticate(DAV\Server $server, $realm) {

        $remoteUser = $server->httpRequest->getRawServerValue('REMOTE_USER');
        if (is_null($remoteUser)) {
            throw new DAV\Exception('We did not receive the $_SERVER[REMOTE_USER] property. This means that apache might have been misconfigured');
        }

        $this->remoteUser = $remoteUser;
        return true;

    }

    /**
     * Returns information about the currently logged in user.
     *
     * If nobody is currently logged in, this method should return null.
     *
     * @return array|null
     */
    public function getCurrentUser() {

        return $this->remoteUser;

    }

}


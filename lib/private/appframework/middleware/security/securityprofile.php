<?php
/**
 * @author Bernhard Posselt <dev@bernhard-posselt.com>
 *
 * @copyright Copyright (c) 2015, ownCloud, Inc.
 * @license AGPL-3.0
 *
 * This code is free software: you can redistribute it and/or modify
 * it under the terms of the GNU Affero General Public License, version 3,
 * as published by the Free Software Foundation.
 *
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the
 * GNU Affero General Public License for more details.
 *
 * You should have received a copy of the GNU Affero General Public License, version 3,
 * along with this program.  If not, see <http://www.gnu.org/licenses/>
 *
 */

namespace OC\AppFramework\Middleware\Security;

use OCP\AppFramework\Utility\IControllerMethodReflector;
use OCP\IGroupManager;
use OCP\IUserSession;
use OCP\ISession;
use OCP\IRequest;

class SecurityProfile {

    protected $reflector;
    protected $groupManager;
    protected $userSession;
    protected $session;
    protected $request;

    public function __construct(IControllerMethodReflector $reflector,
                                ISession $session,
                                IGroupManager $groupManager,
                                IUserSession $userSession,
                                IRequest $request) {
        $this->reflector = $reflector;
        $this->session = $session;
        $this->groupManager = $groupManager;
        $this->userSession = $userSession;
        $this->request = $request;
    }

    /**
     * Determines if login checks need to be made and if they are successful
     * @return bool
     */
    public function passesLoginCheck() {
        // @PublicPage means that the user is not checked for logged in
        if ($this->reflector->hasAnnotation('PublicPage')) {
            return true;
        } else {
            return $this->userSession->isLoggedIn();
        }
    }

    /**
     * Determines if amdin checks need to be made and if they are successful
     * @return bool
     */
    public function passesAdminRequiredCheck() {
        // @PublicPage or @NoAdminRequired turn off the check
        if ($this->reflector->hasAnnotation('PublicPage') ||
            $this->reflector->hasAnnotation('NoAdminRequired')) {
            return true;
        } else {
            $userId = $this->userSession->getUser()->getUID();
            return $this->groupManager->isAdmin($userId);
        }
    }

    /**
     * Runs all remaining checks that need to be done. The default
     * implementation does not assume any checks
     * @return bool
     */
    public function passesAdditionalChecks() {
        return true;
    }


    /**
     * @see https://developer.mozilla.org/en-US/docs/Web/HTTP/Access_control_CORS#Requests_with_credentials
     * @return bool
     */
    public function passesNoCORSCredentialsResponse() {
        // CORS has a feature that is called withCredentials that basically
        // allows a third-party resource to authenticate itself using the
        // cookies which are stored for the page. This opens up ownCloud to
        // CSRF attacks because any resource can make authenticated requests
        // to ownCloud without providing valid login credentials
        foreach($this->response->getHeaders() as $header => $value) {
            if(strtolower($header) === 'access-control-allow-credentials' &&
               strtolower(trim($value)) === 'true') {
                return false;
            }
        }

    }

}
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
use OCP\Security\ISecureRandom;


/**
 * This class is used for any request which is made from the web interface
 */
class WebSecurityProfile {

    /**
     * @var ISecureRandom
     */
    protected $random;

    /**
     * @param IControllerMethodReflector $reflector
     * @param ISession $session
     * @param IGroupManager $groupManager
     * @param IUserSession $userSession
     * @param IRequest $request
     * @param ISecureRandom $random
     */
    public function __construct(IControllerMethodReflector $reflector,
                                ISession $session,
                                IGroupManager $groupManager,
                                IUserSession $userSession,
                                IRequest $request,
                                ISecureRandom $random) {
        parent::__construct($reflector, $session, $groupManager, $userSession, $request);
        $this->random = $random
    }

    /**
     * Retrieves the internal CSRF token or generates and sets a new token
     * if none exists yet
     * @return string the token
     */
    protected function getInternalCSRFToken() {
        if (!$this->session->exists('requesttoken')) {
            $newToken = $this->random->getMediumStrengthGenerator()->generate(30);
            $this->session->set('requesttoken', $newToken);
        }

        return $this->session->get('requesttoken');
    }

    /**
     * Run CSRF checks for the web interface
     * @return bool
     */
    public function passesAdditionalChecks() {
        // @NoCSRFRequired turns off the check
        if ($this->reflector->hasAnnotation('NoCSRFRequired') {
            return true;
        } else {
            // this section has been moved off the request class, since it's
            // not the class' responsibility to perform security checks
            return $this->request->getRequestCSRFToken() === $this->getInternalCSRFToken();
        }
    }

    /**
     * @return bool
     */
    public function isChosen() {
        return !($this->request->isApiRequest() || $this->reflector->hasAnnotation('CORS'));
    }

}
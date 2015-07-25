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


/**
 * This class is used for /index.php/api/* requests and to keep backwards
 * compatibility when a controller method is annotated with @CORS
 */
class ApiSecurityProfile {

    public function passesLoginCheck() {
        // ensure that API routes are not used in conjunction with session
        // authentication since this enables CSRF attack vectors

        // FIXME: if someone finds a better way to do this without relogin the
        // user with basic auth credentials, feel free to improve this. I could
        // not find a method to do this reliably without breaking all APIs
        $user = $this->request->server['PHP_AUTH_USER'];
        $pass = $this->request->server['PHP_AUTH_PW'];

        $this->userSession->logout();
        return $this->session->login($user, $pass);
    }

}
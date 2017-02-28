<?php
// Copyright 2004-present Facebook. All Rights Reserved.
//
// Licensed under the Apache License, Version 2.0 (the "License");
// you may not use this file except in compliance with the License.
// You may obtain a copy of the License at
//
//     http://www.apache.org/licenses/LICENSE-2.0
//
// Unless required by applicable law or agreed to in writing, software
// distributed under the License is distributed on an "AS IS" BASIS,
// WITHOUT WARRANTIES OR CONDITIONS OF ANY KIND, either express or implied.
// See the License for the specific language governing permissions and
// limitations under the License.

/**
 * Managing stuff you would do in a browser.
 */
class WebDriverOptions {

  protected $executor;

  public function __construct(ExecuteMethod $executor) {
    $this->executor = $executor;
  }

  /**
   * Add a specific cookie.
   *
   * Here are the valid attributes of a cookie array.
   *  'name'  : string The name of the cookie; may not be null or an empty
   *                    string.
   *  'value' : string The cookie value; may not be null.
   *  'path'  : string The path the cookie is visible to. If left blank or set
   *                   to null, will be set to "/".
   *  'domain': string The domain the cookie is visible to. It should be null or
   *                   the same as the domain of the current URL.
   *  'secure': bool   Whether this cookie requires a secure connection(https?).
   *                   It should be null or equal to the security of the current
   *                   URL.
   *  'expiry': int    The cookie's expiration date; may be null.
   *
   * @param array $cookie An array with key as the attributes mentioned above.
   * @return WebDriverOptions The current instance.
   */
  public function addCookie(array $cookie) {
    $this->validate($cookie);
    $this->executor->execute(
      DriverCommand::ADD_COOKIE,
      array('cookie' => $cookie)
    );
    return $this;
  }

  /**
   * Delete all the cookies that are currently visible.
   *
   * @return WebDriverOptions The current instance.
   */
  public function deleteAllCookies() {
    $this->executor->execute(DriverCommand::DELETE_ALL_COOKIES);
    return $this;
  }

  /**
   * Delete the cookie with the give name.
   *
   * @param string $name
   * @return WebDriverOptions The current instance.
   */
  public function deleteCookieNamed($name) {
    $this->executor->execute(
      DriverCommand::DELETE_COOKIE,
      array(':name' => $name)
    );
    return $this;
  }

  /**
   * Get the cookie with a given name.
   *
   * @param string $name
   * @return array The cookie, or null if no cookie with the given name is
   *               presented.
   */
  public function getCookieNamed($name) {
    $cookies = $this->getCookies();
    foreach ($cookies as $cookie) {
      if ($cookie['name'] === $name) {
        return $cookie;
      }
    }
    return null;
  }

  /**
   * Get all the cookies for the current domain.
   *
   * @return array The array of cookies presented.
   */
  public function getCookies() {
    return $this->executor->execute(DriverCommand::GET_ALL_COOKIES);
  }

  private function validate(array $cookie) {
    if (!isset($cookie['name']) ||
        $cookie['name'] === '' ||
        strpos($cookie['name'], ';') !== false) {
      throw new InvalidArgumentException(
        '"name" should be non-empty and does not contain a ";"');
    }

    if (!isset($cookie['value'])) {
      throw new InvalidArgumentException(
        '"value" is required when setting a cookie.');
    }

    if (isset($cookie['domain']) && strpos($cookie['domain'], ':') !== false) {
      throw new InvalidArgumentException(
        '"domain" should not contain a port:'.(string)$cookie['domain']);
    }
  }

  /**
   * Return the interface for managing driver timeouts.
   *
   * @return WebDriverTimeouts
   */
  public function timeouts() {
    return new WebDriverTimeouts($this->executor);
  }

  /**
   * An abstraction allowing the driver to manipulate the browser's window
   *
   * @return WebDriverWindow
   * @see WebDriverWindow
   */
  public function window() {
    return new WebDriverWindow($this->executor);
  }

  /**
   * Get the log for a given log type. Log buffer is reset after each request.
   *
   * @param string $log_type The log type.
   * @return array The list of log entries.
   * @see https://code.google.com/p/selenium/wiki/JsonWireProtocol#Log_Type
   */
  public function getLog($log_type) {
    return $this->executor->execute(
      DriverCommand::GET_LOG,
      array('type' => $log_type)
    );
  }

  /**
   * Get available log types.
   *
   * @return array The list of available log types.
   * @see https://code.google.com/p/selenium/wiki/JsonWireProtocol#Log_Type
   */
  public function getAvailableLogTypes() {
    return $this->executor->execute(DriverCommand::GET_AVAILABLE_LOG_TYPES);
  }

}

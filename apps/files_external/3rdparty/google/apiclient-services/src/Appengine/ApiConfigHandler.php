<?php
/*
 * Copyright 2014 Google Inc.
 *
 * Licensed under the Apache License, Version 2.0 (the "License"); you may not
 * use this file except in compliance with the License. You may obtain a copy of
 * the License at
 *
 * http://www.apache.org/licenses/LICENSE-2.0
 *
 * Unless required by applicable law or agreed to in writing, software
 * distributed under the License is distributed on an "AS IS" BASIS, WITHOUT
 * WARRANTIES OR CONDITIONS OF ANY KIND, either express or implied. See the
 * License for the specific language governing permissions and limitations under
 * the License.
 */

namespace Google\Service\Appengine;

class ApiConfigHandler extends \Google\Model
{
  /**
   * @var string
   */
  public $authFailAction;
  /**
   * @var string
   */
  public $login;
  /**
   * @var string
   */
  public $script;
  /**
   * @var string
   */
  public $securityLevel;
  /**
   * @var string
   */
  public $url;

  /**
   * @param string
   */
  public function setAuthFailAction($authFailAction)
  {
    $this->authFailAction = $authFailAction;
  }
  /**
   * @return string
   */
  public function getAuthFailAction()
  {
    return $this->authFailAction;
  }
  /**
   * @param string
   */
  public function setLogin($login)
  {
    $this->login = $login;
  }
  /**
   * @return string
   */
  public function getLogin()
  {
    return $this->login;
  }
  /**
   * @param string
   */
  public function setScript($script)
  {
    $this->script = $script;
  }
  /**
   * @return string
   */
  public function getScript()
  {
    return $this->script;
  }
  /**
   * @param string
   */
  public function setSecurityLevel($securityLevel)
  {
    $this->securityLevel = $securityLevel;
  }
  /**
   * @return string
   */
  public function getSecurityLevel()
  {
    return $this->securityLevel;
  }
  /**
   * @param string
   */
  public function setUrl($url)
  {
    $this->url = $url;
  }
  /**
   * @return string
   */
  public function getUrl()
  {
    return $this->url;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(ApiConfigHandler::class, 'Google_Service_Appengine_ApiConfigHandler');

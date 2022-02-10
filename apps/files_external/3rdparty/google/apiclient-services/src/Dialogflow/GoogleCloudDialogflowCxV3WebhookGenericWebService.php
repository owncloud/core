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

namespace Google\Service\Dialogflow;

class GoogleCloudDialogflowCxV3WebhookGenericWebService extends \Google\Collection
{
  protected $collection_key = 'allowedCaCerts';
  /**
   * @var string[]
   */
  public $allowedCaCerts;
  /**
   * @var string
   */
  public $password;
  /**
   * @var string[]
   */
  public $requestHeaders;
  /**
   * @var string
   */
  public $uri;
  /**
   * @var string
   */
  public $username;

  /**
   * @param string[]
   */
  public function setAllowedCaCerts($allowedCaCerts)
  {
    $this->allowedCaCerts = $allowedCaCerts;
  }
  /**
   * @return string[]
   */
  public function getAllowedCaCerts()
  {
    return $this->allowedCaCerts;
  }
  /**
   * @param string
   */
  public function setPassword($password)
  {
    $this->password = $password;
  }
  /**
   * @return string
   */
  public function getPassword()
  {
    return $this->password;
  }
  /**
   * @param string[]
   */
  public function setRequestHeaders($requestHeaders)
  {
    $this->requestHeaders = $requestHeaders;
  }
  /**
   * @return string[]
   */
  public function getRequestHeaders()
  {
    return $this->requestHeaders;
  }
  /**
   * @param string
   */
  public function setUri($uri)
  {
    $this->uri = $uri;
  }
  /**
   * @return string
   */
  public function getUri()
  {
    return $this->uri;
  }
  /**
   * @param string
   */
  public function setUsername($username)
  {
    $this->username = $username;
  }
  /**
   * @return string
   */
  public function getUsername()
  {
    return $this->username;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(GoogleCloudDialogflowCxV3WebhookGenericWebService::class, 'Google_Service_Dialogflow_GoogleCloudDialogflowCxV3WebhookGenericWebService');

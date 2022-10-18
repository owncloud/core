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

namespace Google\Service\Integrations;

class GoogleCloudConnectorsV1AuthConfigUserPassword extends \Google\Model
{
  protected $passwordType = GoogleCloudConnectorsV1Secret::class;
  protected $passwordDataType = '';
  /**
   * @var string
   */
  public $username;

  /**
   * @param GoogleCloudConnectorsV1Secret
   */
  public function setPassword(GoogleCloudConnectorsV1Secret $password)
  {
    $this->password = $password;
  }
  /**
   * @return GoogleCloudConnectorsV1Secret
   */
  public function getPassword()
  {
    return $this->password;
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
class_alias(GoogleCloudConnectorsV1AuthConfigUserPassword::class, 'Google_Service_Integrations_GoogleCloudConnectorsV1AuthConfigUserPassword');

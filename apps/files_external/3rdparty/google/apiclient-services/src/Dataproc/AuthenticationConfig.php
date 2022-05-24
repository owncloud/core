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

namespace Google\Service\Dataproc;

class AuthenticationConfig extends \Google\Model
{
  /**
   * @var string
   */
  public $authenticationType;
  protected $injectableCredentialsConfigType = InjectableCredentialsConfig::class;
  protected $injectableCredentialsConfigDataType = '';

  /**
   * @param string
   */
  public function setAuthenticationType($authenticationType)
  {
    $this->authenticationType = $authenticationType;
  }
  /**
   * @return string
   */
  public function getAuthenticationType()
  {
    return $this->authenticationType;
  }
  /**
   * @param InjectableCredentialsConfig
   */
  public function setInjectableCredentialsConfig(InjectableCredentialsConfig $injectableCredentialsConfig)
  {
    $this->injectableCredentialsConfig = $injectableCredentialsConfig;
  }
  /**
   * @return InjectableCredentialsConfig
   */
  public function getInjectableCredentialsConfig()
  {
    return $this->injectableCredentialsConfig;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(AuthenticationConfig::class, 'Google_Service_Dataproc_AuthenticationConfig');

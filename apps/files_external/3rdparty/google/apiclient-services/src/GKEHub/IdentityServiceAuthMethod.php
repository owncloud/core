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

namespace Google\Service\GKEHub;

class IdentityServiceAuthMethod extends \Google\Model
{
  /**
   * @var string
   */
  public $name;
  protected $oidcConfigType = IdentityServiceOidcConfig::class;
  protected $oidcConfigDataType = '';
  /**
   * @var string
   */
  public $proxy;

  /**
   * @param string
   */
  public function setName($name)
  {
    $this->name = $name;
  }
  /**
   * @return string
   */
  public function getName()
  {
    return $this->name;
  }
  /**
   * @param IdentityServiceOidcConfig
   */
  public function setOidcConfig(IdentityServiceOidcConfig $oidcConfig)
  {
    $this->oidcConfig = $oidcConfig;
  }
  /**
   * @return IdentityServiceOidcConfig
   */
  public function getOidcConfig()
  {
    return $this->oidcConfig;
  }
  /**
   * @param string
   */
  public function setProxy($proxy)
  {
    $this->proxy = $proxy;
  }
  /**
   * @return string
   */
  public function getProxy()
  {
    return $this->proxy;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(IdentityServiceAuthMethod::class, 'Google_Service_GKEHub_IdentityServiceAuthMethod');

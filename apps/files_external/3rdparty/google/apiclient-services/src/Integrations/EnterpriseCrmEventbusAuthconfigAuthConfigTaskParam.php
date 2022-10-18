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

class EnterpriseCrmEventbusAuthconfigAuthConfigTaskParam extends \Google\Collection
{
  protected $collection_key = 'allowedCredentialTypes';
  /**
   * @var string[]
   */
  public $allowedCredentialTypes;
  /**
   * @var bool
   */
  public $allowedServiceAccountInContext;
  /**
   * @var string
   */
  public $authConfigId;
  /**
   * @var string
   */
  public $scope;
  /**
   * @var bool
   */
  public $useServiceAccountInContext;

  /**
   * @param string[]
   */
  public function setAllowedCredentialTypes($allowedCredentialTypes)
  {
    $this->allowedCredentialTypes = $allowedCredentialTypes;
  }
  /**
   * @return string[]
   */
  public function getAllowedCredentialTypes()
  {
    return $this->allowedCredentialTypes;
  }
  /**
   * @param bool
   */
  public function setAllowedServiceAccountInContext($allowedServiceAccountInContext)
  {
    $this->allowedServiceAccountInContext = $allowedServiceAccountInContext;
  }
  /**
   * @return bool
   */
  public function getAllowedServiceAccountInContext()
  {
    return $this->allowedServiceAccountInContext;
  }
  /**
   * @param string
   */
  public function setAuthConfigId($authConfigId)
  {
    $this->authConfigId = $authConfigId;
  }
  /**
   * @return string
   */
  public function getAuthConfigId()
  {
    return $this->authConfigId;
  }
  /**
   * @param string
   */
  public function setScope($scope)
  {
    $this->scope = $scope;
  }
  /**
   * @return string
   */
  public function getScope()
  {
    return $this->scope;
  }
  /**
   * @param bool
   */
  public function setUseServiceAccountInContext($useServiceAccountInContext)
  {
    $this->useServiceAccountInContext = $useServiceAccountInContext;
  }
  /**
   * @return bool
   */
  public function getUseServiceAccountInContext()
  {
    return $this->useServiceAccountInContext;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(EnterpriseCrmEventbusAuthconfigAuthConfigTaskParam::class, 'Google_Service_Integrations_EnterpriseCrmEventbusAuthconfigAuthConfigTaskParam');

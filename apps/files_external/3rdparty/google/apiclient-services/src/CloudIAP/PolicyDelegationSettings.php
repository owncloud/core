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

namespace Google\Service\CloudIAP;

class PolicyDelegationSettings extends \Google\Model
{
  /**
   * @var string
   */
  public $iamPermission;
  /**
   * @var string
   */
  public $iamServiceName;
  protected $policyNameType = PolicyName::class;
  protected $policyNameDataType = '';
  protected $resourceType = IapResource::class;
  protected $resourceDataType = '';

  /**
   * @param string
   */
  public function setIamPermission($iamPermission)
  {
    $this->iamPermission = $iamPermission;
  }
  /**
   * @return string
   */
  public function getIamPermission()
  {
    return $this->iamPermission;
  }
  /**
   * @param string
   */
  public function setIamServiceName($iamServiceName)
  {
    $this->iamServiceName = $iamServiceName;
  }
  /**
   * @return string
   */
  public function getIamServiceName()
  {
    return $this->iamServiceName;
  }
  /**
   * @param PolicyName
   */
  public function setPolicyName(PolicyName $policyName)
  {
    $this->policyName = $policyName;
  }
  /**
   * @return PolicyName
   */
  public function getPolicyName()
  {
    return $this->policyName;
  }
  /**
   * @param IapResource
   */
  public function setResource(IapResource $resource)
  {
    $this->resource = $resource;
  }
  /**
   * @return IapResource
   */
  public function getResource()
  {
    return $this->resource;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(PolicyDelegationSettings::class, 'Google_Service_CloudIAP_PolicyDelegationSettings');

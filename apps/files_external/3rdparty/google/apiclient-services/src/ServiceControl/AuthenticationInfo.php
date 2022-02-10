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

namespace Google\Service\ServiceControl;

class AuthenticationInfo extends \Google\Collection
{
  protected $collection_key = 'serviceAccountDelegationInfo';
  /**
   * @var string
   */
  public $authoritySelector;
  /**
   * @var string
   */
  public $principalEmail;
  /**
   * @var string
   */
  public $principalSubject;
  protected $serviceAccountDelegationInfoType = ServiceAccountDelegationInfo::class;
  protected $serviceAccountDelegationInfoDataType = 'array';
  /**
   * @var string
   */
  public $serviceAccountKeyName;
  /**
   * @var array[]
   */
  public $thirdPartyPrincipal;

  /**
   * @param string
   */
  public function setAuthoritySelector($authoritySelector)
  {
    $this->authoritySelector = $authoritySelector;
  }
  /**
   * @return string
   */
  public function getAuthoritySelector()
  {
    return $this->authoritySelector;
  }
  /**
   * @param string
   */
  public function setPrincipalEmail($principalEmail)
  {
    $this->principalEmail = $principalEmail;
  }
  /**
   * @return string
   */
  public function getPrincipalEmail()
  {
    return $this->principalEmail;
  }
  /**
   * @param string
   */
  public function setPrincipalSubject($principalSubject)
  {
    $this->principalSubject = $principalSubject;
  }
  /**
   * @return string
   */
  public function getPrincipalSubject()
  {
    return $this->principalSubject;
  }
  /**
   * @param ServiceAccountDelegationInfo[]
   */
  public function setServiceAccountDelegationInfo($serviceAccountDelegationInfo)
  {
    $this->serviceAccountDelegationInfo = $serviceAccountDelegationInfo;
  }
  /**
   * @return ServiceAccountDelegationInfo[]
   */
  public function getServiceAccountDelegationInfo()
  {
    return $this->serviceAccountDelegationInfo;
  }
  /**
   * @param string
   */
  public function setServiceAccountKeyName($serviceAccountKeyName)
  {
    $this->serviceAccountKeyName = $serviceAccountKeyName;
  }
  /**
   * @return string
   */
  public function getServiceAccountKeyName()
  {
    return $this->serviceAccountKeyName;
  }
  /**
   * @param array[]
   */
  public function setThirdPartyPrincipal($thirdPartyPrincipal)
  {
    $this->thirdPartyPrincipal = $thirdPartyPrincipal;
  }
  /**
   * @return array[]
   */
  public function getThirdPartyPrincipal()
  {
    return $this->thirdPartyPrincipal;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(AuthenticationInfo::class, 'Google_Service_ServiceControl_AuthenticationInfo');

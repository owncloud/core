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

class ServiceAccountDelegationInfo extends \Google\Model
{
  protected $firstPartyPrincipalType = FirstPartyPrincipal::class;
  protected $firstPartyPrincipalDataType = '';
  public $principalSubject;
  protected $thirdPartyPrincipalType = ThirdPartyPrincipal::class;
  protected $thirdPartyPrincipalDataType = '';

  /**
   * @param FirstPartyPrincipal
   */
  public function setFirstPartyPrincipal(FirstPartyPrincipal $firstPartyPrincipal)
  {
    $this->firstPartyPrincipal = $firstPartyPrincipal;
  }
  /**
   * @return FirstPartyPrincipal
   */
  public function getFirstPartyPrincipal()
  {
    return $this->firstPartyPrincipal;
  }
  public function setPrincipalSubject($principalSubject)
  {
    $this->principalSubject = $principalSubject;
  }
  public function getPrincipalSubject()
  {
    return $this->principalSubject;
  }
  /**
   * @param ThirdPartyPrincipal
   */
  public function setThirdPartyPrincipal(ThirdPartyPrincipal $thirdPartyPrincipal)
  {
    $this->thirdPartyPrincipal = $thirdPartyPrincipal;
  }
  /**
   * @return ThirdPartyPrincipal
   */
  public function getThirdPartyPrincipal()
  {
    return $this->thirdPartyPrincipal;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(ServiceAccountDelegationInfo::class, 'Google_Service_ServiceControl_ServiceAccountDelegationInfo');

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

class Google_Service_ServiceControl_ServiceAccountDelegationInfo extends Google_Model
{
  protected $firstPartyPrincipalType = 'Google_Service_ServiceControl_FirstPartyPrincipal';
  protected $firstPartyPrincipalDataType = '';
  protected $thirdPartyPrincipalType = 'Google_Service_ServiceControl_ThirdPartyPrincipal';
  protected $thirdPartyPrincipalDataType = '';

  /**
   * @param Google_Service_ServiceControl_FirstPartyPrincipal
   */
  public function setFirstPartyPrincipal(Google_Service_ServiceControl_FirstPartyPrincipal $firstPartyPrincipal)
  {
    $this->firstPartyPrincipal = $firstPartyPrincipal;
  }
  /**
   * @return Google_Service_ServiceControl_FirstPartyPrincipal
   */
  public function getFirstPartyPrincipal()
  {
    return $this->firstPartyPrincipal;
  }
  /**
   * @param Google_Service_ServiceControl_ThirdPartyPrincipal
   */
  public function setThirdPartyPrincipal(Google_Service_ServiceControl_ThirdPartyPrincipal $thirdPartyPrincipal)
  {
    $this->thirdPartyPrincipal = $thirdPartyPrincipal;
  }
  /**
   * @return Google_Service_ServiceControl_ThirdPartyPrincipal
   */
  public function getThirdPartyPrincipal()
  {
    return $this->thirdPartyPrincipal;
  }
}

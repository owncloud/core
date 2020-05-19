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

class Google_Service_DisplayVideo_ThirdPartyVerifierAssignedTargetingOptionDetails extends Google_Model
{
  protected $adlooxType = 'Google_Service_DisplayVideo_Adloox';
  protected $adlooxDataType = '';
  protected $doubleVerifyType = 'Google_Service_DisplayVideo_DoubleVerify';
  protected $doubleVerifyDataType = '';
  protected $integralAdScienceType = 'Google_Service_DisplayVideo_IntegralAdScience';
  protected $integralAdScienceDataType = '';

  /**
   * @param Google_Service_DisplayVideo_Adloox
   */
  public function setAdloox(Google_Service_DisplayVideo_Adloox $adloox)
  {
    $this->adloox = $adloox;
  }
  /**
   * @return Google_Service_DisplayVideo_Adloox
   */
  public function getAdloox()
  {
    return $this->adloox;
  }
  /**
   * @param Google_Service_DisplayVideo_DoubleVerify
   */
  public function setDoubleVerify(Google_Service_DisplayVideo_DoubleVerify $doubleVerify)
  {
    $this->doubleVerify = $doubleVerify;
  }
  /**
   * @return Google_Service_DisplayVideo_DoubleVerify
   */
  public function getDoubleVerify()
  {
    return $this->doubleVerify;
  }
  /**
   * @param Google_Service_DisplayVideo_IntegralAdScience
   */
  public function setIntegralAdScience(Google_Service_DisplayVideo_IntegralAdScience $integralAdScience)
  {
    $this->integralAdScience = $integralAdScience;
  }
  /**
   * @return Google_Service_DisplayVideo_IntegralAdScience
   */
  public function getIntegralAdScience()
  {
    return $this->integralAdScience;
  }
}

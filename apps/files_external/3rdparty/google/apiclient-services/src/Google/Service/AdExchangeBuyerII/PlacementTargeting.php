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

class Google_Service_AdExchangeBuyerII_PlacementTargeting extends Google_Model
{
  protected $mobileApplicationTargetingType = 'Google_Service_AdExchangeBuyerII_MobileApplicationTargeting';
  protected $mobileApplicationTargetingDataType = '';
  protected $urlTargetingType = 'Google_Service_AdExchangeBuyerII_UrlTargeting';
  protected $urlTargetingDataType = '';

  /**
   * @param Google_Service_AdExchangeBuyerII_MobileApplicationTargeting
   */
  public function setMobileApplicationTargeting(Google_Service_AdExchangeBuyerII_MobileApplicationTargeting $mobileApplicationTargeting)
  {
    $this->mobileApplicationTargeting = $mobileApplicationTargeting;
  }
  /**
   * @return Google_Service_AdExchangeBuyerII_MobileApplicationTargeting
   */
  public function getMobileApplicationTargeting()
  {
    return $this->mobileApplicationTargeting;
  }
  /**
   * @param Google_Service_AdExchangeBuyerII_UrlTargeting
   */
  public function setUrlTargeting(Google_Service_AdExchangeBuyerII_UrlTargeting $urlTargeting)
  {
    $this->urlTargeting = $urlTargeting;
  }
  /**
   * @return Google_Service_AdExchangeBuyerII_UrlTargeting
   */
  public function getUrlTargeting()
  {
    return $this->urlTargeting;
  }
}

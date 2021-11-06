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

namespace Google\Service\AdExchangeBuyerII;

class PlacementTargeting extends \Google\Model
{
  protected $mobileApplicationTargetingType = MobileApplicationTargeting::class;
  protected $mobileApplicationTargetingDataType = '';
  protected $urlTargetingType = UrlTargeting::class;
  protected $urlTargetingDataType = '';

  /**
   * @param MobileApplicationTargeting
   */
  public function setMobileApplicationTargeting(MobileApplicationTargeting $mobileApplicationTargeting)
  {
    $this->mobileApplicationTargeting = $mobileApplicationTargeting;
  }
  /**
   * @return MobileApplicationTargeting
   */
  public function getMobileApplicationTargeting()
  {
    return $this->mobileApplicationTargeting;
  }
  /**
   * @param UrlTargeting
   */
  public function setUrlTargeting(UrlTargeting $urlTargeting)
  {
    $this->urlTargeting = $urlTargeting;
  }
  /**
   * @return UrlTargeting
   */
  public function getUrlTargeting()
  {
    return $this->urlTargeting;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(PlacementTargeting::class, 'Google_Service_AdExchangeBuyerII_PlacementTargeting');

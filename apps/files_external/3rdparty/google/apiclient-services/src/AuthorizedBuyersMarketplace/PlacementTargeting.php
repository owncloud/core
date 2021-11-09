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

namespace Google\Service\AuthorizedBuyersMarketplace;

class PlacementTargeting extends \Google\Model
{
  protected $mobileApplicationTargetingType = MobileApplicationTargeting::class;
  protected $mobileApplicationTargetingDataType = '';
  protected $uriTargetingType = UriTargeting::class;
  protected $uriTargetingDataType = '';

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
   * @param UriTargeting
   */
  public function setUriTargeting(UriTargeting $uriTargeting)
  {
    $this->uriTargeting = $uriTargeting;
  }
  /**
   * @return UriTargeting
   */
  public function getUriTargeting()
  {
    return $this->uriTargeting;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(PlacementTargeting::class, 'Google_Service_AuthorizedBuyersMarketplace_PlacementTargeting');

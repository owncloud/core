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

class Google_Service_ShoppingContent_OrderCustomerMarketingRightsInfo extends Google_Model
{
  public $explicitMarketingPreference;
  public $lastUpdatedTimestamp;
  public $marketingEmailAddress;

  public function setExplicitMarketingPreference($explicitMarketingPreference)
  {
    $this->explicitMarketingPreference = $explicitMarketingPreference;
  }
  public function getExplicitMarketingPreference()
  {
    return $this->explicitMarketingPreference;
  }
  public function setLastUpdatedTimestamp($lastUpdatedTimestamp)
  {
    $this->lastUpdatedTimestamp = $lastUpdatedTimestamp;
  }
  public function getLastUpdatedTimestamp()
  {
    return $this->lastUpdatedTimestamp;
  }
  public function setMarketingEmailAddress($marketingEmailAddress)
  {
    $this->marketingEmailAddress = $marketingEmailAddress;
  }
  public function getMarketingEmailAddress()
  {
    return $this->marketingEmailAddress;
  }
}

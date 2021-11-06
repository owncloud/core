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

namespace Google\Service\GoogleAnalyticsAdmin;

class GoogleAnalyticsAdminV1alphaGoogleAdsLink extends \Google\Model
{
  public $adsPersonalizationEnabled;
  public $canManageClients;
  public $createTime;
  public $creatorEmailAddress;
  public $customerId;
  public $name;
  public $updateTime;

  public function setAdsPersonalizationEnabled($adsPersonalizationEnabled)
  {
    $this->adsPersonalizationEnabled = $adsPersonalizationEnabled;
  }
  public function getAdsPersonalizationEnabled()
  {
    return $this->adsPersonalizationEnabled;
  }
  public function setCanManageClients($canManageClients)
  {
    $this->canManageClients = $canManageClients;
  }
  public function getCanManageClients()
  {
    return $this->canManageClients;
  }
  public function setCreateTime($createTime)
  {
    $this->createTime = $createTime;
  }
  public function getCreateTime()
  {
    return $this->createTime;
  }
  public function setCreatorEmailAddress($creatorEmailAddress)
  {
    $this->creatorEmailAddress = $creatorEmailAddress;
  }
  public function getCreatorEmailAddress()
  {
    return $this->creatorEmailAddress;
  }
  public function setCustomerId($customerId)
  {
    $this->customerId = $customerId;
  }
  public function getCustomerId()
  {
    return $this->customerId;
  }
  public function setName($name)
  {
    $this->name = $name;
  }
  public function getName()
  {
    return $this->name;
  }
  public function setUpdateTime($updateTime)
  {
    $this->updateTime = $updateTime;
  }
  public function getUpdateTime()
  {
    return $this->updateTime;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(GoogleAnalyticsAdminV1alphaGoogleAdsLink::class, 'Google_Service_GoogleAnalyticsAdmin_GoogleAnalyticsAdminV1alphaGoogleAdsLink');

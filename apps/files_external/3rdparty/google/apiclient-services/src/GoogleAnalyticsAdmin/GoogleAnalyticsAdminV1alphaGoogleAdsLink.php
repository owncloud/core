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
  /**
   * @var bool
   */
  public $adsPersonalizationEnabled;
  /**
   * @var bool
   */
  public $canManageClients;
  /**
   * @var string
   */
  public $createTime;
  /**
   * @var string
   */
  public $creatorEmailAddress;
  /**
   * @var string
   */
  public $customerId;
  /**
   * @var string
   */
  public $name;
  /**
   * @var string
   */
  public $updateTime;

  /**
   * @param bool
   */
  public function setAdsPersonalizationEnabled($adsPersonalizationEnabled)
  {
    $this->adsPersonalizationEnabled = $adsPersonalizationEnabled;
  }
  /**
   * @return bool
   */
  public function getAdsPersonalizationEnabled()
  {
    return $this->adsPersonalizationEnabled;
  }
  /**
   * @param bool
   */
  public function setCanManageClients($canManageClients)
  {
    $this->canManageClients = $canManageClients;
  }
  /**
   * @return bool
   */
  public function getCanManageClients()
  {
    return $this->canManageClients;
  }
  /**
   * @param string
   */
  public function setCreateTime($createTime)
  {
    $this->createTime = $createTime;
  }
  /**
   * @return string
   */
  public function getCreateTime()
  {
    return $this->createTime;
  }
  /**
   * @param string
   */
  public function setCreatorEmailAddress($creatorEmailAddress)
  {
    $this->creatorEmailAddress = $creatorEmailAddress;
  }
  /**
   * @return string
   */
  public function getCreatorEmailAddress()
  {
    return $this->creatorEmailAddress;
  }
  /**
   * @param string
   */
  public function setCustomerId($customerId)
  {
    $this->customerId = $customerId;
  }
  /**
   * @return string
   */
  public function getCustomerId()
  {
    return $this->customerId;
  }
  /**
   * @param string
   */
  public function setName($name)
  {
    $this->name = $name;
  }
  /**
   * @return string
   */
  public function getName()
  {
    return $this->name;
  }
  /**
   * @param string
   */
  public function setUpdateTime($updateTime)
  {
    $this->updateTime = $updateTime;
  }
  /**
   * @return string
   */
  public function getUpdateTime()
  {
    return $this->updateTime;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(GoogleAnalyticsAdminV1alphaGoogleAdsLink::class, 'Google_Service_GoogleAnalyticsAdmin_GoogleAnalyticsAdminV1alphaGoogleAdsLink');

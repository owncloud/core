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

namespace Google\Service\CloudSearch;

class AppsDynamiteFrontendBotInfo extends \Google\Collection
{
  protected $collection_key = 'supportedUses';
  protected $appIdType = AppsDynamiteAppId::class;
  protected $appIdDataType = '';
  /**
   * @var string
   */
  public $botAvatarUrl;
  /**
   * @var string
   */
  public $botName;
  /**
   * @var string
   */
  public $description;
  /**
   * @var string
   */
  public $developerName;
  /**
   * @var string
   */
  public $marketPlaceBannerUrl;
  /**
   * @var string
   */
  public $status;
  protected $supportUrlsType = AppsDynamiteFrontendBotInfoSupportUrls::class;
  protected $supportUrlsDataType = '';
  /**
   * @var string[]
   */
  public $supportedUses;
  /**
   * @var string
   */
  public $whitelistStatus;

  /**
   * @param AppsDynamiteAppId
   */
  public function setAppId(AppsDynamiteAppId $appId)
  {
    $this->appId = $appId;
  }
  /**
   * @return AppsDynamiteAppId
   */
  public function getAppId()
  {
    return $this->appId;
  }
  /**
   * @param string
   */
  public function setBotAvatarUrl($botAvatarUrl)
  {
    $this->botAvatarUrl = $botAvatarUrl;
  }
  /**
   * @return string
   */
  public function getBotAvatarUrl()
  {
    return $this->botAvatarUrl;
  }
  /**
   * @param string
   */
  public function setBotName($botName)
  {
    $this->botName = $botName;
  }
  /**
   * @return string
   */
  public function getBotName()
  {
    return $this->botName;
  }
  /**
   * @param string
   */
  public function setDescription($description)
  {
    $this->description = $description;
  }
  /**
   * @return string
   */
  public function getDescription()
  {
    return $this->description;
  }
  /**
   * @param string
   */
  public function setDeveloperName($developerName)
  {
    $this->developerName = $developerName;
  }
  /**
   * @return string
   */
  public function getDeveloperName()
  {
    return $this->developerName;
  }
  /**
   * @param string
   */
  public function setMarketPlaceBannerUrl($marketPlaceBannerUrl)
  {
    $this->marketPlaceBannerUrl = $marketPlaceBannerUrl;
  }
  /**
   * @return string
   */
  public function getMarketPlaceBannerUrl()
  {
    return $this->marketPlaceBannerUrl;
  }
  /**
   * @param string
   */
  public function setStatus($status)
  {
    $this->status = $status;
  }
  /**
   * @return string
   */
  public function getStatus()
  {
    return $this->status;
  }
  /**
   * @param AppsDynamiteFrontendBotInfoSupportUrls
   */
  public function setSupportUrls(AppsDynamiteFrontendBotInfoSupportUrls $supportUrls)
  {
    $this->supportUrls = $supportUrls;
  }
  /**
   * @return AppsDynamiteFrontendBotInfoSupportUrls
   */
  public function getSupportUrls()
  {
    return $this->supportUrls;
  }
  /**
   * @param string[]
   */
  public function setSupportedUses($supportedUses)
  {
    $this->supportedUses = $supportedUses;
  }
  /**
   * @return string[]
   */
  public function getSupportedUses()
  {
    return $this->supportedUses;
  }
  /**
   * @param string
   */
  public function setWhitelistStatus($whitelistStatus)
  {
    $this->whitelistStatus = $whitelistStatus;
  }
  /**
   * @return string
   */
  public function getWhitelistStatus()
  {
    return $this->whitelistStatus;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(AppsDynamiteFrontendBotInfo::class, 'Google_Service_CloudSearch_AppsDynamiteFrontendBotInfo');

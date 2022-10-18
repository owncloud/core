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

namespace Google\Service\Contentwarehouse;

class YoutubeBackstageSuperVodCommentInfo extends \Google\Model
{
  /**
   * @var string
   */
  public $currencyCode;
  /**
   * @var string
   */
  public $entitlementId;
  /**
   * @var string
   */
  public $priceInMicros;
  /**
   * @var string
   */
  public $superVodItemId;
  /**
   * @var string
   */
  public $version;

  /**
   * @param string
   */
  public function setCurrencyCode($currencyCode)
  {
    $this->currencyCode = $currencyCode;
  }
  /**
   * @return string
   */
  public function getCurrencyCode()
  {
    return $this->currencyCode;
  }
  /**
   * @param string
   */
  public function setEntitlementId($entitlementId)
  {
    $this->entitlementId = $entitlementId;
  }
  /**
   * @return string
   */
  public function getEntitlementId()
  {
    return $this->entitlementId;
  }
  /**
   * @param string
   */
  public function setPriceInMicros($priceInMicros)
  {
    $this->priceInMicros = $priceInMicros;
  }
  /**
   * @return string
   */
  public function getPriceInMicros()
  {
    return $this->priceInMicros;
  }
  /**
   * @param string
   */
  public function setSuperVodItemId($superVodItemId)
  {
    $this->superVodItemId = $superVodItemId;
  }
  /**
   * @return string
   */
  public function getSuperVodItemId()
  {
    return $this->superVodItemId;
  }
  /**
   * @param string
   */
  public function setVersion($version)
  {
    $this->version = $version;
  }
  /**
   * @return string
   */
  public function getVersion()
  {
    return $this->version;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(YoutubeBackstageSuperVodCommentInfo::class, 'Google_Service_Contentwarehouse_YoutubeBackstageSuperVodCommentInfo');

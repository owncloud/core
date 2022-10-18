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

class IndexingDupsComputedLocalizedAlternateNamesLocaleEntry extends \Google\Model
{
  /**
   * @var string
   */
  public $clusterId;
  /**
   * @var string
   */
  public $deviceMatchInfo;
  /**
   * @var string
   */
  public $language;
  /**
   * @var string
   */
  public $url;
  /**
   * @var int
   */
  public $urlEncoding;
  /**
   * @var int
   */
  public $urlRegionCode;

  /**
   * @param string
   */
  public function setClusterId($clusterId)
  {
    $this->clusterId = $clusterId;
  }
  /**
   * @return string
   */
  public function getClusterId()
  {
    return $this->clusterId;
  }
  /**
   * @param string
   */
  public function setDeviceMatchInfo($deviceMatchInfo)
  {
    $this->deviceMatchInfo = $deviceMatchInfo;
  }
  /**
   * @return string
   */
  public function getDeviceMatchInfo()
  {
    return $this->deviceMatchInfo;
  }
  /**
   * @param string
   */
  public function setLanguage($language)
  {
    $this->language = $language;
  }
  /**
   * @return string
   */
  public function getLanguage()
  {
    return $this->language;
  }
  /**
   * @param string
   */
  public function setUrl($url)
  {
    $this->url = $url;
  }
  /**
   * @return string
   */
  public function getUrl()
  {
    return $this->url;
  }
  /**
   * @param int
   */
  public function setUrlEncoding($urlEncoding)
  {
    $this->urlEncoding = $urlEncoding;
  }
  /**
   * @return int
   */
  public function getUrlEncoding()
  {
    return $this->urlEncoding;
  }
  /**
   * @param int
   */
  public function setUrlRegionCode($urlRegionCode)
  {
    $this->urlRegionCode = $urlRegionCode;
  }
  /**
   * @return int
   */
  public function getUrlRegionCode()
  {
    return $this->urlRegionCode;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(IndexingDupsComputedLocalizedAlternateNamesLocaleEntry::class, 'Google_Service_Contentwarehouse_IndexingDupsComputedLocalizedAlternateNamesLocaleEntry');

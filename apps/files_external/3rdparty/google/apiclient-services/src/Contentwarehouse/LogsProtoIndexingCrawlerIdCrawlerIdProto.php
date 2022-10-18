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

class LogsProtoIndexingCrawlerIdCrawlerIdProto extends \Google\Model
{
  /**
   * @var string
   */
  public $country;
  /**
   * @var string
   */
  public $deviceType;
  /**
   * @var string
   */
  public $indexGrowthExptType;
  /**
   * @var string
   */
  public $language;
  /**
   * @var string
   */
  public $languageCode;

  /**
   * @param string
   */
  public function setCountry($country)
  {
    $this->country = $country;
  }
  /**
   * @return string
   */
  public function getCountry()
  {
    return $this->country;
  }
  /**
   * @param string
   */
  public function setDeviceType($deviceType)
  {
    $this->deviceType = $deviceType;
  }
  /**
   * @return string
   */
  public function getDeviceType()
  {
    return $this->deviceType;
  }
  /**
   * @param string
   */
  public function setIndexGrowthExptType($indexGrowthExptType)
  {
    $this->indexGrowthExptType = $indexGrowthExptType;
  }
  /**
   * @return string
   */
  public function getIndexGrowthExptType()
  {
    return $this->indexGrowthExptType;
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
  public function setLanguageCode($languageCode)
  {
    $this->languageCode = $languageCode;
  }
  /**
   * @return string
   */
  public function getLanguageCode()
  {
    return $this->languageCode;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(LogsProtoIndexingCrawlerIdCrawlerIdProto::class, 'Google_Service_Contentwarehouse_LogsProtoIndexingCrawlerIdCrawlerIdProto');

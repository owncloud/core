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

class GeostorePriceListProto extends \Google\Collection
{
  protected $collection_key = 'section';
  protected $availableTimeType = GeostoreTimeScheduleProto::class;
  protected $availableTimeDataType = '';
  /**
   * @var string[]
   */
  public $cuisines;
  protected $nameInfoType = GeostorePriceListNameInfoProto::class;
  protected $nameInfoDataType = 'array';
  protected $sectionType = GeostorePriceListSectionProto::class;
  protected $sectionDataType = 'array';
  protected $sourceUrlType = GeostoreUrlListProto::class;
  protected $sourceUrlDataType = '';

  /**
   * @param GeostoreTimeScheduleProto
   */
  public function setAvailableTime(GeostoreTimeScheduleProto $availableTime)
  {
    $this->availableTime = $availableTime;
  }
  /**
   * @return GeostoreTimeScheduleProto
   */
  public function getAvailableTime()
  {
    return $this->availableTime;
  }
  /**
   * @param string[]
   */
  public function setCuisines($cuisines)
  {
    $this->cuisines = $cuisines;
  }
  /**
   * @return string[]
   */
  public function getCuisines()
  {
    return $this->cuisines;
  }
  /**
   * @param GeostorePriceListNameInfoProto[]
   */
  public function setNameInfo($nameInfo)
  {
    $this->nameInfo = $nameInfo;
  }
  /**
   * @return GeostorePriceListNameInfoProto[]
   */
  public function getNameInfo()
  {
    return $this->nameInfo;
  }
  /**
   * @param GeostorePriceListSectionProto[]
   */
  public function setSection($section)
  {
    $this->section = $section;
  }
  /**
   * @return GeostorePriceListSectionProto[]
   */
  public function getSection()
  {
    return $this->section;
  }
  /**
   * @param GeostoreUrlListProto
   */
  public function setSourceUrl(GeostoreUrlListProto $sourceUrl)
  {
    $this->sourceUrl = $sourceUrl;
  }
  /**
   * @return GeostoreUrlListProto
   */
  public function getSourceUrl()
  {
    return $this->sourceUrl;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(GeostorePriceListProto::class, 'Google_Service_Contentwarehouse_GeostorePriceListProto');

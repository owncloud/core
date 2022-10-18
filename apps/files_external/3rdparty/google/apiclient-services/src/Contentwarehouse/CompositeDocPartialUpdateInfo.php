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

class CompositeDocPartialUpdateInfo extends \Google\Collection
{
  protected $collection_key = 'signalNames';
  /**
   * @var string[]
   */
  public $goldmineAnnotatorNames;
  /**
   * @var string[]
   */
  public $imagesSignalNames;
  protected $lastFullIndexingInfoType = CompositeDocPartialUpdateInfoLastFullIndexingInfo::class;
  protected $lastFullIndexingInfoDataType = 'array';
  /**
   * @var int
   */
  public $shouldLookupDocjoinsTier;
  /**
   * @var string[]
   */
  public $signalNames;

  /**
   * @param string[]
   */
  public function setGoldmineAnnotatorNames($goldmineAnnotatorNames)
  {
    $this->goldmineAnnotatorNames = $goldmineAnnotatorNames;
  }
  /**
   * @return string[]
   */
  public function getGoldmineAnnotatorNames()
  {
    return $this->goldmineAnnotatorNames;
  }
  /**
   * @param string[]
   */
  public function setImagesSignalNames($imagesSignalNames)
  {
    $this->imagesSignalNames = $imagesSignalNames;
  }
  /**
   * @return string[]
   */
  public function getImagesSignalNames()
  {
    return $this->imagesSignalNames;
  }
  /**
   * @param CompositeDocPartialUpdateInfoLastFullIndexingInfo[]
   */
  public function setLastFullIndexingInfo($lastFullIndexingInfo)
  {
    $this->lastFullIndexingInfo = $lastFullIndexingInfo;
  }
  /**
   * @return CompositeDocPartialUpdateInfoLastFullIndexingInfo[]
   */
  public function getLastFullIndexingInfo()
  {
    return $this->lastFullIndexingInfo;
  }
  /**
   * @param int
   */
  public function setShouldLookupDocjoinsTier($shouldLookupDocjoinsTier)
  {
    $this->shouldLookupDocjoinsTier = $shouldLookupDocjoinsTier;
  }
  /**
   * @return int
   */
  public function getShouldLookupDocjoinsTier()
  {
    return $this->shouldLookupDocjoinsTier;
  }
  /**
   * @param string[]
   */
  public function setSignalNames($signalNames)
  {
    $this->signalNames = $signalNames;
  }
  /**
   * @return string[]
   */
  public function getSignalNames()
  {
    return $this->signalNames;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(CompositeDocPartialUpdateInfo::class, 'Google_Service_Contentwarehouse_CompositeDocPartialUpdateInfo');

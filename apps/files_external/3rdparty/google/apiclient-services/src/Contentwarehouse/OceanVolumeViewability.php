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

class OceanVolumeViewability extends \Google\Collection
{
  protected $collection_key = 'locale';
  protected $internal_gapi_mappings = [
        "dEPRECATEDDefaultViewType" => "DEPRECATEDDefaultViewType",
  ];
  /**
   * @var int
   */
  public $dEPRECATEDDefaultViewType;
  protected $defaultViewabilityType = OceanLocaleViewability::class;
  protected $defaultViewabilityDataType = '';
  /**
   * @var bool
   */
  public $inViewabilityLimbo;
  protected $localeType = OceanVolumeViewabilityLocale::class;
  protected $localeDataType = 'array';
  /**
   * @var bool
   */
  public $updatedByIndexer;

  /**
   * @param int
   */
  public function setDEPRECATEDDefaultViewType($dEPRECATEDDefaultViewType)
  {
    $this->dEPRECATEDDefaultViewType = $dEPRECATEDDefaultViewType;
  }
  /**
   * @return int
   */
  public function getDEPRECATEDDefaultViewType()
  {
    return $this->dEPRECATEDDefaultViewType;
  }
  /**
   * @param OceanLocaleViewability
   */
  public function setDefaultViewability(OceanLocaleViewability $defaultViewability)
  {
    $this->defaultViewability = $defaultViewability;
  }
  /**
   * @return OceanLocaleViewability
   */
  public function getDefaultViewability()
  {
    return $this->defaultViewability;
  }
  /**
   * @param bool
   */
  public function setInViewabilityLimbo($inViewabilityLimbo)
  {
    $this->inViewabilityLimbo = $inViewabilityLimbo;
  }
  /**
   * @return bool
   */
  public function getInViewabilityLimbo()
  {
    return $this->inViewabilityLimbo;
  }
  /**
   * @param OceanVolumeViewabilityLocale[]
   */
  public function setLocale($locale)
  {
    $this->locale = $locale;
  }
  /**
   * @return OceanVolumeViewabilityLocale[]
   */
  public function getLocale()
  {
    return $this->locale;
  }
  /**
   * @param bool
   */
  public function setUpdatedByIndexer($updatedByIndexer)
  {
    $this->updatedByIndexer = $updatedByIndexer;
  }
  /**
   * @return bool
   */
  public function getUpdatedByIndexer()
  {
    return $this->updatedByIndexer;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(OceanVolumeViewability::class, 'Google_Service_Contentwarehouse_OceanVolumeViewability');

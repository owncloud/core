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

class OceanVolumeViewabilityLocale extends \Google\Model
{
  protected $internal_gapi_mappings = [
        "dEPRECATEDViewType" => "DEPRECATEDViewType",
  ];
  /**
   * @var int
   */
  public $dEPRECATEDViewType;
  /**
   * @var string
   */
  public $locale;
  protected $viewabilityType = OceanLocaleViewability::class;
  protected $viewabilityDataType = '';

  /**
   * @param int
   */
  public function setDEPRECATEDViewType($dEPRECATEDViewType)
  {
    $this->dEPRECATEDViewType = $dEPRECATEDViewType;
  }
  /**
   * @return int
   */
  public function getDEPRECATEDViewType()
  {
    return $this->dEPRECATEDViewType;
  }
  /**
   * @param string
   */
  public function setLocale($locale)
  {
    $this->locale = $locale;
  }
  /**
   * @return string
   */
  public function getLocale()
  {
    return $this->locale;
  }
  /**
   * @param OceanLocaleViewability
   */
  public function setViewability(OceanLocaleViewability $viewability)
  {
    $this->viewability = $viewability;
  }
  /**
   * @return OceanLocaleViewability
   */
  public function getViewability()
  {
    return $this->viewability;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(OceanVolumeViewabilityLocale::class, 'Google_Service_Contentwarehouse_OceanVolumeViewabilityLocale');

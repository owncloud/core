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

class Google_Service_MyBusinessLodging_GuestUnitType extends Google_Collection
{
  protected $collection_key = 'codes';
  public $codes;
  protected $featuresType = 'Google_Service_MyBusinessLodging_GuestUnitFeatures';
  protected $featuresDataType = '';
  public $label;

  public function setCodes($codes)
  {
    $this->codes = $codes;
  }
  public function getCodes()
  {
    return $this->codes;
  }
  /**
   * @param Google_Service_MyBusinessLodging_GuestUnitFeatures
   */
  public function setFeatures(Google_Service_MyBusinessLodging_GuestUnitFeatures $features)
  {
    $this->features = $features;
  }
  /**
   * @return Google_Service_MyBusinessLodging_GuestUnitFeatures
   */
  public function getFeatures()
  {
    return $this->features;
  }
  public function setLabel($label)
  {
    $this->label = $label;
  }
  public function getLabel()
  {
    return $this->label;
  }
}

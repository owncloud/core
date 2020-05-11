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

class Google_Service_CloudSearch_ObjectOptions extends Google_Model
{
  protected $displayOptionsType = 'Google_Service_CloudSearch_ObjectDisplayOptions';
  protected $displayOptionsDataType = '';
  protected $freshnessOptionsType = 'Google_Service_CloudSearch_FreshnessOptions';
  protected $freshnessOptionsDataType = '';

  /**
   * @param Google_Service_CloudSearch_ObjectDisplayOptions
   */
  public function setDisplayOptions(Google_Service_CloudSearch_ObjectDisplayOptions $displayOptions)
  {
    $this->displayOptions = $displayOptions;
  }
  /**
   * @return Google_Service_CloudSearch_ObjectDisplayOptions
   */
  public function getDisplayOptions()
  {
    return $this->displayOptions;
  }
  /**
   * @param Google_Service_CloudSearch_FreshnessOptions
   */
  public function setFreshnessOptions(Google_Service_CloudSearch_FreshnessOptions $freshnessOptions)
  {
    $this->freshnessOptions = $freshnessOptions;
  }
  /**
   * @return Google_Service_CloudSearch_FreshnessOptions
   */
  public function getFreshnessOptions()
  {
    return $this->freshnessOptions;
  }
}

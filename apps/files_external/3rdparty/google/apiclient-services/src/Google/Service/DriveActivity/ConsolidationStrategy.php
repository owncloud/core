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

class Google_Service_DriveActivity_ConsolidationStrategy extends Google_Model
{
  protected $legacyType = 'Google_Service_DriveActivity_Legacy';
  protected $legacyDataType = '';
  protected $noneType = 'Google_Service_DriveActivity_NoConsolidation';
  protected $noneDataType = '';

  /**
   * @param Google_Service_DriveActivity_Legacy
   */
  public function setLegacy(Google_Service_DriveActivity_Legacy $legacy)
  {
    $this->legacy = $legacy;
  }
  /**
   * @return Google_Service_DriveActivity_Legacy
   */
  public function getLegacy()
  {
    return $this->legacy;
  }
  /**
   * @param Google_Service_DriveActivity_NoConsolidation
   */
  public function setNone(Google_Service_DriveActivity_NoConsolidation $none)
  {
    $this->none = $none;
  }
  /**
   * @return Google_Service_DriveActivity_NoConsolidation
   */
  public function getNone()
  {
    return $this->none;
  }
}

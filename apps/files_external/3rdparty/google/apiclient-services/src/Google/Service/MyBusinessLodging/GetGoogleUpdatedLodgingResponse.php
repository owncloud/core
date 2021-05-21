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

class Google_Service_MyBusinessLodging_GetGoogleUpdatedLodgingResponse extends Google_Model
{
  public $diffMask;
  protected $lodgingType = 'Google_Service_MyBusinessLodging_Lodging';
  protected $lodgingDataType = '';

  public function setDiffMask($diffMask)
  {
    $this->diffMask = $diffMask;
  }
  public function getDiffMask()
  {
    return $this->diffMask;
  }
  /**
   * @param Google_Service_MyBusinessLodging_Lodging
   */
  public function setLodging(Google_Service_MyBusinessLodging_Lodging $lodging)
  {
    $this->lodging = $lodging;
  }
  /**
   * @return Google_Service_MyBusinessLodging_Lodging
   */
  public function getLodging()
  {
    return $this->lodging;
  }
}

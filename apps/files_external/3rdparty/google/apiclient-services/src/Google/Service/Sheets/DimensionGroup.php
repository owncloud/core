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

class Google_Service_Sheets_DimensionGroup extends Google_Model
{
  public $collapsed;
  public $depth;
  protected $rangeType = 'Google_Service_Sheets_DimensionRange';
  protected $rangeDataType = '';

  public function setCollapsed($collapsed)
  {
    $this->collapsed = $collapsed;
  }
  public function getCollapsed()
  {
    return $this->collapsed;
  }
  public function setDepth($depth)
  {
    $this->depth = $depth;
  }
  public function getDepth()
  {
    return $this->depth;
  }
  /**
   * @param Google_Service_Sheets_DimensionRange
   */
  public function setRange(Google_Service_Sheets_DimensionRange $range)
  {
    $this->range = $range;
  }
  /**
   * @return Google_Service_Sheets_DimensionRange
   */
  public function getRange()
  {
    return $this->range;
  }
}

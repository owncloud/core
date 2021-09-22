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

namespace Google\Service\Sheets;

class BandedRange extends \Google\Model
{
  public $bandedRangeId;
  protected $columnPropertiesType = BandingProperties::class;
  protected $columnPropertiesDataType = '';
  protected $rangeType = GridRange::class;
  protected $rangeDataType = '';
  protected $rowPropertiesType = BandingProperties::class;
  protected $rowPropertiesDataType = '';

  public function setBandedRangeId($bandedRangeId)
  {
    $this->bandedRangeId = $bandedRangeId;
  }
  public function getBandedRangeId()
  {
    return $this->bandedRangeId;
  }
  /**
   * @param BandingProperties
   */
  public function setColumnProperties(BandingProperties $columnProperties)
  {
    $this->columnProperties = $columnProperties;
  }
  /**
   * @return BandingProperties
   */
  public function getColumnProperties()
  {
    return $this->columnProperties;
  }
  /**
   * @param GridRange
   */
  public function setRange(GridRange $range)
  {
    $this->range = $range;
  }
  /**
   * @return GridRange
   */
  public function getRange()
  {
    return $this->range;
  }
  /**
   * @param BandingProperties
   */
  public function setRowProperties(BandingProperties $rowProperties)
  {
    $this->rowProperties = $rowProperties;
  }
  /**
   * @return BandingProperties
   */
  public function getRowProperties()
  {
    return $this->rowProperties;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(BandedRange::class, 'Google_Service_Sheets_BandedRange');

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

class DataFilter extends \Google\Model
{
  /**
   * @var string
   */
  public $a1Range;
  protected $developerMetadataLookupType = DeveloperMetadataLookup::class;
  protected $developerMetadataLookupDataType = '';
  protected $gridRangeType = GridRange::class;
  protected $gridRangeDataType = '';

  /**
   * @param string
   */
  public function setA1Range($a1Range)
  {
    $this->a1Range = $a1Range;
  }
  /**
   * @return string
   */
  public function getA1Range()
  {
    return $this->a1Range;
  }
  /**
   * @param DeveloperMetadataLookup
   */
  public function setDeveloperMetadataLookup(DeveloperMetadataLookup $developerMetadataLookup)
  {
    $this->developerMetadataLookup = $developerMetadataLookup;
  }
  /**
   * @return DeveloperMetadataLookup
   */
  public function getDeveloperMetadataLookup()
  {
    return $this->developerMetadataLookup;
  }
  /**
   * @param GridRange
   */
  public function setGridRange(GridRange $gridRange)
  {
    $this->gridRange = $gridRange;
  }
  /**
   * @return GridRange
   */
  public function getGridRange()
  {
    return $this->gridRange;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(DataFilter::class, 'Google_Service_Sheets_DataFilter');

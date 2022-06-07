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

namespace Google\Service\Docs;

class PinTableHeaderRowsRequest extends \Google\Model
{
  /**
   * @var int
   */
  public $pinnedHeaderRowsCount;
  protected $tableStartLocationType = Location::class;
  protected $tableStartLocationDataType = '';

  /**
   * @param int
   */
  public function setPinnedHeaderRowsCount($pinnedHeaderRowsCount)
  {
    $this->pinnedHeaderRowsCount = $pinnedHeaderRowsCount;
  }
  /**
   * @return int
   */
  public function getPinnedHeaderRowsCount()
  {
    return $this->pinnedHeaderRowsCount;
  }
  /**
   * @param Location
   */
  public function setTableStartLocation(Location $tableStartLocation)
  {
    $this->tableStartLocation = $tableStartLocation;
  }
  /**
   * @return Location
   */
  public function getTableStartLocation()
  {
    return $this->tableStartLocation;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(PinTableHeaderRowsRequest::class, 'Google_Service_Docs_PinTableHeaderRowsRequest');

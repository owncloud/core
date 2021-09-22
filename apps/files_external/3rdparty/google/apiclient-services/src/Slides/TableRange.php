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

namespace Google\Service\Slides;

class TableRange extends \Google\Model
{
  public $columnSpan;
  protected $locationType = TableCellLocation::class;
  protected $locationDataType = '';
  public $rowSpan;

  public function setColumnSpan($columnSpan)
  {
    $this->columnSpan = $columnSpan;
  }
  public function getColumnSpan()
  {
    return $this->columnSpan;
  }
  /**
   * @param TableCellLocation
   */
  public function setLocation(TableCellLocation $location)
  {
    $this->location = $location;
  }
  /**
   * @return TableCellLocation
   */
  public function getLocation()
  {
    return $this->location;
  }
  public function setRowSpan($rowSpan)
  {
    $this->rowSpan = $rowSpan;
  }
  public function getRowSpan()
  {
    return $this->rowSpan;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(TableRange::class, 'Google_Service_Slides_TableRange');

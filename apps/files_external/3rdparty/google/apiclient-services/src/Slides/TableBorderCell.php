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

class TableBorderCell extends \Google\Model
{
  protected $locationType = TableCellLocation::class;
  protected $locationDataType = '';
  protected $tableBorderPropertiesType = TableBorderProperties::class;
  protected $tableBorderPropertiesDataType = '';

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
  /**
   * @param TableBorderProperties
   */
  public function setTableBorderProperties(TableBorderProperties $tableBorderProperties)
  {
    $this->tableBorderProperties = $tableBorderProperties;
  }
  /**
   * @return TableBorderProperties
   */
  public function getTableBorderProperties()
  {
    return $this->tableBorderProperties;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(TableBorderCell::class, 'Google_Service_Slides_TableBorderCell');

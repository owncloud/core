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

class Google_Service_Docs_UpdateTableRowStyleRequest extends Google_Collection
{
  protected $collection_key = 'rowIndices';
  public $fields;
  public $rowIndices;
  protected $tableRowStyleType = 'Google_Service_Docs_TableRowStyle';
  protected $tableRowStyleDataType = '';
  protected $tableStartLocationType = 'Google_Service_Docs_Location';
  protected $tableStartLocationDataType = '';

  public function setFields($fields)
  {
    $this->fields = $fields;
  }
  public function getFields()
  {
    return $this->fields;
  }
  public function setRowIndices($rowIndices)
  {
    $this->rowIndices = $rowIndices;
  }
  public function getRowIndices()
  {
    return $this->rowIndices;
  }
  /**
   * @param Google_Service_Docs_TableRowStyle
   */
  public function setTableRowStyle(Google_Service_Docs_TableRowStyle $tableRowStyle)
  {
    $this->tableRowStyle = $tableRowStyle;
  }
  /**
   * @return Google_Service_Docs_TableRowStyle
   */
  public function getTableRowStyle()
  {
    return $this->tableRowStyle;
  }
  /**
   * @param Google_Service_Docs_Location
   */
  public function setTableStartLocation(Google_Service_Docs_Location $tableStartLocation)
  {
    $this->tableStartLocation = $tableStartLocation;
  }
  /**
   * @return Google_Service_Docs_Location
   */
  public function getTableStartLocation()
  {
    return $this->tableStartLocation;
  }
}

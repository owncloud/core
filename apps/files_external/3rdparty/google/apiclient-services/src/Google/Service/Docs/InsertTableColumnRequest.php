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

class Google_Service_Docs_InsertTableColumnRequest extends Google_Model
{
  public $insertRight;
  protected $tableCellLocationType = 'Google_Service_Docs_TableCellLocation';
  protected $tableCellLocationDataType = '';

  public function setInsertRight($insertRight)
  {
    $this->insertRight = $insertRight;
  }
  public function getInsertRight()
  {
    return $this->insertRight;
  }
  /**
   * @param Google_Service_Docs_TableCellLocation
   */
  public function setTableCellLocation(Google_Service_Docs_TableCellLocation $tableCellLocation)
  {
    $this->tableCellLocation = $tableCellLocation;
  }
  /**
   * @return Google_Service_Docs_TableCellLocation
   */
  public function getTableCellLocation()
  {
    return $this->tableCellLocation;
  }
}

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

class TableCellLocation extends \Google\Model
{
  /**
   * @var int
   */
  public $columnIndex;
  /**
   * @var int
   */
  public $rowIndex;

  /**
   * @param int
   */
  public function setColumnIndex($columnIndex)
  {
    $this->columnIndex = $columnIndex;
  }
  /**
   * @return int
   */
  public function getColumnIndex()
  {
    return $this->columnIndex;
  }
  /**
   * @param int
   */
  public function setRowIndex($rowIndex)
  {
    $this->rowIndex = $rowIndex;
  }
  /**
   * @return int
   */
  public function getRowIndex()
  {
    return $this->rowIndex;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(TableCellLocation::class, 'Google_Service_Slides_TableCellLocation');

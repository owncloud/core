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

namespace Google\Service\Contentwarehouse;

class GoodocSemanticLabelTableCellDetails extends \Google\Model
{
  protected $internal_gapi_mappings = [
        "column" => "Column",
        "columnSpan" => "ColumnSpan",
        "row" => "Row",
        "rowSpan" => "RowSpan",
  ];
  /**
   * @var int
   */
  public $column;
  /**
   * @var int
   */
  public $columnSpan;
  /**
   * @var int
   */
  public $row;
  /**
   * @var int
   */
  public $rowSpan;

  /**
   * @param int
   */
  public function setColumn($column)
  {
    $this->column = $column;
  }
  /**
   * @return int
   */
  public function getColumn()
  {
    return $this->column;
  }
  /**
   * @param int
   */
  public function setColumnSpan($columnSpan)
  {
    $this->columnSpan = $columnSpan;
  }
  /**
   * @return int
   */
  public function getColumnSpan()
  {
    return $this->columnSpan;
  }
  /**
   * @param int
   */
  public function setRow($row)
  {
    $this->row = $row;
  }
  /**
   * @return int
   */
  public function getRow()
  {
    return $this->row;
  }
  /**
   * @param int
   */
  public function setRowSpan($rowSpan)
  {
    $this->rowSpan = $rowSpan;
  }
  /**
   * @return int
   */
  public function getRowSpan()
  {
    return $this->rowSpan;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(GoodocSemanticLabelTableCellDetails::class, 'Google_Service_Contentwarehouse_GoodocSemanticLabelTableCellDetails');

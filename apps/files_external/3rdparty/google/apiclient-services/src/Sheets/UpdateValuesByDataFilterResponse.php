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

class UpdateValuesByDataFilterResponse extends \Google\Model
{
  protected $dataFilterType = DataFilter::class;
  protected $dataFilterDataType = '';
  public $updatedCells;
  public $updatedColumns;
  protected $updatedDataType = ValueRange::class;
  protected $updatedDataDataType = '';
  public $updatedRange;
  public $updatedRows;

  /**
   * @param DataFilter
   */
  public function setDataFilter(DataFilter $dataFilter)
  {
    $this->dataFilter = $dataFilter;
  }
  /**
   * @return DataFilter
   */
  public function getDataFilter()
  {
    return $this->dataFilter;
  }
  public function setUpdatedCells($updatedCells)
  {
    $this->updatedCells = $updatedCells;
  }
  public function getUpdatedCells()
  {
    return $this->updatedCells;
  }
  public function setUpdatedColumns($updatedColumns)
  {
    $this->updatedColumns = $updatedColumns;
  }
  public function getUpdatedColumns()
  {
    return $this->updatedColumns;
  }
  /**
   * @param ValueRange
   */
  public function setUpdatedData(ValueRange $updatedData)
  {
    $this->updatedData = $updatedData;
  }
  /**
   * @return ValueRange
   */
  public function getUpdatedData()
  {
    return $this->updatedData;
  }
  public function setUpdatedRange($updatedRange)
  {
    $this->updatedRange = $updatedRange;
  }
  public function getUpdatedRange()
  {
    return $this->updatedRange;
  }
  public function setUpdatedRows($updatedRows)
  {
    $this->updatedRows = $updatedRows;
  }
  public function getUpdatedRows()
  {
    return $this->updatedRows;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(UpdateValuesByDataFilterResponse::class, 'Google_Service_Sheets_UpdateValuesByDataFilterResponse');

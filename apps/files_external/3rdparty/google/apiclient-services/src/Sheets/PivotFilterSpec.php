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

class PivotFilterSpec extends \Google\Model
{
  public $columnOffsetIndex;
  protected $dataSourceColumnReferenceType = DataSourceColumnReference::class;
  protected $dataSourceColumnReferenceDataType = '';
  protected $filterCriteriaType = PivotFilterCriteria::class;
  protected $filterCriteriaDataType = '';

  public function setColumnOffsetIndex($columnOffsetIndex)
  {
    $this->columnOffsetIndex = $columnOffsetIndex;
  }
  public function getColumnOffsetIndex()
  {
    return $this->columnOffsetIndex;
  }
  /**
   * @param DataSourceColumnReference
   */
  public function setDataSourceColumnReference(DataSourceColumnReference $dataSourceColumnReference)
  {
    $this->dataSourceColumnReference = $dataSourceColumnReference;
  }
  /**
   * @return DataSourceColumnReference
   */
  public function getDataSourceColumnReference()
  {
    return $this->dataSourceColumnReference;
  }
  /**
   * @param PivotFilterCriteria
   */
  public function setFilterCriteria(PivotFilterCriteria $filterCriteria)
  {
    $this->filterCriteria = $filterCriteria;
  }
  /**
   * @return PivotFilterCriteria
   */
  public function getFilterCriteria()
  {
    return $this->filterCriteria;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(PivotFilterSpec::class, 'Google_Service_Sheets_PivotFilterSpec');

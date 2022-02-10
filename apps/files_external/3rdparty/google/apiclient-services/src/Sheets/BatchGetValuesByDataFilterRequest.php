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

class BatchGetValuesByDataFilterRequest extends \Google\Collection
{
  protected $collection_key = 'dataFilters';
  protected $dataFiltersType = DataFilter::class;
  protected $dataFiltersDataType = 'array';
  /**
   * @var string
   */
  public $dateTimeRenderOption;
  /**
   * @var string
   */
  public $majorDimension;
  /**
   * @var string
   */
  public $valueRenderOption;

  /**
   * @param DataFilter[]
   */
  public function setDataFilters($dataFilters)
  {
    $this->dataFilters = $dataFilters;
  }
  /**
   * @return DataFilter[]
   */
  public function getDataFilters()
  {
    return $this->dataFilters;
  }
  /**
   * @param string
   */
  public function setDateTimeRenderOption($dateTimeRenderOption)
  {
    $this->dateTimeRenderOption = $dateTimeRenderOption;
  }
  /**
   * @return string
   */
  public function getDateTimeRenderOption()
  {
    return $this->dateTimeRenderOption;
  }
  /**
   * @param string
   */
  public function setMajorDimension($majorDimension)
  {
    $this->majorDimension = $majorDimension;
  }
  /**
   * @return string
   */
  public function getMajorDimension()
  {
    return $this->majorDimension;
  }
  /**
   * @param string
   */
  public function setValueRenderOption($valueRenderOption)
  {
    $this->valueRenderOption = $valueRenderOption;
  }
  /**
   * @return string
   */
  public function getValueRenderOption()
  {
    return $this->valueRenderOption;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(BatchGetValuesByDataFilterRequest::class, 'Google_Service_Sheets_BatchGetValuesByDataFilterRequest');

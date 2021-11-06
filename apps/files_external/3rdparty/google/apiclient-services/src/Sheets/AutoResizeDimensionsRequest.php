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

class AutoResizeDimensionsRequest extends \Google\Model
{
  protected $dataSourceSheetDimensionsType = DataSourceSheetDimensionRange::class;
  protected $dataSourceSheetDimensionsDataType = '';
  protected $dimensionsType = DimensionRange::class;
  protected $dimensionsDataType = '';

  /**
   * @param DataSourceSheetDimensionRange
   */
  public function setDataSourceSheetDimensions(DataSourceSheetDimensionRange $dataSourceSheetDimensions)
  {
    $this->dataSourceSheetDimensions = $dataSourceSheetDimensions;
  }
  /**
   * @return DataSourceSheetDimensionRange
   */
  public function getDataSourceSheetDimensions()
  {
    return $this->dataSourceSheetDimensions;
  }
  /**
   * @param DimensionRange
   */
  public function setDimensions(DimensionRange $dimensions)
  {
    $this->dimensions = $dimensions;
  }
  /**
   * @return DimensionRange
   */
  public function getDimensions()
  {
    return $this->dimensions;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(AutoResizeDimensionsRequest::class, 'Google_Service_Sheets_AutoResizeDimensionsRequest');

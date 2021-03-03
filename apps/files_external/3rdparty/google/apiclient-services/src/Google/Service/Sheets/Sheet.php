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

class Google_Service_Sheets_Sheet extends Google_Collection
{
  protected $collection_key = 'slicers';
  protected $bandedRangesType = 'Google_Service_Sheets_BandedRange';
  protected $bandedRangesDataType = 'array';
  protected $basicFilterType = 'Google_Service_Sheets_BasicFilter';
  protected $basicFilterDataType = '';
  protected $chartsType = 'Google_Service_Sheets_EmbeddedChart';
  protected $chartsDataType = 'array';
  protected $columnGroupsType = 'Google_Service_Sheets_DimensionGroup';
  protected $columnGroupsDataType = 'array';
  protected $conditionalFormatsType = 'Google_Service_Sheets_ConditionalFormatRule';
  protected $conditionalFormatsDataType = 'array';
  protected $dataType = 'Google_Service_Sheets_GridData';
  protected $dataDataType = 'array';
  protected $developerMetadataType = 'Google_Service_Sheets_DeveloperMetadata';
  protected $developerMetadataDataType = 'array';
  protected $filterViewsType = 'Google_Service_Sheets_FilterView';
  protected $filterViewsDataType = 'array';
  protected $mergesType = 'Google_Service_Sheets_GridRange';
  protected $mergesDataType = 'array';
  protected $propertiesType = 'Google_Service_Sheets_SheetProperties';
  protected $propertiesDataType = '';
  protected $protectedRangesType = 'Google_Service_Sheets_ProtectedRange';
  protected $protectedRangesDataType = 'array';
  protected $rowGroupsType = 'Google_Service_Sheets_DimensionGroup';
  protected $rowGroupsDataType = 'array';
  protected $slicersType = 'Google_Service_Sheets_Slicer';
  protected $slicersDataType = 'array';

  /**
   * @param Google_Service_Sheets_BandedRange[]
   */
  public function setBandedRanges($bandedRanges)
  {
    $this->bandedRanges = $bandedRanges;
  }
  /**
   * @return Google_Service_Sheets_BandedRange[]
   */
  public function getBandedRanges()
  {
    return $this->bandedRanges;
  }
  /**
   * @param Google_Service_Sheets_BasicFilter
   */
  public function setBasicFilter(Google_Service_Sheets_BasicFilter $basicFilter)
  {
    $this->basicFilter = $basicFilter;
  }
  /**
   * @return Google_Service_Sheets_BasicFilter
   */
  public function getBasicFilter()
  {
    return $this->basicFilter;
  }
  /**
   * @param Google_Service_Sheets_EmbeddedChart[]
   */
  public function setCharts($charts)
  {
    $this->charts = $charts;
  }
  /**
   * @return Google_Service_Sheets_EmbeddedChart[]
   */
  public function getCharts()
  {
    return $this->charts;
  }
  /**
   * @param Google_Service_Sheets_DimensionGroup[]
   */
  public function setColumnGroups($columnGroups)
  {
    $this->columnGroups = $columnGroups;
  }
  /**
   * @return Google_Service_Sheets_DimensionGroup[]
   */
  public function getColumnGroups()
  {
    return $this->columnGroups;
  }
  /**
   * @param Google_Service_Sheets_ConditionalFormatRule[]
   */
  public function setConditionalFormats($conditionalFormats)
  {
    $this->conditionalFormats = $conditionalFormats;
  }
  /**
   * @return Google_Service_Sheets_ConditionalFormatRule[]
   */
  public function getConditionalFormats()
  {
    return $this->conditionalFormats;
  }
  /**
   * @param Google_Service_Sheets_GridData[]
   */
  public function setData($data)
  {
    $this->data = $data;
  }
  /**
   * @return Google_Service_Sheets_GridData[]
   */
  public function getData()
  {
    return $this->data;
  }
  /**
   * @param Google_Service_Sheets_DeveloperMetadata[]
   */
  public function setDeveloperMetadata($developerMetadata)
  {
    $this->developerMetadata = $developerMetadata;
  }
  /**
   * @return Google_Service_Sheets_DeveloperMetadata[]
   */
  public function getDeveloperMetadata()
  {
    return $this->developerMetadata;
  }
  /**
   * @param Google_Service_Sheets_FilterView[]
   */
  public function setFilterViews($filterViews)
  {
    $this->filterViews = $filterViews;
  }
  /**
   * @return Google_Service_Sheets_FilterView[]
   */
  public function getFilterViews()
  {
    return $this->filterViews;
  }
  /**
   * @param Google_Service_Sheets_GridRange[]
   */
  public function setMerges($merges)
  {
    $this->merges = $merges;
  }
  /**
   * @return Google_Service_Sheets_GridRange[]
   */
  public function getMerges()
  {
    return $this->merges;
  }
  /**
   * @param Google_Service_Sheets_SheetProperties
   */
  public function setProperties(Google_Service_Sheets_SheetProperties $properties)
  {
    $this->properties = $properties;
  }
  /**
   * @return Google_Service_Sheets_SheetProperties
   */
  public function getProperties()
  {
    return $this->properties;
  }
  /**
   * @param Google_Service_Sheets_ProtectedRange[]
   */
  public function setProtectedRanges($protectedRanges)
  {
    $this->protectedRanges = $protectedRanges;
  }
  /**
   * @return Google_Service_Sheets_ProtectedRange[]
   */
  public function getProtectedRanges()
  {
    return $this->protectedRanges;
  }
  /**
   * @param Google_Service_Sheets_DimensionGroup[]
   */
  public function setRowGroups($rowGroups)
  {
    $this->rowGroups = $rowGroups;
  }
  /**
   * @return Google_Service_Sheets_DimensionGroup[]
   */
  public function getRowGroups()
  {
    return $this->rowGroups;
  }
  /**
   * @param Google_Service_Sheets_Slicer[]
   */
  public function setSlicers($slicers)
  {
    $this->slicers = $slicers;
  }
  /**
   * @return Google_Service_Sheets_Slicer[]
   */
  public function getSlicers()
  {
    return $this->slicers;
  }
}

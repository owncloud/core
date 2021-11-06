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

class Spreadsheet extends \Google\Collection
{
  protected $collection_key = 'sheets';
  protected $dataSourceSchedulesType = DataSourceRefreshSchedule::class;
  protected $dataSourceSchedulesDataType = 'array';
  protected $dataSourcesType = DataSource::class;
  protected $dataSourcesDataType = 'array';
  protected $developerMetadataType = DeveloperMetadata::class;
  protected $developerMetadataDataType = 'array';
  protected $namedRangesType = NamedRange::class;
  protected $namedRangesDataType = 'array';
  protected $propertiesType = SpreadsheetProperties::class;
  protected $propertiesDataType = '';
  protected $sheetsType = Sheet::class;
  protected $sheetsDataType = 'array';
  public $spreadsheetId;
  public $spreadsheetUrl;

  /**
   * @param DataSourceRefreshSchedule[]
   */
  public function setDataSourceSchedules($dataSourceSchedules)
  {
    $this->dataSourceSchedules = $dataSourceSchedules;
  }
  /**
   * @return DataSourceRefreshSchedule[]
   */
  public function getDataSourceSchedules()
  {
    return $this->dataSourceSchedules;
  }
  /**
   * @param DataSource[]
   */
  public function setDataSources($dataSources)
  {
    $this->dataSources = $dataSources;
  }
  /**
   * @return DataSource[]
   */
  public function getDataSources()
  {
    return $this->dataSources;
  }
  /**
   * @param DeveloperMetadata[]
   */
  public function setDeveloperMetadata($developerMetadata)
  {
    $this->developerMetadata = $developerMetadata;
  }
  /**
   * @return DeveloperMetadata[]
   */
  public function getDeveloperMetadata()
  {
    return $this->developerMetadata;
  }
  /**
   * @param NamedRange[]
   */
  public function setNamedRanges($namedRanges)
  {
    $this->namedRanges = $namedRanges;
  }
  /**
   * @return NamedRange[]
   */
  public function getNamedRanges()
  {
    return $this->namedRanges;
  }
  /**
   * @param SpreadsheetProperties
   */
  public function setProperties(SpreadsheetProperties $properties)
  {
    $this->properties = $properties;
  }
  /**
   * @return SpreadsheetProperties
   */
  public function getProperties()
  {
    return $this->properties;
  }
  /**
   * @param Sheet[]
   */
  public function setSheets($sheets)
  {
    $this->sheets = $sheets;
  }
  /**
   * @return Sheet[]
   */
  public function getSheets()
  {
    return $this->sheets;
  }
  public function setSpreadsheetId($spreadsheetId)
  {
    $this->spreadsheetId = $spreadsheetId;
  }
  public function getSpreadsheetId()
  {
    return $this->spreadsheetId;
  }
  public function setSpreadsheetUrl($spreadsheetUrl)
  {
    $this->spreadsheetUrl = $spreadsheetUrl;
  }
  public function getSpreadsheetUrl()
  {
    return $this->spreadsheetUrl;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(Spreadsheet::class, 'Google_Service_Sheets_Spreadsheet');

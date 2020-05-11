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

class Google_Service_DataCatalog_GoogleCloudDatacatalogV1beta1BigQueryTableSpec extends Google_Model
{
  public $tableSourceType;
  protected $tableSpecType = 'Google_Service_DataCatalog_GoogleCloudDatacatalogV1beta1TableSpec';
  protected $tableSpecDataType = '';
  protected $viewSpecType = 'Google_Service_DataCatalog_GoogleCloudDatacatalogV1beta1ViewSpec';
  protected $viewSpecDataType = '';

  public function setTableSourceType($tableSourceType)
  {
    $this->tableSourceType = $tableSourceType;
  }
  public function getTableSourceType()
  {
    return $this->tableSourceType;
  }
  /**
   * @param Google_Service_DataCatalog_GoogleCloudDatacatalogV1beta1TableSpec
   */
  public function setTableSpec(Google_Service_DataCatalog_GoogleCloudDatacatalogV1beta1TableSpec $tableSpec)
  {
    $this->tableSpec = $tableSpec;
  }
  /**
   * @return Google_Service_DataCatalog_GoogleCloudDatacatalogV1beta1TableSpec
   */
  public function getTableSpec()
  {
    return $this->tableSpec;
  }
  /**
   * @param Google_Service_DataCatalog_GoogleCloudDatacatalogV1beta1ViewSpec
   */
  public function setViewSpec(Google_Service_DataCatalog_GoogleCloudDatacatalogV1beta1ViewSpec $viewSpec)
  {
    $this->viewSpec = $viewSpec;
  }
  /**
   * @return Google_Service_DataCatalog_GoogleCloudDatacatalogV1beta1ViewSpec
   */
  public function getViewSpec()
  {
    return $this->viewSpec;
  }
}

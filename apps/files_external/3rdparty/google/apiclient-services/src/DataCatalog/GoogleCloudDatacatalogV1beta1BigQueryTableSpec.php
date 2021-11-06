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

namespace Google\Service\DataCatalog;

class GoogleCloudDatacatalogV1beta1BigQueryTableSpec extends \Google\Model
{
  public $tableSourceType;
  protected $tableSpecType = GoogleCloudDatacatalogV1beta1TableSpec::class;
  protected $tableSpecDataType = '';
  protected $viewSpecType = GoogleCloudDatacatalogV1beta1ViewSpec::class;
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
   * @param GoogleCloudDatacatalogV1beta1TableSpec
   */
  public function setTableSpec(GoogleCloudDatacatalogV1beta1TableSpec $tableSpec)
  {
    $this->tableSpec = $tableSpec;
  }
  /**
   * @return GoogleCloudDatacatalogV1beta1TableSpec
   */
  public function getTableSpec()
  {
    return $this->tableSpec;
  }
  /**
   * @param GoogleCloudDatacatalogV1beta1ViewSpec
   */
  public function setViewSpec(GoogleCloudDatacatalogV1beta1ViewSpec $viewSpec)
  {
    $this->viewSpec = $viewSpec;
  }
  /**
   * @return GoogleCloudDatacatalogV1beta1ViewSpec
   */
  public function getViewSpec()
  {
    return $this->viewSpec;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(GoogleCloudDatacatalogV1beta1BigQueryTableSpec::class, 'Google_Service_DataCatalog_GoogleCloudDatacatalogV1beta1BigQueryTableSpec');

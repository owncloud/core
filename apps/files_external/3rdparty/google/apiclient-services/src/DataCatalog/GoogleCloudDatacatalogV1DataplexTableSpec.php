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

class GoogleCloudDatacatalogV1DataplexTableSpec extends \Google\Collection
{
  protected $collection_key = 'externalTables';
  protected $dataplexSpecType = GoogleCloudDatacatalogV1DataplexSpec::class;
  protected $dataplexSpecDataType = '';
  protected $externalTablesType = GoogleCloudDatacatalogV1DataplexExternalTable::class;
  protected $externalTablesDataType = 'array';
  /**
   * @var bool
   */
  public $userManaged;

  /**
   * @param GoogleCloudDatacatalogV1DataplexSpec
   */
  public function setDataplexSpec(GoogleCloudDatacatalogV1DataplexSpec $dataplexSpec)
  {
    $this->dataplexSpec = $dataplexSpec;
  }
  /**
   * @return GoogleCloudDatacatalogV1DataplexSpec
   */
  public function getDataplexSpec()
  {
    return $this->dataplexSpec;
  }
  /**
   * @param GoogleCloudDatacatalogV1DataplexExternalTable[]
   */
  public function setExternalTables($externalTables)
  {
    $this->externalTables = $externalTables;
  }
  /**
   * @return GoogleCloudDatacatalogV1DataplexExternalTable[]
   */
  public function getExternalTables()
  {
    return $this->externalTables;
  }
  /**
   * @param bool
   */
  public function setUserManaged($userManaged)
  {
    $this->userManaged = $userManaged;
  }
  /**
   * @return bool
   */
  public function getUserManaged()
  {
    return $this->userManaged;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(GoogleCloudDatacatalogV1DataplexTableSpec::class, 'Google_Service_DataCatalog_GoogleCloudDatacatalogV1DataplexTableSpec');

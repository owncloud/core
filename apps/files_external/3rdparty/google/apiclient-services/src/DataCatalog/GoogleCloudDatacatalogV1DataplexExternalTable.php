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

class GoogleCloudDatacatalogV1DataplexExternalTable extends \Google\Model
{
  /**
   * @var string
   */
  public $dataCatalogEntry;
  /**
   * @var string
   */
  public $fullyQualifiedName;
  /**
   * @var string
   */
  public $googleCloudResource;
  /**
   * @var string
   */
  public $system;

  /**
   * @param string
   */
  public function setDataCatalogEntry($dataCatalogEntry)
  {
    $this->dataCatalogEntry = $dataCatalogEntry;
  }
  /**
   * @return string
   */
  public function getDataCatalogEntry()
  {
    return $this->dataCatalogEntry;
  }
  /**
   * @param string
   */
  public function setFullyQualifiedName($fullyQualifiedName)
  {
    $this->fullyQualifiedName = $fullyQualifiedName;
  }
  /**
   * @return string
   */
  public function getFullyQualifiedName()
  {
    return $this->fullyQualifiedName;
  }
  /**
   * @param string
   */
  public function setGoogleCloudResource($googleCloudResource)
  {
    $this->googleCloudResource = $googleCloudResource;
  }
  /**
   * @return string
   */
  public function getGoogleCloudResource()
  {
    return $this->googleCloudResource;
  }
  /**
   * @param string
   */
  public function setSystem($system)
  {
    $this->system = $system;
  }
  /**
   * @return string
   */
  public function getSystem()
  {
    return $this->system;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(GoogleCloudDatacatalogV1DataplexExternalTable::class, 'Google_Service_DataCatalog_GoogleCloudDatacatalogV1DataplexExternalTable');

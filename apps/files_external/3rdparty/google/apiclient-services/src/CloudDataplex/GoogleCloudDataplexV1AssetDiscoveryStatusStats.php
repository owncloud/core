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

namespace Google\Service\CloudDataplex;

class GoogleCloudDataplexV1AssetDiscoveryStatusStats extends \Google\Model
{
  /**
   * @var string
   */
  public $dataItems;
  /**
   * @var string
   */
  public $dataSize;
  /**
   * @var string
   */
  public $filesets;
  /**
   * @var string
   */
  public $tables;

  /**
   * @param string
   */
  public function setDataItems($dataItems)
  {
    $this->dataItems = $dataItems;
  }
  /**
   * @return string
   */
  public function getDataItems()
  {
    return $this->dataItems;
  }
  /**
   * @param string
   */
  public function setDataSize($dataSize)
  {
    $this->dataSize = $dataSize;
  }
  /**
   * @return string
   */
  public function getDataSize()
  {
    return $this->dataSize;
  }
  /**
   * @param string
   */
  public function setFilesets($filesets)
  {
    $this->filesets = $filesets;
  }
  /**
   * @return string
   */
  public function getFilesets()
  {
    return $this->filesets;
  }
  /**
   * @param string
   */
  public function setTables($tables)
  {
    $this->tables = $tables;
  }
  /**
   * @return string
   */
  public function getTables()
  {
    return $this->tables;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(GoogleCloudDataplexV1AssetDiscoveryStatusStats::class, 'Google_Service_CloudDataplex_GoogleCloudDataplexV1AssetDiscoveryStatusStats');

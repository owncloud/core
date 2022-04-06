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

class GoogleCloudDatacatalogV1DataplexSpec extends \Google\Model
{
  /**
   * @var string
   */
  public $asset;
  /**
   * @var string
   */
  public $compressionFormat;
  protected $dataFormatType = GoogleCloudDatacatalogV1PhysicalSchema::class;
  protected $dataFormatDataType = '';
  /**
   * @var string
   */
  public $projectId;

  /**
   * @param string
   */
  public function setAsset($asset)
  {
    $this->asset = $asset;
  }
  /**
   * @return string
   */
  public function getAsset()
  {
    return $this->asset;
  }
  /**
   * @param string
   */
  public function setCompressionFormat($compressionFormat)
  {
    $this->compressionFormat = $compressionFormat;
  }
  /**
   * @return string
   */
  public function getCompressionFormat()
  {
    return $this->compressionFormat;
  }
  /**
   * @param GoogleCloudDatacatalogV1PhysicalSchema
   */
  public function setDataFormat(GoogleCloudDatacatalogV1PhysicalSchema $dataFormat)
  {
    $this->dataFormat = $dataFormat;
  }
  /**
   * @return GoogleCloudDatacatalogV1PhysicalSchema
   */
  public function getDataFormat()
  {
    return $this->dataFormat;
  }
  /**
   * @param string
   */
  public function setProjectId($projectId)
  {
    $this->projectId = $projectId;
  }
  /**
   * @return string
   */
  public function getProjectId()
  {
    return $this->projectId;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(GoogleCloudDatacatalogV1DataplexSpec::class, 'Google_Service_DataCatalog_GoogleCloudDatacatalogV1DataplexSpec');

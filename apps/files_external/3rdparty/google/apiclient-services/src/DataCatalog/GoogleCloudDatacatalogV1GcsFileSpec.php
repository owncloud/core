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

class GoogleCloudDatacatalogV1GcsFileSpec extends \Google\Model
{
  /**
   * @var string
   */
  public $filePath;
  protected $gcsTimestampsType = GoogleCloudDatacatalogV1SystemTimestamps::class;
  protected $gcsTimestampsDataType = '';
  /**
   * @var string
   */
  public $sizeBytes;

  /**
   * @param string
   */
  public function setFilePath($filePath)
  {
    $this->filePath = $filePath;
  }
  /**
   * @return string
   */
  public function getFilePath()
  {
    return $this->filePath;
  }
  /**
   * @param GoogleCloudDatacatalogV1SystemTimestamps
   */
  public function setGcsTimestamps(GoogleCloudDatacatalogV1SystemTimestamps $gcsTimestamps)
  {
    $this->gcsTimestamps = $gcsTimestamps;
  }
  /**
   * @return GoogleCloudDatacatalogV1SystemTimestamps
   */
  public function getGcsTimestamps()
  {
    return $this->gcsTimestamps;
  }
  /**
   * @param string
   */
  public function setSizeBytes($sizeBytes)
  {
    $this->sizeBytes = $sizeBytes;
  }
  /**
   * @return string
   */
  public function getSizeBytes()
  {
    return $this->sizeBytes;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(GoogleCloudDatacatalogV1GcsFileSpec::class, 'Google_Service_DataCatalog_GoogleCloudDatacatalogV1GcsFileSpec');

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

namespace Google\Service\DLP;

class GooglePrivacyDlpV2StorageConfig extends \Google\Model
{
  protected $bigQueryOptionsType = GooglePrivacyDlpV2BigQueryOptions::class;
  protected $bigQueryOptionsDataType = '';
  protected $cloudStorageOptionsType = GooglePrivacyDlpV2CloudStorageOptions::class;
  protected $cloudStorageOptionsDataType = '';
  protected $datastoreOptionsType = GooglePrivacyDlpV2DatastoreOptions::class;
  protected $datastoreOptionsDataType = '';
  protected $hybridOptionsType = GooglePrivacyDlpV2HybridOptions::class;
  protected $hybridOptionsDataType = '';
  protected $timespanConfigType = GooglePrivacyDlpV2TimespanConfig::class;
  protected $timespanConfigDataType = '';

  /**
   * @param GooglePrivacyDlpV2BigQueryOptions
   */
  public function setBigQueryOptions(GooglePrivacyDlpV2BigQueryOptions $bigQueryOptions)
  {
    $this->bigQueryOptions = $bigQueryOptions;
  }
  /**
   * @return GooglePrivacyDlpV2BigQueryOptions
   */
  public function getBigQueryOptions()
  {
    return $this->bigQueryOptions;
  }
  /**
   * @param GooglePrivacyDlpV2CloudStorageOptions
   */
  public function setCloudStorageOptions(GooglePrivacyDlpV2CloudStorageOptions $cloudStorageOptions)
  {
    $this->cloudStorageOptions = $cloudStorageOptions;
  }
  /**
   * @return GooglePrivacyDlpV2CloudStorageOptions
   */
  public function getCloudStorageOptions()
  {
    return $this->cloudStorageOptions;
  }
  /**
   * @param GooglePrivacyDlpV2DatastoreOptions
   */
  public function setDatastoreOptions(GooglePrivacyDlpV2DatastoreOptions $datastoreOptions)
  {
    $this->datastoreOptions = $datastoreOptions;
  }
  /**
   * @return GooglePrivacyDlpV2DatastoreOptions
   */
  public function getDatastoreOptions()
  {
    return $this->datastoreOptions;
  }
  /**
   * @param GooglePrivacyDlpV2HybridOptions
   */
  public function setHybridOptions(GooglePrivacyDlpV2HybridOptions $hybridOptions)
  {
    $this->hybridOptions = $hybridOptions;
  }
  /**
   * @return GooglePrivacyDlpV2HybridOptions
   */
  public function getHybridOptions()
  {
    return $this->hybridOptions;
  }
  /**
   * @param GooglePrivacyDlpV2TimespanConfig
   */
  public function setTimespanConfig(GooglePrivacyDlpV2TimespanConfig $timespanConfig)
  {
    $this->timespanConfig = $timespanConfig;
  }
  /**
   * @return GooglePrivacyDlpV2TimespanConfig
   */
  public function getTimespanConfig()
  {
    return $this->timespanConfig;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(GooglePrivacyDlpV2StorageConfig::class, 'Google_Service_DLP_GooglePrivacyDlpV2StorageConfig');

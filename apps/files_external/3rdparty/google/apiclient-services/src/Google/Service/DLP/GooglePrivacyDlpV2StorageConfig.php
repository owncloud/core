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

class Google_Service_DLP_GooglePrivacyDlpV2StorageConfig extends Google_Model
{
  protected $bigQueryOptionsType = 'Google_Service_DLP_GooglePrivacyDlpV2BigQueryOptions';
  protected $bigQueryOptionsDataType = '';
  protected $cloudStorageOptionsType = 'Google_Service_DLP_GooglePrivacyDlpV2CloudStorageOptions';
  protected $cloudStorageOptionsDataType = '';
  protected $datastoreOptionsType = 'Google_Service_DLP_GooglePrivacyDlpV2DatastoreOptions';
  protected $datastoreOptionsDataType = '';
  protected $hybridOptionsType = 'Google_Service_DLP_GooglePrivacyDlpV2HybridOptions';
  protected $hybridOptionsDataType = '';
  protected $timespanConfigType = 'Google_Service_DLP_GooglePrivacyDlpV2TimespanConfig';
  protected $timespanConfigDataType = '';

  /**
   * @param Google_Service_DLP_GooglePrivacyDlpV2BigQueryOptions
   */
  public function setBigQueryOptions(Google_Service_DLP_GooglePrivacyDlpV2BigQueryOptions $bigQueryOptions)
  {
    $this->bigQueryOptions = $bigQueryOptions;
  }
  /**
   * @return Google_Service_DLP_GooglePrivacyDlpV2BigQueryOptions
   */
  public function getBigQueryOptions()
  {
    return $this->bigQueryOptions;
  }
  /**
   * @param Google_Service_DLP_GooglePrivacyDlpV2CloudStorageOptions
   */
  public function setCloudStorageOptions(Google_Service_DLP_GooglePrivacyDlpV2CloudStorageOptions $cloudStorageOptions)
  {
    $this->cloudStorageOptions = $cloudStorageOptions;
  }
  /**
   * @return Google_Service_DLP_GooglePrivacyDlpV2CloudStorageOptions
   */
  public function getCloudStorageOptions()
  {
    return $this->cloudStorageOptions;
  }
  /**
   * @param Google_Service_DLP_GooglePrivacyDlpV2DatastoreOptions
   */
  public function setDatastoreOptions(Google_Service_DLP_GooglePrivacyDlpV2DatastoreOptions $datastoreOptions)
  {
    $this->datastoreOptions = $datastoreOptions;
  }
  /**
   * @return Google_Service_DLP_GooglePrivacyDlpV2DatastoreOptions
   */
  public function getDatastoreOptions()
  {
    return $this->datastoreOptions;
  }
  /**
   * @param Google_Service_DLP_GooglePrivacyDlpV2HybridOptions
   */
  public function setHybridOptions(Google_Service_DLP_GooglePrivacyDlpV2HybridOptions $hybridOptions)
  {
    $this->hybridOptions = $hybridOptions;
  }
  /**
   * @return Google_Service_DLP_GooglePrivacyDlpV2HybridOptions
   */
  public function getHybridOptions()
  {
    return $this->hybridOptions;
  }
  /**
   * @param Google_Service_DLP_GooglePrivacyDlpV2TimespanConfig
   */
  public function setTimespanConfig(Google_Service_DLP_GooglePrivacyDlpV2TimespanConfig $timespanConfig)
  {
    $this->timespanConfig = $timespanConfig;
  }
  /**
   * @return Google_Service_DLP_GooglePrivacyDlpV2TimespanConfig
   */
  public function getTimespanConfig()
  {
    return $this->timespanConfig;
  }
}

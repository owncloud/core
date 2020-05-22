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

class Google_Service_DLP_GooglePrivacyDlpV2LargeCustomDictionaryConfig extends Google_Model
{
  protected $bigQueryFieldType = 'Google_Service_DLP_GooglePrivacyDlpV2BigQueryField';
  protected $bigQueryFieldDataType = '';
  protected $cloudStorageFileSetType = 'Google_Service_DLP_GooglePrivacyDlpV2CloudStorageFileSet';
  protected $cloudStorageFileSetDataType = '';
  protected $outputPathType = 'Google_Service_DLP_GooglePrivacyDlpV2CloudStoragePath';
  protected $outputPathDataType = '';

  /**
   * @param Google_Service_DLP_GooglePrivacyDlpV2BigQueryField
   */
  public function setBigQueryField(Google_Service_DLP_GooglePrivacyDlpV2BigQueryField $bigQueryField)
  {
    $this->bigQueryField = $bigQueryField;
  }
  /**
   * @return Google_Service_DLP_GooglePrivacyDlpV2BigQueryField
   */
  public function getBigQueryField()
  {
    return $this->bigQueryField;
  }
  /**
   * @param Google_Service_DLP_GooglePrivacyDlpV2CloudStorageFileSet
   */
  public function setCloudStorageFileSet(Google_Service_DLP_GooglePrivacyDlpV2CloudStorageFileSet $cloudStorageFileSet)
  {
    $this->cloudStorageFileSet = $cloudStorageFileSet;
  }
  /**
   * @return Google_Service_DLP_GooglePrivacyDlpV2CloudStorageFileSet
   */
  public function getCloudStorageFileSet()
  {
    return $this->cloudStorageFileSet;
  }
  /**
   * @param Google_Service_DLP_GooglePrivacyDlpV2CloudStoragePath
   */
  public function setOutputPath(Google_Service_DLP_GooglePrivacyDlpV2CloudStoragePath $outputPath)
  {
    $this->outputPath = $outputPath;
  }
  /**
   * @return Google_Service_DLP_GooglePrivacyDlpV2CloudStoragePath
   */
  public function getOutputPath()
  {
    return $this->outputPath;
  }
}

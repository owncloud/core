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

class GooglePrivacyDlpV2LargeCustomDictionaryConfig extends \Google\Model
{
  protected $bigQueryFieldType = GooglePrivacyDlpV2BigQueryField::class;
  protected $bigQueryFieldDataType = '';
  protected $cloudStorageFileSetType = GooglePrivacyDlpV2CloudStorageFileSet::class;
  protected $cloudStorageFileSetDataType = '';
  protected $outputPathType = GooglePrivacyDlpV2CloudStoragePath::class;
  protected $outputPathDataType = '';

  /**
   * @param GooglePrivacyDlpV2BigQueryField
   */
  public function setBigQueryField(GooglePrivacyDlpV2BigQueryField $bigQueryField)
  {
    $this->bigQueryField = $bigQueryField;
  }
  /**
   * @return GooglePrivacyDlpV2BigQueryField
   */
  public function getBigQueryField()
  {
    return $this->bigQueryField;
  }
  /**
   * @param GooglePrivacyDlpV2CloudStorageFileSet
   */
  public function setCloudStorageFileSet(GooglePrivacyDlpV2CloudStorageFileSet $cloudStorageFileSet)
  {
    $this->cloudStorageFileSet = $cloudStorageFileSet;
  }
  /**
   * @return GooglePrivacyDlpV2CloudStorageFileSet
   */
  public function getCloudStorageFileSet()
  {
    return $this->cloudStorageFileSet;
  }
  /**
   * @param GooglePrivacyDlpV2CloudStoragePath
   */
  public function setOutputPath(GooglePrivacyDlpV2CloudStoragePath $outputPath)
  {
    $this->outputPath = $outputPath;
  }
  /**
   * @return GooglePrivacyDlpV2CloudStoragePath
   */
  public function getOutputPath()
  {
    return $this->outputPath;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(GooglePrivacyDlpV2LargeCustomDictionaryConfig::class, 'Google_Service_DLP_GooglePrivacyDlpV2LargeCustomDictionaryConfig');

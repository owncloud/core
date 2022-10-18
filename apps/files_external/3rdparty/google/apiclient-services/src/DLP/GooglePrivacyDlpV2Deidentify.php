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

class GooglePrivacyDlpV2Deidentify extends \Google\Collection
{
  protected $collection_key = 'fileTypesToTransform';
  /**
   * @var string
   */
  public $cloudStorageOutput;
  /**
   * @var string[]
   */
  public $fileTypesToTransform;
  protected $transformationConfigType = GooglePrivacyDlpV2TransformationConfig::class;
  protected $transformationConfigDataType = '';
  protected $transformationDetailsStorageConfigType = GooglePrivacyDlpV2TransformationDetailsStorageConfig::class;
  protected $transformationDetailsStorageConfigDataType = '';

  /**
   * @param string
   */
  public function setCloudStorageOutput($cloudStorageOutput)
  {
    $this->cloudStorageOutput = $cloudStorageOutput;
  }
  /**
   * @return string
   */
  public function getCloudStorageOutput()
  {
    return $this->cloudStorageOutput;
  }
  /**
   * @param string[]
   */
  public function setFileTypesToTransform($fileTypesToTransform)
  {
    $this->fileTypesToTransform = $fileTypesToTransform;
  }
  /**
   * @return string[]
   */
  public function getFileTypesToTransform()
  {
    return $this->fileTypesToTransform;
  }
  /**
   * @param GooglePrivacyDlpV2TransformationConfig
   */
  public function setTransformationConfig(GooglePrivacyDlpV2TransformationConfig $transformationConfig)
  {
    $this->transformationConfig = $transformationConfig;
  }
  /**
   * @return GooglePrivacyDlpV2TransformationConfig
   */
  public function getTransformationConfig()
  {
    return $this->transformationConfig;
  }
  /**
   * @param GooglePrivacyDlpV2TransformationDetailsStorageConfig
   */
  public function setTransformationDetailsStorageConfig(GooglePrivacyDlpV2TransformationDetailsStorageConfig $transformationDetailsStorageConfig)
  {
    $this->transformationDetailsStorageConfig = $transformationDetailsStorageConfig;
  }
  /**
   * @return GooglePrivacyDlpV2TransformationDetailsStorageConfig
   */
  public function getTransformationDetailsStorageConfig()
  {
    return $this->transformationDetailsStorageConfig;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(GooglePrivacyDlpV2Deidentify::class, 'Google_Service_DLP_GooglePrivacyDlpV2Deidentify');

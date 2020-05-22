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

class Google_Service_CloudAsset_ExportAssetsRequest extends Google_Collection
{
  protected $collection_key = 'assetTypes';
  public $assetTypes;
  public $contentType;
  protected $outputConfigType = 'Google_Service_CloudAsset_OutputConfig';
  protected $outputConfigDataType = '';
  public $readTime;

  public function setAssetTypes($assetTypes)
  {
    $this->assetTypes = $assetTypes;
  }
  public function getAssetTypes()
  {
    return $this->assetTypes;
  }
  public function setContentType($contentType)
  {
    $this->contentType = $contentType;
  }
  public function getContentType()
  {
    return $this->contentType;
  }
  /**
   * @param Google_Service_CloudAsset_OutputConfig
   */
  public function setOutputConfig(Google_Service_CloudAsset_OutputConfig $outputConfig)
  {
    $this->outputConfig = $outputConfig;
  }
  /**
   * @return Google_Service_CloudAsset_OutputConfig
   */
  public function getOutputConfig()
  {
    return $this->outputConfig;
  }
  public function setReadTime($readTime)
  {
    $this->readTime = $readTime;
  }
  public function getReadTime()
  {
    return $this->readTime;
  }
}

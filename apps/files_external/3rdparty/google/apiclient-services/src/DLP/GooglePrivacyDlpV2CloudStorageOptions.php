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

class GooglePrivacyDlpV2CloudStorageOptions extends \Google\Collection
{
  protected $collection_key = 'fileTypes';
  public $bytesLimitPerFile;
  public $bytesLimitPerFilePercent;
  protected $fileSetType = GooglePrivacyDlpV2FileSet::class;
  protected $fileSetDataType = '';
  public $fileTypes;
  public $filesLimitPercent;
  public $sampleMethod;

  public function setBytesLimitPerFile($bytesLimitPerFile)
  {
    $this->bytesLimitPerFile = $bytesLimitPerFile;
  }
  public function getBytesLimitPerFile()
  {
    return $this->bytesLimitPerFile;
  }
  public function setBytesLimitPerFilePercent($bytesLimitPerFilePercent)
  {
    $this->bytesLimitPerFilePercent = $bytesLimitPerFilePercent;
  }
  public function getBytesLimitPerFilePercent()
  {
    return $this->bytesLimitPerFilePercent;
  }
  /**
   * @param GooglePrivacyDlpV2FileSet
   */
  public function setFileSet(GooglePrivacyDlpV2FileSet $fileSet)
  {
    $this->fileSet = $fileSet;
  }
  /**
   * @return GooglePrivacyDlpV2FileSet
   */
  public function getFileSet()
  {
    return $this->fileSet;
  }
  public function setFileTypes($fileTypes)
  {
    $this->fileTypes = $fileTypes;
  }
  public function getFileTypes()
  {
    return $this->fileTypes;
  }
  public function setFilesLimitPercent($filesLimitPercent)
  {
    $this->filesLimitPercent = $filesLimitPercent;
  }
  public function getFilesLimitPercent()
  {
    return $this->filesLimitPercent;
  }
  public function setSampleMethod($sampleMethod)
  {
    $this->sampleMethod = $sampleMethod;
  }
  public function getSampleMethod()
  {
    return $this->sampleMethod;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(GooglePrivacyDlpV2CloudStorageOptions::class, 'Google_Service_DLP_GooglePrivacyDlpV2CloudStorageOptions');

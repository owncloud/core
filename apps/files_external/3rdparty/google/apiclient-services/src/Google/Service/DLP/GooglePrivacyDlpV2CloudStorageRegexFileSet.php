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

class Google_Service_DLP_GooglePrivacyDlpV2CloudStorageRegexFileSet extends Google_Collection
{
  protected $collection_key = 'includeRegex';
  public $bucketName;
  public $excludeRegex;
  public $includeRegex;

  public function setBucketName($bucketName)
  {
    $this->bucketName = $bucketName;
  }
  public function getBucketName()
  {
    return $this->bucketName;
  }
  public function setExcludeRegex($excludeRegex)
  {
    $this->excludeRegex = $excludeRegex;
  }
  public function getExcludeRegex()
  {
    return $this->excludeRegex;
  }
  public function setIncludeRegex($includeRegex)
  {
    $this->includeRegex = $includeRegex;
  }
  public function getIncludeRegex()
  {
    return $this->includeRegex;
  }
}

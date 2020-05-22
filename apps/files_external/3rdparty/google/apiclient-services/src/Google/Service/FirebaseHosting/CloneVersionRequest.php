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

class Google_Service_FirebaseHosting_CloneVersionRequest extends Google_Model
{
  protected $excludeType = 'Google_Service_FirebaseHosting_PathFilter';
  protected $excludeDataType = '';
  public $finalize;
  protected $includeType = 'Google_Service_FirebaseHosting_PathFilter';
  protected $includeDataType = '';
  public $sourceVersion;

  /**
   * @param Google_Service_FirebaseHosting_PathFilter
   */
  public function setExclude(Google_Service_FirebaseHosting_PathFilter $exclude)
  {
    $this->exclude = $exclude;
  }
  /**
   * @return Google_Service_FirebaseHosting_PathFilter
   */
  public function getExclude()
  {
    return $this->exclude;
  }
  public function setFinalize($finalize)
  {
    $this->finalize = $finalize;
  }
  public function getFinalize()
  {
    return $this->finalize;
  }
  /**
   * @param Google_Service_FirebaseHosting_PathFilter
   */
  public function setInclude(Google_Service_FirebaseHosting_PathFilter $include)
  {
    $this->include = $include;
  }
  /**
   * @return Google_Service_FirebaseHosting_PathFilter
   */
  public function getInclude()
  {
    return $this->include;
  }
  public function setSourceVersion($sourceVersion)
  {
    $this->sourceVersion = $sourceVersion;
  }
  public function getSourceVersion()
  {
    return $this->sourceVersion;
  }
}

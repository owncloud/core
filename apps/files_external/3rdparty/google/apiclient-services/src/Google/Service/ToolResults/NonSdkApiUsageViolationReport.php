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

class Google_Service_ToolResults_NonSdkApiUsageViolationReport extends Google_Collection
{
  protected $collection_key = 'exampleApis';
  protected $exampleApisType = 'Google_Service_ToolResults_NonSdkApi';
  protected $exampleApisDataType = 'array';
  public $minSdkVersion;
  public $targetSdkVersion;
  public $uniqueApis;

  /**
   * @param Google_Service_ToolResults_NonSdkApi
   */
  public function setExampleApis($exampleApis)
  {
    $this->exampleApis = $exampleApis;
  }
  /**
   * @return Google_Service_ToolResults_NonSdkApi
   */
  public function getExampleApis()
  {
    return $this->exampleApis;
  }
  public function setMinSdkVersion($minSdkVersion)
  {
    $this->minSdkVersion = $minSdkVersion;
  }
  public function getMinSdkVersion()
  {
    return $this->minSdkVersion;
  }
  public function setTargetSdkVersion($targetSdkVersion)
  {
    $this->targetSdkVersion = $targetSdkVersion;
  }
  public function getTargetSdkVersion()
  {
    return $this->targetSdkVersion;
  }
  public function setUniqueApis($uniqueApis)
  {
    $this->uniqueApis = $uniqueApis;
  }
  public function getUniqueApis()
  {
    return $this->uniqueApis;
  }
}

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

class Google_Service_Testing_IosTestLoop extends Google_Collection
{
  protected $collection_key = 'scenarios';
  public $appBundleId;
  protected $appIpaType = 'Google_Service_Testing_FileReference';
  protected $appIpaDataType = '';
  public $scenarios;

  public function setAppBundleId($appBundleId)
  {
    $this->appBundleId = $appBundleId;
  }
  public function getAppBundleId()
  {
    return $this->appBundleId;
  }
  /**
   * @param Google_Service_Testing_FileReference
   */
  public function setAppIpa(Google_Service_Testing_FileReference $appIpa)
  {
    $this->appIpa = $appIpa;
  }
  /**
   * @return Google_Service_Testing_FileReference
   */
  public function getAppIpa()
  {
    return $this->appIpa;
  }
  public function setScenarios($scenarios)
  {
    $this->scenarios = $scenarios;
  }
  public function getScenarios()
  {
    return $this->scenarios;
  }
}

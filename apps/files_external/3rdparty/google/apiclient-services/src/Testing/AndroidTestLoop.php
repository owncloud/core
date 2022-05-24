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

namespace Google\Service\Testing;

class AndroidTestLoop extends \Google\Collection
{
  protected $collection_key = 'scenarios';
  protected $appApkType = FileReference::class;
  protected $appApkDataType = '';
  protected $appBundleType = AppBundle::class;
  protected $appBundleDataType = '';
  /**
   * @var string
   */
  public $appPackageId;
  /**
   * @var string[]
   */
  public $scenarioLabels;
  /**
   * @var int[]
   */
  public $scenarios;

  /**
   * @param FileReference
   */
  public function setAppApk(FileReference $appApk)
  {
    $this->appApk = $appApk;
  }
  /**
   * @return FileReference
   */
  public function getAppApk()
  {
    return $this->appApk;
  }
  /**
   * @param AppBundle
   */
  public function setAppBundle(AppBundle $appBundle)
  {
    $this->appBundle = $appBundle;
  }
  /**
   * @return AppBundle
   */
  public function getAppBundle()
  {
    return $this->appBundle;
  }
  /**
   * @param string
   */
  public function setAppPackageId($appPackageId)
  {
    $this->appPackageId = $appPackageId;
  }
  /**
   * @return string
   */
  public function getAppPackageId()
  {
    return $this->appPackageId;
  }
  /**
   * @param string[]
   */
  public function setScenarioLabels($scenarioLabels)
  {
    $this->scenarioLabels = $scenarioLabels;
  }
  /**
   * @return string[]
   */
  public function getScenarioLabels()
  {
    return $this->scenarioLabels;
  }
  /**
   * @param int[]
   */
  public function setScenarios($scenarios)
  {
    $this->scenarios = $scenarios;
  }
  /**
   * @return int[]
   */
  public function getScenarios()
  {
    return $this->scenarios;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(AndroidTestLoop::class, 'Google_Service_Testing_AndroidTestLoop');

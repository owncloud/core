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

class AndroidInstrumentationTest extends \Google\Collection
{
  protected $collection_key = 'testTargets';
  protected $appApkType = FileReference::class;
  protected $appApkDataType = '';
  protected $appBundleType = AppBundle::class;
  protected $appBundleDataType = '';
  public $appPackageId;
  public $orchestratorOption;
  protected $shardingOptionType = ShardingOption::class;
  protected $shardingOptionDataType = '';
  protected $testApkType = FileReference::class;
  protected $testApkDataType = '';
  public $testPackageId;
  public $testRunnerClass;
  public $testTargets;

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
  public function setAppPackageId($appPackageId)
  {
    $this->appPackageId = $appPackageId;
  }
  public function getAppPackageId()
  {
    return $this->appPackageId;
  }
  public function setOrchestratorOption($orchestratorOption)
  {
    $this->orchestratorOption = $orchestratorOption;
  }
  public function getOrchestratorOption()
  {
    return $this->orchestratorOption;
  }
  /**
   * @param ShardingOption
   */
  public function setShardingOption(ShardingOption $shardingOption)
  {
    $this->shardingOption = $shardingOption;
  }
  /**
   * @return ShardingOption
   */
  public function getShardingOption()
  {
    return $this->shardingOption;
  }
  /**
   * @param FileReference
   */
  public function setTestApk(FileReference $testApk)
  {
    $this->testApk = $testApk;
  }
  /**
   * @return FileReference
   */
  public function getTestApk()
  {
    return $this->testApk;
  }
  public function setTestPackageId($testPackageId)
  {
    $this->testPackageId = $testPackageId;
  }
  public function getTestPackageId()
  {
    return $this->testPackageId;
  }
  public function setTestRunnerClass($testRunnerClass)
  {
    $this->testRunnerClass = $testRunnerClass;
  }
  public function getTestRunnerClass()
  {
    return $this->testRunnerClass;
  }
  public function setTestTargets($testTargets)
  {
    $this->testTargets = $testTargets;
  }
  public function getTestTargets()
  {
    return $this->testTargets;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(AndroidInstrumentationTest::class, 'Google_Service_Testing_AndroidInstrumentationTest');

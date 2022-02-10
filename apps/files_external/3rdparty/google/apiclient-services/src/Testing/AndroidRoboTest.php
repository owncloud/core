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

class AndroidRoboTest extends \Google\Collection
{
  protected $collection_key = 'startingIntents';
  protected $appApkType = FileReference::class;
  protected $appApkDataType = '';
  protected $appBundleType = AppBundle::class;
  protected $appBundleDataType = '';
  /**
   * @var string
   */
  public $appInitialActivity;
  /**
   * @var string
   */
  public $appPackageId;
  protected $roboDirectivesType = RoboDirective::class;
  protected $roboDirectivesDataType = 'array';
  /**
   * @var string
   */
  public $roboMode;
  protected $roboScriptType = FileReference::class;
  protected $roboScriptDataType = '';
  protected $startingIntentsType = RoboStartingIntent::class;
  protected $startingIntentsDataType = 'array';

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
  public function setAppInitialActivity($appInitialActivity)
  {
    $this->appInitialActivity = $appInitialActivity;
  }
  /**
   * @return string
   */
  public function getAppInitialActivity()
  {
    return $this->appInitialActivity;
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
   * @param RoboDirective[]
   */
  public function setRoboDirectives($roboDirectives)
  {
    $this->roboDirectives = $roboDirectives;
  }
  /**
   * @return RoboDirective[]
   */
  public function getRoboDirectives()
  {
    return $this->roboDirectives;
  }
  /**
   * @param string
   */
  public function setRoboMode($roboMode)
  {
    $this->roboMode = $roboMode;
  }
  /**
   * @return string
   */
  public function getRoboMode()
  {
    return $this->roboMode;
  }
  /**
   * @param FileReference
   */
  public function setRoboScript(FileReference $roboScript)
  {
    $this->roboScript = $roboScript;
  }
  /**
   * @return FileReference
   */
  public function getRoboScript()
  {
    return $this->roboScript;
  }
  /**
   * @param RoboStartingIntent[]
   */
  public function setStartingIntents($startingIntents)
  {
    $this->startingIntents = $startingIntents;
  }
  /**
   * @return RoboStartingIntent[]
   */
  public function getStartingIntents()
  {
    return $this->startingIntents;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(AndroidRoboTest::class, 'Google_Service_Testing_AndroidRoboTest');

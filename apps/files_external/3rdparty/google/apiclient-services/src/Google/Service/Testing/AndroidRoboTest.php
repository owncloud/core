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

class Google_Service_Testing_AndroidRoboTest extends Google_Collection
{
  protected $collection_key = 'startingIntents';
  protected $appApkType = 'Google_Service_Testing_FileReference';
  protected $appApkDataType = '';
  protected $appBundleType = 'Google_Service_Testing_AppBundle';
  protected $appBundleDataType = '';
  public $appInitialActivity;
  public $appPackageId;
  public $maxDepth;
  public $maxSteps;
  protected $roboDirectivesType = 'Google_Service_Testing_RoboDirective';
  protected $roboDirectivesDataType = 'array';
  protected $roboScriptType = 'Google_Service_Testing_FileReference';
  protected $roboScriptDataType = '';
  protected $startingIntentsType = 'Google_Service_Testing_RoboStartingIntent';
  protected $startingIntentsDataType = 'array';

  /**
   * @param Google_Service_Testing_FileReference
   */
  public function setAppApk(Google_Service_Testing_FileReference $appApk)
  {
    $this->appApk = $appApk;
  }
  /**
   * @return Google_Service_Testing_FileReference
   */
  public function getAppApk()
  {
    return $this->appApk;
  }
  /**
   * @param Google_Service_Testing_AppBundle
   */
  public function setAppBundle(Google_Service_Testing_AppBundle $appBundle)
  {
    $this->appBundle = $appBundle;
  }
  /**
   * @return Google_Service_Testing_AppBundle
   */
  public function getAppBundle()
  {
    return $this->appBundle;
  }
  public function setAppInitialActivity($appInitialActivity)
  {
    $this->appInitialActivity = $appInitialActivity;
  }
  public function getAppInitialActivity()
  {
    return $this->appInitialActivity;
  }
  public function setAppPackageId($appPackageId)
  {
    $this->appPackageId = $appPackageId;
  }
  public function getAppPackageId()
  {
    return $this->appPackageId;
  }
  public function setMaxDepth($maxDepth)
  {
    $this->maxDepth = $maxDepth;
  }
  public function getMaxDepth()
  {
    return $this->maxDepth;
  }
  public function setMaxSteps($maxSteps)
  {
    $this->maxSteps = $maxSteps;
  }
  public function getMaxSteps()
  {
    return $this->maxSteps;
  }
  /**
   * @param Google_Service_Testing_RoboDirective[]
   */
  public function setRoboDirectives($roboDirectives)
  {
    $this->roboDirectives = $roboDirectives;
  }
  /**
   * @return Google_Service_Testing_RoboDirective[]
   */
  public function getRoboDirectives()
  {
    return $this->roboDirectives;
  }
  /**
   * @param Google_Service_Testing_FileReference
   */
  public function setRoboScript(Google_Service_Testing_FileReference $roboScript)
  {
    $this->roboScript = $roboScript;
  }
  /**
   * @return Google_Service_Testing_FileReference
   */
  public function getRoboScript()
  {
    return $this->roboScript;
  }
  /**
   * @param Google_Service_Testing_RoboStartingIntent[]
   */
  public function setStartingIntents($startingIntents)
  {
    $this->startingIntents = $startingIntents;
  }
  /**
   * @return Google_Service_Testing_RoboStartingIntent[]
   */
  public function getStartingIntents()
  {
    return $this->startingIntents;
  }
}

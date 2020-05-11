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

class Google_Service_Testing_RoboStartingIntent extends Google_Model
{
  protected $launcherActivityType = 'Google_Service_Testing_LauncherActivityIntent';
  protected $launcherActivityDataType = '';
  protected $startActivityType = 'Google_Service_Testing_StartActivityIntent';
  protected $startActivityDataType = '';
  public $timeout;

  /**
   * @param Google_Service_Testing_LauncherActivityIntent
   */
  public function setLauncherActivity(Google_Service_Testing_LauncherActivityIntent $launcherActivity)
  {
    $this->launcherActivity = $launcherActivity;
  }
  /**
   * @return Google_Service_Testing_LauncherActivityIntent
   */
  public function getLauncherActivity()
  {
    return $this->launcherActivity;
  }
  /**
   * @param Google_Service_Testing_StartActivityIntent
   */
  public function setStartActivity(Google_Service_Testing_StartActivityIntent $startActivity)
  {
    $this->startActivity = $startActivity;
  }
  /**
   * @return Google_Service_Testing_StartActivityIntent
   */
  public function getStartActivity()
  {
    return $this->startActivity;
  }
  public function setTimeout($timeout)
  {
    $this->timeout = $timeout;
  }
  public function getTimeout()
  {
    return $this->timeout;
  }
}

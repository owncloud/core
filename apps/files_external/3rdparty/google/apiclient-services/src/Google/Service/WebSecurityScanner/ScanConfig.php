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

class Google_Service_WebSecurityScanner_ScanConfig extends Google_Collection
{
  protected $collection_key = 'targetPlatforms';
  protected $authenticationType = 'Google_Service_WebSecurityScanner_Authentication';
  protected $authenticationDataType = '';
  public $blacklistPatterns;
  public $displayName;
  protected $latestRunType = 'Google_Service_WebSecurityScanner_ScanRun';
  protected $latestRunDataType = '';
  public $maxQps;
  public $name;
  protected $scheduleType = 'Google_Service_WebSecurityScanner_Schedule';
  protected $scheduleDataType = '';
  public $startingUrls;
  public $targetPlatforms;
  public $userAgent;

  /**
   * @param Google_Service_WebSecurityScanner_Authentication
   */
  public function setAuthentication(Google_Service_WebSecurityScanner_Authentication $authentication)
  {
    $this->authentication = $authentication;
  }
  /**
   * @return Google_Service_WebSecurityScanner_Authentication
   */
  public function getAuthentication()
  {
    return $this->authentication;
  }
  public function setBlacklistPatterns($blacklistPatterns)
  {
    $this->blacklistPatterns = $blacklistPatterns;
  }
  public function getBlacklistPatterns()
  {
    return $this->blacklistPatterns;
  }
  public function setDisplayName($displayName)
  {
    $this->displayName = $displayName;
  }
  public function getDisplayName()
  {
    return $this->displayName;
  }
  /**
   * @param Google_Service_WebSecurityScanner_ScanRun
   */
  public function setLatestRun(Google_Service_WebSecurityScanner_ScanRun $latestRun)
  {
    $this->latestRun = $latestRun;
  }
  /**
   * @return Google_Service_WebSecurityScanner_ScanRun
   */
  public function getLatestRun()
  {
    return $this->latestRun;
  }
  public function setMaxQps($maxQps)
  {
    $this->maxQps = $maxQps;
  }
  public function getMaxQps()
  {
    return $this->maxQps;
  }
  public function setName($name)
  {
    $this->name = $name;
  }
  public function getName()
  {
    return $this->name;
  }
  /**
   * @param Google_Service_WebSecurityScanner_Schedule
   */
  public function setSchedule(Google_Service_WebSecurityScanner_Schedule $schedule)
  {
    $this->schedule = $schedule;
  }
  /**
   * @return Google_Service_WebSecurityScanner_Schedule
   */
  public function getSchedule()
  {
    return $this->schedule;
  }
  public function setStartingUrls($startingUrls)
  {
    $this->startingUrls = $startingUrls;
  }
  public function getStartingUrls()
  {
    return $this->startingUrls;
  }
  public function setTargetPlatforms($targetPlatforms)
  {
    $this->targetPlatforms = $targetPlatforms;
  }
  public function getTargetPlatforms()
  {
    return $this->targetPlatforms;
  }
  public function setUserAgent($userAgent)
  {
    $this->userAgent = $userAgent;
  }
  public function getUserAgent()
  {
    return $this->userAgent;
  }
}

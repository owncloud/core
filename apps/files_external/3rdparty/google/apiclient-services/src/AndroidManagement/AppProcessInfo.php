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

namespace Google\Service\AndroidManagement;

class AppProcessInfo extends \Google\Collection
{
  protected $collection_key = 'packageNames';
  /**
   * @var string
   */
  public $apkSha256Hash;
  /**
   * @var string[]
   */
  public $packageNames;
  /**
   * @var int
   */
  public $pid;
  /**
   * @var string
   */
  public $processName;
  /**
   * @var string
   */
  public $seinfo;
  /**
   * @var string
   */
  public $startTime;
  /**
   * @var int
   */
  public $uid;

  /**
   * @param string
   */
  public function setApkSha256Hash($apkSha256Hash)
  {
    $this->apkSha256Hash = $apkSha256Hash;
  }
  /**
   * @return string
   */
  public function getApkSha256Hash()
  {
    return $this->apkSha256Hash;
  }
  /**
   * @param string[]
   */
  public function setPackageNames($packageNames)
  {
    $this->packageNames = $packageNames;
  }
  /**
   * @return string[]
   */
  public function getPackageNames()
  {
    return $this->packageNames;
  }
  /**
   * @param int
   */
  public function setPid($pid)
  {
    $this->pid = $pid;
  }
  /**
   * @return int
   */
  public function getPid()
  {
    return $this->pid;
  }
  /**
   * @param string
   */
  public function setProcessName($processName)
  {
    $this->processName = $processName;
  }
  /**
   * @return string
   */
  public function getProcessName()
  {
    return $this->processName;
  }
  /**
   * @param string
   */
  public function setSeinfo($seinfo)
  {
    $this->seinfo = $seinfo;
  }
  /**
   * @return string
   */
  public function getSeinfo()
  {
    return $this->seinfo;
  }
  /**
   * @param string
   */
  public function setStartTime($startTime)
  {
    $this->startTime = $startTime;
  }
  /**
   * @return string
   */
  public function getStartTime()
  {
    return $this->startTime;
  }
  /**
   * @param int
   */
  public function setUid($uid)
  {
    $this->uid = $uid;
  }
  /**
   * @return int
   */
  public function getUid()
  {
    return $this->uid;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(AppProcessInfo::class, 'Google_Service_AndroidManagement_AppProcessInfo');

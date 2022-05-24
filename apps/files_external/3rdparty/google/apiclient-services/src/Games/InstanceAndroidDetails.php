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

namespace Google\Service\Games;

class InstanceAndroidDetails extends \Google\Model
{
  /**
   * @var bool
   */
  public $enablePiracyCheck;
  /**
   * @var string
   */
  public $kind;
  /**
   * @var string
   */
  public $packageName;
  /**
   * @var bool
   */
  public $preferred;

  /**
   * @param bool
   */
  public function setEnablePiracyCheck($enablePiracyCheck)
  {
    $this->enablePiracyCheck = $enablePiracyCheck;
  }
  /**
   * @return bool
   */
  public function getEnablePiracyCheck()
  {
    return $this->enablePiracyCheck;
  }
  /**
   * @param string
   */
  public function setKind($kind)
  {
    $this->kind = $kind;
  }
  /**
   * @return string
   */
  public function getKind()
  {
    return $this->kind;
  }
  /**
   * @param string
   */
  public function setPackageName($packageName)
  {
    $this->packageName = $packageName;
  }
  /**
   * @return string
   */
  public function getPackageName()
  {
    return $this->packageName;
  }
  /**
   * @param bool
   */
  public function setPreferred($preferred)
  {
    $this->preferred = $preferred;
  }
  /**
   * @return bool
   */
  public function getPreferred()
  {
    return $this->preferred;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(InstanceAndroidDetails::class, 'Google_Service_Games_InstanceAndroidDetails');

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

namespace Google\Service\ToolResults;

class SkippedDetail extends \Google\Model
{
  /**
   * @var bool
   */
  public $incompatibleAppVersion;
  /**
   * @var bool
   */
  public $incompatibleArchitecture;
  /**
   * @var bool
   */
  public $incompatibleDevice;

  /**
   * @param bool
   */
  public function setIncompatibleAppVersion($incompatibleAppVersion)
  {
    $this->incompatibleAppVersion = $incompatibleAppVersion;
  }
  /**
   * @return bool
   */
  public function getIncompatibleAppVersion()
  {
    return $this->incompatibleAppVersion;
  }
  /**
   * @param bool
   */
  public function setIncompatibleArchitecture($incompatibleArchitecture)
  {
    $this->incompatibleArchitecture = $incompatibleArchitecture;
  }
  /**
   * @return bool
   */
  public function getIncompatibleArchitecture()
  {
    return $this->incompatibleArchitecture;
  }
  /**
   * @param bool
   */
  public function setIncompatibleDevice($incompatibleDevice)
  {
    $this->incompatibleDevice = $incompatibleDevice;
  }
  /**
   * @return bool
   */
  public function getIncompatibleDevice()
  {
    return $this->incompatibleDevice;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(SkippedDetail::class, 'Google_Service_ToolResults_SkippedDetail');

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

namespace Google\Service\Compute;

class LicenseResourceRequirements extends \Google\Model
{
  /**
   * @var int
   */
  public $minGuestCpuCount;
  /**
   * @var int
   */
  public $minMemoryMb;

  /**
   * @param int
   */
  public function setMinGuestCpuCount($minGuestCpuCount)
  {
    $this->minGuestCpuCount = $minGuestCpuCount;
  }
  /**
   * @return int
   */
  public function getMinGuestCpuCount()
  {
    return $this->minGuestCpuCount;
  }
  /**
   * @param int
   */
  public function setMinMemoryMb($minMemoryMb)
  {
    $this->minMemoryMb = $minMemoryMb;
  }
  /**
   * @return int
   */
  public function getMinMemoryMb()
  {
    return $this->minMemoryMb;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(LicenseResourceRequirements::class, 'Google_Service_Compute_LicenseResourceRequirements');

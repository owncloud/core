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

class LocalDisk extends \Google\Model
{
  /**
   * @var int
   */
  public $diskCount;
  /**
   * @var int
   */
  public $diskSizeGb;
  /**
   * @var string
   */
  public $diskType;

  /**
   * @param int
   */
  public function setDiskCount($diskCount)
  {
    $this->diskCount = $diskCount;
  }
  /**
   * @return int
   */
  public function getDiskCount()
  {
    return $this->diskCount;
  }
  /**
   * @param int
   */
  public function setDiskSizeGb($diskSizeGb)
  {
    $this->diskSizeGb = $diskSizeGb;
  }
  /**
   * @return int
   */
  public function getDiskSizeGb()
  {
    return $this->diskSizeGb;
  }
  /**
   * @param string
   */
  public function setDiskType($diskType)
  {
    $this->diskType = $diskType;
  }
  /**
   * @return string
   */
  public function getDiskType()
  {
    return $this->diskType;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(LocalDisk::class, 'Google_Service_Compute_LocalDisk');

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

namespace Google\Service\Storage;

class BucketRetentionPolicy extends \Google\Model
{
  /**
   * @var string
   */
  public $effectiveTime;
  /**
   * @var bool
   */
  public $isLocked;
  /**
   * @var string
   */
  public $retentionPeriod;

  /**
   * @param string
   */
  public function setEffectiveTime($effectiveTime)
  {
    $this->effectiveTime = $effectiveTime;
  }
  /**
   * @return string
   */
  public function getEffectiveTime()
  {
    return $this->effectiveTime;
  }
  /**
   * @param bool
   */
  public function setIsLocked($isLocked)
  {
    $this->isLocked = $isLocked;
  }
  /**
   * @return bool
   */
  public function getIsLocked()
  {
    return $this->isLocked;
  }
  /**
   * @param string
   */
  public function setRetentionPeriod($retentionPeriod)
  {
    $this->retentionPeriod = $retentionPeriod;
  }
  /**
   * @return string
   */
  public function getRetentionPeriod()
  {
    return $this->retentionPeriod;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(BucketRetentionPolicy::class, 'Google_Service_Storage_BucketRetentionPolicy');

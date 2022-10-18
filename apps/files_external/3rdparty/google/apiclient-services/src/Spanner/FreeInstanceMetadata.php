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

namespace Google\Service\Spanner;

class FreeInstanceMetadata extends \Google\Model
{
  /**
   * @var string
   */
  public $expireBehavior;
  /**
   * @var string
   */
  public $expireTime;
  /**
   * @var string
   */
  public $upgradeTime;

  /**
   * @param string
   */
  public function setExpireBehavior($expireBehavior)
  {
    $this->expireBehavior = $expireBehavior;
  }
  /**
   * @return string
   */
  public function getExpireBehavior()
  {
    return $this->expireBehavior;
  }
  /**
   * @param string
   */
  public function setExpireTime($expireTime)
  {
    $this->expireTime = $expireTime;
  }
  /**
   * @return string
   */
  public function getExpireTime()
  {
    return $this->expireTime;
  }
  /**
   * @param string
   */
  public function setUpgradeTime($upgradeTime)
  {
    $this->upgradeTime = $upgradeTime;
  }
  /**
   * @return string
   */
  public function getUpgradeTime()
  {
    return $this->upgradeTime;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(FreeInstanceMetadata::class, 'Google_Service_Spanner_FreeInstanceMetadata');

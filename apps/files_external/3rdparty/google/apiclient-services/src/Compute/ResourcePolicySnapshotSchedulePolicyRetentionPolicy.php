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

class ResourcePolicySnapshotSchedulePolicyRetentionPolicy extends \Google\Model
{
  /**
   * @var int
   */
  public $maxRetentionDays;
  /**
   * @var string
   */
  public $onSourceDiskDelete;

  /**
   * @param int
   */
  public function setMaxRetentionDays($maxRetentionDays)
  {
    $this->maxRetentionDays = $maxRetentionDays;
  }
  /**
   * @return int
   */
  public function getMaxRetentionDays()
  {
    return $this->maxRetentionDays;
  }
  /**
   * @param string
   */
  public function setOnSourceDiskDelete($onSourceDiskDelete)
  {
    $this->onSourceDiskDelete = $onSourceDiskDelete;
  }
  /**
   * @return string
   */
  public function getOnSourceDiskDelete()
  {
    return $this->onSourceDiskDelete;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(ResourcePolicySnapshotSchedulePolicyRetentionPolicy::class, 'Google_Service_Compute_ResourcePolicySnapshotSchedulePolicyRetentionPolicy');

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

namespace Google\Service\DriveLabels;

class GoogleAppsDriveLabelsV2Lifecycle extends \Google\Model
{
  protected $disabledPolicyType = GoogleAppsDriveLabelsV2LifecycleDisabledPolicy::class;
  protected $disabledPolicyDataType = '';
  /**
   * @var bool
   */
  public $hasUnpublishedChanges;
  /**
   * @var string
   */
  public $state;

  /**
   * @param GoogleAppsDriveLabelsV2LifecycleDisabledPolicy
   */
  public function setDisabledPolicy(GoogleAppsDriveLabelsV2LifecycleDisabledPolicy $disabledPolicy)
  {
    $this->disabledPolicy = $disabledPolicy;
  }
  /**
   * @return GoogleAppsDriveLabelsV2LifecycleDisabledPolicy
   */
  public function getDisabledPolicy()
  {
    return $this->disabledPolicy;
  }
  /**
   * @param bool
   */
  public function setHasUnpublishedChanges($hasUnpublishedChanges)
  {
    $this->hasUnpublishedChanges = $hasUnpublishedChanges;
  }
  /**
   * @return bool
   */
  public function getHasUnpublishedChanges()
  {
    return $this->hasUnpublishedChanges;
  }
  /**
   * @param string
   */
  public function setState($state)
  {
    $this->state = $state;
  }
  /**
   * @return string
   */
  public function getState()
  {
    return $this->state;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(GoogleAppsDriveLabelsV2Lifecycle::class, 'Google_Service_DriveLabels_GoogleAppsDriveLabelsV2Lifecycle');

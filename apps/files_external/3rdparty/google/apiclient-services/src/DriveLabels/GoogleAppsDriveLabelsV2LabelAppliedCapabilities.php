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

class GoogleAppsDriveLabelsV2LabelAppliedCapabilities extends \Google\Model
{
  /**
   * @var bool
   */
  public $canApply;
  /**
   * @var bool
   */
  public $canRead;
  /**
   * @var bool
   */
  public $canRemove;

  /**
   * @param bool
   */
  public function setCanApply($canApply)
  {
    $this->canApply = $canApply;
  }
  /**
   * @return bool
   */
  public function getCanApply()
  {
    return $this->canApply;
  }
  /**
   * @param bool
   */
  public function setCanRead($canRead)
  {
    $this->canRead = $canRead;
  }
  /**
   * @return bool
   */
  public function getCanRead()
  {
    return $this->canRead;
  }
  /**
   * @param bool
   */
  public function setCanRemove($canRemove)
  {
    $this->canRemove = $canRemove;
  }
  /**
   * @return bool
   */
  public function getCanRemove()
  {
    return $this->canRemove;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(GoogleAppsDriveLabelsV2LabelAppliedCapabilities::class, 'Google_Service_DriveLabels_GoogleAppsDriveLabelsV2LabelAppliedCapabilities');

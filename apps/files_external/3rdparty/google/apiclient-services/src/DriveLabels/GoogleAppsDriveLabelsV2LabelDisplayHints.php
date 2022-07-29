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

class GoogleAppsDriveLabelsV2LabelDisplayHints extends \Google\Model
{
  /**
   * @var bool
   */
  public $disabled;
  /**
   * @var bool
   */
  public $hiddenInSearch;
  /**
   * @var string
   */
  public $priority;
  /**
   * @var bool
   */
  public $shownInApply;

  /**
   * @param bool
   */
  public function setDisabled($disabled)
  {
    $this->disabled = $disabled;
  }
  /**
   * @return bool
   */
  public function getDisabled()
  {
    return $this->disabled;
  }
  /**
   * @param bool
   */
  public function setHiddenInSearch($hiddenInSearch)
  {
    $this->hiddenInSearch = $hiddenInSearch;
  }
  /**
   * @return bool
   */
  public function getHiddenInSearch()
  {
    return $this->hiddenInSearch;
  }
  /**
   * @param string
   */
  public function setPriority($priority)
  {
    $this->priority = $priority;
  }
  /**
   * @return string
   */
  public function getPriority()
  {
    return $this->priority;
  }
  /**
   * @param bool
   */
  public function setShownInApply($shownInApply)
  {
    $this->shownInApply = $shownInApply;
  }
  /**
   * @return bool
   */
  public function getShownInApply()
  {
    return $this->shownInApply;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(GoogleAppsDriveLabelsV2LabelDisplayHints::class, 'Google_Service_DriveLabels_GoogleAppsDriveLabelsV2LabelDisplayHints');

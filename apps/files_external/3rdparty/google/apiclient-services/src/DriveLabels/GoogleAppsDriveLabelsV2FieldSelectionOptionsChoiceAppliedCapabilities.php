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

class GoogleAppsDriveLabelsV2FieldSelectionOptionsChoiceAppliedCapabilities extends \Google\Model
{
  /**
   * @var bool
   */
  public $canRead;
  /**
   * @var bool
   */
  public $canSearch;
  /**
   * @var bool
   */
  public $canSelect;

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
  public function setCanSearch($canSearch)
  {
    $this->canSearch = $canSearch;
  }
  /**
   * @return bool
   */
  public function getCanSearch()
  {
    return $this->canSearch;
  }
  /**
   * @param bool
   */
  public function setCanSelect($canSelect)
  {
    $this->canSelect = $canSelect;
  }
  /**
   * @return bool
   */
  public function getCanSelect()
  {
    return $this->canSelect;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(GoogleAppsDriveLabelsV2FieldSelectionOptionsChoiceAppliedCapabilities::class, 'Google_Service_DriveLabels_GoogleAppsDriveLabelsV2FieldSelectionOptionsChoiceAppliedCapabilities');

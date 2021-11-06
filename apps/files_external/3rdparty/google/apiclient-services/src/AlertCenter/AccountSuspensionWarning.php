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

namespace Google\Service\AlertCenter;

class AccountSuspensionWarning extends \Google\Collection
{
  protected $collection_key = 'suspensionDetails';
  public $appealWindow;
  public $state;
  protected $suspensionDetailsType = AccountSuspensionDetails::class;
  protected $suspensionDetailsDataType = 'array';

  public function setAppealWindow($appealWindow)
  {
    $this->appealWindow = $appealWindow;
  }
  public function getAppealWindow()
  {
    return $this->appealWindow;
  }
  public function setState($state)
  {
    $this->state = $state;
  }
  public function getState()
  {
    return $this->state;
  }
  /**
   * @param AccountSuspensionDetails[]
   */
  public function setSuspensionDetails($suspensionDetails)
  {
    $this->suspensionDetails = $suspensionDetails;
  }
  /**
   * @return AccountSuspensionDetails[]
   */
  public function getSuspensionDetails()
  {
    return $this->suspensionDetails;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(AccountSuspensionWarning::class, 'Google_Service_AlertCenter_AccountSuspensionWarning');

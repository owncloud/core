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

namespace Google\Service\AndroidManagement;

class UsageLog extends \Google\Collection
{
  protected $collection_key = 'uploadOnCellularAllowed';
  /**
   * @var string[]
   */
  public $enabledLogTypes;
  /**
   * @var string[]
   */
  public $uploadOnCellularAllowed;

  /**
   * @param string[]
   */
  public function setEnabledLogTypes($enabledLogTypes)
  {
    $this->enabledLogTypes = $enabledLogTypes;
  }
  /**
   * @return string[]
   */
  public function getEnabledLogTypes()
  {
    return $this->enabledLogTypes;
  }
  /**
   * @param string[]
   */
  public function setUploadOnCellularAllowed($uploadOnCellularAllowed)
  {
    $this->uploadOnCellularAllowed = $uploadOnCellularAllowed;
  }
  /**
   * @return string[]
   */
  public function getUploadOnCellularAllowed()
  {
    return $this->uploadOnCellularAllowed;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(UsageLog::class, 'Google_Service_AndroidManagement_UsageLog');

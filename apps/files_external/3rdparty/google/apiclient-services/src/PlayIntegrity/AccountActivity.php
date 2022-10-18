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

namespace Google\Service\PlayIntegrity;

class AccountActivity extends \Google\Model
{
  /**
   * @var string
   */
  public $activityLevel;

  /**
   * @param string
   */
  public function setActivityLevel($activityLevel)
  {
    $this->activityLevel = $activityLevel;
  }
  /**
   * @return string
   */
  public function getActivityLevel()
  {
    return $this->activityLevel;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(AccountActivity::class, 'Google_Service_PlayIntegrity_AccountActivity');

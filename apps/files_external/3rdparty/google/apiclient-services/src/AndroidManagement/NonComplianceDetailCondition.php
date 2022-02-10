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

class NonComplianceDetailCondition extends \Google\Model
{
  /**
   * @var string
   */
  public $nonComplianceReason;
  /**
   * @var string
   */
  public $packageName;
  /**
   * @var string
   */
  public $settingName;

  /**
   * @param string
   */
  public function setNonComplianceReason($nonComplianceReason)
  {
    $this->nonComplianceReason = $nonComplianceReason;
  }
  /**
   * @return string
   */
  public function getNonComplianceReason()
  {
    return $this->nonComplianceReason;
  }
  /**
   * @param string
   */
  public function setPackageName($packageName)
  {
    $this->packageName = $packageName;
  }
  /**
   * @return string
   */
  public function getPackageName()
  {
    return $this->packageName;
  }
  /**
   * @param string
   */
  public function setSettingName($settingName)
  {
    $this->settingName = $settingName;
  }
  /**
   * @return string
   */
  public function getSettingName()
  {
    return $this->settingName;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(NonComplianceDetailCondition::class, 'Google_Service_AndroidManagement_NonComplianceDetailCondition');

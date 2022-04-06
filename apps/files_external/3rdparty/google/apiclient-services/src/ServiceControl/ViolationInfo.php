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

namespace Google\Service\ServiceControl;

class ViolationInfo extends \Google\Model
{
  /**
   * @var string
   */
  public $checkedValue;
  /**
   * @var string
   */
  public $constraint;
  /**
   * @var string
   */
  public $errorMessage;
  /**
   * @var string
   */
  public $policyType;

  /**
   * @param string
   */
  public function setCheckedValue($checkedValue)
  {
    $this->checkedValue = $checkedValue;
  }
  /**
   * @return string
   */
  public function getCheckedValue()
  {
    return $this->checkedValue;
  }
  /**
   * @param string
   */
  public function setConstraint($constraint)
  {
    $this->constraint = $constraint;
  }
  /**
   * @return string
   */
  public function getConstraint()
  {
    return $this->constraint;
  }
  /**
   * @param string
   */
  public function setErrorMessage($errorMessage)
  {
    $this->errorMessage = $errorMessage;
  }
  /**
   * @return string
   */
  public function getErrorMessage()
  {
    return $this->errorMessage;
  }
  /**
   * @param string
   */
  public function setPolicyType($policyType)
  {
    $this->policyType = $policyType;
  }
  /**
   * @return string
   */
  public function getPolicyType()
  {
    return $this->policyType;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(ViolationInfo::class, 'Google_Service_ServiceControl_ViolationInfo');

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

namespace Google\Service\DLP;

class GooglePrivacyDlpV2TransformationErrorHandling extends \Google\Model
{
  protected $leaveUntransformedType = GooglePrivacyDlpV2LeaveUntransformed::class;
  protected $leaveUntransformedDataType = '';
  protected $throwErrorType = GooglePrivacyDlpV2ThrowError::class;
  protected $throwErrorDataType = '';

  /**
   * @param GooglePrivacyDlpV2LeaveUntransformed
   */
  public function setLeaveUntransformed(GooglePrivacyDlpV2LeaveUntransformed $leaveUntransformed)
  {
    $this->leaveUntransformed = $leaveUntransformed;
  }
  /**
   * @return GooglePrivacyDlpV2LeaveUntransformed
   */
  public function getLeaveUntransformed()
  {
    return $this->leaveUntransformed;
  }
  /**
   * @param GooglePrivacyDlpV2ThrowError
   */
  public function setThrowError(GooglePrivacyDlpV2ThrowError $throwError)
  {
    $this->throwError = $throwError;
  }
  /**
   * @return GooglePrivacyDlpV2ThrowError
   */
  public function getThrowError()
  {
    return $this->throwError;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(GooglePrivacyDlpV2TransformationErrorHandling::class, 'Google_Service_DLP_GooglePrivacyDlpV2TransformationErrorHandling');

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

class Google_Service_DLP_GooglePrivacyDlpV2TransformationErrorHandling extends Google_Model
{
  protected $leaveUntransformedType = 'Google_Service_DLP_GooglePrivacyDlpV2LeaveUntransformed';
  protected $leaveUntransformedDataType = '';
  protected $throwErrorType = 'Google_Service_DLP_GooglePrivacyDlpV2ThrowError';
  protected $throwErrorDataType = '';

  /**
   * @param Google_Service_DLP_GooglePrivacyDlpV2LeaveUntransformed
   */
  public function setLeaveUntransformed(Google_Service_DLP_GooglePrivacyDlpV2LeaveUntransformed $leaveUntransformed)
  {
    $this->leaveUntransformed = $leaveUntransformed;
  }
  /**
   * @return Google_Service_DLP_GooglePrivacyDlpV2LeaveUntransformed
   */
  public function getLeaveUntransformed()
  {
    return $this->leaveUntransformed;
  }
  /**
   * @param Google_Service_DLP_GooglePrivacyDlpV2ThrowError
   */
  public function setThrowError(Google_Service_DLP_GooglePrivacyDlpV2ThrowError $throwError)
  {
    $this->throwError = $throwError;
  }
  /**
   * @return Google_Service_DLP_GooglePrivacyDlpV2ThrowError
   */
  public function getThrowError()
  {
    return $this->throwError;
  }
}

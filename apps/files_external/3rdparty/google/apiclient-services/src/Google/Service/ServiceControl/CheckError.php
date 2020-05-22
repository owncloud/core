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

class Google_Service_ServiceControl_CheckError extends Google_Model
{
  public $code;
  public $detail;
  protected $statusType = 'Google_Service_ServiceControl_Status';
  protected $statusDataType = '';
  public $subject;

  public function setCode($code)
  {
    $this->code = $code;
  }
  public function getCode()
  {
    return $this->code;
  }
  public function setDetail($detail)
  {
    $this->detail = $detail;
  }
  public function getDetail()
  {
    return $this->detail;
  }
  /**
   * @param Google_Service_ServiceControl_Status
   */
  public function setStatus(Google_Service_ServiceControl_Status $status)
  {
    $this->status = $status;
  }
  /**
   * @return Google_Service_ServiceControl_Status
   */
  public function getStatus()
  {
    return $this->status;
  }
  public function setSubject($subject)
  {
    $this->subject = $subject;
  }
  public function getSubject()
  {
    return $this->subject;
  }
}

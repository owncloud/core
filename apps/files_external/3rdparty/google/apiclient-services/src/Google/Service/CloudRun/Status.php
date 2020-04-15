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

class Google_Service_CloudRun_Status extends Google_Model
{
  public $code;
  protected $detailsType = 'Google_Service_CloudRun_StatusDetails';
  protected $detailsDataType = '';
  public $message;
  protected $metadataType = 'Google_Service_CloudRun_ListMeta';
  protected $metadataDataType = '';
  public $reason;
  public $status;

  public function setCode($code)
  {
    $this->code = $code;
  }
  public function getCode()
  {
    return $this->code;
  }
  /**
   * @param Google_Service_CloudRun_StatusDetails
   */
  public function setDetails(Google_Service_CloudRun_StatusDetails $details)
  {
    $this->details = $details;
  }
  /**
   * @return Google_Service_CloudRun_StatusDetails
   */
  public function getDetails()
  {
    return $this->details;
  }
  public function setMessage($message)
  {
    $this->message = $message;
  }
  public function getMessage()
  {
    return $this->message;
  }
  /**
   * @param Google_Service_CloudRun_ListMeta
   */
  public function setMetadata(Google_Service_CloudRun_ListMeta $metadata)
  {
    $this->metadata = $metadata;
  }
  /**
   * @return Google_Service_CloudRun_ListMeta
   */
  public function getMetadata()
  {
    return $this->metadata;
  }
  public function setReason($reason)
  {
    $this->reason = $reason;
  }
  public function getReason()
  {
    return $this->reason;
  }
  public function setStatus($status)
  {
    $this->status = $status;
  }
  public function getStatus()
  {
    return $this->status;
  }
}

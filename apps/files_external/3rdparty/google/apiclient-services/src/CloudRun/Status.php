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

namespace Google\Service\CloudRun;

class Status extends \Google\Model
{
  /**
   * @var int
   */
  public $code;
  protected $detailsType = StatusDetails::class;
  protected $detailsDataType = '';
  /**
   * @var string
   */
  public $message;
  protected $metadataType = ListMeta::class;
  protected $metadataDataType = '';
  /**
   * @var string
   */
  public $reason;
  /**
   * @var string
   */
  public $status;

  /**
   * @param int
   */
  public function setCode($code)
  {
    $this->code = $code;
  }
  /**
   * @return int
   */
  public function getCode()
  {
    return $this->code;
  }
  /**
   * @param StatusDetails
   */
  public function setDetails(StatusDetails $details)
  {
    $this->details = $details;
  }
  /**
   * @return StatusDetails
   */
  public function getDetails()
  {
    return $this->details;
  }
  /**
   * @param string
   */
  public function setMessage($message)
  {
    $this->message = $message;
  }
  /**
   * @return string
   */
  public function getMessage()
  {
    return $this->message;
  }
  /**
   * @param ListMeta
   */
  public function setMetadata(ListMeta $metadata)
  {
    $this->metadata = $metadata;
  }
  /**
   * @return ListMeta
   */
  public function getMetadata()
  {
    return $this->metadata;
  }
  /**
   * @param string
   */
  public function setReason($reason)
  {
    $this->reason = $reason;
  }
  /**
   * @return string
   */
  public function getReason()
  {
    return $this->reason;
  }
  /**
   * @param string
   */
  public function setStatus($status)
  {
    $this->status = $status;
  }
  /**
   * @return string
   */
  public function getStatus()
  {
    return $this->status;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(Status::class, 'Google_Service_CloudRun_Status');

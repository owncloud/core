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

namespace Google\Service\Dfareporting;

class ReportDelivery extends \Google\Collection
{
  protected $collection_key = 'recipients';
  /**
   * @var bool
   */
  public $emailOwner;
  /**
   * @var string
   */
  public $emailOwnerDeliveryType;
  /**
   * @var string
   */
  public $message;
  protected $recipientsType = Recipient::class;
  protected $recipientsDataType = 'array';

  /**
   * @param bool
   */
  public function setEmailOwner($emailOwner)
  {
    $this->emailOwner = $emailOwner;
  }
  /**
   * @return bool
   */
  public function getEmailOwner()
  {
    return $this->emailOwner;
  }
  /**
   * @param string
   */
  public function setEmailOwnerDeliveryType($emailOwnerDeliveryType)
  {
    $this->emailOwnerDeliveryType = $emailOwnerDeliveryType;
  }
  /**
   * @return string
   */
  public function getEmailOwnerDeliveryType()
  {
    return $this->emailOwnerDeliveryType;
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
   * @param Recipient[]
   */
  public function setRecipients($recipients)
  {
    $this->recipients = $recipients;
  }
  /**
   * @return Recipient[]
   */
  public function getRecipients()
  {
    return $this->recipients;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(ReportDelivery::class, 'Google_Service_Dfareporting_ReportDelivery');

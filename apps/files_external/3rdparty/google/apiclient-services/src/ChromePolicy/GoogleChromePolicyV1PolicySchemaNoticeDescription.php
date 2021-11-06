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

namespace Google\Service\ChromePolicy;

class GoogleChromePolicyV1PolicySchemaNoticeDescription extends \Google\Model
{
  public $acknowledgementRequired;
  public $field;
  public $noticeMessage;
  public $noticeValue;

  public function setAcknowledgementRequired($acknowledgementRequired)
  {
    $this->acknowledgementRequired = $acknowledgementRequired;
  }
  public function getAcknowledgementRequired()
  {
    return $this->acknowledgementRequired;
  }
  public function setField($field)
  {
    $this->field = $field;
  }
  public function getField()
  {
    return $this->field;
  }
  public function setNoticeMessage($noticeMessage)
  {
    $this->noticeMessage = $noticeMessage;
  }
  public function getNoticeMessage()
  {
    return $this->noticeMessage;
  }
  public function setNoticeValue($noticeValue)
  {
    $this->noticeValue = $noticeValue;
  }
  public function getNoticeValue()
  {
    return $this->noticeValue;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(GoogleChromePolicyV1PolicySchemaNoticeDescription::class, 'Google_Service_ChromePolicy_GoogleChromePolicyV1PolicySchemaNoticeDescription');

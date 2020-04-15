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

class Google_Service_Apigee_GoogleCloudApigeeV1SendTestEmailPayload extends Google_Model
{
  public $emailTemplateId;
  public $to;

  public function setEmailTemplateId($emailTemplateId)
  {
    $this->emailTemplateId = $emailTemplateId;
  }
  public function getEmailTemplateId()
  {
    return $this->emailTemplateId;
  }
  public function setTo($to)
  {
    $this->to = $to;
  }
  public function getTo()
  {
    return $this->to;
  }
}

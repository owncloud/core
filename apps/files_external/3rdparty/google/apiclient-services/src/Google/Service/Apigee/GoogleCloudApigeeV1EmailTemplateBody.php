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

class Google_Service_Apigee_GoogleCloudApigeeV1EmailTemplateBody extends Google_Collection
{
  protected $collection_key = 'variables';
  public $emailTemplateId;
  public $htmlBody;
  public $id;
  public $modified;
  public $modifiedBy;
  public $siteId;
  public $subject;
  public $textBody;
  public $title;
  public $variables;

  public function setEmailTemplateId($emailTemplateId)
  {
    $this->emailTemplateId = $emailTemplateId;
  }
  public function getEmailTemplateId()
  {
    return $this->emailTemplateId;
  }
  public function setHtmlBody($htmlBody)
  {
    $this->htmlBody = $htmlBody;
  }
  public function getHtmlBody()
  {
    return $this->htmlBody;
  }
  public function setId($id)
  {
    $this->id = $id;
  }
  public function getId()
  {
    return $this->id;
  }
  public function setModified($modified)
  {
    $this->modified = $modified;
  }
  public function getModified()
  {
    return $this->modified;
  }
  public function setModifiedBy($modifiedBy)
  {
    $this->modifiedBy = $modifiedBy;
  }
  public function getModifiedBy()
  {
    return $this->modifiedBy;
  }
  public function setSiteId($siteId)
  {
    $this->siteId = $siteId;
  }
  public function getSiteId()
  {
    return $this->siteId;
  }
  public function setSubject($subject)
  {
    $this->subject = $subject;
  }
  public function getSubject()
  {
    return $this->subject;
  }
  public function setTextBody($textBody)
  {
    $this->textBody = $textBody;
  }
  public function getTextBody()
  {
    return $this->textBody;
  }
  public function setTitle($title)
  {
    $this->title = $title;
  }
  public function getTitle()
  {
    return $this->title;
  }
  public function setVariables($variables)
  {
    $this->variables = $variables;
  }
  public function getVariables()
  {
    return $this->variables;
  }
}

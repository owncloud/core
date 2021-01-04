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

class Google_Service_AlertCenter_GoogleAppsAlertcenterTypeGmailMessageInfo extends Google_Collection
{
  protected $collection_key = 'attachmentsSha256Hash';
  public $attachmentsSha256Hash;
  public $date;
  public $md5HashMessageBody;
  public $md5HashSubject;
  public $messageBodySnippet;
  public $messageId;
  public $recipient;
  public $subjectText;

  public function setAttachmentsSha256Hash($attachmentsSha256Hash)
  {
    $this->attachmentsSha256Hash = $attachmentsSha256Hash;
  }
  public function getAttachmentsSha256Hash()
  {
    return $this->attachmentsSha256Hash;
  }
  public function setDate($date)
  {
    $this->date = $date;
  }
  public function getDate()
  {
    return $this->date;
  }
  public function setMd5HashMessageBody($md5HashMessageBody)
  {
    $this->md5HashMessageBody = $md5HashMessageBody;
  }
  public function getMd5HashMessageBody()
  {
    return $this->md5HashMessageBody;
  }
  public function setMd5HashSubject($md5HashSubject)
  {
    $this->md5HashSubject = $md5HashSubject;
  }
  public function getMd5HashSubject()
  {
    return $this->md5HashSubject;
  }
  public function setMessageBodySnippet($messageBodySnippet)
  {
    $this->messageBodySnippet = $messageBodySnippet;
  }
  public function getMessageBodySnippet()
  {
    return $this->messageBodySnippet;
  }
  public function setMessageId($messageId)
  {
    $this->messageId = $messageId;
  }
  public function getMessageId()
  {
    return $this->messageId;
  }
  public function setRecipient($recipient)
  {
    $this->recipient = $recipient;
  }
  public function getRecipient()
  {
    return $this->recipient;
  }
  public function setSubjectText($subjectText)
  {
    $this->subjectText = $subjectText;
  }
  public function getSubjectText()
  {
    return $this->subjectText;
  }
}

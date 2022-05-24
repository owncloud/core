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

namespace Google\Service\AlertCenter;

class GmailMessageInfo extends \Google\Collection
{
  protected $collection_key = 'attachmentsSha256Hash';
  /**
   * @var string[]
   */
  public $attachmentsSha256Hash;
  /**
   * @var string
   */
  public $date;
  /**
   * @var string
   */
  public $md5HashMessageBody;
  /**
   * @var string
   */
  public $md5HashSubject;
  /**
   * @var string
   */
  public $messageBodySnippet;
  /**
   * @var string
   */
  public $messageId;
  /**
   * @var string
   */
  public $recipient;
  /**
   * @var string
   */
  public $subjectText;

  /**
   * @param string[]
   */
  public function setAttachmentsSha256Hash($attachmentsSha256Hash)
  {
    $this->attachmentsSha256Hash = $attachmentsSha256Hash;
  }
  /**
   * @return string[]
   */
  public function getAttachmentsSha256Hash()
  {
    return $this->attachmentsSha256Hash;
  }
  /**
   * @param string
   */
  public function setDate($date)
  {
    $this->date = $date;
  }
  /**
   * @return string
   */
  public function getDate()
  {
    return $this->date;
  }
  /**
   * @param string
   */
  public function setMd5HashMessageBody($md5HashMessageBody)
  {
    $this->md5HashMessageBody = $md5HashMessageBody;
  }
  /**
   * @return string
   */
  public function getMd5HashMessageBody()
  {
    return $this->md5HashMessageBody;
  }
  /**
   * @param string
   */
  public function setMd5HashSubject($md5HashSubject)
  {
    $this->md5HashSubject = $md5HashSubject;
  }
  /**
   * @return string
   */
  public function getMd5HashSubject()
  {
    return $this->md5HashSubject;
  }
  /**
   * @param string
   */
  public function setMessageBodySnippet($messageBodySnippet)
  {
    $this->messageBodySnippet = $messageBodySnippet;
  }
  /**
   * @return string
   */
  public function getMessageBodySnippet()
  {
    return $this->messageBodySnippet;
  }
  /**
   * @param string
   */
  public function setMessageId($messageId)
  {
    $this->messageId = $messageId;
  }
  /**
   * @return string
   */
  public function getMessageId()
  {
    return $this->messageId;
  }
  /**
   * @param string
   */
  public function setRecipient($recipient)
  {
    $this->recipient = $recipient;
  }
  /**
   * @return string
   */
  public function getRecipient()
  {
    return $this->recipient;
  }
  /**
   * @param string
   */
  public function setSubjectText($subjectText)
  {
    $this->subjectText = $subjectText;
  }
  /**
   * @return string
   */
  public function getSubjectText()
  {
    return $this->subjectText;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(GmailMessageInfo::class, 'Google_Service_AlertCenter_GmailMessageInfo');

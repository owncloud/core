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

class GoogleOperations extends \Google\Collection
{
  protected $collection_key = 'affectedUserEmails';
  public $affectedUserEmails;
  protected $attachmentDataType = Attachment::class;
  protected $attachmentDataDataType = '';
  public $description;
  public $header;
  public $title;

  public function setAffectedUserEmails($affectedUserEmails)
  {
    $this->affectedUserEmails = $affectedUserEmails;
  }
  public function getAffectedUserEmails()
  {
    return $this->affectedUserEmails;
  }
  /**
   * @param Attachment
   */
  public function setAttachmentData(Attachment $attachmentData)
  {
    $this->attachmentData = $attachmentData;
  }
  /**
   * @return Attachment
   */
  public function getAttachmentData()
  {
    return $this->attachmentData;
  }
  public function setDescription($description)
  {
    $this->description = $description;
  }
  public function getDescription()
  {
    return $this->description;
  }
  public function setHeader($header)
  {
    $this->header = $header;
  }
  public function getHeader()
  {
    return $this->header;
  }
  public function setTitle($title)
  {
    $this->title = $title;
  }
  public function getTitle()
  {
    return $this->title;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(GoogleOperations::class, 'Google_Service_AlertCenter_GoogleOperations');

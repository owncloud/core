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

namespace Google\Service\Calendar;

class EventAttachment extends \Google\Model
{
  /**
   * @var string
   */
  public $fileId;
  /**
   * @var string
   */
  public $fileUrl;
  /**
   * @var string
   */
  public $iconLink;
  /**
   * @var string
   */
  public $mimeType;
  /**
   * @var string
   */
  public $title;

  /**
   * @param string
   */
  public function setFileId($fileId)
  {
    $this->fileId = $fileId;
  }
  /**
   * @return string
   */
  public function getFileId()
  {
    return $this->fileId;
  }
  /**
   * @param string
   */
  public function setFileUrl($fileUrl)
  {
    $this->fileUrl = $fileUrl;
  }
  /**
   * @return string
   */
  public function getFileUrl()
  {
    return $this->fileUrl;
  }
  /**
   * @param string
   */
  public function setIconLink($iconLink)
  {
    $this->iconLink = $iconLink;
  }
  /**
   * @return string
   */
  public function getIconLink()
  {
    return $this->iconLink;
  }
  /**
   * @param string
   */
  public function setMimeType($mimeType)
  {
    $this->mimeType = $mimeType;
  }
  /**
   * @return string
   */
  public function getMimeType()
  {
    return $this->mimeType;
  }
  /**
   * @param string
   */
  public function setTitle($title)
  {
    $this->title = $title;
  }
  /**
   * @return string
   */
  public function getTitle()
  {
    return $this->title;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(EventAttachment::class, 'Google_Service_Calendar_EventAttachment');

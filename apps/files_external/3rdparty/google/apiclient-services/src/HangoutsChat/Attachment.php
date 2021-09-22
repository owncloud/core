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

namespace Google\Service\HangoutsChat;

class Attachment extends \Google\Model
{
  protected $attachmentDataRefType = AttachmentDataRef::class;
  protected $attachmentDataRefDataType = '';
  public $contentName;
  public $contentType;
  public $downloadUri;
  protected $driveDataRefType = DriveDataRef::class;
  protected $driveDataRefDataType = '';
  public $name;
  public $source;
  public $thumbnailUri;

  /**
   * @param AttachmentDataRef
   */
  public function setAttachmentDataRef(AttachmentDataRef $attachmentDataRef)
  {
    $this->attachmentDataRef = $attachmentDataRef;
  }
  /**
   * @return AttachmentDataRef
   */
  public function getAttachmentDataRef()
  {
    return $this->attachmentDataRef;
  }
  public function setContentName($contentName)
  {
    $this->contentName = $contentName;
  }
  public function getContentName()
  {
    return $this->contentName;
  }
  public function setContentType($contentType)
  {
    $this->contentType = $contentType;
  }
  public function getContentType()
  {
    return $this->contentType;
  }
  public function setDownloadUri($downloadUri)
  {
    $this->downloadUri = $downloadUri;
  }
  public function getDownloadUri()
  {
    return $this->downloadUri;
  }
  /**
   * @param DriveDataRef
   */
  public function setDriveDataRef(DriveDataRef $driveDataRef)
  {
    $this->driveDataRef = $driveDataRef;
  }
  /**
   * @return DriveDataRef
   */
  public function getDriveDataRef()
  {
    return $this->driveDataRef;
  }
  public function setName($name)
  {
    $this->name = $name;
  }
  public function getName()
  {
    return $this->name;
  }
  public function setSource($source)
  {
    $this->source = $source;
  }
  public function getSource()
  {
    return $this->source;
  }
  public function setThumbnailUri($thumbnailUri)
  {
    $this->thumbnailUri = $thumbnailUri;
  }
  public function getThumbnailUri()
  {
    return $this->thumbnailUri;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(Attachment::class, 'Google_Service_HangoutsChat_Attachment');

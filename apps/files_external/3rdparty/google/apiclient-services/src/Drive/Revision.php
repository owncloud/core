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

namespace Google\Service\Drive;

class Revision extends \Google\Model
{
  /**
   * @var string[]
   */
  public $exportLinks;
  /**
   * @var string
   */
  public $id;
  /**
   * @var bool
   */
  public $keepForever;
  /**
   * @var string
   */
  public $kind;
  protected $lastModifyingUserType = User::class;
  protected $lastModifyingUserDataType = '';
  /**
   * @var string
   */
  public $md5Checksum;
  /**
   * @var string
   */
  public $mimeType;
  /**
   * @var string
   */
  public $modifiedTime;
  /**
   * @var string
   */
  public $originalFilename;
  /**
   * @var bool
   */
  public $publishAuto;
  /**
   * @var bool
   */
  public $published;
  /**
   * @var string
   */
  public $publishedLink;
  /**
   * @var bool
   */
  public $publishedOutsideDomain;
  /**
   * @var string
   */
  public $size;

  /**
   * @param string[]
   */
  public function setExportLinks($exportLinks)
  {
    $this->exportLinks = $exportLinks;
  }
  /**
   * @return string[]
   */
  public function getExportLinks()
  {
    return $this->exportLinks;
  }
  /**
   * @param string
   */
  public function setId($id)
  {
    $this->id = $id;
  }
  /**
   * @return string
   */
  public function getId()
  {
    return $this->id;
  }
  /**
   * @param bool
   */
  public function setKeepForever($keepForever)
  {
    $this->keepForever = $keepForever;
  }
  /**
   * @return bool
   */
  public function getKeepForever()
  {
    return $this->keepForever;
  }
  /**
   * @param string
   */
  public function setKind($kind)
  {
    $this->kind = $kind;
  }
  /**
   * @return string
   */
  public function getKind()
  {
    return $this->kind;
  }
  /**
   * @param User
   */
  public function setLastModifyingUser(User $lastModifyingUser)
  {
    $this->lastModifyingUser = $lastModifyingUser;
  }
  /**
   * @return User
   */
  public function getLastModifyingUser()
  {
    return $this->lastModifyingUser;
  }
  /**
   * @param string
   */
  public function setMd5Checksum($md5Checksum)
  {
    $this->md5Checksum = $md5Checksum;
  }
  /**
   * @return string
   */
  public function getMd5Checksum()
  {
    return $this->md5Checksum;
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
  public function setModifiedTime($modifiedTime)
  {
    $this->modifiedTime = $modifiedTime;
  }
  /**
   * @return string
   */
  public function getModifiedTime()
  {
    return $this->modifiedTime;
  }
  /**
   * @param string
   */
  public function setOriginalFilename($originalFilename)
  {
    $this->originalFilename = $originalFilename;
  }
  /**
   * @return string
   */
  public function getOriginalFilename()
  {
    return $this->originalFilename;
  }
  /**
   * @param bool
   */
  public function setPublishAuto($publishAuto)
  {
    $this->publishAuto = $publishAuto;
  }
  /**
   * @return bool
   */
  public function getPublishAuto()
  {
    return $this->publishAuto;
  }
  /**
   * @param bool
   */
  public function setPublished($published)
  {
    $this->published = $published;
  }
  /**
   * @return bool
   */
  public function getPublished()
  {
    return $this->published;
  }
  /**
   * @param string
   */
  public function setPublishedLink($publishedLink)
  {
    $this->publishedLink = $publishedLink;
  }
  /**
   * @return string
   */
  public function getPublishedLink()
  {
    return $this->publishedLink;
  }
  /**
   * @param bool
   */
  public function setPublishedOutsideDomain($publishedOutsideDomain)
  {
    $this->publishedOutsideDomain = $publishedOutsideDomain;
  }
  /**
   * @return bool
   */
  public function getPublishedOutsideDomain()
  {
    return $this->publishedOutsideDomain;
  }
  /**
   * @param string
   */
  public function setSize($size)
  {
    $this->size = $size;
  }
  /**
   * @return string
   */
  public function getSize()
  {
    return $this->size;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(Revision::class, 'Google_Service_Drive_Revision');

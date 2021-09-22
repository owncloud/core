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

namespace Google\Service\PolyService;

class Asset extends \Google\Collection
{
  protected $collection_key = 'formats';
  public $authorName;
  public $createTime;
  public $description;
  public $displayName;
  protected $formatsType = Format::class;
  protected $formatsDataType = 'array';
  public $isCurated;
  public $license;
  public $metadata;
  public $name;
  protected $presentationParamsType = PresentationParams::class;
  protected $presentationParamsDataType = '';
  protected $remixInfoType = RemixInfo::class;
  protected $remixInfoDataType = '';
  protected $thumbnailType = PolyFile::class;
  protected $thumbnailDataType = '';
  public $updateTime;
  public $visibility;

  public function setAuthorName($authorName)
  {
    $this->authorName = $authorName;
  }
  public function getAuthorName()
  {
    return $this->authorName;
  }
  public function setCreateTime($createTime)
  {
    $this->createTime = $createTime;
  }
  public function getCreateTime()
  {
    return $this->createTime;
  }
  public function setDescription($description)
  {
    $this->description = $description;
  }
  public function getDescription()
  {
    return $this->description;
  }
  public function setDisplayName($displayName)
  {
    $this->displayName = $displayName;
  }
  public function getDisplayName()
  {
    return $this->displayName;
  }
  /**
   * @param Format[]
   */
  public function setFormats($formats)
  {
    $this->formats = $formats;
  }
  /**
   * @return Format[]
   */
  public function getFormats()
  {
    return $this->formats;
  }
  public function setIsCurated($isCurated)
  {
    $this->isCurated = $isCurated;
  }
  public function getIsCurated()
  {
    return $this->isCurated;
  }
  public function setLicense($license)
  {
    $this->license = $license;
  }
  public function getLicense()
  {
    return $this->license;
  }
  public function setMetadata($metadata)
  {
    $this->metadata = $metadata;
  }
  public function getMetadata()
  {
    return $this->metadata;
  }
  public function setName($name)
  {
    $this->name = $name;
  }
  public function getName()
  {
    return $this->name;
  }
  /**
   * @param PresentationParams
   */
  public function setPresentationParams(PresentationParams $presentationParams)
  {
    $this->presentationParams = $presentationParams;
  }
  /**
   * @return PresentationParams
   */
  public function getPresentationParams()
  {
    return $this->presentationParams;
  }
  /**
   * @param RemixInfo
   */
  public function setRemixInfo(RemixInfo $remixInfo)
  {
    $this->remixInfo = $remixInfo;
  }
  /**
   * @return RemixInfo
   */
  public function getRemixInfo()
  {
    return $this->remixInfo;
  }
  /**
   * @param PolyFile
   */
  public function setThumbnail(PolyFile $thumbnail)
  {
    $this->thumbnail = $thumbnail;
  }
  /**
   * @return PolyFile
   */
  public function getThumbnail()
  {
    return $this->thumbnail;
  }
  public function setUpdateTime($updateTime)
  {
    $this->updateTime = $updateTime;
  }
  public function getUpdateTime()
  {
    return $this->updateTime;
  }
  public function setVisibility($visibility)
  {
    $this->visibility = $visibility;
  }
  public function getVisibility()
  {
    return $this->visibility;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(Asset::class, 'Google_Service_PolyService_Asset');

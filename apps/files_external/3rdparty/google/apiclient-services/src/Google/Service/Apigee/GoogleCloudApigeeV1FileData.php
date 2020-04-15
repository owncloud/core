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

class Google_Service_Apigee_GoogleCloudApigeeV1FileData extends Google_Model
{
  public $extension;
  public $filename;
  public $fullUrl;
  public $height;
  public $image;
  public $modified;
  public $relUrl;
  public $size;
  public $thumbUrl;
  public $versionedRelUrl;
  public $width;

  public function setExtension($extension)
  {
    $this->extension = $extension;
  }
  public function getExtension()
  {
    return $this->extension;
  }
  public function setFilename($filename)
  {
    $this->filename = $filename;
  }
  public function getFilename()
  {
    return $this->filename;
  }
  public function setFullUrl($fullUrl)
  {
    $this->fullUrl = $fullUrl;
  }
  public function getFullUrl()
  {
    return $this->fullUrl;
  }
  public function setHeight($height)
  {
    $this->height = $height;
  }
  public function getHeight()
  {
    return $this->height;
  }
  public function setImage($image)
  {
    $this->image = $image;
  }
  public function getImage()
  {
    return $this->image;
  }
  public function setModified($modified)
  {
    $this->modified = $modified;
  }
  public function getModified()
  {
    return $this->modified;
  }
  public function setRelUrl($relUrl)
  {
    $this->relUrl = $relUrl;
  }
  public function getRelUrl()
  {
    return $this->relUrl;
  }
  public function setSize($size)
  {
    $this->size = $size;
  }
  public function getSize()
  {
    return $this->size;
  }
  public function setThumbUrl($thumbUrl)
  {
    $this->thumbUrl = $thumbUrl;
  }
  public function getThumbUrl()
  {
    return $this->thumbUrl;
  }
  public function setVersionedRelUrl($versionedRelUrl)
  {
    $this->versionedRelUrl = $versionedRelUrl;
  }
  public function getVersionedRelUrl()
  {
    return $this->versionedRelUrl;
  }
  public function setWidth($width)
  {
    $this->width = $width;
  }
  public function getWidth()
  {
    return $this->width;
  }
}

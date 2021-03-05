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

class Google_Service_ArtifactRegistry_DockerImage extends Google_Collection
{
  protected $collection_key = 'tags';
  public $imageSizeBytes;
  public $mediaType;
  public $name;
  public $tags;
  public $uploadTime;
  public $uri;

  public function setImageSizeBytes($imageSizeBytes)
  {
    $this->imageSizeBytes = $imageSizeBytes;
  }
  public function getImageSizeBytes()
  {
    return $this->imageSizeBytes;
  }
  public function setMediaType($mediaType)
  {
    $this->mediaType = $mediaType;
  }
  public function getMediaType()
  {
    return $this->mediaType;
  }
  public function setName($name)
  {
    $this->name = $name;
  }
  public function getName()
  {
    return $this->name;
  }
  public function setTags($tags)
  {
    $this->tags = $tags;
  }
  public function getTags()
  {
    return $this->tags;
  }
  public function setUploadTime($uploadTime)
  {
    $this->uploadTime = $uploadTime;
  }
  public function getUploadTime()
  {
    return $this->uploadTime;
  }
  public function setUri($uri)
  {
    $this->uri = $uri;
  }
  public function getUri()
  {
    return $this->uri;
  }
}

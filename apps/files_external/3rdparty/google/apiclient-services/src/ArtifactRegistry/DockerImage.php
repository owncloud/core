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

namespace Google\Service\ArtifactRegistry;

class DockerImage extends \Google\Collection
{
  protected $collection_key = 'tags';
  /**
   * @var string
   */
  public $buildTime;
  /**
   * @var string
   */
  public $imageSizeBytes;
  /**
   * @var string
   */
  public $mediaType;
  /**
   * @var string
   */
  public $name;
  /**
   * @var string[]
   */
  public $tags;
  /**
   * @var string
   */
  public $uploadTime;
  /**
   * @var string
   */
  public $uri;

  /**
   * @param string
   */
  public function setBuildTime($buildTime)
  {
    $this->buildTime = $buildTime;
  }
  /**
   * @return string
   */
  public function getBuildTime()
  {
    return $this->buildTime;
  }
  /**
   * @param string
   */
  public function setImageSizeBytes($imageSizeBytes)
  {
    $this->imageSizeBytes = $imageSizeBytes;
  }
  /**
   * @return string
   */
  public function getImageSizeBytes()
  {
    return $this->imageSizeBytes;
  }
  /**
   * @param string
   */
  public function setMediaType($mediaType)
  {
    $this->mediaType = $mediaType;
  }
  /**
   * @return string
   */
  public function getMediaType()
  {
    return $this->mediaType;
  }
  /**
   * @param string
   */
  public function setName($name)
  {
    $this->name = $name;
  }
  /**
   * @return string
   */
  public function getName()
  {
    return $this->name;
  }
  /**
   * @param string[]
   */
  public function setTags($tags)
  {
    $this->tags = $tags;
  }
  /**
   * @return string[]
   */
  public function getTags()
  {
    return $this->tags;
  }
  /**
   * @param string
   */
  public function setUploadTime($uploadTime)
  {
    $this->uploadTime = $uploadTime;
  }
  /**
   * @return string
   */
  public function getUploadTime()
  {
    return $this->uploadTime;
  }
  /**
   * @param string
   */
  public function setUri($uri)
  {
    $this->uri = $uri;
  }
  /**
   * @return string
   */
  public function getUri()
  {
    return $this->uri;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(DockerImage::class, 'Google_Service_ArtifactRegistry_DockerImage');

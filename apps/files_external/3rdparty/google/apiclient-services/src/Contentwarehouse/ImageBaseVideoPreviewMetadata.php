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

namespace Google\Service\Contentwarehouse;

class ImageBaseVideoPreviewMetadata extends \Google\Model
{
  /**
   * @var int
   */
  public $byteSize;
  /**
   * @var string
   */
  public $docid;
  /**
   * @var int
   */
  public $duration;
  /**
   * @var string
   */
  public $expirationTimestampMicros;
  /**
   * @var string
   */
  public $fprint;
  /**
   * @var int
   */
  public $height;
  /**
   * @var string
   */
  public $mimeType;
  /**
   * @var string
   */
  public $state;
  /**
   * @var int
   */
  public $timestamp;
  /**
   * @var string
   */
  public $type;
  /**
   * @var int
   */
  public $width;

  /**
   * @param int
   */
  public function setByteSize($byteSize)
  {
    $this->byteSize = $byteSize;
  }
  /**
   * @return int
   */
  public function getByteSize()
  {
    return $this->byteSize;
  }
  /**
   * @param string
   */
  public function setDocid($docid)
  {
    $this->docid = $docid;
  }
  /**
   * @return string
   */
  public function getDocid()
  {
    return $this->docid;
  }
  /**
   * @param int
   */
  public function setDuration($duration)
  {
    $this->duration = $duration;
  }
  /**
   * @return int
   */
  public function getDuration()
  {
    return $this->duration;
  }
  /**
   * @param string
   */
  public function setExpirationTimestampMicros($expirationTimestampMicros)
  {
    $this->expirationTimestampMicros = $expirationTimestampMicros;
  }
  /**
   * @return string
   */
  public function getExpirationTimestampMicros()
  {
    return $this->expirationTimestampMicros;
  }
  /**
   * @param string
   */
  public function setFprint($fprint)
  {
    $this->fprint = $fprint;
  }
  /**
   * @return string
   */
  public function getFprint()
  {
    return $this->fprint;
  }
  /**
   * @param int
   */
  public function setHeight($height)
  {
    $this->height = $height;
  }
  /**
   * @return int
   */
  public function getHeight()
  {
    return $this->height;
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
  public function setState($state)
  {
    $this->state = $state;
  }
  /**
   * @return string
   */
  public function getState()
  {
    return $this->state;
  }
  /**
   * @param int
   */
  public function setTimestamp($timestamp)
  {
    $this->timestamp = $timestamp;
  }
  /**
   * @return int
   */
  public function getTimestamp()
  {
    return $this->timestamp;
  }
  /**
   * @param string
   */
  public function setType($type)
  {
    $this->type = $type;
  }
  /**
   * @return string
   */
  public function getType()
  {
    return $this->type;
  }
  /**
   * @param int
   */
  public function setWidth($width)
  {
    $this->width = $width;
  }
  /**
   * @return int
   */
  public function getWidth()
  {
    return $this->width;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(ImageBaseVideoPreviewMetadata::class, 'Google_Service_Contentwarehouse_ImageBaseVideoPreviewMetadata');

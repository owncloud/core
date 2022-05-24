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

namespace Google\Service\CloudSupport;

class DiffChecksumsResponse extends \Google\Model
{
  protected $checksumsLocationType = CompositeMedia::class;
  protected $checksumsLocationDataType = '';
  /**
   * @var string
   */
  public $chunkSizeBytes;
  protected $objectLocationType = CompositeMedia::class;
  protected $objectLocationDataType = '';
  /**
   * @var string
   */
  public $objectSizeBytes;
  /**
   * @var string
   */
  public $objectVersion;

  /**
   * @param CompositeMedia
   */
  public function setChecksumsLocation(CompositeMedia $checksumsLocation)
  {
    $this->checksumsLocation = $checksumsLocation;
  }
  /**
   * @return CompositeMedia
   */
  public function getChecksumsLocation()
  {
    return $this->checksumsLocation;
  }
  /**
   * @param string
   */
  public function setChunkSizeBytes($chunkSizeBytes)
  {
    $this->chunkSizeBytes = $chunkSizeBytes;
  }
  /**
   * @return string
   */
  public function getChunkSizeBytes()
  {
    return $this->chunkSizeBytes;
  }
  /**
   * @param CompositeMedia
   */
  public function setObjectLocation(CompositeMedia $objectLocation)
  {
    $this->objectLocation = $objectLocation;
  }
  /**
   * @return CompositeMedia
   */
  public function getObjectLocation()
  {
    return $this->objectLocation;
  }
  /**
   * @param string
   */
  public function setObjectSizeBytes($objectSizeBytes)
  {
    $this->objectSizeBytes = $objectSizeBytes;
  }
  /**
   * @return string
   */
  public function getObjectSizeBytes()
  {
    return $this->objectSizeBytes;
  }
  /**
   * @param string
   */
  public function setObjectVersion($objectVersion)
  {
    $this->objectVersion = $objectVersion;
  }
  /**
   * @return string
   */
  public function getObjectVersion()
  {
    return $this->objectVersion;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(DiffChecksumsResponse::class, 'Google_Service_CloudSupport_DiffChecksumsResponse');

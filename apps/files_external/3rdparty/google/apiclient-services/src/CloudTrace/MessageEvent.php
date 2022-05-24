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

namespace Google\Service\CloudTrace;

class MessageEvent extends \Google\Model
{
  /**
   * @var string
   */
  public $compressedSizeBytes;
  /**
   * @var string
   */
  public $id;
  /**
   * @var string
   */
  public $type;
  /**
   * @var string
   */
  public $uncompressedSizeBytes;

  /**
   * @param string
   */
  public function setCompressedSizeBytes($compressedSizeBytes)
  {
    $this->compressedSizeBytes = $compressedSizeBytes;
  }
  /**
   * @return string
   */
  public function getCompressedSizeBytes()
  {
    return $this->compressedSizeBytes;
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
   * @param string
   */
  public function setUncompressedSizeBytes($uncompressedSizeBytes)
  {
    $this->uncompressedSizeBytes = $uncompressedSizeBytes;
  }
  /**
   * @return string
   */
  public function getUncompressedSizeBytes()
  {
    return $this->uncompressedSizeBytes;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(MessageEvent::class, 'Google_Service_CloudTrace_MessageEvent');

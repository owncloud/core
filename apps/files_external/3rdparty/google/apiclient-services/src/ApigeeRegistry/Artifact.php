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

namespace Google\Service\ApigeeRegistry;

class Artifact extends \Google\Model
{
  /**
   * @var string
   */
  public $contents;
  /**
   * @var string
   */
  public $createTime;
  /**
   * @var string
   */
  public $hash;
  /**
   * @var string
   */
  public $mimeType;
  /**
   * @var string
   */
  public $name;
  /**
   * @var int
   */
  public $sizeBytes;
  /**
   * @var string
   */
  public $updateTime;

  /**
   * @param string
   */
  public function setContents($contents)
  {
    $this->contents = $contents;
  }
  /**
   * @return string
   */
  public function getContents()
  {
    return $this->contents;
  }
  /**
   * @param string
   */
  public function setCreateTime($createTime)
  {
    $this->createTime = $createTime;
  }
  /**
   * @return string
   */
  public function getCreateTime()
  {
    return $this->createTime;
  }
  /**
   * @param string
   */
  public function setHash($hash)
  {
    $this->hash = $hash;
  }
  /**
   * @return string
   */
  public function getHash()
  {
    return $this->hash;
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
   * @param int
   */
  public function setSizeBytes($sizeBytes)
  {
    $this->sizeBytes = $sizeBytes;
  }
  /**
   * @return int
   */
  public function getSizeBytes()
  {
    return $this->sizeBytes;
  }
  /**
   * @param string
   */
  public function setUpdateTime($updateTime)
  {
    $this->updateTime = $updateTime;
  }
  /**
   * @return string
   */
  public function getUpdateTime()
  {
    return $this->updateTime;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(Artifact::class, 'Google_Service_ApigeeRegistry_Artifact');

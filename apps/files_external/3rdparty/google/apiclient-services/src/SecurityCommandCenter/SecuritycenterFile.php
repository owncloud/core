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

namespace Google\Service\SecurityCommandCenter;

class SecuritycenterFile extends \Google\Model
{
  /**
   * @var string
   */
  public $contents;
  /**
   * @var string
   */
  public $hashedSize;
  /**
   * @var bool
   */
  public $partiallyHashed;
  /**
   * @var string
   */
  public $path;
  /**
   * @var string
   */
  public $sha256;
  /**
   * @var string
   */
  public $size;

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
  public function setHashedSize($hashedSize)
  {
    $this->hashedSize = $hashedSize;
  }
  /**
   * @return string
   */
  public function getHashedSize()
  {
    return $this->hashedSize;
  }
  /**
   * @param bool
   */
  public function setPartiallyHashed($partiallyHashed)
  {
    $this->partiallyHashed = $partiallyHashed;
  }
  /**
   * @return bool
   */
  public function getPartiallyHashed()
  {
    return $this->partiallyHashed;
  }
  /**
   * @param string
   */
  public function setPath($path)
  {
    $this->path = $path;
  }
  /**
   * @return string
   */
  public function getPath()
  {
    return $this->path;
  }
  /**
   * @param string
   */
  public function setSha256($sha256)
  {
    $this->sha256 = $sha256;
  }
  /**
   * @return string
   */
  public function getSha256()
  {
    return $this->sha256;
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
class_alias(SecuritycenterFile::class, 'Google_Service_SecurityCommandCenter_SecuritycenterFile');

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

namespace Google\Service\Compute;

class ImageRawDisk extends \Google\Model
{
  /**
   * @var string
   */
  public $containerType;
  /**
   * @var string
   */
  public $sha1Checksum;
  /**
   * @var string
   */
  public $source;

  /**
   * @param string
   */
  public function setContainerType($containerType)
  {
    $this->containerType = $containerType;
  }
  /**
   * @return string
   */
  public function getContainerType()
  {
    return $this->containerType;
  }
  /**
   * @param string
   */
  public function setSha1Checksum($sha1Checksum)
  {
    $this->sha1Checksum = $sha1Checksum;
  }
  /**
   * @return string
   */
  public function getSha1Checksum()
  {
    return $this->sha1Checksum;
  }
  /**
   * @param string
   */
  public function setSource($source)
  {
    $this->source = $source;
  }
  /**
   * @return string
   */
  public function getSource()
  {
    return $this->source;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(ImageRawDisk::class, 'Google_Service_Compute_ImageRawDisk');

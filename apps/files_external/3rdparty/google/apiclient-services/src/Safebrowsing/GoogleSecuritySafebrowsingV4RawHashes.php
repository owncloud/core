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

namespace Google\Service\Safebrowsing;

class GoogleSecuritySafebrowsingV4RawHashes extends \Google\Model
{
  /**
   * @var int
   */
  public $prefixSize;
  /**
   * @var string
   */
  public $rawHashes;

  /**
   * @param int
   */
  public function setPrefixSize($prefixSize)
  {
    $this->prefixSize = $prefixSize;
  }
  /**
   * @return int
   */
  public function getPrefixSize()
  {
    return $this->prefixSize;
  }
  /**
   * @param string
   */
  public function setRawHashes($rawHashes)
  {
    $this->rawHashes = $rawHashes;
  }
  /**
   * @return string
   */
  public function getRawHashes()
  {
    return $this->rawHashes;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(GoogleSecuritySafebrowsingV4RawHashes::class, 'Google_Service_Safebrowsing_GoogleSecuritySafebrowsingV4RawHashes');

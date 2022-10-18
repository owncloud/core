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

class RepositoryWebrefWebrefOutlinkInfo extends \Google\Collection
{
  protected $collection_key = 'topicalityWeight';
  /**
   * @var string[]
   */
  public $byteLength;
  /**
   * @var string[]
   */
  public $byteOffset;
  /**
   * @var bool
   */
  public $isNofollow;
  /**
   * @var float[]
   */
  public $topicalityWeight;
  /**
   * @var string
   */
  public $url;

  /**
   * @param string[]
   */
  public function setByteLength($byteLength)
  {
    $this->byteLength = $byteLength;
  }
  /**
   * @return string[]
   */
  public function getByteLength()
  {
    return $this->byteLength;
  }
  /**
   * @param string[]
   */
  public function setByteOffset($byteOffset)
  {
    $this->byteOffset = $byteOffset;
  }
  /**
   * @return string[]
   */
  public function getByteOffset()
  {
    return $this->byteOffset;
  }
  /**
   * @param bool
   */
  public function setIsNofollow($isNofollow)
  {
    $this->isNofollow = $isNofollow;
  }
  /**
   * @return bool
   */
  public function getIsNofollow()
  {
    return $this->isNofollow;
  }
  /**
   * @param float[]
   */
  public function setTopicalityWeight($topicalityWeight)
  {
    $this->topicalityWeight = $topicalityWeight;
  }
  /**
   * @return float[]
   */
  public function getTopicalityWeight()
  {
    return $this->topicalityWeight;
  }
  /**
   * @param string
   */
  public function setUrl($url)
  {
    $this->url = $url;
  }
  /**
   * @return string
   */
  public function getUrl()
  {
    return $this->url;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(RepositoryWebrefWebrefOutlinkInfo::class, 'Google_Service_Contentwarehouse_RepositoryWebrefWebrefOutlinkInfo');

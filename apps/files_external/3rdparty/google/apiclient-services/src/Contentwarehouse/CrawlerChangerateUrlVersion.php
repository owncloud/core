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

class CrawlerChangerateUrlVersion extends \Google\Collection
{
  protected $collection_key = 'tile';
  /**
   * @var int
   */
  public $additionalChangesMerged;
  /**
   * @var int
   */
  public $contentType;
  /**
   * @var bool
   */
  public $isImsNotModified;
  /**
   * @var int
   */
  public $lastModified;
  /**
   * @var int
   */
  public $offDomainLinksChecksum;
  /**
   * @var int
   */
  public $offDomainLinksCount;
  /**
   * @var int
   */
  public $onDomainLinksCount;
  protected $shingleSimhashType = IndexingConverterShingleFingerprint::class;
  protected $shingleSimhashDataType = '';
  /**
   * @var string
   */
  public $simhash;
  /**
   * @var bool
   */
  public $simhashIsTrusted;
  /**
   * @var string
   */
  public $simhashV2;
  /**
   * @var bool
   */
  public $simhashV2IsTrusted;
  /**
   * @var int[]
   */
  public $tile;
  /**
   * @var int
   */
  public $timestamp;

  /**
   * @param int
   */
  public function setAdditionalChangesMerged($additionalChangesMerged)
  {
    $this->additionalChangesMerged = $additionalChangesMerged;
  }
  /**
   * @return int
   */
  public function getAdditionalChangesMerged()
  {
    return $this->additionalChangesMerged;
  }
  /**
   * @param int
   */
  public function setContentType($contentType)
  {
    $this->contentType = $contentType;
  }
  /**
   * @return int
   */
  public function getContentType()
  {
    return $this->contentType;
  }
  /**
   * @param bool
   */
  public function setIsImsNotModified($isImsNotModified)
  {
    $this->isImsNotModified = $isImsNotModified;
  }
  /**
   * @return bool
   */
  public function getIsImsNotModified()
  {
    return $this->isImsNotModified;
  }
  /**
   * @param int
   */
  public function setLastModified($lastModified)
  {
    $this->lastModified = $lastModified;
  }
  /**
   * @return int
   */
  public function getLastModified()
  {
    return $this->lastModified;
  }
  /**
   * @param int
   */
  public function setOffDomainLinksChecksum($offDomainLinksChecksum)
  {
    $this->offDomainLinksChecksum = $offDomainLinksChecksum;
  }
  /**
   * @return int
   */
  public function getOffDomainLinksChecksum()
  {
    return $this->offDomainLinksChecksum;
  }
  /**
   * @param int
   */
  public function setOffDomainLinksCount($offDomainLinksCount)
  {
    $this->offDomainLinksCount = $offDomainLinksCount;
  }
  /**
   * @return int
   */
  public function getOffDomainLinksCount()
  {
    return $this->offDomainLinksCount;
  }
  /**
   * @param int
   */
  public function setOnDomainLinksCount($onDomainLinksCount)
  {
    $this->onDomainLinksCount = $onDomainLinksCount;
  }
  /**
   * @return int
   */
  public function getOnDomainLinksCount()
  {
    return $this->onDomainLinksCount;
  }
  /**
   * @param IndexingConverterShingleFingerprint
   */
  public function setShingleSimhash(IndexingConverterShingleFingerprint $shingleSimhash)
  {
    $this->shingleSimhash = $shingleSimhash;
  }
  /**
   * @return IndexingConverterShingleFingerprint
   */
  public function getShingleSimhash()
  {
    return $this->shingleSimhash;
  }
  /**
   * @param string
   */
  public function setSimhash($simhash)
  {
    $this->simhash = $simhash;
  }
  /**
   * @return string
   */
  public function getSimhash()
  {
    return $this->simhash;
  }
  /**
   * @param bool
   */
  public function setSimhashIsTrusted($simhashIsTrusted)
  {
    $this->simhashIsTrusted = $simhashIsTrusted;
  }
  /**
   * @return bool
   */
  public function getSimhashIsTrusted()
  {
    return $this->simhashIsTrusted;
  }
  /**
   * @param string
   */
  public function setSimhashV2($simhashV2)
  {
    $this->simhashV2 = $simhashV2;
  }
  /**
   * @return string
   */
  public function getSimhashV2()
  {
    return $this->simhashV2;
  }
  /**
   * @param bool
   */
  public function setSimhashV2IsTrusted($simhashV2IsTrusted)
  {
    $this->simhashV2IsTrusted = $simhashV2IsTrusted;
  }
  /**
   * @return bool
   */
  public function getSimhashV2IsTrusted()
  {
    return $this->simhashV2IsTrusted;
  }
  /**
   * @param int[]
   */
  public function setTile($tile)
  {
    $this->tile = $tile;
  }
  /**
   * @return int[]
   */
  public function getTile()
  {
    return $this->tile;
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
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(CrawlerChangerateUrlVersion::class, 'Google_Service_Contentwarehouse_CrawlerChangerateUrlVersion');

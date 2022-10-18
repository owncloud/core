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

class CrawlerChangerateUrlChange extends \Google\Model
{
  /**
   * @var int
   */
  public $additionalChangesMerged;
  public $fractionalTileChange;
  /**
   * @var int
   */
  public $interval;
  /**
   * @var bool
   */
  public $offDomainLinksChange;
  /**
   * @var int
   */
  public $offDomainLinksCount;
  /**
   * @var int
   */
  public $onDomainLinksCount;
  /**
   * @var bool
   */
  public $onDomainLinksCountChange;
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
  public function setFractionalTileChange($fractionalTileChange)
  {
    $this->fractionalTileChange = $fractionalTileChange;
  }
  public function getFractionalTileChange()
  {
    return $this->fractionalTileChange;
  }
  /**
   * @param int
   */
  public function setInterval($interval)
  {
    $this->interval = $interval;
  }
  /**
   * @return int
   */
  public function getInterval()
  {
    return $this->interval;
  }
  /**
   * @param bool
   */
  public function setOffDomainLinksChange($offDomainLinksChange)
  {
    $this->offDomainLinksChange = $offDomainLinksChange;
  }
  /**
   * @return bool
   */
  public function getOffDomainLinksChange()
  {
    return $this->offDomainLinksChange;
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
   * @param bool
   */
  public function setOnDomainLinksCountChange($onDomainLinksCountChange)
  {
    $this->onDomainLinksCountChange = $onDomainLinksCountChange;
  }
  /**
   * @return bool
   */
  public function getOnDomainLinksCountChange()
  {
    return $this->onDomainLinksCountChange;
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
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(CrawlerChangerateUrlChange::class, 'Google_Service_Contentwarehouse_CrawlerChangerateUrlChange');

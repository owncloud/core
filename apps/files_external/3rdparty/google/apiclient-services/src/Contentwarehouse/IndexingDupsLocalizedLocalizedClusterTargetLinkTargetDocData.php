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

class IndexingDupsLocalizedLocalizedClusterTargetLinkTargetDocData extends \Google\Collection
{
  protected $collection_key = 'outgoingLinkData';
  /**
   * @var string
   */
  public $contentLanguage;
  /**
   * @var string
   */
  public $crawlStatus;
  /**
   * @var int
   */
  public $crawlTimestampSeconds;
  /**
   * @var bool
   */
  public $isCanonical;
  protected $outgoingLinkDataType = IndexingDupsLocalizedLocalizedClusterTargetLinkLink::class;
  protected $outgoingLinkDataDataType = 'array';

  /**
   * @param string
   */
  public function setContentLanguage($contentLanguage)
  {
    $this->contentLanguage = $contentLanguage;
  }
  /**
   * @return string
   */
  public function getContentLanguage()
  {
    return $this->contentLanguage;
  }
  /**
   * @param string
   */
  public function setCrawlStatus($crawlStatus)
  {
    $this->crawlStatus = $crawlStatus;
  }
  /**
   * @return string
   */
  public function getCrawlStatus()
  {
    return $this->crawlStatus;
  }
  /**
   * @param int
   */
  public function setCrawlTimestampSeconds($crawlTimestampSeconds)
  {
    $this->crawlTimestampSeconds = $crawlTimestampSeconds;
  }
  /**
   * @return int
   */
  public function getCrawlTimestampSeconds()
  {
    return $this->crawlTimestampSeconds;
  }
  /**
   * @param bool
   */
  public function setIsCanonical($isCanonical)
  {
    $this->isCanonical = $isCanonical;
  }
  /**
   * @return bool
   */
  public function getIsCanonical()
  {
    return $this->isCanonical;
  }
  /**
   * @param IndexingDupsLocalizedLocalizedClusterTargetLinkLink[]
   */
  public function setOutgoingLinkData($outgoingLinkData)
  {
    $this->outgoingLinkData = $outgoingLinkData;
  }
  /**
   * @return IndexingDupsLocalizedLocalizedClusterTargetLinkLink[]
   */
  public function getOutgoingLinkData()
  {
    return $this->outgoingLinkData;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(IndexingDupsLocalizedLocalizedClusterTargetLinkTargetDocData::class, 'Google_Service_Contentwarehouse_IndexingDupsLocalizedLocalizedClusterTargetLinkTargetDocData');

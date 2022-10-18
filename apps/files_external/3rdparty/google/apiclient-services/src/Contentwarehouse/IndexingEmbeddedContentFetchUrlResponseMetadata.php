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

class IndexingEmbeddedContentFetchUrlResponseMetadata extends \Google\Model
{
  /**
   * @var string
   */
  public $adsResourceType;
  /**
   * @var int
   */
  public $crawlStatus;
  /**
   * @var string
   */
  public $criticalResourceType;
  /**
   * @var bool
   */
  public $fetchWithSmartphoneUa;
  /**
   * @var bool
   */
  public $isAdsResource;
  /**
   * @var bool
   */
  public $isCriticalResource;
  /**
   * @var bool
   */
  public $isTrivialResource;
  /**
   * @var int
   */
  public $numTrawlerFetches;
  /**
   * @var string
   */
  public $rewriteMethod;
  protected $robotsInfoType = IndexingConverterRobotsInfo::class;
  protected $robotsInfoDataType = '';

  /**
   * @param string
   */
  public function setAdsResourceType($adsResourceType)
  {
    $this->adsResourceType = $adsResourceType;
  }
  /**
   * @return string
   */
  public function getAdsResourceType()
  {
    return $this->adsResourceType;
  }
  /**
   * @param int
   */
  public function setCrawlStatus($crawlStatus)
  {
    $this->crawlStatus = $crawlStatus;
  }
  /**
   * @return int
   */
  public function getCrawlStatus()
  {
    return $this->crawlStatus;
  }
  /**
   * @param string
   */
  public function setCriticalResourceType($criticalResourceType)
  {
    $this->criticalResourceType = $criticalResourceType;
  }
  /**
   * @return string
   */
  public function getCriticalResourceType()
  {
    return $this->criticalResourceType;
  }
  /**
   * @param bool
   */
  public function setFetchWithSmartphoneUa($fetchWithSmartphoneUa)
  {
    $this->fetchWithSmartphoneUa = $fetchWithSmartphoneUa;
  }
  /**
   * @return bool
   */
  public function getFetchWithSmartphoneUa()
  {
    return $this->fetchWithSmartphoneUa;
  }
  /**
   * @param bool
   */
  public function setIsAdsResource($isAdsResource)
  {
    $this->isAdsResource = $isAdsResource;
  }
  /**
   * @return bool
   */
  public function getIsAdsResource()
  {
    return $this->isAdsResource;
  }
  /**
   * @param bool
   */
  public function setIsCriticalResource($isCriticalResource)
  {
    $this->isCriticalResource = $isCriticalResource;
  }
  /**
   * @return bool
   */
  public function getIsCriticalResource()
  {
    return $this->isCriticalResource;
  }
  /**
   * @param bool
   */
  public function setIsTrivialResource($isTrivialResource)
  {
    $this->isTrivialResource = $isTrivialResource;
  }
  /**
   * @return bool
   */
  public function getIsTrivialResource()
  {
    return $this->isTrivialResource;
  }
  /**
   * @param int
   */
  public function setNumTrawlerFetches($numTrawlerFetches)
  {
    $this->numTrawlerFetches = $numTrawlerFetches;
  }
  /**
   * @return int
   */
  public function getNumTrawlerFetches()
  {
    return $this->numTrawlerFetches;
  }
  /**
   * @param string
   */
  public function setRewriteMethod($rewriteMethod)
  {
    $this->rewriteMethod = $rewriteMethod;
  }
  /**
   * @return string
   */
  public function getRewriteMethod()
  {
    return $this->rewriteMethod;
  }
  /**
   * @param IndexingConverterRobotsInfo
   */
  public function setRobotsInfo(IndexingConverterRobotsInfo $robotsInfo)
  {
    $this->robotsInfo = $robotsInfo;
  }
  /**
   * @return IndexingConverterRobotsInfo
   */
  public function getRobotsInfo()
  {
    return $this->robotsInfo;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(IndexingEmbeddedContentFetchUrlResponseMetadata::class, 'Google_Service_Contentwarehouse_IndexingEmbeddedContentFetchUrlResponseMetadata');

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

class AnchorsAnchor extends \Google\Collection
{
  protected $collection_key = 'linkTags';
  /**
   * @var int
   */
  public $bucket;
  /**
   * @var int[]
   */
  public $catfishTags;
  /**
   * @var string[]
   */
  public $compressedImageUrls;
  /**
   * @var string
   */
  public $compressedOriginalTargetUrl;
  /**
   * @var int
   */
  public $context;
  /**
   * @var int
   */
  public $context2;
  /**
   * @var int
   */
  public $creationDate;
  /**
   * @var bool
   */
  public $deleted;
  /**
   * @var int
   */
  public $deletionDate;
  /**
   * @var int
   */
  public $demotionreason;
  /**
   * @var string
   */
  public $encodedNewsAnchorData;
  /**
   * @var bool
   */
  public $experimental;
  /**
   * @var bool
   */
  public $expired;
  /**
   * @var int
   */
  public $firstseenDate;
  /**
   * @var bool
   */
  public $firstseenNearCreation;
  /**
   * @var int
   */
  public $fontsize;
  /**
   * @var string
   */
  public $forwardingTypes;
  /**
   * @var string
   */
  public $fragment;
  /**
   * @var string[]
   */
  public $fullLeftContext;
  /**
   * @var string[]
   */
  public $fullRightContext;
  /**
   * @var bool
   */
  public $isLocal;
  /**
   * @var int
   */
  public $lastUpdateTimestamp;
  protected $linkAdditionalInfoType = Proto2BridgeMessageSet::class;
  protected $linkAdditionalInfoDataType = '';
  /**
   * @var int[]
   */
  public $linkTags;
  /**
   * @var int
   */
  public $locality;
  /**
   * @var int
   */
  public $offset;
  /**
   * @var string
   */
  public $origText;
  /**
   * @var string
   */
  public $originalTargetDocid;
  /**
   * @var float
   */
  public $pagerankWeight;
  /**
   * @var int
   */
  public $parallelLinks;
  /**
   * @var bool
   */
  public $possiblyOldFirstseenDate;
  /**
   * @var float
   */
  public $setiPagerankWeight;
  protected $sourceDataType = '';
  /**
   * @var int
   */
  public $sourceType;
  /**
   * @var int
   */
  public $targetUrlEncoding;
  /**
   * @var string
   */
  public $text;
  /**
   * @var string
   */
  public $timestamp;
  /**
   * @var int
   */
  public $type;
  /**
   * @var int
   */
  public $weight;

  /**
   * @param int
   */
  public function setBucket($bucket)
  {
    $this->bucket = $bucket;
  }
  /**
   * @return int
   */
  public function getBucket()
  {
    return $this->bucket;
  }
  /**
   * @param int[]
   */
  public function setCatfishTags($catfishTags)
  {
    $this->catfishTags = $catfishTags;
  }
  /**
   * @return int[]
   */
  public function getCatfishTags()
  {
    return $this->catfishTags;
  }
  /**
   * @param string[]
   */
  public function setCompressedImageUrls($compressedImageUrls)
  {
    $this->compressedImageUrls = $compressedImageUrls;
  }
  /**
   * @return string[]
   */
  public function getCompressedImageUrls()
  {
    return $this->compressedImageUrls;
  }
  /**
   * @param string
   */
  public function setCompressedOriginalTargetUrl($compressedOriginalTargetUrl)
  {
    $this->compressedOriginalTargetUrl = $compressedOriginalTargetUrl;
  }
  /**
   * @return string
   */
  public function getCompressedOriginalTargetUrl()
  {
    return $this->compressedOriginalTargetUrl;
  }
  /**
   * @param int
   */
  public function setContext($context)
  {
    $this->context = $context;
  }
  /**
   * @return int
   */
  public function getContext()
  {
    return $this->context;
  }
  /**
   * @param int
   */
  public function setContext2($context2)
  {
    $this->context2 = $context2;
  }
  /**
   * @return int
   */
  public function getContext2()
  {
    return $this->context2;
  }
  /**
   * @param int
   */
  public function setCreationDate($creationDate)
  {
    $this->creationDate = $creationDate;
  }
  /**
   * @return int
   */
  public function getCreationDate()
  {
    return $this->creationDate;
  }
  /**
   * @param bool
   */
  public function setDeleted($deleted)
  {
    $this->deleted = $deleted;
  }
  /**
   * @return bool
   */
  public function getDeleted()
  {
    return $this->deleted;
  }
  /**
   * @param int
   */
  public function setDeletionDate($deletionDate)
  {
    $this->deletionDate = $deletionDate;
  }
  /**
   * @return int
   */
  public function getDeletionDate()
  {
    return $this->deletionDate;
  }
  /**
   * @param int
   */
  public function setDemotionreason($demotionreason)
  {
    $this->demotionreason = $demotionreason;
  }
  /**
   * @return int
   */
  public function getDemotionreason()
  {
    return $this->demotionreason;
  }
  /**
   * @param string
   */
  public function setEncodedNewsAnchorData($encodedNewsAnchorData)
  {
    $this->encodedNewsAnchorData = $encodedNewsAnchorData;
  }
  /**
   * @return string
   */
  public function getEncodedNewsAnchorData()
  {
    return $this->encodedNewsAnchorData;
  }
  /**
   * @param bool
   */
  public function setExperimental($experimental)
  {
    $this->experimental = $experimental;
  }
  /**
   * @return bool
   */
  public function getExperimental()
  {
    return $this->experimental;
  }
  /**
   * @param bool
   */
  public function setExpired($expired)
  {
    $this->expired = $expired;
  }
  /**
   * @return bool
   */
  public function getExpired()
  {
    return $this->expired;
  }
  /**
   * @param int
   */
  public function setFirstseenDate($firstseenDate)
  {
    $this->firstseenDate = $firstseenDate;
  }
  /**
   * @return int
   */
  public function getFirstseenDate()
  {
    return $this->firstseenDate;
  }
  /**
   * @param bool
   */
  public function setFirstseenNearCreation($firstseenNearCreation)
  {
    $this->firstseenNearCreation = $firstseenNearCreation;
  }
  /**
   * @return bool
   */
  public function getFirstseenNearCreation()
  {
    return $this->firstseenNearCreation;
  }
  /**
   * @param int
   */
  public function setFontsize($fontsize)
  {
    $this->fontsize = $fontsize;
  }
  /**
   * @return int
   */
  public function getFontsize()
  {
    return $this->fontsize;
  }
  /**
   * @param string
   */
  public function setForwardingTypes($forwardingTypes)
  {
    $this->forwardingTypes = $forwardingTypes;
  }
  /**
   * @return string
   */
  public function getForwardingTypes()
  {
    return $this->forwardingTypes;
  }
  /**
   * @param string
   */
  public function setFragment($fragment)
  {
    $this->fragment = $fragment;
  }
  /**
   * @return string
   */
  public function getFragment()
  {
    return $this->fragment;
  }
  /**
   * @param string[]
   */
  public function setFullLeftContext($fullLeftContext)
  {
    $this->fullLeftContext = $fullLeftContext;
  }
  /**
   * @return string[]
   */
  public function getFullLeftContext()
  {
    return $this->fullLeftContext;
  }
  /**
   * @param string[]
   */
  public function setFullRightContext($fullRightContext)
  {
    $this->fullRightContext = $fullRightContext;
  }
  /**
   * @return string[]
   */
  public function getFullRightContext()
  {
    return $this->fullRightContext;
  }
  /**
   * @param bool
   */
  public function setIsLocal($isLocal)
  {
    $this->isLocal = $isLocal;
  }
  /**
   * @return bool
   */
  public function getIsLocal()
  {
    return $this->isLocal;
  }
  /**
   * @param int
   */
  public function setLastUpdateTimestamp($lastUpdateTimestamp)
  {
    $this->lastUpdateTimestamp = $lastUpdateTimestamp;
  }
  /**
   * @return int
   */
  public function getLastUpdateTimestamp()
  {
    return $this->lastUpdateTimestamp;
  }
  /**
   * @param Proto2BridgeMessageSet
   */
  public function setLinkAdditionalInfo(Proto2BridgeMessageSet $linkAdditionalInfo)
  {
    $this->linkAdditionalInfo = $linkAdditionalInfo;
  }
  /**
   * @return Proto2BridgeMessageSet
   */
  public function getLinkAdditionalInfo()
  {
    return $this->linkAdditionalInfo;
  }
  /**
   * @param int[]
   */
  public function setLinkTags($linkTags)
  {
    $this->linkTags = $linkTags;
  }
  /**
   * @return int[]
   */
  public function getLinkTags()
  {
    return $this->linkTags;
  }
  /**
   * @param int
   */
  public function setLocality($locality)
  {
    $this->locality = $locality;
  }
  /**
   * @return int
   */
  public function getLocality()
  {
    return $this->locality;
  }
  /**
   * @param int
   */
  public function setOffset($offset)
  {
    $this->offset = $offset;
  }
  /**
   * @return int
   */
  public function getOffset()
  {
    return $this->offset;
  }
  /**
   * @param string
   */
  public function setOrigText($origText)
  {
    $this->origText = $origText;
  }
  /**
   * @return string
   */
  public function getOrigText()
  {
    return $this->origText;
  }
  /**
   * @param string
   */
  public function setOriginalTargetDocid($originalTargetDocid)
  {
    $this->originalTargetDocid = $originalTargetDocid;
  }
  /**
   * @return string
   */
  public function getOriginalTargetDocid()
  {
    return $this->originalTargetDocid;
  }
  /**
   * @param float
   */
  public function setPagerankWeight($pagerankWeight)
  {
    $this->pagerankWeight = $pagerankWeight;
  }
  /**
   * @return float
   */
  public function getPagerankWeight()
  {
    return $this->pagerankWeight;
  }
  /**
   * @param int
   */
  public function setParallelLinks($parallelLinks)
  {
    $this->parallelLinks = $parallelLinks;
  }
  /**
   * @return int
   */
  public function getParallelLinks()
  {
    return $this->parallelLinks;
  }
  /**
   * @param bool
   */
  public function setPossiblyOldFirstseenDate($possiblyOldFirstseenDate)
  {
    $this->possiblyOldFirstseenDate = $possiblyOldFirstseenDate;
  }
  /**
   * @return bool
   */
  public function getPossiblyOldFirstseenDate()
  {
    return $this->possiblyOldFirstseenDate;
  }
  /**
   * @param float
   */
  public function setSetiPagerankWeight($setiPagerankWeight)
  {
    $this->setiPagerankWeight = $setiPagerankWeight;
  }
  /**
   * @return float
   */
  public function getSetiPagerankWeight()
  {
    return $this->setiPagerankWeight;
  }
  /**
   * @param AnchorsAnchorSource
   */
  public function setSource(AnchorsAnchorSource $source)
  {
    $this->source = $source;
  }
  /**
   * @return AnchorsAnchorSource
   */
  public function getSource()
  {
    return $this->source;
  }
  /**
   * @param int
   */
  public function setSourceType($sourceType)
  {
    $this->sourceType = $sourceType;
  }
  /**
   * @return int
   */
  public function getSourceType()
  {
    return $this->sourceType;
  }
  /**
   * @param int
   */
  public function setTargetUrlEncoding($targetUrlEncoding)
  {
    $this->targetUrlEncoding = $targetUrlEncoding;
  }
  /**
   * @return int
   */
  public function getTargetUrlEncoding()
  {
    return $this->targetUrlEncoding;
  }
  /**
   * @param string
   */
  public function setText($text)
  {
    $this->text = $text;
  }
  /**
   * @return string
   */
  public function getText()
  {
    return $this->text;
  }
  /**
   * @param string
   */
  public function setTimestamp($timestamp)
  {
    $this->timestamp = $timestamp;
  }
  /**
   * @return string
   */
  public function getTimestamp()
  {
    return $this->timestamp;
  }
  /**
   * @param int
   */
  public function setType($type)
  {
    $this->type = $type;
  }
  /**
   * @return int
   */
  public function getType()
  {
    return $this->type;
  }
  /**
   * @param int
   */
  public function setWeight($weight)
  {
    $this->weight = $weight;
  }
  /**
   * @return int
   */
  public function getWeight()
  {
    return $this->weight;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(AnchorsAnchor::class, 'Google_Service_Contentwarehouse_AnchorsAnchor');

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

class WWWDocInfo extends \Google\Collection
{
  protected $collection_key = 'thumbnail';
  /**
   * @var string[]
   */
  public $additionalSafesearchStats;
  /**
   * @var int
   */
  public $authMethod;
  /**
   * @var bool
   */
  public $badMetadescription;
  /**
   * @var int
   */
  public $bodySize;
  /**
   * @var string[]
   */
  public $bodyTitleLanguages;
  /**
   * @var bool
   */
  public $boilerplateMetadescription;
  /**
   * @var string
   */
  public $colorDetectionResult;
  /**
   * @var string
   */
  public $contentType;
  /**
   * @var string
   */
  public $coupledUrl;
  /**
   * @var int
   */
  public $coupledUrlEncoding;
  /**
   * @var string
   */
  public $crawlTime;
  /**
   * @var string
   */
  public $cropData;
  /**
   * @var string
   */
  public $dataVersion;
  /**
   * @var string
   */
  public $docVersionId;
  /**
   * @var string
   */
  public $encoding;
  /**
   * @var string
   */
  public $failsSafeSearch;
  /**
   * @var string
   */
  public $fileTypeId;
  /**
   * @var bool
   */
  public $foreignMetadescription;
  /**
   * @var bool
   */
  public $fuzzyMetadescription;
  /**
   * @var string
   */
  public $googleLabelData;
  /**
   * @var bool
   */
  public $hasBadSslCertificate;
  /**
   * @var int
   */
  public $imageHeight;
  protected $imageLicenseInfoType = ImageSearchImageLicenseInfo::class;
  protected $imageLicenseInfoDataType = '';
  /**
   * @var string
   */
  public $imagePublisher;
  /**
   * @var int
   */
  public $imageSize;
  /**
   * @var int
   */
  public $imageWidth;
  /**
   * @var string
   */
  public $indexingTs;
  /**
   * @var int
   */
  public $ip;
  /**
   * @var string
   */
  public $ipaddr;
  /**
   * @var bool
   */
  public $isAnimated;
  /**
   * @var bool
   */
  public $isHostedImage;
  /**
   * @var bool
   */
  public $isPorn;
  /**
   * @var bool
   */
  public $isRoboted;
  /**
   * @var bool
   */
  public $isSitePorn;
  /**
   * @var bool
   */
  public $isSoftporn;
  /**
   * @var string
   */
  public $language;
  /**
   * @var string
   */
  public $languageTag;
  /**
   * @var string
   */
  public $lastModTime;
  /**
   * @var string
   */
  public $licensedWebImagesOptInState;
  /**
   * @var bool
   */
  public $lowQualityMetadescription;
  /**
   * @var string[]
   */
  public $metaDescriptionLanguages;
  /**
   * @var string
   */
  public $nearbyText;
  /**
   * @var int
   */
  public $noimageframeoverlayreason;
  /**
   * @var bool
   */
  public $partialBoilerplateMetadescription;
  /**
   * @var int
   */
  public $pornStats;
  /**
   * @var float
   */
  public $qualityWithoutAdjustment;
  /**
   * @var string
   */
  public $referrerUrl;
  protected $relatedimagesType = WWWDocInfoRelatedImages::class;
  protected $relatedimagesDataType = 'array';
  /**
   * @var bool
   */
  public $rootpageDuplicateMetadescription;
  /**
   * @var bool
   */
  public $seenNoarchive;
  /**
   * @var bool
   */
  public $seenNoindex;
  /**
   * @var bool
   */
  public $seenNoodp;
  /**
   * @var bool
   */
  public $seenNopreview;
  /**
   * @var bool
   */
  public $seenNosnippet;
  /**
   * @var bool
   */
  public $seenNotranslate;
  protected $shoppingAttachmentType = QualityShoppingShoppingAttachment::class;
  protected $shoppingAttachmentDataType = '';
  protected $shoppingOffersType = ImageMustangShoppingOffer::class;
  protected $shoppingOffersDataType = 'array';
  /**
   * @var int
   */
  public $subindex;
  /**
   * @var int
   */
  public $thumbHeight;
  /**
   * @var int
   */
  public $thumbWidth;
  protected $thumbnailType = WWWDocInfoThumbnail::class;
  protected $thumbnailDataType = 'array';
  /**
   * @var string
   */
  public $title;
  /**
   * @var string
   */
  public $unionBuildTime;
  /**
   * @var string
   */
  public $url;
  /**
   * @var string
   */
  public $urlAfterRedirects;
  /**
   * @var int
   */
  public $urlEncoding;
  /**
   * @var bool
   */
  public $visibleImage;
  /**
   * @var string
   */
  public $visualType;

  /**
   * @param string[]
   */
  public function setAdditionalSafesearchStats($additionalSafesearchStats)
  {
    $this->additionalSafesearchStats = $additionalSafesearchStats;
  }
  /**
   * @return string[]
   */
  public function getAdditionalSafesearchStats()
  {
    return $this->additionalSafesearchStats;
  }
  /**
   * @param int
   */
  public function setAuthMethod($authMethod)
  {
    $this->authMethod = $authMethod;
  }
  /**
   * @return int
   */
  public function getAuthMethod()
  {
    return $this->authMethod;
  }
  /**
   * @param bool
   */
  public function setBadMetadescription($badMetadescription)
  {
    $this->badMetadescription = $badMetadescription;
  }
  /**
   * @return bool
   */
  public function getBadMetadescription()
  {
    return $this->badMetadescription;
  }
  /**
   * @param int
   */
  public function setBodySize($bodySize)
  {
    $this->bodySize = $bodySize;
  }
  /**
   * @return int
   */
  public function getBodySize()
  {
    return $this->bodySize;
  }
  /**
   * @param string[]
   */
  public function setBodyTitleLanguages($bodyTitleLanguages)
  {
    $this->bodyTitleLanguages = $bodyTitleLanguages;
  }
  /**
   * @return string[]
   */
  public function getBodyTitleLanguages()
  {
    return $this->bodyTitleLanguages;
  }
  /**
   * @param bool
   */
  public function setBoilerplateMetadescription($boilerplateMetadescription)
  {
    $this->boilerplateMetadescription = $boilerplateMetadescription;
  }
  /**
   * @return bool
   */
  public function getBoilerplateMetadescription()
  {
    return $this->boilerplateMetadescription;
  }
  /**
   * @param string
   */
  public function setColorDetectionResult($colorDetectionResult)
  {
    $this->colorDetectionResult = $colorDetectionResult;
  }
  /**
   * @return string
   */
  public function getColorDetectionResult()
  {
    return $this->colorDetectionResult;
  }
  /**
   * @param string
   */
  public function setContentType($contentType)
  {
    $this->contentType = $contentType;
  }
  /**
   * @return string
   */
  public function getContentType()
  {
    return $this->contentType;
  }
  /**
   * @param string
   */
  public function setCoupledUrl($coupledUrl)
  {
    $this->coupledUrl = $coupledUrl;
  }
  /**
   * @return string
   */
  public function getCoupledUrl()
  {
    return $this->coupledUrl;
  }
  /**
   * @param int
   */
  public function setCoupledUrlEncoding($coupledUrlEncoding)
  {
    $this->coupledUrlEncoding = $coupledUrlEncoding;
  }
  /**
   * @return int
   */
  public function getCoupledUrlEncoding()
  {
    return $this->coupledUrlEncoding;
  }
  /**
   * @param string
   */
  public function setCrawlTime($crawlTime)
  {
    $this->crawlTime = $crawlTime;
  }
  /**
   * @return string
   */
  public function getCrawlTime()
  {
    return $this->crawlTime;
  }
  /**
   * @param string
   */
  public function setCropData($cropData)
  {
    $this->cropData = $cropData;
  }
  /**
   * @return string
   */
  public function getCropData()
  {
    return $this->cropData;
  }
  /**
   * @param string
   */
  public function setDataVersion($dataVersion)
  {
    $this->dataVersion = $dataVersion;
  }
  /**
   * @return string
   */
  public function getDataVersion()
  {
    return $this->dataVersion;
  }
  /**
   * @param string
   */
  public function setDocVersionId($docVersionId)
  {
    $this->docVersionId = $docVersionId;
  }
  /**
   * @return string
   */
  public function getDocVersionId()
  {
    return $this->docVersionId;
  }
  /**
   * @param string
   */
  public function setEncoding($encoding)
  {
    $this->encoding = $encoding;
  }
  /**
   * @return string
   */
  public function getEncoding()
  {
    return $this->encoding;
  }
  /**
   * @param string
   */
  public function setFailsSafeSearch($failsSafeSearch)
  {
    $this->failsSafeSearch = $failsSafeSearch;
  }
  /**
   * @return string
   */
  public function getFailsSafeSearch()
  {
    return $this->failsSafeSearch;
  }
  /**
   * @param string
   */
  public function setFileTypeId($fileTypeId)
  {
    $this->fileTypeId = $fileTypeId;
  }
  /**
   * @return string
   */
  public function getFileTypeId()
  {
    return $this->fileTypeId;
  }
  /**
   * @param bool
   */
  public function setForeignMetadescription($foreignMetadescription)
  {
    $this->foreignMetadescription = $foreignMetadescription;
  }
  /**
   * @return bool
   */
  public function getForeignMetadescription()
  {
    return $this->foreignMetadescription;
  }
  /**
   * @param bool
   */
  public function setFuzzyMetadescription($fuzzyMetadescription)
  {
    $this->fuzzyMetadescription = $fuzzyMetadescription;
  }
  /**
   * @return bool
   */
  public function getFuzzyMetadescription()
  {
    return $this->fuzzyMetadescription;
  }
  /**
   * @param string
   */
  public function setGoogleLabelData($googleLabelData)
  {
    $this->googleLabelData = $googleLabelData;
  }
  /**
   * @return string
   */
  public function getGoogleLabelData()
  {
    return $this->googleLabelData;
  }
  /**
   * @param bool
   */
  public function setHasBadSslCertificate($hasBadSslCertificate)
  {
    $this->hasBadSslCertificate = $hasBadSslCertificate;
  }
  /**
   * @return bool
   */
  public function getHasBadSslCertificate()
  {
    return $this->hasBadSslCertificate;
  }
  /**
   * @param int
   */
  public function setImageHeight($imageHeight)
  {
    $this->imageHeight = $imageHeight;
  }
  /**
   * @return int
   */
  public function getImageHeight()
  {
    return $this->imageHeight;
  }
  /**
   * @param ImageSearchImageLicenseInfo
   */
  public function setImageLicenseInfo(ImageSearchImageLicenseInfo $imageLicenseInfo)
  {
    $this->imageLicenseInfo = $imageLicenseInfo;
  }
  /**
   * @return ImageSearchImageLicenseInfo
   */
  public function getImageLicenseInfo()
  {
    return $this->imageLicenseInfo;
  }
  /**
   * @param string
   */
  public function setImagePublisher($imagePublisher)
  {
    $this->imagePublisher = $imagePublisher;
  }
  /**
   * @return string
   */
  public function getImagePublisher()
  {
    return $this->imagePublisher;
  }
  /**
   * @param int
   */
  public function setImageSize($imageSize)
  {
    $this->imageSize = $imageSize;
  }
  /**
   * @return int
   */
  public function getImageSize()
  {
    return $this->imageSize;
  }
  /**
   * @param int
   */
  public function setImageWidth($imageWidth)
  {
    $this->imageWidth = $imageWidth;
  }
  /**
   * @return int
   */
  public function getImageWidth()
  {
    return $this->imageWidth;
  }
  /**
   * @param string
   */
  public function setIndexingTs($indexingTs)
  {
    $this->indexingTs = $indexingTs;
  }
  /**
   * @return string
   */
  public function getIndexingTs()
  {
    return $this->indexingTs;
  }
  /**
   * @param int
   */
  public function setIp($ip)
  {
    $this->ip = $ip;
  }
  /**
   * @return int
   */
  public function getIp()
  {
    return $this->ip;
  }
  /**
   * @param string
   */
  public function setIpaddr($ipaddr)
  {
    $this->ipaddr = $ipaddr;
  }
  /**
   * @return string
   */
  public function getIpaddr()
  {
    return $this->ipaddr;
  }
  /**
   * @param bool
   */
  public function setIsAnimated($isAnimated)
  {
    $this->isAnimated = $isAnimated;
  }
  /**
   * @return bool
   */
  public function getIsAnimated()
  {
    return $this->isAnimated;
  }
  /**
   * @param bool
   */
  public function setIsHostedImage($isHostedImage)
  {
    $this->isHostedImage = $isHostedImage;
  }
  /**
   * @return bool
   */
  public function getIsHostedImage()
  {
    return $this->isHostedImage;
  }
  /**
   * @param bool
   */
  public function setIsPorn($isPorn)
  {
    $this->isPorn = $isPorn;
  }
  /**
   * @return bool
   */
  public function getIsPorn()
  {
    return $this->isPorn;
  }
  /**
   * @param bool
   */
  public function setIsRoboted($isRoboted)
  {
    $this->isRoboted = $isRoboted;
  }
  /**
   * @return bool
   */
  public function getIsRoboted()
  {
    return $this->isRoboted;
  }
  /**
   * @param bool
   */
  public function setIsSitePorn($isSitePorn)
  {
    $this->isSitePorn = $isSitePorn;
  }
  /**
   * @return bool
   */
  public function getIsSitePorn()
  {
    return $this->isSitePorn;
  }
  /**
   * @param bool
   */
  public function setIsSoftporn($isSoftporn)
  {
    $this->isSoftporn = $isSoftporn;
  }
  /**
   * @return bool
   */
  public function getIsSoftporn()
  {
    return $this->isSoftporn;
  }
  /**
   * @param string
   */
  public function setLanguage($language)
  {
    $this->language = $language;
  }
  /**
   * @return string
   */
  public function getLanguage()
  {
    return $this->language;
  }
  /**
   * @param string
   */
  public function setLanguageTag($languageTag)
  {
    $this->languageTag = $languageTag;
  }
  /**
   * @return string
   */
  public function getLanguageTag()
  {
    return $this->languageTag;
  }
  /**
   * @param string
   */
  public function setLastModTime($lastModTime)
  {
    $this->lastModTime = $lastModTime;
  }
  /**
   * @return string
   */
  public function getLastModTime()
  {
    return $this->lastModTime;
  }
  /**
   * @param string
   */
  public function setLicensedWebImagesOptInState($licensedWebImagesOptInState)
  {
    $this->licensedWebImagesOptInState = $licensedWebImagesOptInState;
  }
  /**
   * @return string
   */
  public function getLicensedWebImagesOptInState()
  {
    return $this->licensedWebImagesOptInState;
  }
  /**
   * @param bool
   */
  public function setLowQualityMetadescription($lowQualityMetadescription)
  {
    $this->lowQualityMetadescription = $lowQualityMetadescription;
  }
  /**
   * @return bool
   */
  public function getLowQualityMetadescription()
  {
    return $this->lowQualityMetadescription;
  }
  /**
   * @param string[]
   */
  public function setMetaDescriptionLanguages($metaDescriptionLanguages)
  {
    $this->metaDescriptionLanguages = $metaDescriptionLanguages;
  }
  /**
   * @return string[]
   */
  public function getMetaDescriptionLanguages()
  {
    return $this->metaDescriptionLanguages;
  }
  /**
   * @param string
   */
  public function setNearbyText($nearbyText)
  {
    $this->nearbyText = $nearbyText;
  }
  /**
   * @return string
   */
  public function getNearbyText()
  {
    return $this->nearbyText;
  }
  /**
   * @param int
   */
  public function setNoimageframeoverlayreason($noimageframeoverlayreason)
  {
    $this->noimageframeoverlayreason = $noimageframeoverlayreason;
  }
  /**
   * @return int
   */
  public function getNoimageframeoverlayreason()
  {
    return $this->noimageframeoverlayreason;
  }
  /**
   * @param bool
   */
  public function setPartialBoilerplateMetadescription($partialBoilerplateMetadescription)
  {
    $this->partialBoilerplateMetadescription = $partialBoilerplateMetadescription;
  }
  /**
   * @return bool
   */
  public function getPartialBoilerplateMetadescription()
  {
    return $this->partialBoilerplateMetadescription;
  }
  /**
   * @param int
   */
  public function setPornStats($pornStats)
  {
    $this->pornStats = $pornStats;
  }
  /**
   * @return int
   */
  public function getPornStats()
  {
    return $this->pornStats;
  }
  /**
   * @param float
   */
  public function setQualityWithoutAdjustment($qualityWithoutAdjustment)
  {
    $this->qualityWithoutAdjustment = $qualityWithoutAdjustment;
  }
  /**
   * @return float
   */
  public function getQualityWithoutAdjustment()
  {
    return $this->qualityWithoutAdjustment;
  }
  /**
   * @param string
   */
  public function setReferrerUrl($referrerUrl)
  {
    $this->referrerUrl = $referrerUrl;
  }
  /**
   * @return string
   */
  public function getReferrerUrl()
  {
    return $this->referrerUrl;
  }
  /**
   * @param WWWDocInfoRelatedImages[]
   */
  public function setRelatedimages($relatedimages)
  {
    $this->relatedimages = $relatedimages;
  }
  /**
   * @return WWWDocInfoRelatedImages[]
   */
  public function getRelatedimages()
  {
    return $this->relatedimages;
  }
  /**
   * @param bool
   */
  public function setRootpageDuplicateMetadescription($rootpageDuplicateMetadescription)
  {
    $this->rootpageDuplicateMetadescription = $rootpageDuplicateMetadescription;
  }
  /**
   * @return bool
   */
  public function getRootpageDuplicateMetadescription()
  {
    return $this->rootpageDuplicateMetadescription;
  }
  /**
   * @param bool
   */
  public function setSeenNoarchive($seenNoarchive)
  {
    $this->seenNoarchive = $seenNoarchive;
  }
  /**
   * @return bool
   */
  public function getSeenNoarchive()
  {
    return $this->seenNoarchive;
  }
  /**
   * @param bool
   */
  public function setSeenNoindex($seenNoindex)
  {
    $this->seenNoindex = $seenNoindex;
  }
  /**
   * @return bool
   */
  public function getSeenNoindex()
  {
    return $this->seenNoindex;
  }
  /**
   * @param bool
   */
  public function setSeenNoodp($seenNoodp)
  {
    $this->seenNoodp = $seenNoodp;
  }
  /**
   * @return bool
   */
  public function getSeenNoodp()
  {
    return $this->seenNoodp;
  }
  /**
   * @param bool
   */
  public function setSeenNopreview($seenNopreview)
  {
    $this->seenNopreview = $seenNopreview;
  }
  /**
   * @return bool
   */
  public function getSeenNopreview()
  {
    return $this->seenNopreview;
  }
  /**
   * @param bool
   */
  public function setSeenNosnippet($seenNosnippet)
  {
    $this->seenNosnippet = $seenNosnippet;
  }
  /**
   * @return bool
   */
  public function getSeenNosnippet()
  {
    return $this->seenNosnippet;
  }
  /**
   * @param bool
   */
  public function setSeenNotranslate($seenNotranslate)
  {
    $this->seenNotranslate = $seenNotranslate;
  }
  /**
   * @return bool
   */
  public function getSeenNotranslate()
  {
    return $this->seenNotranslate;
  }
  /**
   * @param QualityShoppingShoppingAttachment
   */
  public function setShoppingAttachment(QualityShoppingShoppingAttachment $shoppingAttachment)
  {
    $this->shoppingAttachment = $shoppingAttachment;
  }
  /**
   * @return QualityShoppingShoppingAttachment
   */
  public function getShoppingAttachment()
  {
    return $this->shoppingAttachment;
  }
  /**
   * @param ImageMustangShoppingOffer[]
   */
  public function setShoppingOffers($shoppingOffers)
  {
    $this->shoppingOffers = $shoppingOffers;
  }
  /**
   * @return ImageMustangShoppingOffer[]
   */
  public function getShoppingOffers()
  {
    return $this->shoppingOffers;
  }
  /**
   * @param int
   */
  public function setSubindex($subindex)
  {
    $this->subindex = $subindex;
  }
  /**
   * @return int
   */
  public function getSubindex()
  {
    return $this->subindex;
  }
  /**
   * @param int
   */
  public function setThumbHeight($thumbHeight)
  {
    $this->thumbHeight = $thumbHeight;
  }
  /**
   * @return int
   */
  public function getThumbHeight()
  {
    return $this->thumbHeight;
  }
  /**
   * @param int
   */
  public function setThumbWidth($thumbWidth)
  {
    $this->thumbWidth = $thumbWidth;
  }
  /**
   * @return int
   */
  public function getThumbWidth()
  {
    return $this->thumbWidth;
  }
  /**
   * @param WWWDocInfoThumbnail[]
   */
  public function setThumbnail($thumbnail)
  {
    $this->thumbnail = $thumbnail;
  }
  /**
   * @return WWWDocInfoThumbnail[]
   */
  public function getThumbnail()
  {
    return $this->thumbnail;
  }
  /**
   * @param string
   */
  public function setTitle($title)
  {
    $this->title = $title;
  }
  /**
   * @return string
   */
  public function getTitle()
  {
    return $this->title;
  }
  /**
   * @param string
   */
  public function setUnionBuildTime($unionBuildTime)
  {
    $this->unionBuildTime = $unionBuildTime;
  }
  /**
   * @return string
   */
  public function getUnionBuildTime()
  {
    return $this->unionBuildTime;
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
  /**
   * @param string
   */
  public function setUrlAfterRedirects($urlAfterRedirects)
  {
    $this->urlAfterRedirects = $urlAfterRedirects;
  }
  /**
   * @return string
   */
  public function getUrlAfterRedirects()
  {
    return $this->urlAfterRedirects;
  }
  /**
   * @param int
   */
  public function setUrlEncoding($urlEncoding)
  {
    $this->urlEncoding = $urlEncoding;
  }
  /**
   * @return int
   */
  public function getUrlEncoding()
  {
    return $this->urlEncoding;
  }
  /**
   * @param bool
   */
  public function setVisibleImage($visibleImage)
  {
    $this->visibleImage = $visibleImage;
  }
  /**
   * @return bool
   */
  public function getVisibleImage()
  {
    return $this->visibleImage;
  }
  /**
   * @param string
   */
  public function setVisualType($visualType)
  {
    $this->visualType = $visualType;
  }
  /**
   * @return string
   */
  public function getVisualType()
  {
    return $this->visualType;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(WWWDocInfo::class, 'Google_Service_Contentwarehouse_WWWDocInfo');

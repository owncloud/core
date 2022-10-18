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

class ImageData extends \Google\Collection
{
  protected $collection_key = 'thumbnail';
  /**
   * @var float
   */
  public $adaboostImageFeaturePorn;
  /**
   * @var int
   */
  public $adaboostImageFeaturePornMinorVersion;
  /**
   * @var int
   */
  public $adaboostImageFeaturePornVersion;
  protected $animatedImageDataType = ImageRepositoryAnimatedImagePerdocData::class;
  protected $animatedImageDataDataType = '';
  protected $brainPornScoresType = ImageSafesearchContentBrainPornAnnotation::class;
  protected $brainPornScoresDataType = '';
  /**
   * @var string
   */
  public $brainPornScoresVersion;
  /**
   * @var string
   */
  public $canonicalDocid;
  /**
   * @var float
   */
  public $clickMagnetScore;
  /**
   * @var float
   */
  public $clipartDetectorScore;
  /**
   * @var int
   */
  public $clipartDetectorVersion;
  /**
   * @var int
   */
  public $codomainStrength;
  /**
   * @var float[]
   */
  public $colorScore;
  /**
   * @var int
   */
  public $colorScoreVersion;
  /**
   * @var float
   */
  public $coloredPixelsFrac;
  /**
   * @var int
   */
  public $contentFirstCrawlTime;
  protected $corpusSelectionInfoType = CorpusSelectionInfo::class;
  protected $corpusSelectionInfoDataType = 'array';
  protected $cropsType = ContentAwareCropsIndexing::class;
  protected $cropsDataType = '';
  protected $deepCropType = DeepCropIndexing::class;
  protected $deepCropDataType = '';
  protected $deepTagsType = CommerceDatastoreImageDeepTags::class;
  protected $deepTagsDataType = '';
  /**
   * @var string
   */
  public $docid;
  protected $embeddedMetadataType = ImageExifImageEmbeddedMetadata::class;
  protected $embeddedMetadataDataType = '';
  /**
   * @var string
   */
  public $expirationTimestamp;
  protected $extendedExifType = PhotosImageMetadata::class;
  protected $extendedExifDataType = '';
  protected $featuredImagePropType = ImageMonetizationFeaturedImageProperties::class;
  protected $featuredImagePropDataType = '';
  /**
   * @var string
   */
  public $fileFormat;
  /**
   * @var float
   */
  public $finalPornScore;
  /**
   * @var string
   */
  public $finalPornScoreVersion;
  /**
   * @var int
   */
  public $firstCrawlTime;
  /**
   * @var int
   */
  public $firstTimeSeenOnDocSec;
  /**
   * @var int
   */
  public $flags;
  protected $flowOutputType = ImageContentFlowProtoProd::class;
  protected $flowOutputDataType = '';
  /**
   * @var float
   */
  public $h2c;
  /**
   * @var float
   */
  public $h2i;
  protected $hateLogoDetectionType = ImageUnderstandingIndexingAnnotationGroup::class;
  protected $hateLogoDetectionDataType = '';
  /**
   * @var int
   */
  public $height;
  protected $imageContentQueryBoostType = ImageContentQueryBoost::class;
  protected $imageContentQueryBoostDataType = '';
  protected $imageExactBoostType = ImageExactBoost::class;
  protected $imageExactBoostDataType = '';
  protected $imageLicenseInfoType = ImageSearchImageLicenseInfo::class;
  protected $imageLicenseInfoDataType = '';
  protected $imageRegionsType = ImageRegionsImageRegions::class;
  protected $imageRegionsDataType = '';
  /**
   * @var int
   */
  public $imagerank;
  /**
   * @var bool
   */
  public $isIipInScope;
  /**
   * @var bool
   */
  public $isIndexedByImagesearch;
  /**
   * @var bool
   */
  public $isMultiframe;
  /**
   * @var bool
   */
  public $isUnwantedContent;
  /**
   * @var bool
   */
  public $isVisible;
  /**
   * @var float
   */
  public $largestFaceFrac;
  /**
   * @var int
   */
  public $largestFaceFraction;
  /**
   * @var int
   */
  public $lastCrawlTime;
  /**
   * @var string
   */
  public $licensedWebImagesOptInState;
  /**
   * @var float
   */
  public $lineartDetectorScore;
  /**
   * @var int
   */
  public $lineartDetectorVersion;
  protected $multibangKgEntitiesType = ImageDataMultibangEntities::class;
  protected $multibangKgEntitiesDataType = '';
  /**
   * @var string
   */
  public $nearDupFeatures;
  /**
   * @var string[]
   */
  public $nearDupFeaturesSmall;
  /**
   * @var int
   */
  public $nearDupFeaturesSmallVersion;
  /**
   * @var int
   */
  public $nearDupFeaturesVersion;
  protected $nimaAvaType = ImageRepositoryNimaOutput::class;
  protected $nimaAvaDataType = '';
  protected $nimaVqType = ImageRepositoryNimaOutput::class;
  protected $nimaVqDataType = '';
  /**
   * @var string[]
   */
  public $noIndexReason;
  /**
   * @var int
   */
  public $numberFaces;
  protected $ocrGoodocType = GoodocDocument::class;
  protected $ocrGoodocDataType = '';
  protected $ocrTaserType = GoodocDocument::class;
  protected $ocrTaserDataType = '';
  protected $ocrTextboxesType = OcrPhotoTextBox::class;
  protected $ocrTextboxesDataType = 'array';
  /**
   * @var string
   */
  public $onPageAlternateUrl;
  protected $packedFullFaceInfoType = FaceIndexing::class;
  protected $packedFullFaceInfoDataType = '';
  protected $personAttributesType = LensDiscoveryStylePersonAttributes::class;
  protected $personAttributesDataType = '';
  protected $personDetectionSignalsType = LensDiscoveryStylePersonDetectionSignals::class;
  protected $personDetectionSignalsDataType = '';
  /**
   * @var float
   */
  public $photoDetectorScore;
  /**
   * @var int
   */
  public $photoDetectorVersion;
  protected $pornFlagDataType = PornFlagData::class;
  protected $pornFlagDataDataType = '';
  protected $precomputedRestrictsType = PrecomputedRestricts::class;
  protected $precomputedRestrictsDataType = '';
  /**
   * @var int
   */
  public $rankInNeardupCluster;
  /**
   * @var string[]
   */
  public $restrictStrings;
  /**
   * @var string
   */
  public $robotedAgents;
  protected $shoppingProductInformationType = ImageRepositoryShoppingProductInformation::class;
  protected $shoppingProductInformationDataType = '';
  /**
   * @var int
   */
  public $size;
  /**
   * @var string[]
   */
  public $smearedTopWebLandingPageDocids;
  protected $smearedTopWebLandingPagesType = SmearedWebLandingPageEntry::class;
  protected $smearedTopWebLandingPagesDataType = 'array';
  protected $styleAestheticsScoreType = LensDiscoveryStyleAestheticsScoreSignals::class;
  protected $styleAestheticsScoreDataType = '';
  protected $styleImageTypeType = LensDiscoveryStyleStyleImageTypeSignals::class;
  protected $styleImageTypeDataType = '';
  /**
   * @var int
   */
  public $testingScore;
  /**
   * @var int
   */
  public $thumbHeight;
  /**
   * @var int
   */
  public $thumbSize;
  /**
   * @var int
   */
  public $thumbWidth;
  protected $thumbnailType = ImageDataThumbnail::class;
  protected $thumbnailDataType = 'array';
  /**
   * @var string
   */
  public $unavailableAfterSecs;
  /**
   * @var string
   */
  public $url;
  /**
   * @var float
   */
  public $whiteBackgroundScore;
  /**
   * @var int
   */
  public $whiteBackgroundScoreVersion;
  /**
   * @var int
   */
  public $width;

  /**
   * @param float
   */
  public function setAdaboostImageFeaturePorn($adaboostImageFeaturePorn)
  {
    $this->adaboostImageFeaturePorn = $adaboostImageFeaturePorn;
  }
  /**
   * @return float
   */
  public function getAdaboostImageFeaturePorn()
  {
    return $this->adaboostImageFeaturePorn;
  }
  /**
   * @param int
   */
  public function setAdaboostImageFeaturePornMinorVersion($adaboostImageFeaturePornMinorVersion)
  {
    $this->adaboostImageFeaturePornMinorVersion = $adaboostImageFeaturePornMinorVersion;
  }
  /**
   * @return int
   */
  public function getAdaboostImageFeaturePornMinorVersion()
  {
    return $this->adaboostImageFeaturePornMinorVersion;
  }
  /**
   * @param int
   */
  public function setAdaboostImageFeaturePornVersion($adaboostImageFeaturePornVersion)
  {
    $this->adaboostImageFeaturePornVersion = $adaboostImageFeaturePornVersion;
  }
  /**
   * @return int
   */
  public function getAdaboostImageFeaturePornVersion()
  {
    return $this->adaboostImageFeaturePornVersion;
  }
  /**
   * @param ImageRepositoryAnimatedImagePerdocData
   */
  public function setAnimatedImageData(ImageRepositoryAnimatedImagePerdocData $animatedImageData)
  {
    $this->animatedImageData = $animatedImageData;
  }
  /**
   * @return ImageRepositoryAnimatedImagePerdocData
   */
  public function getAnimatedImageData()
  {
    return $this->animatedImageData;
  }
  /**
   * @param ImageSafesearchContentBrainPornAnnotation
   */
  public function setBrainPornScores(ImageSafesearchContentBrainPornAnnotation $brainPornScores)
  {
    $this->brainPornScores = $brainPornScores;
  }
  /**
   * @return ImageSafesearchContentBrainPornAnnotation
   */
  public function getBrainPornScores()
  {
    return $this->brainPornScores;
  }
  /**
   * @param string
   */
  public function setBrainPornScoresVersion($brainPornScoresVersion)
  {
    $this->brainPornScoresVersion = $brainPornScoresVersion;
  }
  /**
   * @return string
   */
  public function getBrainPornScoresVersion()
  {
    return $this->brainPornScoresVersion;
  }
  /**
   * @param string
   */
  public function setCanonicalDocid($canonicalDocid)
  {
    $this->canonicalDocid = $canonicalDocid;
  }
  /**
   * @return string
   */
  public function getCanonicalDocid()
  {
    return $this->canonicalDocid;
  }
  /**
   * @param float
   */
  public function setClickMagnetScore($clickMagnetScore)
  {
    $this->clickMagnetScore = $clickMagnetScore;
  }
  /**
   * @return float
   */
  public function getClickMagnetScore()
  {
    return $this->clickMagnetScore;
  }
  /**
   * @param float
   */
  public function setClipartDetectorScore($clipartDetectorScore)
  {
    $this->clipartDetectorScore = $clipartDetectorScore;
  }
  /**
   * @return float
   */
  public function getClipartDetectorScore()
  {
    return $this->clipartDetectorScore;
  }
  /**
   * @param int
   */
  public function setClipartDetectorVersion($clipartDetectorVersion)
  {
    $this->clipartDetectorVersion = $clipartDetectorVersion;
  }
  /**
   * @return int
   */
  public function getClipartDetectorVersion()
  {
    return $this->clipartDetectorVersion;
  }
  /**
   * @param int
   */
  public function setCodomainStrength($codomainStrength)
  {
    $this->codomainStrength = $codomainStrength;
  }
  /**
   * @return int
   */
  public function getCodomainStrength()
  {
    return $this->codomainStrength;
  }
  /**
   * @param float[]
   */
  public function setColorScore($colorScore)
  {
    $this->colorScore = $colorScore;
  }
  /**
   * @return float[]
   */
  public function getColorScore()
  {
    return $this->colorScore;
  }
  /**
   * @param int
   */
  public function setColorScoreVersion($colorScoreVersion)
  {
    $this->colorScoreVersion = $colorScoreVersion;
  }
  /**
   * @return int
   */
  public function getColorScoreVersion()
  {
    return $this->colorScoreVersion;
  }
  /**
   * @param float
   */
  public function setColoredPixelsFrac($coloredPixelsFrac)
  {
    $this->coloredPixelsFrac = $coloredPixelsFrac;
  }
  /**
   * @return float
   */
  public function getColoredPixelsFrac()
  {
    return $this->coloredPixelsFrac;
  }
  /**
   * @param int
   */
  public function setContentFirstCrawlTime($contentFirstCrawlTime)
  {
    $this->contentFirstCrawlTime = $contentFirstCrawlTime;
  }
  /**
   * @return int
   */
  public function getContentFirstCrawlTime()
  {
    return $this->contentFirstCrawlTime;
  }
  /**
   * @param CorpusSelectionInfo[]
   */
  public function setCorpusSelectionInfo($corpusSelectionInfo)
  {
    $this->corpusSelectionInfo = $corpusSelectionInfo;
  }
  /**
   * @return CorpusSelectionInfo[]
   */
  public function getCorpusSelectionInfo()
  {
    return $this->corpusSelectionInfo;
  }
  /**
   * @param ContentAwareCropsIndexing
   */
  public function setCrops(ContentAwareCropsIndexing $crops)
  {
    $this->crops = $crops;
  }
  /**
   * @return ContentAwareCropsIndexing
   */
  public function getCrops()
  {
    return $this->crops;
  }
  /**
   * @param DeepCropIndexing
   */
  public function setDeepCrop(DeepCropIndexing $deepCrop)
  {
    $this->deepCrop = $deepCrop;
  }
  /**
   * @return DeepCropIndexing
   */
  public function getDeepCrop()
  {
    return $this->deepCrop;
  }
  /**
   * @param CommerceDatastoreImageDeepTags
   */
  public function setDeepTags(CommerceDatastoreImageDeepTags $deepTags)
  {
    $this->deepTags = $deepTags;
  }
  /**
   * @return CommerceDatastoreImageDeepTags
   */
  public function getDeepTags()
  {
    return $this->deepTags;
  }
  /**
   * @param string
   */
  public function setDocid($docid)
  {
    $this->docid = $docid;
  }
  /**
   * @return string
   */
  public function getDocid()
  {
    return $this->docid;
  }
  /**
   * @param ImageExifImageEmbeddedMetadata
   */
  public function setEmbeddedMetadata(ImageExifImageEmbeddedMetadata $embeddedMetadata)
  {
    $this->embeddedMetadata = $embeddedMetadata;
  }
  /**
   * @return ImageExifImageEmbeddedMetadata
   */
  public function getEmbeddedMetadata()
  {
    return $this->embeddedMetadata;
  }
  /**
   * @param string
   */
  public function setExpirationTimestamp($expirationTimestamp)
  {
    $this->expirationTimestamp = $expirationTimestamp;
  }
  /**
   * @return string
   */
  public function getExpirationTimestamp()
  {
    return $this->expirationTimestamp;
  }
  /**
   * @param PhotosImageMetadata
   */
  public function setExtendedExif(PhotosImageMetadata $extendedExif)
  {
    $this->extendedExif = $extendedExif;
  }
  /**
   * @return PhotosImageMetadata
   */
  public function getExtendedExif()
  {
    return $this->extendedExif;
  }
  /**
   * @param ImageMonetizationFeaturedImageProperties
   */
  public function setFeaturedImageProp(ImageMonetizationFeaturedImageProperties $featuredImageProp)
  {
    $this->featuredImageProp = $featuredImageProp;
  }
  /**
   * @return ImageMonetizationFeaturedImageProperties
   */
  public function getFeaturedImageProp()
  {
    return $this->featuredImageProp;
  }
  /**
   * @param string
   */
  public function setFileFormat($fileFormat)
  {
    $this->fileFormat = $fileFormat;
  }
  /**
   * @return string
   */
  public function getFileFormat()
  {
    return $this->fileFormat;
  }
  /**
   * @param float
   */
  public function setFinalPornScore($finalPornScore)
  {
    $this->finalPornScore = $finalPornScore;
  }
  /**
   * @return float
   */
  public function getFinalPornScore()
  {
    return $this->finalPornScore;
  }
  /**
   * @param string
   */
  public function setFinalPornScoreVersion($finalPornScoreVersion)
  {
    $this->finalPornScoreVersion = $finalPornScoreVersion;
  }
  /**
   * @return string
   */
  public function getFinalPornScoreVersion()
  {
    return $this->finalPornScoreVersion;
  }
  /**
   * @param int
   */
  public function setFirstCrawlTime($firstCrawlTime)
  {
    $this->firstCrawlTime = $firstCrawlTime;
  }
  /**
   * @return int
   */
  public function getFirstCrawlTime()
  {
    return $this->firstCrawlTime;
  }
  /**
   * @param int
   */
  public function setFirstTimeSeenOnDocSec($firstTimeSeenOnDocSec)
  {
    $this->firstTimeSeenOnDocSec = $firstTimeSeenOnDocSec;
  }
  /**
   * @return int
   */
  public function getFirstTimeSeenOnDocSec()
  {
    return $this->firstTimeSeenOnDocSec;
  }
  /**
   * @param int
   */
  public function setFlags($flags)
  {
    $this->flags = $flags;
  }
  /**
   * @return int
   */
  public function getFlags()
  {
    return $this->flags;
  }
  /**
   * @param ImageContentFlowProtoProd
   */
  public function setFlowOutput(ImageContentFlowProtoProd $flowOutput)
  {
    $this->flowOutput = $flowOutput;
  }
  /**
   * @return ImageContentFlowProtoProd
   */
  public function getFlowOutput()
  {
    return $this->flowOutput;
  }
  /**
   * @param float
   */
  public function setH2c($h2c)
  {
    $this->h2c = $h2c;
  }
  /**
   * @return float
   */
  public function getH2c()
  {
    return $this->h2c;
  }
  /**
   * @param float
   */
  public function setH2i($h2i)
  {
    $this->h2i = $h2i;
  }
  /**
   * @return float
   */
  public function getH2i()
  {
    return $this->h2i;
  }
  /**
   * @param ImageUnderstandingIndexingAnnotationGroup
   */
  public function setHateLogoDetection(ImageUnderstandingIndexingAnnotationGroup $hateLogoDetection)
  {
    $this->hateLogoDetection = $hateLogoDetection;
  }
  /**
   * @return ImageUnderstandingIndexingAnnotationGroup
   */
  public function getHateLogoDetection()
  {
    return $this->hateLogoDetection;
  }
  /**
   * @param int
   */
  public function setHeight($height)
  {
    $this->height = $height;
  }
  /**
   * @return int
   */
  public function getHeight()
  {
    return $this->height;
  }
  /**
   * @param ImageContentQueryBoost
   */
  public function setImageContentQueryBoost(ImageContentQueryBoost $imageContentQueryBoost)
  {
    $this->imageContentQueryBoost = $imageContentQueryBoost;
  }
  /**
   * @return ImageContentQueryBoost
   */
  public function getImageContentQueryBoost()
  {
    return $this->imageContentQueryBoost;
  }
  /**
   * @param ImageExactBoost
   */
  public function setImageExactBoost(ImageExactBoost $imageExactBoost)
  {
    $this->imageExactBoost = $imageExactBoost;
  }
  /**
   * @return ImageExactBoost
   */
  public function getImageExactBoost()
  {
    return $this->imageExactBoost;
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
   * @param ImageRegionsImageRegions
   */
  public function setImageRegions(ImageRegionsImageRegions $imageRegions)
  {
    $this->imageRegions = $imageRegions;
  }
  /**
   * @return ImageRegionsImageRegions
   */
  public function getImageRegions()
  {
    return $this->imageRegions;
  }
  /**
   * @param int
   */
  public function setImagerank($imagerank)
  {
    $this->imagerank = $imagerank;
  }
  /**
   * @return int
   */
  public function getImagerank()
  {
    return $this->imagerank;
  }
  /**
   * @param bool
   */
  public function setIsIipInScope($isIipInScope)
  {
    $this->isIipInScope = $isIipInScope;
  }
  /**
   * @return bool
   */
  public function getIsIipInScope()
  {
    return $this->isIipInScope;
  }
  /**
   * @param bool
   */
  public function setIsIndexedByImagesearch($isIndexedByImagesearch)
  {
    $this->isIndexedByImagesearch = $isIndexedByImagesearch;
  }
  /**
   * @return bool
   */
  public function getIsIndexedByImagesearch()
  {
    return $this->isIndexedByImagesearch;
  }
  /**
   * @param bool
   */
  public function setIsMultiframe($isMultiframe)
  {
    $this->isMultiframe = $isMultiframe;
  }
  /**
   * @return bool
   */
  public function getIsMultiframe()
  {
    return $this->isMultiframe;
  }
  /**
   * @param bool
   */
  public function setIsUnwantedContent($isUnwantedContent)
  {
    $this->isUnwantedContent = $isUnwantedContent;
  }
  /**
   * @return bool
   */
  public function getIsUnwantedContent()
  {
    return $this->isUnwantedContent;
  }
  /**
   * @param bool
   */
  public function setIsVisible($isVisible)
  {
    $this->isVisible = $isVisible;
  }
  /**
   * @return bool
   */
  public function getIsVisible()
  {
    return $this->isVisible;
  }
  /**
   * @param float
   */
  public function setLargestFaceFrac($largestFaceFrac)
  {
    $this->largestFaceFrac = $largestFaceFrac;
  }
  /**
   * @return float
   */
  public function getLargestFaceFrac()
  {
    return $this->largestFaceFrac;
  }
  /**
   * @param int
   */
  public function setLargestFaceFraction($largestFaceFraction)
  {
    $this->largestFaceFraction = $largestFaceFraction;
  }
  /**
   * @return int
   */
  public function getLargestFaceFraction()
  {
    return $this->largestFaceFraction;
  }
  /**
   * @param int
   */
  public function setLastCrawlTime($lastCrawlTime)
  {
    $this->lastCrawlTime = $lastCrawlTime;
  }
  /**
   * @return int
   */
  public function getLastCrawlTime()
  {
    return $this->lastCrawlTime;
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
   * @param float
   */
  public function setLineartDetectorScore($lineartDetectorScore)
  {
    $this->lineartDetectorScore = $lineartDetectorScore;
  }
  /**
   * @return float
   */
  public function getLineartDetectorScore()
  {
    return $this->lineartDetectorScore;
  }
  /**
   * @param int
   */
  public function setLineartDetectorVersion($lineartDetectorVersion)
  {
    $this->lineartDetectorVersion = $lineartDetectorVersion;
  }
  /**
   * @return int
   */
  public function getLineartDetectorVersion()
  {
    return $this->lineartDetectorVersion;
  }
  /**
   * @param ImageDataMultibangEntities
   */
  public function setMultibangKgEntities(ImageDataMultibangEntities $multibangKgEntities)
  {
    $this->multibangKgEntities = $multibangKgEntities;
  }
  /**
   * @return ImageDataMultibangEntities
   */
  public function getMultibangKgEntities()
  {
    return $this->multibangKgEntities;
  }
  /**
   * @param string
   */
  public function setNearDupFeatures($nearDupFeatures)
  {
    $this->nearDupFeatures = $nearDupFeatures;
  }
  /**
   * @return string
   */
  public function getNearDupFeatures()
  {
    return $this->nearDupFeatures;
  }
  /**
   * @param string[]
   */
  public function setNearDupFeaturesSmall($nearDupFeaturesSmall)
  {
    $this->nearDupFeaturesSmall = $nearDupFeaturesSmall;
  }
  /**
   * @return string[]
   */
  public function getNearDupFeaturesSmall()
  {
    return $this->nearDupFeaturesSmall;
  }
  /**
   * @param int
   */
  public function setNearDupFeaturesSmallVersion($nearDupFeaturesSmallVersion)
  {
    $this->nearDupFeaturesSmallVersion = $nearDupFeaturesSmallVersion;
  }
  /**
   * @return int
   */
  public function getNearDupFeaturesSmallVersion()
  {
    return $this->nearDupFeaturesSmallVersion;
  }
  /**
   * @param int
   */
  public function setNearDupFeaturesVersion($nearDupFeaturesVersion)
  {
    $this->nearDupFeaturesVersion = $nearDupFeaturesVersion;
  }
  /**
   * @return int
   */
  public function getNearDupFeaturesVersion()
  {
    return $this->nearDupFeaturesVersion;
  }
  /**
   * @param ImageRepositoryNimaOutput
   */
  public function setNimaAva(ImageRepositoryNimaOutput $nimaAva)
  {
    $this->nimaAva = $nimaAva;
  }
  /**
   * @return ImageRepositoryNimaOutput
   */
  public function getNimaAva()
  {
    return $this->nimaAva;
  }
  /**
   * @param ImageRepositoryNimaOutput
   */
  public function setNimaVq(ImageRepositoryNimaOutput $nimaVq)
  {
    $this->nimaVq = $nimaVq;
  }
  /**
   * @return ImageRepositoryNimaOutput
   */
  public function getNimaVq()
  {
    return $this->nimaVq;
  }
  /**
   * @param string[]
   */
  public function setNoIndexReason($noIndexReason)
  {
    $this->noIndexReason = $noIndexReason;
  }
  /**
   * @return string[]
   */
  public function getNoIndexReason()
  {
    return $this->noIndexReason;
  }
  /**
   * @param int
   */
  public function setNumberFaces($numberFaces)
  {
    $this->numberFaces = $numberFaces;
  }
  /**
   * @return int
   */
  public function getNumberFaces()
  {
    return $this->numberFaces;
  }
  /**
   * @param GoodocDocument
   */
  public function setOcrGoodoc(GoodocDocument $ocrGoodoc)
  {
    $this->ocrGoodoc = $ocrGoodoc;
  }
  /**
   * @return GoodocDocument
   */
  public function getOcrGoodoc()
  {
    return $this->ocrGoodoc;
  }
  /**
   * @param GoodocDocument
   */
  public function setOcrTaser(GoodocDocument $ocrTaser)
  {
    $this->ocrTaser = $ocrTaser;
  }
  /**
   * @return GoodocDocument
   */
  public function getOcrTaser()
  {
    return $this->ocrTaser;
  }
  /**
   * @param OcrPhotoTextBox[]
   */
  public function setOcrTextboxes($ocrTextboxes)
  {
    $this->ocrTextboxes = $ocrTextboxes;
  }
  /**
   * @return OcrPhotoTextBox[]
   */
  public function getOcrTextboxes()
  {
    return $this->ocrTextboxes;
  }
  /**
   * @param string
   */
  public function setOnPageAlternateUrl($onPageAlternateUrl)
  {
    $this->onPageAlternateUrl = $onPageAlternateUrl;
  }
  /**
   * @return string
   */
  public function getOnPageAlternateUrl()
  {
    return $this->onPageAlternateUrl;
  }
  /**
   * @param FaceIndexing
   */
  public function setPackedFullFaceInfo(FaceIndexing $packedFullFaceInfo)
  {
    $this->packedFullFaceInfo = $packedFullFaceInfo;
  }
  /**
   * @return FaceIndexing
   */
  public function getPackedFullFaceInfo()
  {
    return $this->packedFullFaceInfo;
  }
  /**
   * @param LensDiscoveryStylePersonAttributes
   */
  public function setPersonAttributes(LensDiscoveryStylePersonAttributes $personAttributes)
  {
    $this->personAttributes = $personAttributes;
  }
  /**
   * @return LensDiscoveryStylePersonAttributes
   */
  public function getPersonAttributes()
  {
    return $this->personAttributes;
  }
  /**
   * @param LensDiscoveryStylePersonDetectionSignals
   */
  public function setPersonDetectionSignals(LensDiscoveryStylePersonDetectionSignals $personDetectionSignals)
  {
    $this->personDetectionSignals = $personDetectionSignals;
  }
  /**
   * @return LensDiscoveryStylePersonDetectionSignals
   */
  public function getPersonDetectionSignals()
  {
    return $this->personDetectionSignals;
  }
  /**
   * @param float
   */
  public function setPhotoDetectorScore($photoDetectorScore)
  {
    $this->photoDetectorScore = $photoDetectorScore;
  }
  /**
   * @return float
   */
  public function getPhotoDetectorScore()
  {
    return $this->photoDetectorScore;
  }
  /**
   * @param int
   */
  public function setPhotoDetectorVersion($photoDetectorVersion)
  {
    $this->photoDetectorVersion = $photoDetectorVersion;
  }
  /**
   * @return int
   */
  public function getPhotoDetectorVersion()
  {
    return $this->photoDetectorVersion;
  }
  /**
   * @param PornFlagData
   */
  public function setPornFlagData(PornFlagData $pornFlagData)
  {
    $this->pornFlagData = $pornFlagData;
  }
  /**
   * @return PornFlagData
   */
  public function getPornFlagData()
  {
    return $this->pornFlagData;
  }
  /**
   * @param PrecomputedRestricts
   */
  public function setPrecomputedRestricts(PrecomputedRestricts $precomputedRestricts)
  {
    $this->precomputedRestricts = $precomputedRestricts;
  }
  /**
   * @return PrecomputedRestricts
   */
  public function getPrecomputedRestricts()
  {
    return $this->precomputedRestricts;
  }
  /**
   * @param int
   */
  public function setRankInNeardupCluster($rankInNeardupCluster)
  {
    $this->rankInNeardupCluster = $rankInNeardupCluster;
  }
  /**
   * @return int
   */
  public function getRankInNeardupCluster()
  {
    return $this->rankInNeardupCluster;
  }
  /**
   * @param string[]
   */
  public function setRestrictStrings($restrictStrings)
  {
    $this->restrictStrings = $restrictStrings;
  }
  /**
   * @return string[]
   */
  public function getRestrictStrings()
  {
    return $this->restrictStrings;
  }
  /**
   * @param string
   */
  public function setRobotedAgents($robotedAgents)
  {
    $this->robotedAgents = $robotedAgents;
  }
  /**
   * @return string
   */
  public function getRobotedAgents()
  {
    return $this->robotedAgents;
  }
  /**
   * @param ImageRepositoryShoppingProductInformation
   */
  public function setShoppingProductInformation(ImageRepositoryShoppingProductInformation $shoppingProductInformation)
  {
    $this->shoppingProductInformation = $shoppingProductInformation;
  }
  /**
   * @return ImageRepositoryShoppingProductInformation
   */
  public function getShoppingProductInformation()
  {
    return $this->shoppingProductInformation;
  }
  /**
   * @param int
   */
  public function setSize($size)
  {
    $this->size = $size;
  }
  /**
   * @return int
   */
  public function getSize()
  {
    return $this->size;
  }
  /**
   * @param string[]
   */
  public function setSmearedTopWebLandingPageDocids($smearedTopWebLandingPageDocids)
  {
    $this->smearedTopWebLandingPageDocids = $smearedTopWebLandingPageDocids;
  }
  /**
   * @return string[]
   */
  public function getSmearedTopWebLandingPageDocids()
  {
    return $this->smearedTopWebLandingPageDocids;
  }
  /**
   * @param SmearedWebLandingPageEntry[]
   */
  public function setSmearedTopWebLandingPages($smearedTopWebLandingPages)
  {
    $this->smearedTopWebLandingPages = $smearedTopWebLandingPages;
  }
  /**
   * @return SmearedWebLandingPageEntry[]
   */
  public function getSmearedTopWebLandingPages()
  {
    return $this->smearedTopWebLandingPages;
  }
  /**
   * @param LensDiscoveryStyleAestheticsScoreSignals
   */
  public function setStyleAestheticsScore(LensDiscoveryStyleAestheticsScoreSignals $styleAestheticsScore)
  {
    $this->styleAestheticsScore = $styleAestheticsScore;
  }
  /**
   * @return LensDiscoveryStyleAestheticsScoreSignals
   */
  public function getStyleAestheticsScore()
  {
    return $this->styleAestheticsScore;
  }
  /**
   * @param LensDiscoveryStyleStyleImageTypeSignals
   */
  public function setStyleImageType(LensDiscoveryStyleStyleImageTypeSignals $styleImageType)
  {
    $this->styleImageType = $styleImageType;
  }
  /**
   * @return LensDiscoveryStyleStyleImageTypeSignals
   */
  public function getStyleImageType()
  {
    return $this->styleImageType;
  }
  /**
   * @param int
   */
  public function setTestingScore($testingScore)
  {
    $this->testingScore = $testingScore;
  }
  /**
   * @return int
   */
  public function getTestingScore()
  {
    return $this->testingScore;
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
  public function setThumbSize($thumbSize)
  {
    $this->thumbSize = $thumbSize;
  }
  /**
   * @return int
   */
  public function getThumbSize()
  {
    return $this->thumbSize;
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
   * @param ImageDataThumbnail[]
   */
  public function setThumbnail($thumbnail)
  {
    $this->thumbnail = $thumbnail;
  }
  /**
   * @return ImageDataThumbnail[]
   */
  public function getThumbnail()
  {
    return $this->thumbnail;
  }
  /**
   * @param string
   */
  public function setUnavailableAfterSecs($unavailableAfterSecs)
  {
    $this->unavailableAfterSecs = $unavailableAfterSecs;
  }
  /**
   * @return string
   */
  public function getUnavailableAfterSecs()
  {
    return $this->unavailableAfterSecs;
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
   * @param float
   */
  public function setWhiteBackgroundScore($whiteBackgroundScore)
  {
    $this->whiteBackgroundScore = $whiteBackgroundScore;
  }
  /**
   * @return float
   */
  public function getWhiteBackgroundScore()
  {
    return $this->whiteBackgroundScore;
  }
  /**
   * @param int
   */
  public function setWhiteBackgroundScoreVersion($whiteBackgroundScoreVersion)
  {
    $this->whiteBackgroundScoreVersion = $whiteBackgroundScoreVersion;
  }
  /**
   * @return int
   */
  public function getWhiteBackgroundScoreVersion()
  {
    return $this->whiteBackgroundScoreVersion;
  }
  /**
   * @param int
   */
  public function setWidth($width)
  {
    $this->width = $width;
  }
  /**
   * @return int
   */
  public function getWidth()
  {
    return $this->width;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(ImageData::class, 'Google_Service_Contentwarehouse_ImageData');

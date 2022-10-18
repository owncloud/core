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

class CompositeDoc extends \Google\Collection
{
  protected $collection_key = 'subindexid';
  protected $internal_gapi_mappings = [
        "contentChecksum96" => "ContentChecksum96",
  ];
  /**
   * @var string
   */
  public $contentChecksum96;
  protected $accessRequirementsType = IndexingPrivacyAccessAccessRequirements::class;
  protected $accessRequirementsDataType = '';
  protected $additionalchecksumsType = CompositeDocAdditionalChecksums::class;
  protected $additionalchecksumsDataType = '';
  protected $alternatenameType = CompositeDocAlternateName::class;
  protected $alternatenameDataType = 'array';
  protected $anchorStatsType = IndexingDocjoinerAnchorStatistics::class;
  protected $anchorStatsDataType = '';
  protected $anchorsType = Anchors::class;
  protected $anchorsDataType = '';
  protected $badSslCertificateType = IndexingBadSSLCertificate::class;
  protected $badSslCertificateDataType = '';
  protected $cseIdType = QualityProseCSEUrlInfo::class;
  protected $cseIdDataType = 'array';
  /**
   * @var int
   */
  public $csePagerankCutoff;
  protected $dataVersionType = IndexingDocjoinerDataVersion::class;
  protected $dataVersionDataType = '';
  protected $docType = GDocumentBase::class;
  protected $docDataType = '';
  protected $docAttachmentsType = Proto2BridgeMessageSet::class;
  protected $docAttachmentsDataType = '';
  protected $docImagesType = ImageData::class;
  protected $docImagesDataType = 'array';
  protected $docVideosType = ImageRepositoryVideoProperties::class;
  protected $docVideosDataType = 'array';
  protected $docinfoPassthroughAttachmentsType = Proto2BridgeMessageSet::class;
  protected $docinfoPassthroughAttachmentsDataType = '';
  protected $embeddedContentInfoType = IndexingEmbeddedContentEmbeddedContentInfo::class;
  protected $embeddedContentInfoDataType = '';
  protected $extradupType = CompositeDocExtraDup::class;
  protected $extradupDataType = 'array';
  protected $forwardingdupType = CompositeDocForwardingDup::class;
  protected $forwardingdupDataType = 'array';
  protected $includedcontentType = CompositeDocIncludedContent::class;
  protected $includedcontentDataType = 'array';
  protected $indexinginfoType = CompositeDocIndexingInfo::class;
  protected $indexinginfoDataType = '';
  protected $labelDataType = QualityLabelsGoogleLabelData::class;
  protected $labelDataDataType = '';
  protected $liveexperimentinfoType = CompositeDocLiveExperimentInfo::class;
  protected $liveexperimentinfoDataType = '';
  protected $localinfoType = LocalWWWInfo::class;
  protected $localinfoDataType = '';
  protected $localizedAlternateNameType = IndexingConverterLocalizedAlternateName::class;
  protected $localizedAlternateNameDataType = 'array';
  protected $localizedvariationsType = CompositeDocLocalizedVariations::class;
  protected $localizedvariationsDataType = '';
  protected $manyboxDataType = ManyboxData::class;
  protected $manyboxDataDataType = '';
  protected $partialUpdateInfoType = CompositeDocPartialUpdateInfo::class;
  protected $partialUpdateInfoDataType = '';
  protected $perDocDataType = PerDocData::class;
  protected $perDocDataDataType = '';
  protected $porninfoType = ClassifierPornDocumentData::class;
  protected $porninfoDataType = '';
  protected $propertiesType = DocProperties::class;
  protected $propertiesDataType = '';
  protected $ptokenType = PtokenPToken::class;
  protected $ptokenDataType = '';
  protected $qualitysignalsType = CompositeDocQualitySignals::class;
  protected $qualitysignalsDataType = '';
  protected $registrationinfoType = RegistrationInfo::class;
  protected $registrationinfoDataType = '';
  protected $richcontentDataType = IndexingConverterRichContentData::class;
  protected $richcontentDataDataType = '';
  protected $richsnippetType = RichsnippetsPageMap::class;
  protected $richsnippetDataType = '';
  protected $robotsinfolistType = CompositeDocRobotsInfoList::class;
  protected $robotsinfolistDataType = '';
  /**
   * @var int
   */
  public $scaledIndyRank;
  protected $sitemapType = Sitemap::class;
  protected $sitemapDataType = '';
  /**
   * @var string
   */
  public $storageRowTimestampMicros;
  /**
   * @var string[]
   */
  public $subindexid;
  protected $syntacticDateType = QualityTimebasedSyntacticDate::class;
  protected $syntacticDateDataType = '';
  /**
   * @var string
   */
  public $url;
  /**
   * @var string
   */
  public $urldate;

  /**
   * @param string
   */
  public function setContentChecksum96($contentChecksum96)
  {
    $this->contentChecksum96 = $contentChecksum96;
  }
  /**
   * @return string
   */
  public function getContentChecksum96()
  {
    return $this->contentChecksum96;
  }
  /**
   * @param IndexingPrivacyAccessAccessRequirements
   */
  public function setAccessRequirements(IndexingPrivacyAccessAccessRequirements $accessRequirements)
  {
    $this->accessRequirements = $accessRequirements;
  }
  /**
   * @return IndexingPrivacyAccessAccessRequirements
   */
  public function getAccessRequirements()
  {
    return $this->accessRequirements;
  }
  /**
   * @param CompositeDocAdditionalChecksums
   */
  public function setAdditionalchecksums(CompositeDocAdditionalChecksums $additionalchecksums)
  {
    $this->additionalchecksums = $additionalchecksums;
  }
  /**
   * @return CompositeDocAdditionalChecksums
   */
  public function getAdditionalchecksums()
  {
    return $this->additionalchecksums;
  }
  /**
   * @param CompositeDocAlternateName[]
   */
  public function setAlternatename($alternatename)
  {
    $this->alternatename = $alternatename;
  }
  /**
   * @return CompositeDocAlternateName[]
   */
  public function getAlternatename()
  {
    return $this->alternatename;
  }
  /**
   * @param IndexingDocjoinerAnchorStatistics
   */
  public function setAnchorStats(IndexingDocjoinerAnchorStatistics $anchorStats)
  {
    $this->anchorStats = $anchorStats;
  }
  /**
   * @return IndexingDocjoinerAnchorStatistics
   */
  public function getAnchorStats()
  {
    return $this->anchorStats;
  }
  /**
   * @param Anchors
   */
  public function setAnchors(Anchors $anchors)
  {
    $this->anchors = $anchors;
  }
  /**
   * @return Anchors
   */
  public function getAnchors()
  {
    return $this->anchors;
  }
  /**
   * @param IndexingBadSSLCertificate
   */
  public function setBadSslCertificate(IndexingBadSSLCertificate $badSslCertificate)
  {
    $this->badSslCertificate = $badSslCertificate;
  }
  /**
   * @return IndexingBadSSLCertificate
   */
  public function getBadSslCertificate()
  {
    return $this->badSslCertificate;
  }
  /**
   * @param QualityProseCSEUrlInfo[]
   */
  public function setCseId($cseId)
  {
    $this->cseId = $cseId;
  }
  /**
   * @return QualityProseCSEUrlInfo[]
   */
  public function getCseId()
  {
    return $this->cseId;
  }
  /**
   * @param int
   */
  public function setCsePagerankCutoff($csePagerankCutoff)
  {
    $this->csePagerankCutoff = $csePagerankCutoff;
  }
  /**
   * @return int
   */
  public function getCsePagerankCutoff()
  {
    return $this->csePagerankCutoff;
  }
  /**
   * @param IndexingDocjoinerDataVersion
   */
  public function setDataVersion(IndexingDocjoinerDataVersion $dataVersion)
  {
    $this->dataVersion = $dataVersion;
  }
  /**
   * @return IndexingDocjoinerDataVersion
   */
  public function getDataVersion()
  {
    return $this->dataVersion;
  }
  /**
   * @param GDocumentBase
   */
  public function setDoc(GDocumentBase $doc)
  {
    $this->doc = $doc;
  }
  /**
   * @return GDocumentBase
   */
  public function getDoc()
  {
    return $this->doc;
  }
  /**
   * @param Proto2BridgeMessageSet
   */
  public function setDocAttachments(Proto2BridgeMessageSet $docAttachments)
  {
    $this->docAttachments = $docAttachments;
  }
  /**
   * @return Proto2BridgeMessageSet
   */
  public function getDocAttachments()
  {
    return $this->docAttachments;
  }
  /**
   * @param ImageData[]
   */
  public function setDocImages($docImages)
  {
    $this->docImages = $docImages;
  }
  /**
   * @return ImageData[]
   */
  public function getDocImages()
  {
    return $this->docImages;
  }
  /**
   * @param ImageRepositoryVideoProperties[]
   */
  public function setDocVideos($docVideos)
  {
    $this->docVideos = $docVideos;
  }
  /**
   * @return ImageRepositoryVideoProperties[]
   */
  public function getDocVideos()
  {
    return $this->docVideos;
  }
  /**
   * @param Proto2BridgeMessageSet
   */
  public function setDocinfoPassthroughAttachments(Proto2BridgeMessageSet $docinfoPassthroughAttachments)
  {
    $this->docinfoPassthroughAttachments = $docinfoPassthroughAttachments;
  }
  /**
   * @return Proto2BridgeMessageSet
   */
  public function getDocinfoPassthroughAttachments()
  {
    return $this->docinfoPassthroughAttachments;
  }
  /**
   * @param IndexingEmbeddedContentEmbeddedContentInfo
   */
  public function setEmbeddedContentInfo(IndexingEmbeddedContentEmbeddedContentInfo $embeddedContentInfo)
  {
    $this->embeddedContentInfo = $embeddedContentInfo;
  }
  /**
   * @return IndexingEmbeddedContentEmbeddedContentInfo
   */
  public function getEmbeddedContentInfo()
  {
    return $this->embeddedContentInfo;
  }
  /**
   * @param CompositeDocExtraDup[]
   */
  public function setExtradup($extradup)
  {
    $this->extradup = $extradup;
  }
  /**
   * @return CompositeDocExtraDup[]
   */
  public function getExtradup()
  {
    return $this->extradup;
  }
  /**
   * @param CompositeDocForwardingDup[]
   */
  public function setForwardingdup($forwardingdup)
  {
    $this->forwardingdup = $forwardingdup;
  }
  /**
   * @return CompositeDocForwardingDup[]
   */
  public function getForwardingdup()
  {
    return $this->forwardingdup;
  }
  /**
   * @param CompositeDocIncludedContent[]
   */
  public function setIncludedcontent($includedcontent)
  {
    $this->includedcontent = $includedcontent;
  }
  /**
   * @return CompositeDocIncludedContent[]
   */
  public function getIncludedcontent()
  {
    return $this->includedcontent;
  }
  /**
   * @param CompositeDocIndexingInfo
   */
  public function setIndexinginfo(CompositeDocIndexingInfo $indexinginfo)
  {
    $this->indexinginfo = $indexinginfo;
  }
  /**
   * @return CompositeDocIndexingInfo
   */
  public function getIndexinginfo()
  {
    return $this->indexinginfo;
  }
  /**
   * @param QualityLabelsGoogleLabelData
   */
  public function setLabelData(QualityLabelsGoogleLabelData $labelData)
  {
    $this->labelData = $labelData;
  }
  /**
   * @return QualityLabelsGoogleLabelData
   */
  public function getLabelData()
  {
    return $this->labelData;
  }
  /**
   * @param CompositeDocLiveExperimentInfo
   */
  public function setLiveexperimentinfo(CompositeDocLiveExperimentInfo $liveexperimentinfo)
  {
    $this->liveexperimentinfo = $liveexperimentinfo;
  }
  /**
   * @return CompositeDocLiveExperimentInfo
   */
  public function getLiveexperimentinfo()
  {
    return $this->liveexperimentinfo;
  }
  /**
   * @param LocalWWWInfo
   */
  public function setLocalinfo(LocalWWWInfo $localinfo)
  {
    $this->localinfo = $localinfo;
  }
  /**
   * @return LocalWWWInfo
   */
  public function getLocalinfo()
  {
    return $this->localinfo;
  }
  /**
   * @param IndexingConverterLocalizedAlternateName[]
   */
  public function setLocalizedAlternateName($localizedAlternateName)
  {
    $this->localizedAlternateName = $localizedAlternateName;
  }
  /**
   * @return IndexingConverterLocalizedAlternateName[]
   */
  public function getLocalizedAlternateName()
  {
    return $this->localizedAlternateName;
  }
  /**
   * @param CompositeDocLocalizedVariations
   */
  public function setLocalizedvariations(CompositeDocLocalizedVariations $localizedvariations)
  {
    $this->localizedvariations = $localizedvariations;
  }
  /**
   * @return CompositeDocLocalizedVariations
   */
  public function getLocalizedvariations()
  {
    return $this->localizedvariations;
  }
  /**
   * @param ManyboxData
   */
  public function setManyboxData(ManyboxData $manyboxData)
  {
    $this->manyboxData = $manyboxData;
  }
  /**
   * @return ManyboxData
   */
  public function getManyboxData()
  {
    return $this->manyboxData;
  }
  /**
   * @param CompositeDocPartialUpdateInfo
   */
  public function setPartialUpdateInfo(CompositeDocPartialUpdateInfo $partialUpdateInfo)
  {
    $this->partialUpdateInfo = $partialUpdateInfo;
  }
  /**
   * @return CompositeDocPartialUpdateInfo
   */
  public function getPartialUpdateInfo()
  {
    return $this->partialUpdateInfo;
  }
  /**
   * @param PerDocData
   */
  public function setPerDocData(PerDocData $perDocData)
  {
    $this->perDocData = $perDocData;
  }
  /**
   * @return PerDocData
   */
  public function getPerDocData()
  {
    return $this->perDocData;
  }
  /**
   * @param ClassifierPornDocumentData
   */
  public function setPorninfo(ClassifierPornDocumentData $porninfo)
  {
    $this->porninfo = $porninfo;
  }
  /**
   * @return ClassifierPornDocumentData
   */
  public function getPorninfo()
  {
    return $this->porninfo;
  }
  /**
   * @param DocProperties
   */
  public function setProperties(DocProperties $properties)
  {
    $this->properties = $properties;
  }
  /**
   * @return DocProperties
   */
  public function getProperties()
  {
    return $this->properties;
  }
  /**
   * @param PtokenPToken
   */
  public function setPtoken(PtokenPToken $ptoken)
  {
    $this->ptoken = $ptoken;
  }
  /**
   * @return PtokenPToken
   */
  public function getPtoken()
  {
    return $this->ptoken;
  }
  /**
   * @param CompositeDocQualitySignals
   */
  public function setQualitysignals(CompositeDocQualitySignals $qualitysignals)
  {
    $this->qualitysignals = $qualitysignals;
  }
  /**
   * @return CompositeDocQualitySignals
   */
  public function getQualitysignals()
  {
    return $this->qualitysignals;
  }
  /**
   * @param RegistrationInfo
   */
  public function setRegistrationinfo(RegistrationInfo $registrationinfo)
  {
    $this->registrationinfo = $registrationinfo;
  }
  /**
   * @return RegistrationInfo
   */
  public function getRegistrationinfo()
  {
    return $this->registrationinfo;
  }
  /**
   * @param IndexingConverterRichContentData
   */
  public function setRichcontentData(IndexingConverterRichContentData $richcontentData)
  {
    $this->richcontentData = $richcontentData;
  }
  /**
   * @return IndexingConverterRichContentData
   */
  public function getRichcontentData()
  {
    return $this->richcontentData;
  }
  /**
   * @param RichsnippetsPageMap
   */
  public function setRichsnippet(RichsnippetsPageMap $richsnippet)
  {
    $this->richsnippet = $richsnippet;
  }
  /**
   * @return RichsnippetsPageMap
   */
  public function getRichsnippet()
  {
    return $this->richsnippet;
  }
  /**
   * @param CompositeDocRobotsInfoList
   */
  public function setRobotsinfolist(CompositeDocRobotsInfoList $robotsinfolist)
  {
    $this->robotsinfolist = $robotsinfolist;
  }
  /**
   * @return CompositeDocRobotsInfoList
   */
  public function getRobotsinfolist()
  {
    return $this->robotsinfolist;
  }
  /**
   * @param int
   */
  public function setScaledIndyRank($scaledIndyRank)
  {
    $this->scaledIndyRank = $scaledIndyRank;
  }
  /**
   * @return int
   */
  public function getScaledIndyRank()
  {
    return $this->scaledIndyRank;
  }
  /**
   * @param Sitemap
   */
  public function setSitemap(Sitemap $sitemap)
  {
    $this->sitemap = $sitemap;
  }
  /**
   * @return Sitemap
   */
  public function getSitemap()
  {
    return $this->sitemap;
  }
  /**
   * @param string
   */
  public function setStorageRowTimestampMicros($storageRowTimestampMicros)
  {
    $this->storageRowTimestampMicros = $storageRowTimestampMicros;
  }
  /**
   * @return string
   */
  public function getStorageRowTimestampMicros()
  {
    return $this->storageRowTimestampMicros;
  }
  /**
   * @param string[]
   */
  public function setSubindexid($subindexid)
  {
    $this->subindexid = $subindexid;
  }
  /**
   * @return string[]
   */
  public function getSubindexid()
  {
    return $this->subindexid;
  }
  /**
   * @param QualityTimebasedSyntacticDate
   */
  public function setSyntacticDate(QualityTimebasedSyntacticDate $syntacticDate)
  {
    $this->syntacticDate = $syntacticDate;
  }
  /**
   * @return QualityTimebasedSyntacticDate
   */
  public function getSyntacticDate()
  {
    return $this->syntacticDate;
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
  public function setUrldate($urldate)
  {
    $this->urldate = $urldate;
  }
  /**
   * @return string
   */
  public function getUrldate()
  {
    return $this->urldate;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(CompositeDoc::class, 'Google_Service_Contentwarehouse_CompositeDoc');

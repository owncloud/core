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

class ResearchScienceSearchReconciledMetadata extends \Google\Collection
{
  protected $collection_key = 'versionEmbeddingVector';
  /**
   * @var string[]
   */
  public $alternateName;
  /**
   * @var string
   */
  public $authorList;
  protected $catalogType = ResearchScienceSearchCatalog::class;
  protected $catalogDataType = '';
  /**
   * @var string[]
   */
  public $compactIdentifier;
  /**
   * @var string[]
   */
  public $compactIdentifierFromCitation;
  protected $coverageEndDateType = ResearchScienceSearchDate::class;
  protected $coverageEndDateDataType = '';
  protected $coverageStartDateType = ResearchScienceSearchDate::class;
  protected $coverageStartDateDataType = '';
  protected $dataDownloadType = ResearchScienceSearchDataDownload::class;
  protected $dataDownloadDataType = 'array';
  /**
   * @var string
   */
  public $datasetClassificationFieldsHash;
  public $datasetClassificationScore;
  protected $dateCreatedType = ResearchScienceSearchDate::class;
  protected $dateCreatedDataType = '';
  protected $dateModifiedType = ResearchScienceSearchDate::class;
  protected $dateModifiedDataType = '';
  protected $datePublishedType = ResearchScienceSearchDate::class;
  protected $datePublishedDataType = '';
  protected $dateUpdatedType = ResearchScienceSearchDate::class;
  protected $dateUpdatedDataType = '';
  /**
   * @var string[]
   */
  public $denylistStatus;
  /**
   * @var string[]
   */
  public $description;
  /**
   * @var string[]
   */
  public $descriptionInHtml;
  /**
   * @var string
   */
  public $doi;
  /**
   * @var string[]
   */
  public $doiFromCitation;
  protected $fieldOfStudyType = ResearchScienceSearchFieldOfStudyInfo::class;
  protected $fieldOfStudyDataType = 'array';
  /**
   * @var string
   */
  public $fingerprint;
  protected $funderType = ResearchScienceSearchOrganization::class;
  protected $funderDataType = 'array';
  /**
   * @var bool
   */
  public $hasTableSummaries;
  /**
   * @var string
   */
  public $id;
  /**
   * @var string[]
   */
  public $identifierFromSource;
  /**
   * @var string[]
   */
  public $imageUrl;
  /**
   * @var int
   */
  public $indexInCluster;
  /**
   * @var string
   */
  public $isAccessibleForFree;
  /**
   * @var string[]
   */
  public $isBasedOn;
  /**
   * @var string[]
   */
  public $keyword;
  /**
   * @var string
   */
  public $languageCode;
  protected $licenseType = ResearchScienceSearchLicense::class;
  protected $licenseDataType = 'array';
  /**
   * @var string[]
   */
  public $licenseDeprecated;
  /**
   * @var string[]
   */
  public $measurementTechnique;
  /**
   * @var string[]
   */
  public $mentionedUrls;
  /**
   * @var string
   */
  public $metadataType;
  /**
   * @var string[]
   */
  public $name;
  /**
   * @var int
   */
  public $numberOfDatasetsAtSourceUrl;
  /**
   * @var int
   */
  public $numberOfScholarCitations;
  protected $publicationType = ResearchScienceSearchCitation::class;
  protected $publicationDataType = 'array';
  /**
   * @var string
   */
  public $relatedArticleUrl;
  protected $replicaType = ResearchScienceSearchReplica::class;
  protected $replicaDataType = 'array';
  /**
   * @var string[]
   */
  public $sameAs;
  /**
   * @var string
   */
  public $scholarQuery;
  protected $scholarlyArticleType = ResearchScienceSearchScholarlyArticle::class;
  protected $scholarlyArticleDataType = '';
  protected $sourceOrganizationType = ResearchScienceSearchOrganization::class;
  protected $sourceOrganizationDataType = 'array';
  /**
   * @var string
   */
  public $sourceUrl;
  protected $sourceUrlDocjoinInfoType = ResearchScienceSearchSourceUrlDocjoinInfo::class;
  protected $sourceUrlDocjoinInfoDataType = '';
  protected $spatialCoverageType = ResearchScienceSearchLocation::class;
  protected $spatialCoverageDataType = 'array';
  /**
   * @var string[]
   */
  public $topSalientTermLabel;
  /**
   * @var string[]
   */
  public $url;
  /**
   * @var string[]
   */
  public $variable;
  protected $versionClusterInfoType = ResearchScienceSearchVersionClusterInfo::class;
  protected $versionClusterInfoDataType = '';
  /**
   * @var string
   */
  public $versionEmbeddingFieldsHash;
  /**
   * @var float[]
   */
  public $versionEmbeddingVector;

  /**
   * @param string[]
   */
  public function setAlternateName($alternateName)
  {
    $this->alternateName = $alternateName;
  }
  /**
   * @return string[]
   */
  public function getAlternateName()
  {
    return $this->alternateName;
  }
  /**
   * @param string
   */
  public function setAuthorList($authorList)
  {
    $this->authorList = $authorList;
  }
  /**
   * @return string
   */
  public function getAuthorList()
  {
    return $this->authorList;
  }
  /**
   * @param ResearchScienceSearchCatalog
   */
  public function setCatalog(ResearchScienceSearchCatalog $catalog)
  {
    $this->catalog = $catalog;
  }
  /**
   * @return ResearchScienceSearchCatalog
   */
  public function getCatalog()
  {
    return $this->catalog;
  }
  /**
   * @param string[]
   */
  public function setCompactIdentifier($compactIdentifier)
  {
    $this->compactIdentifier = $compactIdentifier;
  }
  /**
   * @return string[]
   */
  public function getCompactIdentifier()
  {
    return $this->compactIdentifier;
  }
  /**
   * @param string[]
   */
  public function setCompactIdentifierFromCitation($compactIdentifierFromCitation)
  {
    $this->compactIdentifierFromCitation = $compactIdentifierFromCitation;
  }
  /**
   * @return string[]
   */
  public function getCompactIdentifierFromCitation()
  {
    return $this->compactIdentifierFromCitation;
  }
  /**
   * @param ResearchScienceSearchDate
   */
  public function setCoverageEndDate(ResearchScienceSearchDate $coverageEndDate)
  {
    $this->coverageEndDate = $coverageEndDate;
  }
  /**
   * @return ResearchScienceSearchDate
   */
  public function getCoverageEndDate()
  {
    return $this->coverageEndDate;
  }
  /**
   * @param ResearchScienceSearchDate
   */
  public function setCoverageStartDate(ResearchScienceSearchDate $coverageStartDate)
  {
    $this->coverageStartDate = $coverageStartDate;
  }
  /**
   * @return ResearchScienceSearchDate
   */
  public function getCoverageStartDate()
  {
    return $this->coverageStartDate;
  }
  /**
   * @param ResearchScienceSearchDataDownload[]
   */
  public function setDataDownload($dataDownload)
  {
    $this->dataDownload = $dataDownload;
  }
  /**
   * @return ResearchScienceSearchDataDownload[]
   */
  public function getDataDownload()
  {
    return $this->dataDownload;
  }
  /**
   * @param string
   */
  public function setDatasetClassificationFieldsHash($datasetClassificationFieldsHash)
  {
    $this->datasetClassificationFieldsHash = $datasetClassificationFieldsHash;
  }
  /**
   * @return string
   */
  public function getDatasetClassificationFieldsHash()
  {
    return $this->datasetClassificationFieldsHash;
  }
  public function setDatasetClassificationScore($datasetClassificationScore)
  {
    $this->datasetClassificationScore = $datasetClassificationScore;
  }
  public function getDatasetClassificationScore()
  {
    return $this->datasetClassificationScore;
  }
  /**
   * @param ResearchScienceSearchDate
   */
  public function setDateCreated(ResearchScienceSearchDate $dateCreated)
  {
    $this->dateCreated = $dateCreated;
  }
  /**
   * @return ResearchScienceSearchDate
   */
  public function getDateCreated()
  {
    return $this->dateCreated;
  }
  /**
   * @param ResearchScienceSearchDate
   */
  public function setDateModified(ResearchScienceSearchDate $dateModified)
  {
    $this->dateModified = $dateModified;
  }
  /**
   * @return ResearchScienceSearchDate
   */
  public function getDateModified()
  {
    return $this->dateModified;
  }
  /**
   * @param ResearchScienceSearchDate
   */
  public function setDatePublished(ResearchScienceSearchDate $datePublished)
  {
    $this->datePublished = $datePublished;
  }
  /**
   * @return ResearchScienceSearchDate
   */
  public function getDatePublished()
  {
    return $this->datePublished;
  }
  /**
   * @param ResearchScienceSearchDate
   */
  public function setDateUpdated(ResearchScienceSearchDate $dateUpdated)
  {
    $this->dateUpdated = $dateUpdated;
  }
  /**
   * @return ResearchScienceSearchDate
   */
  public function getDateUpdated()
  {
    return $this->dateUpdated;
  }
  /**
   * @param string[]
   */
  public function setDenylistStatus($denylistStatus)
  {
    $this->denylistStatus = $denylistStatus;
  }
  /**
   * @return string[]
   */
  public function getDenylistStatus()
  {
    return $this->denylistStatus;
  }
  /**
   * @param string[]
   */
  public function setDescription($description)
  {
    $this->description = $description;
  }
  /**
   * @return string[]
   */
  public function getDescription()
  {
    return $this->description;
  }
  /**
   * @param string[]
   */
  public function setDescriptionInHtml($descriptionInHtml)
  {
    $this->descriptionInHtml = $descriptionInHtml;
  }
  /**
   * @return string[]
   */
  public function getDescriptionInHtml()
  {
    return $this->descriptionInHtml;
  }
  /**
   * @param string
   */
  public function setDoi($doi)
  {
    $this->doi = $doi;
  }
  /**
   * @return string
   */
  public function getDoi()
  {
    return $this->doi;
  }
  /**
   * @param string[]
   */
  public function setDoiFromCitation($doiFromCitation)
  {
    $this->doiFromCitation = $doiFromCitation;
  }
  /**
   * @return string[]
   */
  public function getDoiFromCitation()
  {
    return $this->doiFromCitation;
  }
  /**
   * @param ResearchScienceSearchFieldOfStudyInfo[]
   */
  public function setFieldOfStudy($fieldOfStudy)
  {
    $this->fieldOfStudy = $fieldOfStudy;
  }
  /**
   * @return ResearchScienceSearchFieldOfStudyInfo[]
   */
  public function getFieldOfStudy()
  {
    return $this->fieldOfStudy;
  }
  /**
   * @param string
   */
  public function setFingerprint($fingerprint)
  {
    $this->fingerprint = $fingerprint;
  }
  /**
   * @return string
   */
  public function getFingerprint()
  {
    return $this->fingerprint;
  }
  /**
   * @param ResearchScienceSearchOrganization[]
   */
  public function setFunder($funder)
  {
    $this->funder = $funder;
  }
  /**
   * @return ResearchScienceSearchOrganization[]
   */
  public function getFunder()
  {
    return $this->funder;
  }
  /**
   * @param bool
   */
  public function setHasTableSummaries($hasTableSummaries)
  {
    $this->hasTableSummaries = $hasTableSummaries;
  }
  /**
   * @return bool
   */
  public function getHasTableSummaries()
  {
    return $this->hasTableSummaries;
  }
  /**
   * @param string
   */
  public function setId($id)
  {
    $this->id = $id;
  }
  /**
   * @return string
   */
  public function getId()
  {
    return $this->id;
  }
  /**
   * @param string[]
   */
  public function setIdentifierFromSource($identifierFromSource)
  {
    $this->identifierFromSource = $identifierFromSource;
  }
  /**
   * @return string[]
   */
  public function getIdentifierFromSource()
  {
    return $this->identifierFromSource;
  }
  /**
   * @param string[]
   */
  public function setImageUrl($imageUrl)
  {
    $this->imageUrl = $imageUrl;
  }
  /**
   * @return string[]
   */
  public function getImageUrl()
  {
    return $this->imageUrl;
  }
  /**
   * @param int
   */
  public function setIndexInCluster($indexInCluster)
  {
    $this->indexInCluster = $indexInCluster;
  }
  /**
   * @return int
   */
  public function getIndexInCluster()
  {
    return $this->indexInCluster;
  }
  /**
   * @param string
   */
  public function setIsAccessibleForFree($isAccessibleForFree)
  {
    $this->isAccessibleForFree = $isAccessibleForFree;
  }
  /**
   * @return string
   */
  public function getIsAccessibleForFree()
  {
    return $this->isAccessibleForFree;
  }
  /**
   * @param string[]
   */
  public function setIsBasedOn($isBasedOn)
  {
    $this->isBasedOn = $isBasedOn;
  }
  /**
   * @return string[]
   */
  public function getIsBasedOn()
  {
    return $this->isBasedOn;
  }
  /**
   * @param string[]
   */
  public function setKeyword($keyword)
  {
    $this->keyword = $keyword;
  }
  /**
   * @return string[]
   */
  public function getKeyword()
  {
    return $this->keyword;
  }
  /**
   * @param string
   */
  public function setLanguageCode($languageCode)
  {
    $this->languageCode = $languageCode;
  }
  /**
   * @return string
   */
  public function getLanguageCode()
  {
    return $this->languageCode;
  }
  /**
   * @param ResearchScienceSearchLicense[]
   */
  public function setLicense($license)
  {
    $this->license = $license;
  }
  /**
   * @return ResearchScienceSearchLicense[]
   */
  public function getLicense()
  {
    return $this->license;
  }
  /**
   * @param string[]
   */
  public function setLicenseDeprecated($licenseDeprecated)
  {
    $this->licenseDeprecated = $licenseDeprecated;
  }
  /**
   * @return string[]
   */
  public function getLicenseDeprecated()
  {
    return $this->licenseDeprecated;
  }
  /**
   * @param string[]
   */
  public function setMeasurementTechnique($measurementTechnique)
  {
    $this->measurementTechnique = $measurementTechnique;
  }
  /**
   * @return string[]
   */
  public function getMeasurementTechnique()
  {
    return $this->measurementTechnique;
  }
  /**
   * @param string[]
   */
  public function setMentionedUrls($mentionedUrls)
  {
    $this->mentionedUrls = $mentionedUrls;
  }
  /**
   * @return string[]
   */
  public function getMentionedUrls()
  {
    return $this->mentionedUrls;
  }
  /**
   * @param string
   */
  public function setMetadataType($metadataType)
  {
    $this->metadataType = $metadataType;
  }
  /**
   * @return string
   */
  public function getMetadataType()
  {
    return $this->metadataType;
  }
  /**
   * @param string[]
   */
  public function setName($name)
  {
    $this->name = $name;
  }
  /**
   * @return string[]
   */
  public function getName()
  {
    return $this->name;
  }
  /**
   * @param int
   */
  public function setNumberOfDatasetsAtSourceUrl($numberOfDatasetsAtSourceUrl)
  {
    $this->numberOfDatasetsAtSourceUrl = $numberOfDatasetsAtSourceUrl;
  }
  /**
   * @return int
   */
  public function getNumberOfDatasetsAtSourceUrl()
  {
    return $this->numberOfDatasetsAtSourceUrl;
  }
  /**
   * @param int
   */
  public function setNumberOfScholarCitations($numberOfScholarCitations)
  {
    $this->numberOfScholarCitations = $numberOfScholarCitations;
  }
  /**
   * @return int
   */
  public function getNumberOfScholarCitations()
  {
    return $this->numberOfScholarCitations;
  }
  /**
   * @param ResearchScienceSearchCitation[]
   */
  public function setPublication($publication)
  {
    $this->publication = $publication;
  }
  /**
   * @return ResearchScienceSearchCitation[]
   */
  public function getPublication()
  {
    return $this->publication;
  }
  /**
   * @param string
   */
  public function setRelatedArticleUrl($relatedArticleUrl)
  {
    $this->relatedArticleUrl = $relatedArticleUrl;
  }
  /**
   * @return string
   */
  public function getRelatedArticleUrl()
  {
    return $this->relatedArticleUrl;
  }
  /**
   * @param ResearchScienceSearchReplica[]
   */
  public function setReplica($replica)
  {
    $this->replica = $replica;
  }
  /**
   * @return ResearchScienceSearchReplica[]
   */
  public function getReplica()
  {
    return $this->replica;
  }
  /**
   * @param string[]
   */
  public function setSameAs($sameAs)
  {
    $this->sameAs = $sameAs;
  }
  /**
   * @return string[]
   */
  public function getSameAs()
  {
    return $this->sameAs;
  }
  /**
   * @param string
   */
  public function setScholarQuery($scholarQuery)
  {
    $this->scholarQuery = $scholarQuery;
  }
  /**
   * @return string
   */
  public function getScholarQuery()
  {
    return $this->scholarQuery;
  }
  /**
   * @param ResearchScienceSearchScholarlyArticle
   */
  public function setScholarlyArticle(ResearchScienceSearchScholarlyArticle $scholarlyArticle)
  {
    $this->scholarlyArticle = $scholarlyArticle;
  }
  /**
   * @return ResearchScienceSearchScholarlyArticle
   */
  public function getScholarlyArticle()
  {
    return $this->scholarlyArticle;
  }
  /**
   * @param ResearchScienceSearchOrganization[]
   */
  public function setSourceOrganization($sourceOrganization)
  {
    $this->sourceOrganization = $sourceOrganization;
  }
  /**
   * @return ResearchScienceSearchOrganization[]
   */
  public function getSourceOrganization()
  {
    return $this->sourceOrganization;
  }
  /**
   * @param string
   */
  public function setSourceUrl($sourceUrl)
  {
    $this->sourceUrl = $sourceUrl;
  }
  /**
   * @return string
   */
  public function getSourceUrl()
  {
    return $this->sourceUrl;
  }
  /**
   * @param ResearchScienceSearchSourceUrlDocjoinInfo
   */
  public function setSourceUrlDocjoinInfo(ResearchScienceSearchSourceUrlDocjoinInfo $sourceUrlDocjoinInfo)
  {
    $this->sourceUrlDocjoinInfo = $sourceUrlDocjoinInfo;
  }
  /**
   * @return ResearchScienceSearchSourceUrlDocjoinInfo
   */
  public function getSourceUrlDocjoinInfo()
  {
    return $this->sourceUrlDocjoinInfo;
  }
  /**
   * @param ResearchScienceSearchLocation[]
   */
  public function setSpatialCoverage($spatialCoverage)
  {
    $this->spatialCoverage = $spatialCoverage;
  }
  /**
   * @return ResearchScienceSearchLocation[]
   */
  public function getSpatialCoverage()
  {
    return $this->spatialCoverage;
  }
  /**
   * @param string[]
   */
  public function setTopSalientTermLabel($topSalientTermLabel)
  {
    $this->topSalientTermLabel = $topSalientTermLabel;
  }
  /**
   * @return string[]
   */
  public function getTopSalientTermLabel()
  {
    return $this->topSalientTermLabel;
  }
  /**
   * @param string[]
   */
  public function setUrl($url)
  {
    $this->url = $url;
  }
  /**
   * @return string[]
   */
  public function getUrl()
  {
    return $this->url;
  }
  /**
   * @param string[]
   */
  public function setVariable($variable)
  {
    $this->variable = $variable;
  }
  /**
   * @return string[]
   */
  public function getVariable()
  {
    return $this->variable;
  }
  /**
   * @param ResearchScienceSearchVersionClusterInfo
   */
  public function setVersionClusterInfo(ResearchScienceSearchVersionClusterInfo $versionClusterInfo)
  {
    $this->versionClusterInfo = $versionClusterInfo;
  }
  /**
   * @return ResearchScienceSearchVersionClusterInfo
   */
  public function getVersionClusterInfo()
  {
    return $this->versionClusterInfo;
  }
  /**
   * @param string
   */
  public function setVersionEmbeddingFieldsHash($versionEmbeddingFieldsHash)
  {
    $this->versionEmbeddingFieldsHash = $versionEmbeddingFieldsHash;
  }
  /**
   * @return string
   */
  public function getVersionEmbeddingFieldsHash()
  {
    return $this->versionEmbeddingFieldsHash;
  }
  /**
   * @param float[]
   */
  public function setVersionEmbeddingVector($versionEmbeddingVector)
  {
    $this->versionEmbeddingVector = $versionEmbeddingVector;
  }
  /**
   * @return float[]
   */
  public function getVersionEmbeddingVector()
  {
    return $this->versionEmbeddingVector;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(ResearchScienceSearchReconciledMetadata::class, 'Google_Service_Contentwarehouse_ResearchScienceSearchReconciledMetadata');

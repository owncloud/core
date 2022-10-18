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

class ScienceCitation extends \Google\Collection
{
  protected $collection_key = 'unioncatalog';
  protected $internal_gapi_mappings = [
        "abstractDisplay" => "AbstractDisplay",
        "abstractHtml" => "AbstractHtml",
        "abstractHtmlLeftOver" => "AbstractHtmlLeftOver",
        "abstractLanguage" => "AbstractLanguage",
        "abstractSource" => "AbstractSource",
        "abstractText" => "AbstractText",
        "alternateVersionID" => "AlternateVersionID",
        "anchors" => "Anchors",
        "arxivSection" => "ArxivSection",
        "authorListHasEtAl" => "AuthorListHasEtAl",
        "authorMetatagLeftOver" => "AuthorMetatagLeftOver",
        "baseGlobalID" => "BaseGlobalID",
        "baseLocalID" => "BaseLocalID",
        "borrowedAuthors" => "BorrowedAuthors",
        "borrowedFields" => "BorrowedFields",
        "chapter" => "Chapter",
        "citationSource" => "CitationSource",
        "citationSourceUrl" => "CitationSourceUrl",
        "citationSrc" => "CitationSrc",
        "clusterDiscoveryDate" => "ClusterDiscoveryDate",
        "conferenceId" => "ConferenceId",
        "conferenceNumber" => "ConferenceNumber",
        "crawledDocid" => "CrawledDocid",
        "dEPRECATEDMetadataSourceFile" => "DEPRECATEDMetadataSourceFile",
        "dEPRECATEDPublisherDisplayName" => "DEPRECATEDPublisherDisplayName",
        "dOI" => "DOI",
        "dblpId" => "DblpId",
        "documentID" => "DocumentID",
        "dspaceID" => "DspaceID",
        "edition" => "Edition",
        "editor" => "Editor",
        "fileCreationDay" => "FileCreationDay",
        "fileCreationMonth" => "FileCreationMonth",
        "fileCreationYear" => "FileCreationYear",
        "iSBN" => "ISBN",
        "iSBNVariant" => "ISBNVariant",
        "iSSN" => "ISSN",
        "iSSNVariant" => "ISSNVariant",
        "incrementalExpected" => "IncrementalExpected",
        "jOI" => "JOI",
        "keywords" => "Keywords",
        "lCCN" => "LCCN",
        "language" => "Language",
        "legalCitation" => "LegalCitation",
        "levelOfDiscussion" => "LevelOfDiscussion",
        "note" => "Note",
        "numBackwardLinks" => "NumBackwardLinks",
        "numBackwardLinksFromLegal" => "NumBackwardLinksFromLegal",
        "numBackwardLinksInWoS" => "NumBackwardLinksInWoS",
        "numForwardLinks" => "NumForwardLinks",
        "numGoodEmbeddedRefs" => "NumGoodEmbeddedRefs",
        "numHostedPages" => "NumHostedPages",
        "numKeyQuotes" => "NumKeyQuotes",
        "numRelated" => "NumRelated",
        "numRelated2" => "NumRelated2",
        "numRelated3" => "NumRelated3",
        "numSectionRefs" => "NumSectionRefs",
        "numVersions" => "NumVersions",
        "number" => "Number",
        "onlineDay" => "OnlineDay",
        "onlineMonth" => "OnlineMonth",
        "onlineYear" => "OnlineYear",
        "otherID" => "OtherID",
        "pMCID" => "PMCID",
        "pMID" => "PMID",
        "pages" => "Pages",
        "parseSource" => "ParseSource",
        "patentApplicationNumber" => "PatentApplicationNumber",
        "patentClassification" => "PatentClassification",
        "patentCountry" => "PatentCountry",
        "patentNumber" => "PatentNumber",
        "patentOffice" => "PatentOffice",
        "patentPublicationNumber" => "PatentPublicationNumber",
        "publicationDay" => "PublicationDay",
        "publicationMonth" => "PublicationMonth",
        "publicationVenue" => "PublicationVenue",
        "publicationVenueVariant" => "PublicationVenueVariant",
        "publicationYear" => "PublicationYear",
        "publisherAddress" => "PublisherAddress",
        "publisherId" => "PublisherId",
        "publisherOrg" => "PublisherOrg",
        "pubvenueID" => "PubvenueID",
        "reviewTypeReason" => "ReviewTypeReason",
        "sICI" => "SICI",
        "series" => "Series",
        "title" => "Title",
        "titleHtml" => "TitleHtml",
        "titleHtmlLeftOver" => "TitleHtmlLeftOver",
        "translatedAuthorListHasEtAl" => "TranslatedAuthorListHasEtAl",
        "type" => "Type",
        "unmatchedEmailAddr" => "UnmatchedEmailAddr",
        "unmatchedInstitution" => "UnmatchedInstitution",
        "versionID" => "VersionID",
        "volume" => "Volume",
        "wOSID" => "WOSID",
        "worldViewable" => "WorldViewable",
  ];
  /**
   * @var string
   */
  public $abstractDisplay;
  /**
   * @var string
   */
  public $abstractHtml;
  /**
   * @var string
   */
  public $abstractHtmlLeftOver;
  /**
   * @var string
   */
  public $abstractLanguage;
  /**
   * @var string
   */
  public $abstractSource;
  /**
   * @var string
   */
  public $abstractText;
  /**
   * @var string
   */
  public $alternateVersionID;
  protected $anchorsType = ScienceCitationAnchor::class;
  protected $anchorsDataType = 'array';
  /**
   * @var string
   */
  public $arxivSection;
  /**
   * @var bool
   */
  public $authorListHasEtAl;
  /**
   * @var string
   */
  public $authorMetatagLeftOver;
  /**
   * @var string
   */
  public $baseGlobalID;
  /**
   * @var string
   */
  public $baseLocalID;
  /**
   * @var int
   */
  public $borrowedAuthors;
  /**
   * @var int
   */
  public $borrowedFields;
  /**
   * @var string
   */
  public $chapter;
  /**
   * @var int
   */
  public $citationSource;
  /**
   * @var string
   */
  public $citationSourceUrl;
  /**
   * @var string
   */
  public $citationSrc;
  /**
   * @var string
   */
  public $clusterDiscoveryDate;
  /**
   * @var string
   */
  public $conferenceId;
  /**
   * @var int
   */
  public $conferenceNumber;
  /**
   * @var string
   */
  public $crawledDocid;
  /**
   * @var string
   */
  public $dEPRECATEDMetadataSourceFile;
  /**
   * @var string
   */
  public $dEPRECATEDPublisherDisplayName;
  /**
   * @var string
   */
  public $dOI;
  /**
   * @var string
   */
  public $dblpId;
  /**
   * @var string
   */
  public $documentID;
  /**
   * @var string
   */
  public $dspaceID;
  /**
   * @var string
   */
  public $edition;
  /**
   * @var string[]
   */
  public $editor;
  /**
   * @var int
   */
  public $fileCreationDay;
  /**
   * @var int
   */
  public $fileCreationMonth;
  /**
   * @var int
   */
  public $fileCreationYear;
  /**
   * @var string
   */
  public $iSBN;
  /**
   * @var string[]
   */
  public $iSBNVariant;
  /**
   * @var string
   */
  public $iSSN;
  /**
   * @var string[]
   */
  public $iSSNVariant;
  /**
   * @var bool
   */
  public $incrementalExpected;
  /**
   * @var string
   */
  public $jOI;
  /**
   * @var string[]
   */
  public $keywords;
  /**
   * @var string
   */
  public $lCCN;
  /**
   * @var string
   */
  public $language;
  protected $legalCitationType = LegalCitation::class;
  protected $legalCitationDataType = '';
  /**
   * @var int
   */
  public $levelOfDiscussion;
  /**
   * @var string
   */
  public $note;
  /**
   * @var int
   */
  public $numBackwardLinks;
  /**
   * @var int
   */
  public $numBackwardLinksFromLegal;
  /**
   * @var int
   */
  public $numBackwardLinksInWoS;
  /**
   * @var int
   */
  public $numForwardLinks;
  /**
   * @var int
   */
  public $numGoodEmbeddedRefs;
  /**
   * @var int
   */
  public $numHostedPages;
  /**
   * @var int
   */
  public $numKeyQuotes;
  /**
   * @var int
   */
  public $numRelated;
  /**
   * @var int
   */
  public $numRelated2;
  /**
   * @var int
   */
  public $numRelated3;
  /**
   * @var int
   */
  public $numSectionRefs;
  /**
   * @var int
   */
  public $numVersions;
  /**
   * @var string
   */
  public $number;
  /**
   * @var int
   */
  public $onlineDay;
  /**
   * @var int
   */
  public $onlineMonth;
  /**
   * @var int
   */
  public $onlineYear;
  /**
   * @var string
   */
  public $otherID;
  /**
   * @var string
   */
  public $pMCID;
  /**
   * @var string
   */
  public $pMID;
  /**
   * @var string
   */
  public $pages;
  /**
   * @var int
   */
  public $parseSource;
  /**
   * @var string
   */
  public $patentApplicationNumber;
  /**
   * @var string[]
   */
  public $patentClassification;
  /**
   * @var string[]
   */
  public $patentCountry;
  /**
   * @var string
   */
  public $patentNumber;
  /**
   * @var int
   */
  public $patentOffice;
  /**
   * @var string
   */
  public $patentPublicationNumber;
  /**
   * @var int
   */
  public $publicationDay;
  /**
   * @var int
   */
  public $publicationMonth;
  /**
   * @var string
   */
  public $publicationVenue;
  /**
   * @var string[]
   */
  public $publicationVenueVariant;
  /**
   * @var int
   */
  public $publicationYear;
  /**
   * @var string
   */
  public $publisherAddress;
  /**
   * @var string
   */
  public $publisherId;
  /**
   * @var string
   */
  public $publisherOrg;
  /**
   * @var string
   */
  public $pubvenueID;
  /**
   * @var string
   */
  public $reviewTypeReason;
  /**
   * @var string
   */
  public $sICI;
  /**
   * @var string
   */
  public $series;
  /**
   * @var string
   */
  public $title;
  /**
   * @var string
   */
  public $titleHtml;
  /**
   * @var string
   */
  public $titleHtmlLeftOver;
  /**
   * @var bool
   */
  public $translatedAuthorListHasEtAl;
  /**
   * @var int
   */
  public $type;
  /**
   * @var string[]
   */
  public $unmatchedEmailAddr;
  /**
   * @var string[]
   */
  public $unmatchedInstitution;
  /**
   * @var string
   */
  public $versionID;
  /**
   * @var int
   */
  public $volume;
  /**
   * @var string
   */
  public $wOSID;
  /**
   * @var bool
   */
  public $worldViewable;
  protected $accessurlType = ScienceCitationAccessURL::class;
  protected $accessurlDataType = 'array';
  protected $alternateabstractType = ScienceCitationAlternateAbstract::class;
  protected $alternateabstractDataType = 'array';
  protected $alternatetitleType = ScienceCitationAlternateTitle::class;
  protected $alternatetitleDataType = 'array';
  protected $authorType = ScienceCitationAuthor::class;
  protected $authorDataType = 'array';
  protected $categoryType = ScienceCitationCategory::class;
  protected $categoryDataType = 'array';
  protected $downloadurlType = ScienceCitationDownloadURL::class;
  protected $downloadurlDataType = 'array';
  protected $fundingType = ScienceCitationFunding::class;
  protected $fundingDataType = 'array';
  protected $referencediscussionType = ScienceCitationReferenceDiscussion::class;
  protected $referencediscussionDataType = 'array';
  protected $subjectType = ScienceCitationSubject::class;
  protected $subjectDataType = 'array';
  protected $translatedauthorType = ScienceCitationTranslatedAuthor::class;
  protected $translatedauthorDataType = 'array';
  protected $unioncatalogType = ScienceCitationUnionCatalog::class;
  protected $unioncatalogDataType = 'array';

  /**
   * @param string
   */
  public function setAbstractDisplay($abstractDisplay)
  {
    $this->abstractDisplay = $abstractDisplay;
  }
  /**
   * @return string
   */
  public function getAbstractDisplay()
  {
    return $this->abstractDisplay;
  }
  /**
   * @param string
   */
  public function setAbstractHtml($abstractHtml)
  {
    $this->abstractHtml = $abstractHtml;
  }
  /**
   * @return string
   */
  public function getAbstractHtml()
  {
    return $this->abstractHtml;
  }
  /**
   * @param string
   */
  public function setAbstractHtmlLeftOver($abstractHtmlLeftOver)
  {
    $this->abstractHtmlLeftOver = $abstractHtmlLeftOver;
  }
  /**
   * @return string
   */
  public function getAbstractHtmlLeftOver()
  {
    return $this->abstractHtmlLeftOver;
  }
  /**
   * @param string
   */
  public function setAbstractLanguage($abstractLanguage)
  {
    $this->abstractLanguage = $abstractLanguage;
  }
  /**
   * @return string
   */
  public function getAbstractLanguage()
  {
    return $this->abstractLanguage;
  }
  /**
   * @param string
   */
  public function setAbstractSource($abstractSource)
  {
    $this->abstractSource = $abstractSource;
  }
  /**
   * @return string
   */
  public function getAbstractSource()
  {
    return $this->abstractSource;
  }
  /**
   * @param string
   */
  public function setAbstractText($abstractText)
  {
    $this->abstractText = $abstractText;
  }
  /**
   * @return string
   */
  public function getAbstractText()
  {
    return $this->abstractText;
  }
  /**
   * @param string
   */
  public function setAlternateVersionID($alternateVersionID)
  {
    $this->alternateVersionID = $alternateVersionID;
  }
  /**
   * @return string
   */
  public function getAlternateVersionID()
  {
    return $this->alternateVersionID;
  }
  /**
   * @param ScienceCitationAnchor[]
   */
  public function setAnchors($anchors)
  {
    $this->anchors = $anchors;
  }
  /**
   * @return ScienceCitationAnchor[]
   */
  public function getAnchors()
  {
    return $this->anchors;
  }
  /**
   * @param string
   */
  public function setArxivSection($arxivSection)
  {
    $this->arxivSection = $arxivSection;
  }
  /**
   * @return string
   */
  public function getArxivSection()
  {
    return $this->arxivSection;
  }
  /**
   * @param bool
   */
  public function setAuthorListHasEtAl($authorListHasEtAl)
  {
    $this->authorListHasEtAl = $authorListHasEtAl;
  }
  /**
   * @return bool
   */
  public function getAuthorListHasEtAl()
  {
    return $this->authorListHasEtAl;
  }
  /**
   * @param string
   */
  public function setAuthorMetatagLeftOver($authorMetatagLeftOver)
  {
    $this->authorMetatagLeftOver = $authorMetatagLeftOver;
  }
  /**
   * @return string
   */
  public function getAuthorMetatagLeftOver()
  {
    return $this->authorMetatagLeftOver;
  }
  /**
   * @param string
   */
  public function setBaseGlobalID($baseGlobalID)
  {
    $this->baseGlobalID = $baseGlobalID;
  }
  /**
   * @return string
   */
  public function getBaseGlobalID()
  {
    return $this->baseGlobalID;
  }
  /**
   * @param string
   */
  public function setBaseLocalID($baseLocalID)
  {
    $this->baseLocalID = $baseLocalID;
  }
  /**
   * @return string
   */
  public function getBaseLocalID()
  {
    return $this->baseLocalID;
  }
  /**
   * @param int
   */
  public function setBorrowedAuthors($borrowedAuthors)
  {
    $this->borrowedAuthors = $borrowedAuthors;
  }
  /**
   * @return int
   */
  public function getBorrowedAuthors()
  {
    return $this->borrowedAuthors;
  }
  /**
   * @param int
   */
  public function setBorrowedFields($borrowedFields)
  {
    $this->borrowedFields = $borrowedFields;
  }
  /**
   * @return int
   */
  public function getBorrowedFields()
  {
    return $this->borrowedFields;
  }
  /**
   * @param string
   */
  public function setChapter($chapter)
  {
    $this->chapter = $chapter;
  }
  /**
   * @return string
   */
  public function getChapter()
  {
    return $this->chapter;
  }
  /**
   * @param int
   */
  public function setCitationSource($citationSource)
  {
    $this->citationSource = $citationSource;
  }
  /**
   * @return int
   */
  public function getCitationSource()
  {
    return $this->citationSource;
  }
  /**
   * @param string
   */
  public function setCitationSourceUrl($citationSourceUrl)
  {
    $this->citationSourceUrl = $citationSourceUrl;
  }
  /**
   * @return string
   */
  public function getCitationSourceUrl()
  {
    return $this->citationSourceUrl;
  }
  /**
   * @param string
   */
  public function setCitationSrc($citationSrc)
  {
    $this->citationSrc = $citationSrc;
  }
  /**
   * @return string
   */
  public function getCitationSrc()
  {
    return $this->citationSrc;
  }
  /**
   * @param string
   */
  public function setClusterDiscoveryDate($clusterDiscoveryDate)
  {
    $this->clusterDiscoveryDate = $clusterDiscoveryDate;
  }
  /**
   * @return string
   */
  public function getClusterDiscoveryDate()
  {
    return $this->clusterDiscoveryDate;
  }
  /**
   * @param string
   */
  public function setConferenceId($conferenceId)
  {
    $this->conferenceId = $conferenceId;
  }
  /**
   * @return string
   */
  public function getConferenceId()
  {
    return $this->conferenceId;
  }
  /**
   * @param int
   */
  public function setConferenceNumber($conferenceNumber)
  {
    $this->conferenceNumber = $conferenceNumber;
  }
  /**
   * @return int
   */
  public function getConferenceNumber()
  {
    return $this->conferenceNumber;
  }
  /**
   * @param string
   */
  public function setCrawledDocid($crawledDocid)
  {
    $this->crawledDocid = $crawledDocid;
  }
  /**
   * @return string
   */
  public function getCrawledDocid()
  {
    return $this->crawledDocid;
  }
  /**
   * @param string
   */
  public function setDEPRECATEDMetadataSourceFile($dEPRECATEDMetadataSourceFile)
  {
    $this->dEPRECATEDMetadataSourceFile = $dEPRECATEDMetadataSourceFile;
  }
  /**
   * @return string
   */
  public function getDEPRECATEDMetadataSourceFile()
  {
    return $this->dEPRECATEDMetadataSourceFile;
  }
  /**
   * @param string
   */
  public function setDEPRECATEDPublisherDisplayName($dEPRECATEDPublisherDisplayName)
  {
    $this->dEPRECATEDPublisherDisplayName = $dEPRECATEDPublisherDisplayName;
  }
  /**
   * @return string
   */
  public function getDEPRECATEDPublisherDisplayName()
  {
    return $this->dEPRECATEDPublisherDisplayName;
  }
  /**
   * @param string
   */
  public function setDOI($dOI)
  {
    $this->dOI = $dOI;
  }
  /**
   * @return string
   */
  public function getDOI()
  {
    return $this->dOI;
  }
  /**
   * @param string
   */
  public function setDblpId($dblpId)
  {
    $this->dblpId = $dblpId;
  }
  /**
   * @return string
   */
  public function getDblpId()
  {
    return $this->dblpId;
  }
  /**
   * @param string
   */
  public function setDocumentID($documentID)
  {
    $this->documentID = $documentID;
  }
  /**
   * @return string
   */
  public function getDocumentID()
  {
    return $this->documentID;
  }
  /**
   * @param string
   */
  public function setDspaceID($dspaceID)
  {
    $this->dspaceID = $dspaceID;
  }
  /**
   * @return string
   */
  public function getDspaceID()
  {
    return $this->dspaceID;
  }
  /**
   * @param string
   */
  public function setEdition($edition)
  {
    $this->edition = $edition;
  }
  /**
   * @return string
   */
  public function getEdition()
  {
    return $this->edition;
  }
  /**
   * @param string[]
   */
  public function setEditor($editor)
  {
    $this->editor = $editor;
  }
  /**
   * @return string[]
   */
  public function getEditor()
  {
    return $this->editor;
  }
  /**
   * @param int
   */
  public function setFileCreationDay($fileCreationDay)
  {
    $this->fileCreationDay = $fileCreationDay;
  }
  /**
   * @return int
   */
  public function getFileCreationDay()
  {
    return $this->fileCreationDay;
  }
  /**
   * @param int
   */
  public function setFileCreationMonth($fileCreationMonth)
  {
    $this->fileCreationMonth = $fileCreationMonth;
  }
  /**
   * @return int
   */
  public function getFileCreationMonth()
  {
    return $this->fileCreationMonth;
  }
  /**
   * @param int
   */
  public function setFileCreationYear($fileCreationYear)
  {
    $this->fileCreationYear = $fileCreationYear;
  }
  /**
   * @return int
   */
  public function getFileCreationYear()
  {
    return $this->fileCreationYear;
  }
  /**
   * @param string
   */
  public function setISBN($iSBN)
  {
    $this->iSBN = $iSBN;
  }
  /**
   * @return string
   */
  public function getISBN()
  {
    return $this->iSBN;
  }
  /**
   * @param string[]
   */
  public function setISBNVariant($iSBNVariant)
  {
    $this->iSBNVariant = $iSBNVariant;
  }
  /**
   * @return string[]
   */
  public function getISBNVariant()
  {
    return $this->iSBNVariant;
  }
  /**
   * @param string
   */
  public function setISSN($iSSN)
  {
    $this->iSSN = $iSSN;
  }
  /**
   * @return string
   */
  public function getISSN()
  {
    return $this->iSSN;
  }
  /**
   * @param string[]
   */
  public function setISSNVariant($iSSNVariant)
  {
    $this->iSSNVariant = $iSSNVariant;
  }
  /**
   * @return string[]
   */
  public function getISSNVariant()
  {
    return $this->iSSNVariant;
  }
  /**
   * @param bool
   */
  public function setIncrementalExpected($incrementalExpected)
  {
    $this->incrementalExpected = $incrementalExpected;
  }
  /**
   * @return bool
   */
  public function getIncrementalExpected()
  {
    return $this->incrementalExpected;
  }
  /**
   * @param string
   */
  public function setJOI($jOI)
  {
    $this->jOI = $jOI;
  }
  /**
   * @return string
   */
  public function getJOI()
  {
    return $this->jOI;
  }
  /**
   * @param string[]
   */
  public function setKeywords($keywords)
  {
    $this->keywords = $keywords;
  }
  /**
   * @return string[]
   */
  public function getKeywords()
  {
    return $this->keywords;
  }
  /**
   * @param string
   */
  public function setLCCN($lCCN)
  {
    $this->lCCN = $lCCN;
  }
  /**
   * @return string
   */
  public function getLCCN()
  {
    return $this->lCCN;
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
   * @param LegalCitation
   */
  public function setLegalCitation(LegalCitation $legalCitation)
  {
    $this->legalCitation = $legalCitation;
  }
  /**
   * @return LegalCitation
   */
  public function getLegalCitation()
  {
    return $this->legalCitation;
  }
  /**
   * @param int
   */
  public function setLevelOfDiscussion($levelOfDiscussion)
  {
    $this->levelOfDiscussion = $levelOfDiscussion;
  }
  /**
   * @return int
   */
  public function getLevelOfDiscussion()
  {
    return $this->levelOfDiscussion;
  }
  /**
   * @param string
   */
  public function setNote($note)
  {
    $this->note = $note;
  }
  /**
   * @return string
   */
  public function getNote()
  {
    return $this->note;
  }
  /**
   * @param int
   */
  public function setNumBackwardLinks($numBackwardLinks)
  {
    $this->numBackwardLinks = $numBackwardLinks;
  }
  /**
   * @return int
   */
  public function getNumBackwardLinks()
  {
    return $this->numBackwardLinks;
  }
  /**
   * @param int
   */
  public function setNumBackwardLinksFromLegal($numBackwardLinksFromLegal)
  {
    $this->numBackwardLinksFromLegal = $numBackwardLinksFromLegal;
  }
  /**
   * @return int
   */
  public function getNumBackwardLinksFromLegal()
  {
    return $this->numBackwardLinksFromLegal;
  }
  /**
   * @param int
   */
  public function setNumBackwardLinksInWoS($numBackwardLinksInWoS)
  {
    $this->numBackwardLinksInWoS = $numBackwardLinksInWoS;
  }
  /**
   * @return int
   */
  public function getNumBackwardLinksInWoS()
  {
    return $this->numBackwardLinksInWoS;
  }
  /**
   * @param int
   */
  public function setNumForwardLinks($numForwardLinks)
  {
    $this->numForwardLinks = $numForwardLinks;
  }
  /**
   * @return int
   */
  public function getNumForwardLinks()
  {
    return $this->numForwardLinks;
  }
  /**
   * @param int
   */
  public function setNumGoodEmbeddedRefs($numGoodEmbeddedRefs)
  {
    $this->numGoodEmbeddedRefs = $numGoodEmbeddedRefs;
  }
  /**
   * @return int
   */
  public function getNumGoodEmbeddedRefs()
  {
    return $this->numGoodEmbeddedRefs;
  }
  /**
   * @param int
   */
  public function setNumHostedPages($numHostedPages)
  {
    $this->numHostedPages = $numHostedPages;
  }
  /**
   * @return int
   */
  public function getNumHostedPages()
  {
    return $this->numHostedPages;
  }
  /**
   * @param int
   */
  public function setNumKeyQuotes($numKeyQuotes)
  {
    $this->numKeyQuotes = $numKeyQuotes;
  }
  /**
   * @return int
   */
  public function getNumKeyQuotes()
  {
    return $this->numKeyQuotes;
  }
  /**
   * @param int
   */
  public function setNumRelated($numRelated)
  {
    $this->numRelated = $numRelated;
  }
  /**
   * @return int
   */
  public function getNumRelated()
  {
    return $this->numRelated;
  }
  /**
   * @param int
   */
  public function setNumRelated2($numRelated2)
  {
    $this->numRelated2 = $numRelated2;
  }
  /**
   * @return int
   */
  public function getNumRelated2()
  {
    return $this->numRelated2;
  }
  /**
   * @param int
   */
  public function setNumRelated3($numRelated3)
  {
    $this->numRelated3 = $numRelated3;
  }
  /**
   * @return int
   */
  public function getNumRelated3()
  {
    return $this->numRelated3;
  }
  /**
   * @param int
   */
  public function setNumSectionRefs($numSectionRefs)
  {
    $this->numSectionRefs = $numSectionRefs;
  }
  /**
   * @return int
   */
  public function getNumSectionRefs()
  {
    return $this->numSectionRefs;
  }
  /**
   * @param int
   */
  public function setNumVersions($numVersions)
  {
    $this->numVersions = $numVersions;
  }
  /**
   * @return int
   */
  public function getNumVersions()
  {
    return $this->numVersions;
  }
  /**
   * @param string
   */
  public function setNumber($number)
  {
    $this->number = $number;
  }
  /**
   * @return string
   */
  public function getNumber()
  {
    return $this->number;
  }
  /**
   * @param int
   */
  public function setOnlineDay($onlineDay)
  {
    $this->onlineDay = $onlineDay;
  }
  /**
   * @return int
   */
  public function getOnlineDay()
  {
    return $this->onlineDay;
  }
  /**
   * @param int
   */
  public function setOnlineMonth($onlineMonth)
  {
    $this->onlineMonth = $onlineMonth;
  }
  /**
   * @return int
   */
  public function getOnlineMonth()
  {
    return $this->onlineMonth;
  }
  /**
   * @param int
   */
  public function setOnlineYear($onlineYear)
  {
    $this->onlineYear = $onlineYear;
  }
  /**
   * @return int
   */
  public function getOnlineYear()
  {
    return $this->onlineYear;
  }
  /**
   * @param string
   */
  public function setOtherID($otherID)
  {
    $this->otherID = $otherID;
  }
  /**
   * @return string
   */
  public function getOtherID()
  {
    return $this->otherID;
  }
  /**
   * @param string
   */
  public function setPMCID($pMCID)
  {
    $this->pMCID = $pMCID;
  }
  /**
   * @return string
   */
  public function getPMCID()
  {
    return $this->pMCID;
  }
  /**
   * @param string
   */
  public function setPMID($pMID)
  {
    $this->pMID = $pMID;
  }
  /**
   * @return string
   */
  public function getPMID()
  {
    return $this->pMID;
  }
  /**
   * @param string
   */
  public function setPages($pages)
  {
    $this->pages = $pages;
  }
  /**
   * @return string
   */
  public function getPages()
  {
    return $this->pages;
  }
  /**
   * @param int
   */
  public function setParseSource($parseSource)
  {
    $this->parseSource = $parseSource;
  }
  /**
   * @return int
   */
  public function getParseSource()
  {
    return $this->parseSource;
  }
  /**
   * @param string
   */
  public function setPatentApplicationNumber($patentApplicationNumber)
  {
    $this->patentApplicationNumber = $patentApplicationNumber;
  }
  /**
   * @return string
   */
  public function getPatentApplicationNumber()
  {
    return $this->patentApplicationNumber;
  }
  /**
   * @param string[]
   */
  public function setPatentClassification($patentClassification)
  {
    $this->patentClassification = $patentClassification;
  }
  /**
   * @return string[]
   */
  public function getPatentClassification()
  {
    return $this->patentClassification;
  }
  /**
   * @param string[]
   */
  public function setPatentCountry($patentCountry)
  {
    $this->patentCountry = $patentCountry;
  }
  /**
   * @return string[]
   */
  public function getPatentCountry()
  {
    return $this->patentCountry;
  }
  /**
   * @param string
   */
  public function setPatentNumber($patentNumber)
  {
    $this->patentNumber = $patentNumber;
  }
  /**
   * @return string
   */
  public function getPatentNumber()
  {
    return $this->patentNumber;
  }
  /**
   * @param int
   */
  public function setPatentOffice($patentOffice)
  {
    $this->patentOffice = $patentOffice;
  }
  /**
   * @return int
   */
  public function getPatentOffice()
  {
    return $this->patentOffice;
  }
  /**
   * @param string
   */
  public function setPatentPublicationNumber($patentPublicationNumber)
  {
    $this->patentPublicationNumber = $patentPublicationNumber;
  }
  /**
   * @return string
   */
  public function getPatentPublicationNumber()
  {
    return $this->patentPublicationNumber;
  }
  /**
   * @param int
   */
  public function setPublicationDay($publicationDay)
  {
    $this->publicationDay = $publicationDay;
  }
  /**
   * @return int
   */
  public function getPublicationDay()
  {
    return $this->publicationDay;
  }
  /**
   * @param int
   */
  public function setPublicationMonth($publicationMonth)
  {
    $this->publicationMonth = $publicationMonth;
  }
  /**
   * @return int
   */
  public function getPublicationMonth()
  {
    return $this->publicationMonth;
  }
  /**
   * @param string
   */
  public function setPublicationVenue($publicationVenue)
  {
    $this->publicationVenue = $publicationVenue;
  }
  /**
   * @return string
   */
  public function getPublicationVenue()
  {
    return $this->publicationVenue;
  }
  /**
   * @param string[]
   */
  public function setPublicationVenueVariant($publicationVenueVariant)
  {
    $this->publicationVenueVariant = $publicationVenueVariant;
  }
  /**
   * @return string[]
   */
  public function getPublicationVenueVariant()
  {
    return $this->publicationVenueVariant;
  }
  /**
   * @param int
   */
  public function setPublicationYear($publicationYear)
  {
    $this->publicationYear = $publicationYear;
  }
  /**
   * @return int
   */
  public function getPublicationYear()
  {
    return $this->publicationYear;
  }
  /**
   * @param string
   */
  public function setPublisherAddress($publisherAddress)
  {
    $this->publisherAddress = $publisherAddress;
  }
  /**
   * @return string
   */
  public function getPublisherAddress()
  {
    return $this->publisherAddress;
  }
  /**
   * @param string
   */
  public function setPublisherId($publisherId)
  {
    $this->publisherId = $publisherId;
  }
  /**
   * @return string
   */
  public function getPublisherId()
  {
    return $this->publisherId;
  }
  /**
   * @param string
   */
  public function setPublisherOrg($publisherOrg)
  {
    $this->publisherOrg = $publisherOrg;
  }
  /**
   * @return string
   */
  public function getPublisherOrg()
  {
    return $this->publisherOrg;
  }
  /**
   * @param string
   */
  public function setPubvenueID($pubvenueID)
  {
    $this->pubvenueID = $pubvenueID;
  }
  /**
   * @return string
   */
  public function getPubvenueID()
  {
    return $this->pubvenueID;
  }
  /**
   * @param string
   */
  public function setReviewTypeReason($reviewTypeReason)
  {
    $this->reviewTypeReason = $reviewTypeReason;
  }
  /**
   * @return string
   */
  public function getReviewTypeReason()
  {
    return $this->reviewTypeReason;
  }
  /**
   * @param string
   */
  public function setSICI($sICI)
  {
    $this->sICI = $sICI;
  }
  /**
   * @return string
   */
  public function getSICI()
  {
    return $this->sICI;
  }
  /**
   * @param string
   */
  public function setSeries($series)
  {
    $this->series = $series;
  }
  /**
   * @return string
   */
  public function getSeries()
  {
    return $this->series;
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
  public function setTitleHtml($titleHtml)
  {
    $this->titleHtml = $titleHtml;
  }
  /**
   * @return string
   */
  public function getTitleHtml()
  {
    return $this->titleHtml;
  }
  /**
   * @param string
   */
  public function setTitleHtmlLeftOver($titleHtmlLeftOver)
  {
    $this->titleHtmlLeftOver = $titleHtmlLeftOver;
  }
  /**
   * @return string
   */
  public function getTitleHtmlLeftOver()
  {
    return $this->titleHtmlLeftOver;
  }
  /**
   * @param bool
   */
  public function setTranslatedAuthorListHasEtAl($translatedAuthorListHasEtAl)
  {
    $this->translatedAuthorListHasEtAl = $translatedAuthorListHasEtAl;
  }
  /**
   * @return bool
   */
  public function getTranslatedAuthorListHasEtAl()
  {
    return $this->translatedAuthorListHasEtAl;
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
   * @param string[]
   */
  public function setUnmatchedEmailAddr($unmatchedEmailAddr)
  {
    $this->unmatchedEmailAddr = $unmatchedEmailAddr;
  }
  /**
   * @return string[]
   */
  public function getUnmatchedEmailAddr()
  {
    return $this->unmatchedEmailAddr;
  }
  /**
   * @param string[]
   */
  public function setUnmatchedInstitution($unmatchedInstitution)
  {
    $this->unmatchedInstitution = $unmatchedInstitution;
  }
  /**
   * @return string[]
   */
  public function getUnmatchedInstitution()
  {
    return $this->unmatchedInstitution;
  }
  /**
   * @param string
   */
  public function setVersionID($versionID)
  {
    $this->versionID = $versionID;
  }
  /**
   * @return string
   */
  public function getVersionID()
  {
    return $this->versionID;
  }
  /**
   * @param int
   */
  public function setVolume($volume)
  {
    $this->volume = $volume;
  }
  /**
   * @return int
   */
  public function getVolume()
  {
    return $this->volume;
  }
  /**
   * @param string
   */
  public function setWOSID($wOSID)
  {
    $this->wOSID = $wOSID;
  }
  /**
   * @return string
   */
  public function getWOSID()
  {
    return $this->wOSID;
  }
  /**
   * @param bool
   */
  public function setWorldViewable($worldViewable)
  {
    $this->worldViewable = $worldViewable;
  }
  /**
   * @return bool
   */
  public function getWorldViewable()
  {
    return $this->worldViewable;
  }
  /**
   * @param ScienceCitationAccessURL[]
   */
  public function setAccessurl($accessurl)
  {
    $this->accessurl = $accessurl;
  }
  /**
   * @return ScienceCitationAccessURL[]
   */
  public function getAccessurl()
  {
    return $this->accessurl;
  }
  /**
   * @param ScienceCitationAlternateAbstract[]
   */
  public function setAlternateabstract($alternateabstract)
  {
    $this->alternateabstract = $alternateabstract;
  }
  /**
   * @return ScienceCitationAlternateAbstract[]
   */
  public function getAlternateabstract()
  {
    return $this->alternateabstract;
  }
  /**
   * @param ScienceCitationAlternateTitle[]
   */
  public function setAlternatetitle($alternatetitle)
  {
    $this->alternatetitle = $alternatetitle;
  }
  /**
   * @return ScienceCitationAlternateTitle[]
   */
  public function getAlternatetitle()
  {
    return $this->alternatetitle;
  }
  /**
   * @param ScienceCitationAuthor[]
   */
  public function setAuthor($author)
  {
    $this->author = $author;
  }
  /**
   * @return ScienceCitationAuthor[]
   */
  public function getAuthor()
  {
    return $this->author;
  }
  /**
   * @param ScienceCitationCategory[]
   */
  public function setCategory($category)
  {
    $this->category = $category;
  }
  /**
   * @return ScienceCitationCategory[]
   */
  public function getCategory()
  {
    return $this->category;
  }
  /**
   * @param ScienceCitationDownloadURL[]
   */
  public function setDownloadurl($downloadurl)
  {
    $this->downloadurl = $downloadurl;
  }
  /**
   * @return ScienceCitationDownloadURL[]
   */
  public function getDownloadurl()
  {
    return $this->downloadurl;
  }
  /**
   * @param ScienceCitationFunding[]
   */
  public function setFunding($funding)
  {
    $this->funding = $funding;
  }
  /**
   * @return ScienceCitationFunding[]
   */
  public function getFunding()
  {
    return $this->funding;
  }
  /**
   * @param ScienceCitationReferenceDiscussion[]
   */
  public function setReferencediscussion($referencediscussion)
  {
    $this->referencediscussion = $referencediscussion;
  }
  /**
   * @return ScienceCitationReferenceDiscussion[]
   */
  public function getReferencediscussion()
  {
    return $this->referencediscussion;
  }
  /**
   * @param ScienceCitationSubject[]
   */
  public function setSubject($subject)
  {
    $this->subject = $subject;
  }
  /**
   * @return ScienceCitationSubject[]
   */
  public function getSubject()
  {
    return $this->subject;
  }
  /**
   * @param ScienceCitationTranslatedAuthor[]
   */
  public function setTranslatedauthor($translatedauthor)
  {
    $this->translatedauthor = $translatedauthor;
  }
  /**
   * @return ScienceCitationTranslatedAuthor[]
   */
  public function getTranslatedauthor()
  {
    return $this->translatedauthor;
  }
  /**
   * @param ScienceCitationUnionCatalog[]
   */
  public function setUnioncatalog($unioncatalog)
  {
    $this->unioncatalog = $unioncatalog;
  }
  /**
   * @return ScienceCitationUnionCatalog[]
   */
  public function getUnioncatalog()
  {
    return $this->unioncatalog;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(ScienceCitation::class, 'Google_Service_Contentwarehouse_ScienceCitation');

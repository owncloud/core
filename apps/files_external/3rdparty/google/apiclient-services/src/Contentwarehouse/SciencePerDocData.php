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

class SciencePerDocData extends \Google\Collection
{
  protected $collection_key = 'signal';
  protected $internal_gapi_mappings = [
        "abstractEndPosition" => "AbstractEndPosition",
        "bodyEndPosition" => "BodyEndPosition",
        "citationPredictionSignal" => "CitationPredictionSignal",
        "courtLevel" => "CourtLevel",
        "dEPRECATEDCrawlTime" => "DEPRECATEDCrawlTime",
        "discoveryAgeInDays" => "DiscoveryAgeInDays",
        "discoveryTimestamp" => "DiscoveryTimestamp",
        "isCitationOnly" => "IsCitationOnly",
        "nonScholarlinessPenalty" => "NonScholarlinessPenalty",
        "numBackwardLinks" => "NumBackwardLinks",
        "numRelated" => "NumRelated",
        "numTitleWords" => "NumTitleWords",
        "numVersions" => "NumVersions",
        "offDomAnchors" => "OffDomAnchors",
        "onSiteAnchors" => "OnSiteAnchors",
        "predictedCitations" => "PredictedCitations",
        "predictedCitationsNext5Years" => "PredictedCitationsNext5Years",
        "publicationDay" => "PublicationDay",
        "publicationMonth" => "PublicationMonth",
        "publicationYear" => "PublicationYear",
        "scholarId" => "ScholarId",
        "subject" => "Subject",
        "titleNgrams" => "TitleNgrams",
        "totalAnchors" => "TotalAnchors",
        "type" => "Type",
  ];
  /**
   * @var int
   */
  public $abstractEndPosition;
  /**
   * @var int
   */
  public $bodyEndPosition;
  protected $citationPredictionSignalType = ScholarCitationPredictionSignal::class;
  protected $citationPredictionSignalDataType = 'array';
  /**
   * @var int
   */
  public $courtLevel;
  /**
   * @var string
   */
  public $dEPRECATEDCrawlTime;
  /**
   * @var int
   */
  public $discoveryAgeInDays;
  /**
   * @var string
   */
  public $discoveryTimestamp;
  /**
   * @var bool
   */
  public $isCitationOnly;
  /**
   * @var float
   */
  public $nonScholarlinessPenalty;
  /**
   * @var int
   */
  public $numBackwardLinks;
  /**
   * @var int
   */
  public $numRelated;
  /**
   * @var int
   */
  public $numTitleWords;
  /**
   * @var int
   */
  public $numVersions;
  /**
   * @var int
   */
  public $offDomAnchors;
  /**
   * @var int
   */
  public $onSiteAnchors;
  /**
   * @var float
   */
  public $predictedCitations;
  /**
   * @var float
   */
  public $predictedCitationsNext5Years;
  /**
   * @var int
   */
  public $publicationDay;
  /**
   * @var int
   */
  public $publicationMonth;
  /**
   * @var int
   */
  public $publicationYear;
  /**
   * @var string
   */
  public $scholarId;
  /**
   * @var string
   */
  public $subject;
  /**
   * @var string
   */
  public $titleNgrams;
  /**
   * @var int
   */
  public $totalAnchors;
  /**
   * @var string
   */
  public $type;
  protected $authorType = SciencePerDocDataAuthor::class;
  protected $authorDataType = 'array';
  protected $referencediscussionType = SciencePerDocDataReferenceDiscussion::class;
  protected $referencediscussionDataType = 'array';
  protected $sectionType = SciencePerDocDataSection::class;
  protected $sectionDataType = 'array';
  protected $signalType = SciencePerDocDataSignal::class;
  protected $signalDataType = 'array';

  /**
   * @param int
   */
  public function setAbstractEndPosition($abstractEndPosition)
  {
    $this->abstractEndPosition = $abstractEndPosition;
  }
  /**
   * @return int
   */
  public function getAbstractEndPosition()
  {
    return $this->abstractEndPosition;
  }
  /**
   * @param int
   */
  public function setBodyEndPosition($bodyEndPosition)
  {
    $this->bodyEndPosition = $bodyEndPosition;
  }
  /**
   * @return int
   */
  public function getBodyEndPosition()
  {
    return $this->bodyEndPosition;
  }
  /**
   * @param ScholarCitationPredictionSignal[]
   */
  public function setCitationPredictionSignal($citationPredictionSignal)
  {
    $this->citationPredictionSignal = $citationPredictionSignal;
  }
  /**
   * @return ScholarCitationPredictionSignal[]
   */
  public function getCitationPredictionSignal()
  {
    return $this->citationPredictionSignal;
  }
  /**
   * @param int
   */
  public function setCourtLevel($courtLevel)
  {
    $this->courtLevel = $courtLevel;
  }
  /**
   * @return int
   */
  public function getCourtLevel()
  {
    return $this->courtLevel;
  }
  /**
   * @param string
   */
  public function setDEPRECATEDCrawlTime($dEPRECATEDCrawlTime)
  {
    $this->dEPRECATEDCrawlTime = $dEPRECATEDCrawlTime;
  }
  /**
   * @return string
   */
  public function getDEPRECATEDCrawlTime()
  {
    return $this->dEPRECATEDCrawlTime;
  }
  /**
   * @param int
   */
  public function setDiscoveryAgeInDays($discoveryAgeInDays)
  {
    $this->discoveryAgeInDays = $discoveryAgeInDays;
  }
  /**
   * @return int
   */
  public function getDiscoveryAgeInDays()
  {
    return $this->discoveryAgeInDays;
  }
  /**
   * @param string
   */
  public function setDiscoveryTimestamp($discoveryTimestamp)
  {
    $this->discoveryTimestamp = $discoveryTimestamp;
  }
  /**
   * @return string
   */
  public function getDiscoveryTimestamp()
  {
    return $this->discoveryTimestamp;
  }
  /**
   * @param bool
   */
  public function setIsCitationOnly($isCitationOnly)
  {
    $this->isCitationOnly = $isCitationOnly;
  }
  /**
   * @return bool
   */
  public function getIsCitationOnly()
  {
    return $this->isCitationOnly;
  }
  /**
   * @param float
   */
  public function setNonScholarlinessPenalty($nonScholarlinessPenalty)
  {
    $this->nonScholarlinessPenalty = $nonScholarlinessPenalty;
  }
  /**
   * @return float
   */
  public function getNonScholarlinessPenalty()
  {
    return $this->nonScholarlinessPenalty;
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
  public function setNumTitleWords($numTitleWords)
  {
    $this->numTitleWords = $numTitleWords;
  }
  /**
   * @return int
   */
  public function getNumTitleWords()
  {
    return $this->numTitleWords;
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
   * @param int
   */
  public function setOffDomAnchors($offDomAnchors)
  {
    $this->offDomAnchors = $offDomAnchors;
  }
  /**
   * @return int
   */
  public function getOffDomAnchors()
  {
    return $this->offDomAnchors;
  }
  /**
   * @param int
   */
  public function setOnSiteAnchors($onSiteAnchors)
  {
    $this->onSiteAnchors = $onSiteAnchors;
  }
  /**
   * @return int
   */
  public function getOnSiteAnchors()
  {
    return $this->onSiteAnchors;
  }
  /**
   * @param float
   */
  public function setPredictedCitations($predictedCitations)
  {
    $this->predictedCitations = $predictedCitations;
  }
  /**
   * @return float
   */
  public function getPredictedCitations()
  {
    return $this->predictedCitations;
  }
  /**
   * @param float
   */
  public function setPredictedCitationsNext5Years($predictedCitationsNext5Years)
  {
    $this->predictedCitationsNext5Years = $predictedCitationsNext5Years;
  }
  /**
   * @return float
   */
  public function getPredictedCitationsNext5Years()
  {
    return $this->predictedCitationsNext5Years;
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
  public function setScholarId($scholarId)
  {
    $this->scholarId = $scholarId;
  }
  /**
   * @return string
   */
  public function getScholarId()
  {
    return $this->scholarId;
  }
  /**
   * @param string
   */
  public function setSubject($subject)
  {
    $this->subject = $subject;
  }
  /**
   * @return string
   */
  public function getSubject()
  {
    return $this->subject;
  }
  /**
   * @param string
   */
  public function setTitleNgrams($titleNgrams)
  {
    $this->titleNgrams = $titleNgrams;
  }
  /**
   * @return string
   */
  public function getTitleNgrams()
  {
    return $this->titleNgrams;
  }
  /**
   * @param int
   */
  public function setTotalAnchors($totalAnchors)
  {
    $this->totalAnchors = $totalAnchors;
  }
  /**
   * @return int
   */
  public function getTotalAnchors()
  {
    return $this->totalAnchors;
  }
  /**
   * @param string
   */
  public function setType($type)
  {
    $this->type = $type;
  }
  /**
   * @return string
   */
  public function getType()
  {
    return $this->type;
  }
  /**
   * @param SciencePerDocDataAuthor[]
   */
  public function setAuthor($author)
  {
    $this->author = $author;
  }
  /**
   * @return SciencePerDocDataAuthor[]
   */
  public function getAuthor()
  {
    return $this->author;
  }
  /**
   * @param SciencePerDocDataReferenceDiscussion[]
   */
  public function setReferencediscussion($referencediscussion)
  {
    $this->referencediscussion = $referencediscussion;
  }
  /**
   * @return SciencePerDocDataReferenceDiscussion[]
   */
  public function getReferencediscussion()
  {
    return $this->referencediscussion;
  }
  /**
   * @param SciencePerDocDataSection[]
   */
  public function setSection($section)
  {
    $this->section = $section;
  }
  /**
   * @return SciencePerDocDataSection[]
   */
  public function getSection()
  {
    return $this->section;
  }
  /**
   * @param SciencePerDocDataSignal[]
   */
  public function setSignal($signal)
  {
    $this->signal = $signal;
  }
  /**
   * @return SciencePerDocDataSignal[]
   */
  public function getSignal()
  {
    return $this->signal;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(SciencePerDocData::class, 'Google_Service_Contentwarehouse_SciencePerDocData');

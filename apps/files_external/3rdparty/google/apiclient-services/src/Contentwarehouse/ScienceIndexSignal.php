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

class ScienceIndexSignal extends \Google\Collection
{
  protected $collection_key = 'author';
  protected $internal_gapi_mappings = [
        "holdingsId" => "HoldingsId",
        "htmlTitleFp" => "HtmlTitleFp",
        "indexSelectionScore" => "IndexSelectionScore",
        "numBackwardLinks" => "NumBackwardLinks",
        "numRelated" => "NumRelated",
        "numVersions" => "NumVersions",
        "publicationDay" => "PublicationDay",
        "publicationMonth" => "PublicationMonth",
        "publicationYear" => "PublicationYear",
        "removeLink" => "RemoveLink",
        "scholarId" => "ScholarId",
        "title" => "Title",
        "visiblePrefixTerms" => "VisiblePrefixTerms",
  ];
  /**
   * @var string[]
   */
  public $holdingsId;
  /**
   * @var string
   */
  public $htmlTitleFp;
  /**
   * @var float
   */
  public $indexSelectionScore;
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
  public $numVersions;
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
   * @var bool
   */
  public $removeLink;
  /**
   * @var string
   */
  public $scholarId;
  /**
   * @var string
   */
  public $title;
  /**
   * @var int
   */
  public $visiblePrefixTerms;
  protected $authorType = ScienceIndexSignalAuthor::class;
  protected $authorDataType = 'array';

  /**
   * @param string[]
   */
  public function setHoldingsId($holdingsId)
  {
    $this->holdingsId = $holdingsId;
  }
  /**
   * @return string[]
   */
  public function getHoldingsId()
  {
    return $this->holdingsId;
  }
  /**
   * @param string
   */
  public function setHtmlTitleFp($htmlTitleFp)
  {
    $this->htmlTitleFp = $htmlTitleFp;
  }
  /**
   * @return string
   */
  public function getHtmlTitleFp()
  {
    return $this->htmlTitleFp;
  }
  /**
   * @param float
   */
  public function setIndexSelectionScore($indexSelectionScore)
  {
    $this->indexSelectionScore = $indexSelectionScore;
  }
  /**
   * @return float
   */
  public function getIndexSelectionScore()
  {
    return $this->indexSelectionScore;
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
   * @param bool
   */
  public function setRemoveLink($removeLink)
  {
    $this->removeLink = $removeLink;
  }
  /**
   * @return bool
   */
  public function getRemoveLink()
  {
    return $this->removeLink;
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
   * @param int
   */
  public function setVisiblePrefixTerms($visiblePrefixTerms)
  {
    $this->visiblePrefixTerms = $visiblePrefixTerms;
  }
  /**
   * @return int
   */
  public function getVisiblePrefixTerms()
  {
    return $this->visiblePrefixTerms;
  }
  /**
   * @param ScienceIndexSignalAuthor[]
   */
  public function setAuthor($author)
  {
    $this->author = $author;
  }
  /**
   * @return ScienceIndexSignalAuthor[]
   */
  public function getAuthor()
  {
    return $this->author;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(ScienceIndexSignal::class, 'Google_Service_Contentwarehouse_ScienceIndexSignal');

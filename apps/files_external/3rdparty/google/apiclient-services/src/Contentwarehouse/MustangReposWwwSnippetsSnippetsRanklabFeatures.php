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

class MustangReposWwwSnippetsSnippetsRanklabFeatures extends \Google\Collection
{
  protected $collection_key = 'titles';
  /**
   * @var int
   */
  public $browserWidth;
  protected $candidatesType = MustangReposWwwSnippetsSnippetCandidate::class;
  protected $candidatesDataType = 'array';
  /**
   * @var string
   */
  public $documentLanguage;
  /**
   * @var string
   */
  public $queryLanguage;
  /**
   * @var int
   */
  public $snippetDataSourceType;
  /**
   * @var float
   */
  public $snippetQueryTermCoverage;
  protected $snippetsType = QualityPreviewRanklabSnippet::class;
  protected $snippetsDataType = 'array';
  /**
   * @var int
   */
  public $titleDataSourceType;
  /**
   * @var float
   */
  public $titleQueryTermCoverage;
  /**
   * @var float
   */
  public $titleSnippetQueryTermCoverage;
  protected $titlesType = QualityPreviewRanklabTitle::class;
  protected $titlesDataType = 'array';

  /**
   * @param int
   */
  public function setBrowserWidth($browserWidth)
  {
    $this->browserWidth = $browserWidth;
  }
  /**
   * @return int
   */
  public function getBrowserWidth()
  {
    return $this->browserWidth;
  }
  /**
   * @param MustangReposWwwSnippetsSnippetCandidate[]
   */
  public function setCandidates($candidates)
  {
    $this->candidates = $candidates;
  }
  /**
   * @return MustangReposWwwSnippetsSnippetCandidate[]
   */
  public function getCandidates()
  {
    return $this->candidates;
  }
  /**
   * @param string
   */
  public function setDocumentLanguage($documentLanguage)
  {
    $this->documentLanguage = $documentLanguage;
  }
  /**
   * @return string
   */
  public function getDocumentLanguage()
  {
    return $this->documentLanguage;
  }
  /**
   * @param string
   */
  public function setQueryLanguage($queryLanguage)
  {
    $this->queryLanguage = $queryLanguage;
  }
  /**
   * @return string
   */
  public function getQueryLanguage()
  {
    return $this->queryLanguage;
  }
  /**
   * @param int
   */
  public function setSnippetDataSourceType($snippetDataSourceType)
  {
    $this->snippetDataSourceType = $snippetDataSourceType;
  }
  /**
   * @return int
   */
  public function getSnippetDataSourceType()
  {
    return $this->snippetDataSourceType;
  }
  /**
   * @param float
   */
  public function setSnippetQueryTermCoverage($snippetQueryTermCoverage)
  {
    $this->snippetQueryTermCoverage = $snippetQueryTermCoverage;
  }
  /**
   * @return float
   */
  public function getSnippetQueryTermCoverage()
  {
    return $this->snippetQueryTermCoverage;
  }
  /**
   * @param QualityPreviewRanklabSnippet[]
   */
  public function setSnippets($snippets)
  {
    $this->snippets = $snippets;
  }
  /**
   * @return QualityPreviewRanklabSnippet[]
   */
  public function getSnippets()
  {
    return $this->snippets;
  }
  /**
   * @param int
   */
  public function setTitleDataSourceType($titleDataSourceType)
  {
    $this->titleDataSourceType = $titleDataSourceType;
  }
  /**
   * @return int
   */
  public function getTitleDataSourceType()
  {
    return $this->titleDataSourceType;
  }
  /**
   * @param float
   */
  public function setTitleQueryTermCoverage($titleQueryTermCoverage)
  {
    $this->titleQueryTermCoverage = $titleQueryTermCoverage;
  }
  /**
   * @return float
   */
  public function getTitleQueryTermCoverage()
  {
    return $this->titleQueryTermCoverage;
  }
  /**
   * @param float
   */
  public function setTitleSnippetQueryTermCoverage($titleSnippetQueryTermCoverage)
  {
    $this->titleSnippetQueryTermCoverage = $titleSnippetQueryTermCoverage;
  }
  /**
   * @return float
   */
  public function getTitleSnippetQueryTermCoverage()
  {
    return $this->titleSnippetQueryTermCoverage;
  }
  /**
   * @param QualityPreviewRanklabTitle[]
   */
  public function setTitles($titles)
  {
    $this->titles = $titles;
  }
  /**
   * @return QualityPreviewRanklabTitle[]
   */
  public function getTitles()
  {
    return $this->titles;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(MustangReposWwwSnippetsSnippetsRanklabFeatures::class, 'Google_Service_Contentwarehouse_MustangReposWwwSnippetsSnippetsRanklabFeatures');

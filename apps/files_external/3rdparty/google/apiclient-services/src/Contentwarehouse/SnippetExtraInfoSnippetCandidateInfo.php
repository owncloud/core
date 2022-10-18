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

class SnippetExtraInfoSnippetCandidateInfo extends \Google\Collection
{
  protected $collection_key = 'snippet';
  /**
   * @var int
   */
  public $id;
  /**
   * @var bool
   */
  public $isMuppetSelectedSnippet;
  /**
   * @var bool
   */
  public $isSnippetBrainBoldingTriggered;
  protected $listInfoType = MustangReposWwwSnippetsOrganicListSnippetResponse::class;
  protected $listInfoDataType = '';
  protected $scoringInfoType = SnippetExtraInfoSnippetScoringInfo::class;
  protected $scoringInfoDataType = '';
  /**
   * @var string[]
   */
  public $snippet;
  /**
   * @var string
   */
  public $snippetSource;
  /**
   * @var string
   */
  public $snippetText;
  /**
   * @var string
   */
  public $snippetType;

  /**
   * @param int
   */
  public function setId($id)
  {
    $this->id = $id;
  }
  /**
   * @return int
   */
  public function getId()
  {
    return $this->id;
  }
  /**
   * @param bool
   */
  public function setIsMuppetSelectedSnippet($isMuppetSelectedSnippet)
  {
    $this->isMuppetSelectedSnippet = $isMuppetSelectedSnippet;
  }
  /**
   * @return bool
   */
  public function getIsMuppetSelectedSnippet()
  {
    return $this->isMuppetSelectedSnippet;
  }
  /**
   * @param bool
   */
  public function setIsSnippetBrainBoldingTriggered($isSnippetBrainBoldingTriggered)
  {
    $this->isSnippetBrainBoldingTriggered = $isSnippetBrainBoldingTriggered;
  }
  /**
   * @return bool
   */
  public function getIsSnippetBrainBoldingTriggered()
  {
    return $this->isSnippetBrainBoldingTriggered;
  }
  /**
   * @param MustangReposWwwSnippetsOrganicListSnippetResponse
   */
  public function setListInfo(MustangReposWwwSnippetsOrganicListSnippetResponse $listInfo)
  {
    $this->listInfo = $listInfo;
  }
  /**
   * @return MustangReposWwwSnippetsOrganicListSnippetResponse
   */
  public function getListInfo()
  {
    return $this->listInfo;
  }
  /**
   * @param SnippetExtraInfoSnippetScoringInfo
   */
  public function setScoringInfo(SnippetExtraInfoSnippetScoringInfo $scoringInfo)
  {
    $this->scoringInfo = $scoringInfo;
  }
  /**
   * @return SnippetExtraInfoSnippetScoringInfo
   */
  public function getScoringInfo()
  {
    return $this->scoringInfo;
  }
  /**
   * @param string[]
   */
  public function setSnippet($snippet)
  {
    $this->snippet = $snippet;
  }
  /**
   * @return string[]
   */
  public function getSnippet()
  {
    return $this->snippet;
  }
  /**
   * @param string
   */
  public function setSnippetSource($snippetSource)
  {
    $this->snippetSource = $snippetSource;
  }
  /**
   * @return string
   */
  public function getSnippetSource()
  {
    return $this->snippetSource;
  }
  /**
   * @param string
   */
  public function setSnippetText($snippetText)
  {
    $this->snippetText = $snippetText;
  }
  /**
   * @return string
   */
  public function getSnippetText()
  {
    return $this->snippetText;
  }
  /**
   * @param string
   */
  public function setSnippetType($snippetType)
  {
    $this->snippetType = $snippetType;
  }
  /**
   * @return string
   */
  public function getSnippetType()
  {
    return $this->snippetType;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(SnippetExtraInfoSnippetCandidateInfo::class, 'Google_Service_Contentwarehouse_SnippetExtraInfoSnippetCandidateInfo');

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

class SnippetExtraInfo extends \Google\Collection
{
  protected $collection_key = 'candidateInfo';
  protected $candidateInfoType = SnippetExtraInfoSnippetCandidateInfo::class;
  protected $candidateInfoDataType = 'array';
  /**
   * @var bool
   */
  public $containUserQuotes;
  /**
   * @var bool
   */
  public $containVulgarCandidates;
  /**
   * @var bool
   */
  public $disableQueryFeatures;
  /**
   * @var int
   */
  public $snippetBrainSelectedCandidateIndex;

  /**
   * @param SnippetExtraInfoSnippetCandidateInfo[]
   */
  public function setCandidateInfo($candidateInfo)
  {
    $this->candidateInfo = $candidateInfo;
  }
  /**
   * @return SnippetExtraInfoSnippetCandidateInfo[]
   */
  public function getCandidateInfo()
  {
    return $this->candidateInfo;
  }
  /**
   * @param bool
   */
  public function setContainUserQuotes($containUserQuotes)
  {
    $this->containUserQuotes = $containUserQuotes;
  }
  /**
   * @return bool
   */
  public function getContainUserQuotes()
  {
    return $this->containUserQuotes;
  }
  /**
   * @param bool
   */
  public function setContainVulgarCandidates($containVulgarCandidates)
  {
    $this->containVulgarCandidates = $containVulgarCandidates;
  }
  /**
   * @return bool
   */
  public function getContainVulgarCandidates()
  {
    return $this->containVulgarCandidates;
  }
  /**
   * @param bool
   */
  public function setDisableQueryFeatures($disableQueryFeatures)
  {
    $this->disableQueryFeatures = $disableQueryFeatures;
  }
  /**
   * @return bool
   */
  public function getDisableQueryFeatures()
  {
    return $this->disableQueryFeatures;
  }
  /**
   * @param int
   */
  public function setSnippetBrainSelectedCandidateIndex($snippetBrainSelectedCandidateIndex)
  {
    $this->snippetBrainSelectedCandidateIndex = $snippetBrainSelectedCandidateIndex;
  }
  /**
   * @return int
   */
  public function getSnippetBrainSelectedCandidateIndex()
  {
    return $this->snippetBrainSelectedCandidateIndex;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(SnippetExtraInfo::class, 'Google_Service_Contentwarehouse_SnippetExtraInfo');

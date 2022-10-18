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

class CorpusSelectionInfo extends \Google\Collection
{
  protected $collection_key = 'referrerUrls';
  /**
   * @var string
   */
  public $corpus;
  /**
   * @var float
   */
  public $corpusScore;
  /**
   * @var bool
   */
  public $isSelectedForIndexing;
  /**
   * @var string[]
   */
  public $referrerDocid;
  /**
   * @var string[]
   */
  public $referrerUrls;

  /**
   * @param string
   */
  public function setCorpus($corpus)
  {
    $this->corpus = $corpus;
  }
  /**
   * @return string
   */
  public function getCorpus()
  {
    return $this->corpus;
  }
  /**
   * @param float
   */
  public function setCorpusScore($corpusScore)
  {
    $this->corpusScore = $corpusScore;
  }
  /**
   * @return float
   */
  public function getCorpusScore()
  {
    return $this->corpusScore;
  }
  /**
   * @param bool
   */
  public function setIsSelectedForIndexing($isSelectedForIndexing)
  {
    $this->isSelectedForIndexing = $isSelectedForIndexing;
  }
  /**
   * @return bool
   */
  public function getIsSelectedForIndexing()
  {
    return $this->isSelectedForIndexing;
  }
  /**
   * @param string[]
   */
  public function setReferrerDocid($referrerDocid)
  {
    $this->referrerDocid = $referrerDocid;
  }
  /**
   * @return string[]
   */
  public function getReferrerDocid()
  {
    return $this->referrerDocid;
  }
  /**
   * @param string[]
   */
  public function setReferrerUrls($referrerUrls)
  {
    $this->referrerUrls = $referrerUrls;
  }
  /**
   * @return string[]
   */
  public function getReferrerUrls()
  {
    return $this->referrerUrls;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(CorpusSelectionInfo::class, 'Google_Service_Contentwarehouse_CorpusSelectionInfo');

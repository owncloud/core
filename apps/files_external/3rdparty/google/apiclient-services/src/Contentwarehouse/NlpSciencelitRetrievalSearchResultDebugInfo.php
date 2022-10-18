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

class NlpSciencelitRetrievalSearchResultDebugInfo extends \Google\Collection
{
  protected $collection_key = 'goldSnippets';
  protected $articleDataType = NlpSciencelitArticleData::class;
  protected $articleDataDataType = '';
  /**
   * @var string[]
   */
  public $goldDocid;
  /**
   * @var string[]
   */
  public $goldSnippets;
  /**
   * @var bool
   */
  public $isGold;
  /**
   * @var float
   */
  public $rerankingScore;
  /**
   * @var int
   */
  public $reverseRerankingOrder;
  /**
   * @var float[]
   */
  public $sectionIrScore;

  /**
   * @param NlpSciencelitArticleData
   */
  public function setArticleData(NlpSciencelitArticleData $articleData)
  {
    $this->articleData = $articleData;
  }
  /**
   * @return NlpSciencelitArticleData
   */
  public function getArticleData()
  {
    return $this->articleData;
  }
  /**
   * @param string[]
   */
  public function setGoldDocid($goldDocid)
  {
    $this->goldDocid = $goldDocid;
  }
  /**
   * @return string[]
   */
  public function getGoldDocid()
  {
    return $this->goldDocid;
  }
  /**
   * @param string[]
   */
  public function setGoldSnippets($goldSnippets)
  {
    $this->goldSnippets = $goldSnippets;
  }
  /**
   * @return string[]
   */
  public function getGoldSnippets()
  {
    return $this->goldSnippets;
  }
  /**
   * @param bool
   */
  public function setIsGold($isGold)
  {
    $this->isGold = $isGold;
  }
  /**
   * @return bool
   */
  public function getIsGold()
  {
    return $this->isGold;
  }
  /**
   * @param float
   */
  public function setRerankingScore($rerankingScore)
  {
    $this->rerankingScore = $rerankingScore;
  }
  /**
   * @return float
   */
  public function getRerankingScore()
  {
    return $this->rerankingScore;
  }
  /**
   * @param int
   */
  public function setReverseRerankingOrder($reverseRerankingOrder)
  {
    $this->reverseRerankingOrder = $reverseRerankingOrder;
  }
  /**
   * @return int
   */
  public function getReverseRerankingOrder()
  {
    return $this->reverseRerankingOrder;
  }
  /**
   * @param float[]
   */
  public function setSectionIrScore($sectionIrScore)
  {
    $this->sectionIrScore = $sectionIrScore;
  }
  /**
   * @return float[]
   */
  public function getSectionIrScore()
  {
    return $this->sectionIrScore;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(NlpSciencelitRetrievalSearchResultDebugInfo::class, 'Google_Service_Contentwarehouse_NlpSciencelitRetrievalSearchResultDebugInfo');

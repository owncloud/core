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

class BlogPerDocData extends \Google\Collection
{
  protected $collection_key = 'outlinks';
  /**
   * @var string
   */
  public $blogurlFp;
  /**
   * @var int
   */
  public $clientSpamminess;
  protected $convTreeType = BlogsearchConversationTree::class;
  protected $convTreeDataType = '';
  /**
   * @var int
   */
  public $copycatScore;
  /**
   * @var int
   */
  public $docQualityScore;
  /**
   * @var bool
   */
  public $isSyntacticReshare;
  protected $microblogQualityExptDataType = Proto2BridgeMessageSet::class;
  protected $microblogQualityExptDataDataType = '';
  /**
   * @var int
   */
  public $numMentions;
  protected $outlinksType = BlogPerDocDataOutlinks::class;
  protected $outlinksDataType = 'array';
  /**
   * @var int
   */
  public $postContentFingerprint;
  /**
   * @var int
   */
  public $qualityScore;
  /**
   * @var int
   */
  public $spamScore;
  /**
   * @var bool
   */
  public $universalWhitelisted;
  /**
   * @var int
   */
  public $userQualityScore;

  /**
   * @param string
   */
  public function setBlogurlFp($blogurlFp)
  {
    $this->blogurlFp = $blogurlFp;
  }
  /**
   * @return string
   */
  public function getBlogurlFp()
  {
    return $this->blogurlFp;
  }
  /**
   * @param int
   */
  public function setClientSpamminess($clientSpamminess)
  {
    $this->clientSpamminess = $clientSpamminess;
  }
  /**
   * @return int
   */
  public function getClientSpamminess()
  {
    return $this->clientSpamminess;
  }
  /**
   * @param BlogsearchConversationTree
   */
  public function setConvTree(BlogsearchConversationTree $convTree)
  {
    $this->convTree = $convTree;
  }
  /**
   * @return BlogsearchConversationTree
   */
  public function getConvTree()
  {
    return $this->convTree;
  }
  /**
   * @param int
   */
  public function setCopycatScore($copycatScore)
  {
    $this->copycatScore = $copycatScore;
  }
  /**
   * @return int
   */
  public function getCopycatScore()
  {
    return $this->copycatScore;
  }
  /**
   * @param int
   */
  public function setDocQualityScore($docQualityScore)
  {
    $this->docQualityScore = $docQualityScore;
  }
  /**
   * @return int
   */
  public function getDocQualityScore()
  {
    return $this->docQualityScore;
  }
  /**
   * @param bool
   */
  public function setIsSyntacticReshare($isSyntacticReshare)
  {
    $this->isSyntacticReshare = $isSyntacticReshare;
  }
  /**
   * @return bool
   */
  public function getIsSyntacticReshare()
  {
    return $this->isSyntacticReshare;
  }
  /**
   * @param Proto2BridgeMessageSet
   */
  public function setMicroblogQualityExptData(Proto2BridgeMessageSet $microblogQualityExptData)
  {
    $this->microblogQualityExptData = $microblogQualityExptData;
  }
  /**
   * @return Proto2BridgeMessageSet
   */
  public function getMicroblogQualityExptData()
  {
    return $this->microblogQualityExptData;
  }
  /**
   * @param int
   */
  public function setNumMentions($numMentions)
  {
    $this->numMentions = $numMentions;
  }
  /**
   * @return int
   */
  public function getNumMentions()
  {
    return $this->numMentions;
  }
  /**
   * @param BlogPerDocDataOutlinks[]
   */
  public function setOutlinks($outlinks)
  {
    $this->outlinks = $outlinks;
  }
  /**
   * @return BlogPerDocDataOutlinks[]
   */
  public function getOutlinks()
  {
    return $this->outlinks;
  }
  /**
   * @param int
   */
  public function setPostContentFingerprint($postContentFingerprint)
  {
    $this->postContentFingerprint = $postContentFingerprint;
  }
  /**
   * @return int
   */
  public function getPostContentFingerprint()
  {
    return $this->postContentFingerprint;
  }
  /**
   * @param int
   */
  public function setQualityScore($qualityScore)
  {
    $this->qualityScore = $qualityScore;
  }
  /**
   * @return int
   */
  public function getQualityScore()
  {
    return $this->qualityScore;
  }
  /**
   * @param int
   */
  public function setSpamScore($spamScore)
  {
    $this->spamScore = $spamScore;
  }
  /**
   * @return int
   */
  public function getSpamScore()
  {
    return $this->spamScore;
  }
  /**
   * @param bool
   */
  public function setUniversalWhitelisted($universalWhitelisted)
  {
    $this->universalWhitelisted = $universalWhitelisted;
  }
  /**
   * @return bool
   */
  public function getUniversalWhitelisted()
  {
    return $this->universalWhitelisted;
  }
  /**
   * @param int
   */
  public function setUserQualityScore($userQualityScore)
  {
    $this->userQualityScore = $userQualityScore;
  }
  /**
   * @return int
   */
  public function getUserQualityScore()
  {
    return $this->userQualityScore;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(BlogPerDocData::class, 'Google_Service_Contentwarehouse_BlogPerDocData');

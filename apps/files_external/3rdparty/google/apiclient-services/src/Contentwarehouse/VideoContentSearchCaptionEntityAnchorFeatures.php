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

class VideoContentSearchCaptionEntityAnchorFeatures extends \Google\Collection
{
  protected $collection_key = 'otherEstimatedMentionTimes';
  /**
   * @var string
   */
  public $asrMentionText;
  /**
   * @var int
   */
  public $asrMentionTranscriptOffset;
  /**
   * @var string
   */
  public $asrSentence;
  /**
   * @var int
   */
  public $asrStartTime;
  /**
   * @var float[]
   */
  public $bertScores;
  /**
   * @var float
   */
  public $broadness;
  /**
   * @var float
   */
  public $durationCoverage;
  /**
   * @var float
   */
  public $entityConnectedness;
  /**
   * @var string
   */
  public $entityDescription;
  protected $entityInfoType = VideoContentSearchCaptionEntityDocInfo::class;
  protected $entityInfoDataType = '';
  /**
   * @var bool
   */
  public $entityMentionInDescription;
  /**
   * @var int
   */
  public $estimatedMentionTime;
  /**
   * @var float
   */
  public $groupCohesion;
  /**
   * @var float
   */
  public $hypernymConfidence;
  /**
   * @var float
   */
  public $hypernymCount;
  /**
   * @var float
   */
  public $hyperpediaSalientTermsSimilarity;
  /**
   * @var bool
   */
  public $inWebrefEntities;
  /**
   * @var bool
   */
  public $isOracleEntity;
  /**
   * @var bool
   */
  public $isProduct;
  /**
   * @var float
   */
  public $maxMentionConfidence;
  /**
   * @var float
   */
  public $mentionConfidence;
  /**
   * @var int
   */
  public $mentions;
  /**
   * @var int
   */
  public $msFromLastAnchor;
  /**
   * @var string
   */
  public $nextAsrSentence;
  /**
   * @var string[]
   */
  public $otherAsrMentionText;
  /**
   * @var int[]
   */
  public $otherEstimatedMentionTimes;
  /**
   * @var string
   */
  public $previousAsrSentence;
  /**
   * @var float
   */
  public $trustedNameConfidence;
  /**
   * @var float
   */
  public $webrefEntityTopicality;

  /**
   * @param string
   */
  public function setAsrMentionText($asrMentionText)
  {
    $this->asrMentionText = $asrMentionText;
  }
  /**
   * @return string
   */
  public function getAsrMentionText()
  {
    return $this->asrMentionText;
  }
  /**
   * @param int
   */
  public function setAsrMentionTranscriptOffset($asrMentionTranscriptOffset)
  {
    $this->asrMentionTranscriptOffset = $asrMentionTranscriptOffset;
  }
  /**
   * @return int
   */
  public function getAsrMentionTranscriptOffset()
  {
    return $this->asrMentionTranscriptOffset;
  }
  /**
   * @param string
   */
  public function setAsrSentence($asrSentence)
  {
    $this->asrSentence = $asrSentence;
  }
  /**
   * @return string
   */
  public function getAsrSentence()
  {
    return $this->asrSentence;
  }
  /**
   * @param int
   */
  public function setAsrStartTime($asrStartTime)
  {
    $this->asrStartTime = $asrStartTime;
  }
  /**
   * @return int
   */
  public function getAsrStartTime()
  {
    return $this->asrStartTime;
  }
  /**
   * @param float[]
   */
  public function setBertScores($bertScores)
  {
    $this->bertScores = $bertScores;
  }
  /**
   * @return float[]
   */
  public function getBertScores()
  {
    return $this->bertScores;
  }
  /**
   * @param float
   */
  public function setBroadness($broadness)
  {
    $this->broadness = $broadness;
  }
  /**
   * @return float
   */
  public function getBroadness()
  {
    return $this->broadness;
  }
  /**
   * @param float
   */
  public function setDurationCoverage($durationCoverage)
  {
    $this->durationCoverage = $durationCoverage;
  }
  /**
   * @return float
   */
  public function getDurationCoverage()
  {
    return $this->durationCoverage;
  }
  /**
   * @param float
   */
  public function setEntityConnectedness($entityConnectedness)
  {
    $this->entityConnectedness = $entityConnectedness;
  }
  /**
   * @return float
   */
  public function getEntityConnectedness()
  {
    return $this->entityConnectedness;
  }
  /**
   * @param string
   */
  public function setEntityDescription($entityDescription)
  {
    $this->entityDescription = $entityDescription;
  }
  /**
   * @return string
   */
  public function getEntityDescription()
  {
    return $this->entityDescription;
  }
  /**
   * @param VideoContentSearchCaptionEntityDocInfo
   */
  public function setEntityInfo(VideoContentSearchCaptionEntityDocInfo $entityInfo)
  {
    $this->entityInfo = $entityInfo;
  }
  /**
   * @return VideoContentSearchCaptionEntityDocInfo
   */
  public function getEntityInfo()
  {
    return $this->entityInfo;
  }
  /**
   * @param bool
   */
  public function setEntityMentionInDescription($entityMentionInDescription)
  {
    $this->entityMentionInDescription = $entityMentionInDescription;
  }
  /**
   * @return bool
   */
  public function getEntityMentionInDescription()
  {
    return $this->entityMentionInDescription;
  }
  /**
   * @param int
   */
  public function setEstimatedMentionTime($estimatedMentionTime)
  {
    $this->estimatedMentionTime = $estimatedMentionTime;
  }
  /**
   * @return int
   */
  public function getEstimatedMentionTime()
  {
    return $this->estimatedMentionTime;
  }
  /**
   * @param float
   */
  public function setGroupCohesion($groupCohesion)
  {
    $this->groupCohesion = $groupCohesion;
  }
  /**
   * @return float
   */
  public function getGroupCohesion()
  {
    return $this->groupCohesion;
  }
  /**
   * @param float
   */
  public function setHypernymConfidence($hypernymConfidence)
  {
    $this->hypernymConfidence = $hypernymConfidence;
  }
  /**
   * @return float
   */
  public function getHypernymConfidence()
  {
    return $this->hypernymConfidence;
  }
  /**
   * @param float
   */
  public function setHypernymCount($hypernymCount)
  {
    $this->hypernymCount = $hypernymCount;
  }
  /**
   * @return float
   */
  public function getHypernymCount()
  {
    return $this->hypernymCount;
  }
  /**
   * @param float
   */
  public function setHyperpediaSalientTermsSimilarity($hyperpediaSalientTermsSimilarity)
  {
    $this->hyperpediaSalientTermsSimilarity = $hyperpediaSalientTermsSimilarity;
  }
  /**
   * @return float
   */
  public function getHyperpediaSalientTermsSimilarity()
  {
    return $this->hyperpediaSalientTermsSimilarity;
  }
  /**
   * @param bool
   */
  public function setInWebrefEntities($inWebrefEntities)
  {
    $this->inWebrefEntities = $inWebrefEntities;
  }
  /**
   * @return bool
   */
  public function getInWebrefEntities()
  {
    return $this->inWebrefEntities;
  }
  /**
   * @param bool
   */
  public function setIsOracleEntity($isOracleEntity)
  {
    $this->isOracleEntity = $isOracleEntity;
  }
  /**
   * @return bool
   */
  public function getIsOracleEntity()
  {
    return $this->isOracleEntity;
  }
  /**
   * @param bool
   */
  public function setIsProduct($isProduct)
  {
    $this->isProduct = $isProduct;
  }
  /**
   * @return bool
   */
  public function getIsProduct()
  {
    return $this->isProduct;
  }
  /**
   * @param float
   */
  public function setMaxMentionConfidence($maxMentionConfidence)
  {
    $this->maxMentionConfidence = $maxMentionConfidence;
  }
  /**
   * @return float
   */
  public function getMaxMentionConfidence()
  {
    return $this->maxMentionConfidence;
  }
  /**
   * @param float
   */
  public function setMentionConfidence($mentionConfidence)
  {
    $this->mentionConfidence = $mentionConfidence;
  }
  /**
   * @return float
   */
  public function getMentionConfidence()
  {
    return $this->mentionConfidence;
  }
  /**
   * @param int
   */
  public function setMentions($mentions)
  {
    $this->mentions = $mentions;
  }
  /**
   * @return int
   */
  public function getMentions()
  {
    return $this->mentions;
  }
  /**
   * @param int
   */
  public function setMsFromLastAnchor($msFromLastAnchor)
  {
    $this->msFromLastAnchor = $msFromLastAnchor;
  }
  /**
   * @return int
   */
  public function getMsFromLastAnchor()
  {
    return $this->msFromLastAnchor;
  }
  /**
   * @param string
   */
  public function setNextAsrSentence($nextAsrSentence)
  {
    $this->nextAsrSentence = $nextAsrSentence;
  }
  /**
   * @return string
   */
  public function getNextAsrSentence()
  {
    return $this->nextAsrSentence;
  }
  /**
   * @param string[]
   */
  public function setOtherAsrMentionText($otherAsrMentionText)
  {
    $this->otherAsrMentionText = $otherAsrMentionText;
  }
  /**
   * @return string[]
   */
  public function getOtherAsrMentionText()
  {
    return $this->otherAsrMentionText;
  }
  /**
   * @param int[]
   */
  public function setOtherEstimatedMentionTimes($otherEstimatedMentionTimes)
  {
    $this->otherEstimatedMentionTimes = $otherEstimatedMentionTimes;
  }
  /**
   * @return int[]
   */
  public function getOtherEstimatedMentionTimes()
  {
    return $this->otherEstimatedMentionTimes;
  }
  /**
   * @param string
   */
  public function setPreviousAsrSentence($previousAsrSentence)
  {
    $this->previousAsrSentence = $previousAsrSentence;
  }
  /**
   * @return string
   */
  public function getPreviousAsrSentence()
  {
    return $this->previousAsrSentence;
  }
  /**
   * @param float
   */
  public function setTrustedNameConfidence($trustedNameConfidence)
  {
    $this->trustedNameConfidence = $trustedNameConfidence;
  }
  /**
   * @return float
   */
  public function getTrustedNameConfidence()
  {
    return $this->trustedNameConfidence;
  }
  /**
   * @param float
   */
  public function setWebrefEntityTopicality($webrefEntityTopicality)
  {
    $this->webrefEntityTopicality = $webrefEntityTopicality;
  }
  /**
   * @return float
   */
  public function getWebrefEntityTopicality()
  {
    return $this->webrefEntityTopicality;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(VideoContentSearchCaptionEntityAnchorFeatures::class, 'Google_Service_Contentwarehouse_VideoContentSearchCaptionEntityAnchorFeatures');

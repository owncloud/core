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

class AbuseiamVerdict extends \Google\Collection
{
  protected $collection_key = 'userNotification';
  protected $clientType = AbuseiamClient::class;
  protected $clientDataType = '';
  /**
   * @var string
   */
  public $comment;
  /**
   * @var string
   */
  public $decision;
  /**
   * @var int
   */
  public $durationMins;
  protected $evaluationType = AbuseiamEvaluation::class;
  protected $evaluationDataType = 'array';
  protected $hashesType = AbuseiamHash::class;
  protected $hashesDataType = 'array';
  /**
   * @var bool
   */
  public $isLegalIssued;
  protected $miscScoresType = AbuseiamNameValuePair::class;
  protected $miscScoresDataType = 'array';
  /**
   * @var string
   */
  public $reasonCode;
  protected $regionType = AbuseiamRegion::class;
  protected $regionDataType = 'array';
  protected $restrictionType = AbuseiamVerdictRestriction::class;
  protected $restrictionDataType = 'array';
  /**
   * @var string
   */
  public $strikeCategory;
  protected $targetType = AbuseiamTarget::class;
  protected $targetDataType = '';
  /**
   * @var string
   */
  public $targetTimestampMicros;
  /**
   * @var string
   */
  public $timestampMicros;
  protected $userNotificationType = AbuseiamUserNotification::class;
  protected $userNotificationDataType = 'array';
  /**
   * @var string
   */
  public $version;

  /**
   * @param AbuseiamClient
   */
  public function setClient(AbuseiamClient $client)
  {
    $this->client = $client;
  }
  /**
   * @return AbuseiamClient
   */
  public function getClient()
  {
    return $this->client;
  }
  /**
   * @param string
   */
  public function setComment($comment)
  {
    $this->comment = $comment;
  }
  /**
   * @return string
   */
  public function getComment()
  {
    return $this->comment;
  }
  /**
   * @param string
   */
  public function setDecision($decision)
  {
    $this->decision = $decision;
  }
  /**
   * @return string
   */
  public function getDecision()
  {
    return $this->decision;
  }
  /**
   * @param int
   */
  public function setDurationMins($durationMins)
  {
    $this->durationMins = $durationMins;
  }
  /**
   * @return int
   */
  public function getDurationMins()
  {
    return $this->durationMins;
  }
  /**
   * @param AbuseiamEvaluation[]
   */
  public function setEvaluation($evaluation)
  {
    $this->evaluation = $evaluation;
  }
  /**
   * @return AbuseiamEvaluation[]
   */
  public function getEvaluation()
  {
    return $this->evaluation;
  }
  /**
   * @param AbuseiamHash[]
   */
  public function setHashes($hashes)
  {
    $this->hashes = $hashes;
  }
  /**
   * @return AbuseiamHash[]
   */
  public function getHashes()
  {
    return $this->hashes;
  }
  /**
   * @param bool
   */
  public function setIsLegalIssued($isLegalIssued)
  {
    $this->isLegalIssued = $isLegalIssued;
  }
  /**
   * @return bool
   */
  public function getIsLegalIssued()
  {
    return $this->isLegalIssued;
  }
  /**
   * @param AbuseiamNameValuePair[]
   */
  public function setMiscScores($miscScores)
  {
    $this->miscScores = $miscScores;
  }
  /**
   * @return AbuseiamNameValuePair[]
   */
  public function getMiscScores()
  {
    return $this->miscScores;
  }
  /**
   * @param string
   */
  public function setReasonCode($reasonCode)
  {
    $this->reasonCode = $reasonCode;
  }
  /**
   * @return string
   */
  public function getReasonCode()
  {
    return $this->reasonCode;
  }
  /**
   * @param AbuseiamRegion[]
   */
  public function setRegion($region)
  {
    $this->region = $region;
  }
  /**
   * @return AbuseiamRegion[]
   */
  public function getRegion()
  {
    return $this->region;
  }
  /**
   * @param AbuseiamVerdictRestriction[]
   */
  public function setRestriction($restriction)
  {
    $this->restriction = $restriction;
  }
  /**
   * @return AbuseiamVerdictRestriction[]
   */
  public function getRestriction()
  {
    return $this->restriction;
  }
  /**
   * @param string
   */
  public function setStrikeCategory($strikeCategory)
  {
    $this->strikeCategory = $strikeCategory;
  }
  /**
   * @return string
   */
  public function getStrikeCategory()
  {
    return $this->strikeCategory;
  }
  /**
   * @param AbuseiamTarget
   */
  public function setTarget(AbuseiamTarget $target)
  {
    $this->target = $target;
  }
  /**
   * @return AbuseiamTarget
   */
  public function getTarget()
  {
    return $this->target;
  }
  /**
   * @param string
   */
  public function setTargetTimestampMicros($targetTimestampMicros)
  {
    $this->targetTimestampMicros = $targetTimestampMicros;
  }
  /**
   * @return string
   */
  public function getTargetTimestampMicros()
  {
    return $this->targetTimestampMicros;
  }
  /**
   * @param string
   */
  public function setTimestampMicros($timestampMicros)
  {
    $this->timestampMicros = $timestampMicros;
  }
  /**
   * @return string
   */
  public function getTimestampMicros()
  {
    return $this->timestampMicros;
  }
  /**
   * @param AbuseiamUserNotification[]
   */
  public function setUserNotification($userNotification)
  {
    $this->userNotification = $userNotification;
  }
  /**
   * @return AbuseiamUserNotification[]
   */
  public function getUserNotification()
  {
    return $this->userNotification;
  }
  /**
   * @param string
   */
  public function setVersion($version)
  {
    $this->version = $version;
  }
  /**
   * @return string
   */
  public function getVersion()
  {
    return $this->version;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(AbuseiamVerdict::class, 'Google_Service_Contentwarehouse_AbuseiamVerdict');

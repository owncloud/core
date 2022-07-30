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

namespace Google\Service\Apigee;

class GoogleCloudApigeeV1SecurityProfile extends \Google\Collection
{
  protected $collection_key = 'scoringConfigs';
  /**
   * @var string
   */
  public $displayName;
  protected $environmentsType = GoogleCloudApigeeV1SecurityProfileEnvironment::class;
  protected $environmentsDataType = 'array';
  /**
   * @var int
   */
  public $maxScore;
  /**
   * @var int
   */
  public $minScore;
  /**
   * @var string
   */
  public $name;
  /**
   * @var string
   */
  public $revisionCreateTime;
  /**
   * @var string
   */
  public $revisionId;
  /**
   * @var string
   */
  public $revisionPublishTime;
  /**
   * @var string
   */
  public $revisionUpdateTime;
  protected $scoringConfigsType = GoogleCloudApigeeV1SecurityProfileScoringConfig::class;
  protected $scoringConfigsDataType = 'array';

  /**
   * @param string
   */
  public function setDisplayName($displayName)
  {
    $this->displayName = $displayName;
  }
  /**
   * @return string
   */
  public function getDisplayName()
  {
    return $this->displayName;
  }
  /**
   * @param GoogleCloudApigeeV1SecurityProfileEnvironment[]
   */
  public function setEnvironments($environments)
  {
    $this->environments = $environments;
  }
  /**
   * @return GoogleCloudApigeeV1SecurityProfileEnvironment[]
   */
  public function getEnvironments()
  {
    return $this->environments;
  }
  /**
   * @param int
   */
  public function setMaxScore($maxScore)
  {
    $this->maxScore = $maxScore;
  }
  /**
   * @return int
   */
  public function getMaxScore()
  {
    return $this->maxScore;
  }
  /**
   * @param int
   */
  public function setMinScore($minScore)
  {
    $this->minScore = $minScore;
  }
  /**
   * @return int
   */
  public function getMinScore()
  {
    return $this->minScore;
  }
  /**
   * @param string
   */
  public function setName($name)
  {
    $this->name = $name;
  }
  /**
   * @return string
   */
  public function getName()
  {
    return $this->name;
  }
  /**
   * @param string
   */
  public function setRevisionCreateTime($revisionCreateTime)
  {
    $this->revisionCreateTime = $revisionCreateTime;
  }
  /**
   * @return string
   */
  public function getRevisionCreateTime()
  {
    return $this->revisionCreateTime;
  }
  /**
   * @param string
   */
  public function setRevisionId($revisionId)
  {
    $this->revisionId = $revisionId;
  }
  /**
   * @return string
   */
  public function getRevisionId()
  {
    return $this->revisionId;
  }
  /**
   * @param string
   */
  public function setRevisionPublishTime($revisionPublishTime)
  {
    $this->revisionPublishTime = $revisionPublishTime;
  }
  /**
   * @return string
   */
  public function getRevisionPublishTime()
  {
    return $this->revisionPublishTime;
  }
  /**
   * @param string
   */
  public function setRevisionUpdateTime($revisionUpdateTime)
  {
    $this->revisionUpdateTime = $revisionUpdateTime;
  }
  /**
   * @return string
   */
  public function getRevisionUpdateTime()
  {
    return $this->revisionUpdateTime;
  }
  /**
   * @param GoogleCloudApigeeV1SecurityProfileScoringConfig[]
   */
  public function setScoringConfigs($scoringConfigs)
  {
    $this->scoringConfigs = $scoringConfigs;
  }
  /**
   * @return GoogleCloudApigeeV1SecurityProfileScoringConfig[]
   */
  public function getScoringConfigs()
  {
    return $this->scoringConfigs;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(GoogleCloudApigeeV1SecurityProfile::class, 'Google_Service_Apigee_GoogleCloudApigeeV1SecurityProfile');

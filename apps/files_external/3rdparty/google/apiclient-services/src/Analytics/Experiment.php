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

namespace Google\Service\Analytics;

class Experiment extends \Google\Collection
{
  protected $collection_key = 'variations';
  /**
   * @var string
   */
  public $accountId;
  /**
   * @var string
   */
  public $created;
  /**
   * @var string
   */
  public $description;
  /**
   * @var bool
   */
  public $editableInGaUi;
  /**
   * @var string
   */
  public $endTime;
  /**
   * @var bool
   */
  public $equalWeighting;
  /**
   * @var string
   */
  public $id;
  /**
   * @var string
   */
  public $internalWebPropertyId;
  /**
   * @var string
   */
  public $kind;
  /**
   * @var int
   */
  public $minimumExperimentLengthInDays;
  /**
   * @var string
   */
  public $name;
  /**
   * @var string
   */
  public $objectiveMetric;
  /**
   * @var string
   */
  public $optimizationType;
  protected $parentLinkType = ExperimentParentLink::class;
  protected $parentLinkDataType = '';
  /**
   * @var string
   */
  public $profileId;
  /**
   * @var string
   */
  public $reasonExperimentEnded;
  /**
   * @var bool
   */
  public $rewriteVariationUrlsAsOriginal;
  /**
   * @var string
   */
  public $selfLink;
  /**
   * @var string
   */
  public $servingFramework;
  /**
   * @var string
   */
  public $snippet;
  /**
   * @var string
   */
  public $startTime;
  /**
   * @var string
   */
  public $status;
  public $trafficCoverage;
  /**
   * @var string
   */
  public $updated;
  protected $variationsType = ExperimentVariations::class;
  protected $variationsDataType = 'array';
  /**
   * @var string
   */
  public $webPropertyId;
  public $winnerConfidenceLevel;
  /**
   * @var bool
   */
  public $winnerFound;

  /**
   * @param string
   */
  public function setAccountId($accountId)
  {
    $this->accountId = $accountId;
  }
  /**
   * @return string
   */
  public function getAccountId()
  {
    return $this->accountId;
  }
  /**
   * @param string
   */
  public function setCreated($created)
  {
    $this->created = $created;
  }
  /**
   * @return string
   */
  public function getCreated()
  {
    return $this->created;
  }
  /**
   * @param string
   */
  public function setDescription($description)
  {
    $this->description = $description;
  }
  /**
   * @return string
   */
  public function getDescription()
  {
    return $this->description;
  }
  /**
   * @param bool
   */
  public function setEditableInGaUi($editableInGaUi)
  {
    $this->editableInGaUi = $editableInGaUi;
  }
  /**
   * @return bool
   */
  public function getEditableInGaUi()
  {
    return $this->editableInGaUi;
  }
  /**
   * @param string
   */
  public function setEndTime($endTime)
  {
    $this->endTime = $endTime;
  }
  /**
   * @return string
   */
  public function getEndTime()
  {
    return $this->endTime;
  }
  /**
   * @param bool
   */
  public function setEqualWeighting($equalWeighting)
  {
    $this->equalWeighting = $equalWeighting;
  }
  /**
   * @return bool
   */
  public function getEqualWeighting()
  {
    return $this->equalWeighting;
  }
  /**
   * @param string
   */
  public function setId($id)
  {
    $this->id = $id;
  }
  /**
   * @return string
   */
  public function getId()
  {
    return $this->id;
  }
  /**
   * @param string
   */
  public function setInternalWebPropertyId($internalWebPropertyId)
  {
    $this->internalWebPropertyId = $internalWebPropertyId;
  }
  /**
   * @return string
   */
  public function getInternalWebPropertyId()
  {
    return $this->internalWebPropertyId;
  }
  /**
   * @param string
   */
  public function setKind($kind)
  {
    $this->kind = $kind;
  }
  /**
   * @return string
   */
  public function getKind()
  {
    return $this->kind;
  }
  /**
   * @param int
   */
  public function setMinimumExperimentLengthInDays($minimumExperimentLengthInDays)
  {
    $this->minimumExperimentLengthInDays = $minimumExperimentLengthInDays;
  }
  /**
   * @return int
   */
  public function getMinimumExperimentLengthInDays()
  {
    return $this->minimumExperimentLengthInDays;
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
  public function setObjectiveMetric($objectiveMetric)
  {
    $this->objectiveMetric = $objectiveMetric;
  }
  /**
   * @return string
   */
  public function getObjectiveMetric()
  {
    return $this->objectiveMetric;
  }
  /**
   * @param string
   */
  public function setOptimizationType($optimizationType)
  {
    $this->optimizationType = $optimizationType;
  }
  /**
   * @return string
   */
  public function getOptimizationType()
  {
    return $this->optimizationType;
  }
  /**
   * @param ExperimentParentLink
   */
  public function setParentLink(ExperimentParentLink $parentLink)
  {
    $this->parentLink = $parentLink;
  }
  /**
   * @return ExperimentParentLink
   */
  public function getParentLink()
  {
    return $this->parentLink;
  }
  /**
   * @param string
   */
  public function setProfileId($profileId)
  {
    $this->profileId = $profileId;
  }
  /**
   * @return string
   */
  public function getProfileId()
  {
    return $this->profileId;
  }
  /**
   * @param string
   */
  public function setReasonExperimentEnded($reasonExperimentEnded)
  {
    $this->reasonExperimentEnded = $reasonExperimentEnded;
  }
  /**
   * @return string
   */
  public function getReasonExperimentEnded()
  {
    return $this->reasonExperimentEnded;
  }
  /**
   * @param bool
   */
  public function setRewriteVariationUrlsAsOriginal($rewriteVariationUrlsAsOriginal)
  {
    $this->rewriteVariationUrlsAsOriginal = $rewriteVariationUrlsAsOriginal;
  }
  /**
   * @return bool
   */
  public function getRewriteVariationUrlsAsOriginal()
  {
    return $this->rewriteVariationUrlsAsOriginal;
  }
  /**
   * @param string
   */
  public function setSelfLink($selfLink)
  {
    $this->selfLink = $selfLink;
  }
  /**
   * @return string
   */
  public function getSelfLink()
  {
    return $this->selfLink;
  }
  /**
   * @param string
   */
  public function setServingFramework($servingFramework)
  {
    $this->servingFramework = $servingFramework;
  }
  /**
   * @return string
   */
  public function getServingFramework()
  {
    return $this->servingFramework;
  }
  /**
   * @param string
   */
  public function setSnippet($snippet)
  {
    $this->snippet = $snippet;
  }
  /**
   * @return string
   */
  public function getSnippet()
  {
    return $this->snippet;
  }
  /**
   * @param string
   */
  public function setStartTime($startTime)
  {
    $this->startTime = $startTime;
  }
  /**
   * @return string
   */
  public function getStartTime()
  {
    return $this->startTime;
  }
  /**
   * @param string
   */
  public function setStatus($status)
  {
    $this->status = $status;
  }
  /**
   * @return string
   */
  public function getStatus()
  {
    return $this->status;
  }
  public function setTrafficCoverage($trafficCoverage)
  {
    $this->trafficCoverage = $trafficCoverage;
  }
  public function getTrafficCoverage()
  {
    return $this->trafficCoverage;
  }
  /**
   * @param string
   */
  public function setUpdated($updated)
  {
    $this->updated = $updated;
  }
  /**
   * @return string
   */
  public function getUpdated()
  {
    return $this->updated;
  }
  /**
   * @param ExperimentVariations[]
   */
  public function setVariations($variations)
  {
    $this->variations = $variations;
  }
  /**
   * @return ExperimentVariations[]
   */
  public function getVariations()
  {
    return $this->variations;
  }
  /**
   * @param string
   */
  public function setWebPropertyId($webPropertyId)
  {
    $this->webPropertyId = $webPropertyId;
  }
  /**
   * @return string
   */
  public function getWebPropertyId()
  {
    return $this->webPropertyId;
  }
  public function setWinnerConfidenceLevel($winnerConfidenceLevel)
  {
    $this->winnerConfidenceLevel = $winnerConfidenceLevel;
  }
  public function getWinnerConfidenceLevel()
  {
    return $this->winnerConfidenceLevel;
  }
  /**
   * @param bool
   */
  public function setWinnerFound($winnerFound)
  {
    $this->winnerFound = $winnerFound;
  }
  /**
   * @return bool
   */
  public function getWinnerFound()
  {
    return $this->winnerFound;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(Experiment::class, 'Google_Service_Analytics_Experiment');

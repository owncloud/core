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

namespace Google\Service\DataLabeling;

class GoogleCloudDatalabelingV1p1alpha1HumanAnnotationConfig extends \Google\Collection
{
  protected $collection_key = 'contributorEmails';
  /**
   * @var string
   */
  public $annotatedDatasetDescription;
  /**
   * @var string
   */
  public $annotatedDatasetDisplayName;
  /**
   * @var string[]
   */
  public $contributorEmails;
  /**
   * @var string
   */
  public $instruction;
  /**
   * @var string
   */
  public $labelGroup;
  /**
   * @var string
   */
  public $languageCode;
  /**
   * @var string
   */
  public $questionDuration;
  /**
   * @var int
   */
  public $replicaCount;
  /**
   * @var string
   */
  public $userEmailAddress;

  /**
   * @param string
   */
  public function setAnnotatedDatasetDescription($annotatedDatasetDescription)
  {
    $this->annotatedDatasetDescription = $annotatedDatasetDescription;
  }
  /**
   * @return string
   */
  public function getAnnotatedDatasetDescription()
  {
    return $this->annotatedDatasetDescription;
  }
  /**
   * @param string
   */
  public function setAnnotatedDatasetDisplayName($annotatedDatasetDisplayName)
  {
    $this->annotatedDatasetDisplayName = $annotatedDatasetDisplayName;
  }
  /**
   * @return string
   */
  public function getAnnotatedDatasetDisplayName()
  {
    return $this->annotatedDatasetDisplayName;
  }
  /**
   * @param string[]
   */
  public function setContributorEmails($contributorEmails)
  {
    $this->contributorEmails = $contributorEmails;
  }
  /**
   * @return string[]
   */
  public function getContributorEmails()
  {
    return $this->contributorEmails;
  }
  /**
   * @param string
   */
  public function setInstruction($instruction)
  {
    $this->instruction = $instruction;
  }
  /**
   * @return string
   */
  public function getInstruction()
  {
    return $this->instruction;
  }
  /**
   * @param string
   */
  public function setLabelGroup($labelGroup)
  {
    $this->labelGroup = $labelGroup;
  }
  /**
   * @return string
   */
  public function getLabelGroup()
  {
    return $this->labelGroup;
  }
  /**
   * @param string
   */
  public function setLanguageCode($languageCode)
  {
    $this->languageCode = $languageCode;
  }
  /**
   * @return string
   */
  public function getLanguageCode()
  {
    return $this->languageCode;
  }
  /**
   * @param string
   */
  public function setQuestionDuration($questionDuration)
  {
    $this->questionDuration = $questionDuration;
  }
  /**
   * @return string
   */
  public function getQuestionDuration()
  {
    return $this->questionDuration;
  }
  /**
   * @param int
   */
  public function setReplicaCount($replicaCount)
  {
    $this->replicaCount = $replicaCount;
  }
  /**
   * @return int
   */
  public function getReplicaCount()
  {
    return $this->replicaCount;
  }
  /**
   * @param string
   */
  public function setUserEmailAddress($userEmailAddress)
  {
    $this->userEmailAddress = $userEmailAddress;
  }
  /**
   * @return string
   */
  public function getUserEmailAddress()
  {
    return $this->userEmailAddress;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(GoogleCloudDatalabelingV1p1alpha1HumanAnnotationConfig::class, 'Google_Service_DataLabeling_GoogleCloudDatalabelingV1p1alpha1HumanAnnotationConfig');

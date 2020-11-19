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

class Google_Service_DataLabeling_GoogleCloudDatalabelingV1p1alpha1HumanAnnotationConfig extends Google_Collection
{
  protected $collection_key = 'contributorEmails';
  public $annotatedDatasetDescription;
  public $annotatedDatasetDisplayName;
  public $contributorEmails;
  public $instruction;
  public $labelGroup;
  public $languageCode;
  public $questionDuration;
  public $replicaCount;
  public $userEmailAddress;

  public function setAnnotatedDatasetDescription($annotatedDatasetDescription)
  {
    $this->annotatedDatasetDescription = $annotatedDatasetDescription;
  }
  public function getAnnotatedDatasetDescription()
  {
    return $this->annotatedDatasetDescription;
  }
  public function setAnnotatedDatasetDisplayName($annotatedDatasetDisplayName)
  {
    $this->annotatedDatasetDisplayName = $annotatedDatasetDisplayName;
  }
  public function getAnnotatedDatasetDisplayName()
  {
    return $this->annotatedDatasetDisplayName;
  }
  public function setContributorEmails($contributorEmails)
  {
    $this->contributorEmails = $contributorEmails;
  }
  public function getContributorEmails()
  {
    return $this->contributorEmails;
  }
  public function setInstruction($instruction)
  {
    $this->instruction = $instruction;
  }
  public function getInstruction()
  {
    return $this->instruction;
  }
  public function setLabelGroup($labelGroup)
  {
    $this->labelGroup = $labelGroup;
  }
  public function getLabelGroup()
  {
    return $this->labelGroup;
  }
  public function setLanguageCode($languageCode)
  {
    $this->languageCode = $languageCode;
  }
  public function getLanguageCode()
  {
    return $this->languageCode;
  }
  public function setQuestionDuration($questionDuration)
  {
    $this->questionDuration = $questionDuration;
  }
  public function getQuestionDuration()
  {
    return $this->questionDuration;
  }
  public function setReplicaCount($replicaCount)
  {
    $this->replicaCount = $replicaCount;
  }
  public function getReplicaCount()
  {
    return $this->replicaCount;
  }
  public function setUserEmailAddress($userEmailAddress)
  {
    $this->userEmailAddress = $userEmailAddress;
  }
  public function getUserEmailAddress()
  {
    return $this->userEmailAddress;
  }
}

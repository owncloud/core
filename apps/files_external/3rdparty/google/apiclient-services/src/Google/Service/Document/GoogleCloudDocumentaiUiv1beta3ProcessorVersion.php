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

class Google_Service_Document_GoogleCloudDocumentaiUiv1beta3ProcessorVersion extends Google_Model
{
  public $createTime;
  public $displayName;
  protected $latestEvaluationType = 'Google_Service_Document_GoogleCloudDocumentaiUiv1beta3EvaluationReference';
  protected $latestEvaluationDataType = '';
  public $name;
  protected $schemaType = 'Google_Service_Document_GoogleCloudDocumentaiUiv1beta3Schema';
  protected $schemaDataType = '';
  public $state;

  public function setCreateTime($createTime)
  {
    $this->createTime = $createTime;
  }
  public function getCreateTime()
  {
    return $this->createTime;
  }
  public function setDisplayName($displayName)
  {
    $this->displayName = $displayName;
  }
  public function getDisplayName()
  {
    return $this->displayName;
  }
  /**
   * @param Google_Service_Document_GoogleCloudDocumentaiUiv1beta3EvaluationReference
   */
  public function setLatestEvaluation(Google_Service_Document_GoogleCloudDocumentaiUiv1beta3EvaluationReference $latestEvaluation)
  {
    $this->latestEvaluation = $latestEvaluation;
  }
  /**
   * @return Google_Service_Document_GoogleCloudDocumentaiUiv1beta3EvaluationReference
   */
  public function getLatestEvaluation()
  {
    return $this->latestEvaluation;
  }
  public function setName($name)
  {
    $this->name = $name;
  }
  public function getName()
  {
    return $this->name;
  }
  /**
   * @param Google_Service_Document_GoogleCloudDocumentaiUiv1beta3Schema
   */
  public function setSchema(Google_Service_Document_GoogleCloudDocumentaiUiv1beta3Schema $schema)
  {
    $this->schema = $schema;
  }
  /**
   * @return Google_Service_Document_GoogleCloudDocumentaiUiv1beta3Schema
   */
  public function getSchema()
  {
    return $this->schema;
  }
  public function setState($state)
  {
    $this->state = $state;
  }
  public function getState()
  {
    return $this->state;
  }
}

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

namespace Google\Service\Document;

class GoogleCloudDocumentaiV1ProcessorVersion extends \Google\Model
{
  public $createTime;
  public $displayName;
  protected $latestEvaluationType = GoogleCloudDocumentaiV1EvaluationReference::class;
  protected $latestEvaluationDataType = '';
  public $name;
  protected $schemaType = GoogleCloudDocumentaiV1Schema::class;
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
   * @param GoogleCloudDocumentaiV1EvaluationReference
   */
  public function setLatestEvaluation(GoogleCloudDocumentaiV1EvaluationReference $latestEvaluation)
  {
    $this->latestEvaluation = $latestEvaluation;
  }
  /**
   * @return GoogleCloudDocumentaiV1EvaluationReference
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
   * @param GoogleCloudDocumentaiV1Schema
   */
  public function setSchema(GoogleCloudDocumentaiV1Schema $schema)
  {
    $this->schema = $schema;
  }
  /**
   * @return GoogleCloudDocumentaiV1Schema
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

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(GoogleCloudDocumentaiV1ProcessorVersion::class, 'Google_Service_Document_GoogleCloudDocumentaiV1ProcessorVersion');

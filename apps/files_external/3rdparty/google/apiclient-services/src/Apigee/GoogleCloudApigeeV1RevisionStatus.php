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

class GoogleCloudApigeeV1RevisionStatus extends \Google\Collection
{
  protected $collection_key = 'errors';
  protected $errorsType = GoogleCloudApigeeV1UpdateError::class;
  protected $errorsDataType = 'array';
  public $jsonSpec;
  public $replicas;
  public $revisionId;

  /**
   * @param GoogleCloudApigeeV1UpdateError[]
   */
  public function setErrors($errors)
  {
    $this->errors = $errors;
  }
  /**
   * @return GoogleCloudApigeeV1UpdateError[]
   */
  public function getErrors()
  {
    return $this->errors;
  }
  public function setJsonSpec($jsonSpec)
  {
    $this->jsonSpec = $jsonSpec;
  }
  public function getJsonSpec()
  {
    return $this->jsonSpec;
  }
  public function setReplicas($replicas)
  {
    $this->replicas = $replicas;
  }
  public function getReplicas()
  {
    return $this->replicas;
  }
  public function setRevisionId($revisionId)
  {
    $this->revisionId = $revisionId;
  }
  public function getRevisionId()
  {
    return $this->revisionId;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(GoogleCloudApigeeV1RevisionStatus::class, 'Google_Service_Apigee_GoogleCloudApigeeV1RevisionStatus');

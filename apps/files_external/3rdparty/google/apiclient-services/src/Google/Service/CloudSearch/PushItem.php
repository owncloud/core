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

class Google_Service_CloudSearch_PushItem extends Google_Model
{
  public $contentHash;
  public $metadataHash;
  public $payload;
  public $queue;
  protected $repositoryErrorType = 'Google_Service_CloudSearch_RepositoryError';
  protected $repositoryErrorDataType = '';
  public $structuredDataHash;
  public $type;

  public function setContentHash($contentHash)
  {
    $this->contentHash = $contentHash;
  }
  public function getContentHash()
  {
    return $this->contentHash;
  }
  public function setMetadataHash($metadataHash)
  {
    $this->metadataHash = $metadataHash;
  }
  public function getMetadataHash()
  {
    return $this->metadataHash;
  }
  public function setPayload($payload)
  {
    $this->payload = $payload;
  }
  public function getPayload()
  {
    return $this->payload;
  }
  public function setQueue($queue)
  {
    $this->queue = $queue;
  }
  public function getQueue()
  {
    return $this->queue;
  }
  /**
   * @param Google_Service_CloudSearch_RepositoryError
   */
  public function setRepositoryError(Google_Service_CloudSearch_RepositoryError $repositoryError)
  {
    $this->repositoryError = $repositoryError;
  }
  /**
   * @return Google_Service_CloudSearch_RepositoryError
   */
  public function getRepositoryError()
  {
    return $this->repositoryError;
  }
  public function setStructuredDataHash($structuredDataHash)
  {
    $this->structuredDataHash = $structuredDataHash;
  }
  public function getStructuredDataHash()
  {
    return $this->structuredDataHash;
  }
  public function setType($type)
  {
    $this->type = $type;
  }
  public function getType()
  {
    return $this->type;
  }
}

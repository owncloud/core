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

namespace Google\Service\ApigeeRegistry;

class ApiDeployment extends \Google\Model
{
  /**
   * @var string
   */
  public $accessGuidance;
  /**
   * @var string[]
   */
  public $annotations;
  /**
   * @var string
   */
  public $apiSpecRevision;
  /**
   * @var string
   */
  public $createTime;
  /**
   * @var string
   */
  public $description;
  /**
   * @var string
   */
  public $displayName;
  /**
   * @var string
   */
  public $endpointUri;
  /**
   * @var string
   */
  public $externalChannelUri;
  /**
   * @var string
   */
  public $intendedAudience;
  /**
   * @var string[]
   */
  public $labels;
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
  public $revisionUpdateTime;

  /**
   * @param string
   */
  public function setAccessGuidance($accessGuidance)
  {
    $this->accessGuidance = $accessGuidance;
  }
  /**
   * @return string
   */
  public function getAccessGuidance()
  {
    return $this->accessGuidance;
  }
  /**
   * @param string[]
   */
  public function setAnnotations($annotations)
  {
    $this->annotations = $annotations;
  }
  /**
   * @return string[]
   */
  public function getAnnotations()
  {
    return $this->annotations;
  }
  /**
   * @param string
   */
  public function setApiSpecRevision($apiSpecRevision)
  {
    $this->apiSpecRevision = $apiSpecRevision;
  }
  /**
   * @return string
   */
  public function getApiSpecRevision()
  {
    return $this->apiSpecRevision;
  }
  /**
   * @param string
   */
  public function setCreateTime($createTime)
  {
    $this->createTime = $createTime;
  }
  /**
   * @return string
   */
  public function getCreateTime()
  {
    return $this->createTime;
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
   * @param string
   */
  public function setEndpointUri($endpointUri)
  {
    $this->endpointUri = $endpointUri;
  }
  /**
   * @return string
   */
  public function getEndpointUri()
  {
    return $this->endpointUri;
  }
  /**
   * @param string
   */
  public function setExternalChannelUri($externalChannelUri)
  {
    $this->externalChannelUri = $externalChannelUri;
  }
  /**
   * @return string
   */
  public function getExternalChannelUri()
  {
    return $this->externalChannelUri;
  }
  /**
   * @param string
   */
  public function setIntendedAudience($intendedAudience)
  {
    $this->intendedAudience = $intendedAudience;
  }
  /**
   * @return string
   */
  public function getIntendedAudience()
  {
    return $this->intendedAudience;
  }
  /**
   * @param string[]
   */
  public function setLabels($labels)
  {
    $this->labels = $labels;
  }
  /**
   * @return string[]
   */
  public function getLabels()
  {
    return $this->labels;
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
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(ApiDeployment::class, 'Google_Service_ApigeeRegistry_ApiDeployment');

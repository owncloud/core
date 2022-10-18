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

namespace Google\Service\Compute;

class BackendBucket extends \Google\Collection
{
  protected $collection_key = 'customResponseHeaders';
  /**
   * @var string
   */
  public $bucketName;
  protected $cdnPolicyType = BackendBucketCdnPolicy::class;
  protected $cdnPolicyDataType = '';
  /**
   * @var string
   */
  public $compressionMode;
  /**
   * @var string
   */
  public $creationTimestamp;
  /**
   * @var string[]
   */
  public $customResponseHeaders;
  /**
   * @var string
   */
  public $description;
  /**
   * @var string
   */
  public $edgeSecurityPolicy;
  /**
   * @var bool
   */
  public $enableCdn;
  /**
   * @var string
   */
  public $id;
  /**
   * @var string
   */
  public $kind;
  /**
   * @var string
   */
  public $name;
  /**
   * @var string
   */
  public $selfLink;

  /**
   * @param string
   */
  public function setBucketName($bucketName)
  {
    $this->bucketName = $bucketName;
  }
  /**
   * @return string
   */
  public function getBucketName()
  {
    return $this->bucketName;
  }
  /**
   * @param BackendBucketCdnPolicy
   */
  public function setCdnPolicy(BackendBucketCdnPolicy $cdnPolicy)
  {
    $this->cdnPolicy = $cdnPolicy;
  }
  /**
   * @return BackendBucketCdnPolicy
   */
  public function getCdnPolicy()
  {
    return $this->cdnPolicy;
  }
  /**
   * @param string
   */
  public function setCompressionMode($compressionMode)
  {
    $this->compressionMode = $compressionMode;
  }
  /**
   * @return string
   */
  public function getCompressionMode()
  {
    return $this->compressionMode;
  }
  /**
   * @param string
   */
  public function setCreationTimestamp($creationTimestamp)
  {
    $this->creationTimestamp = $creationTimestamp;
  }
  /**
   * @return string
   */
  public function getCreationTimestamp()
  {
    return $this->creationTimestamp;
  }
  /**
   * @param string[]
   */
  public function setCustomResponseHeaders($customResponseHeaders)
  {
    $this->customResponseHeaders = $customResponseHeaders;
  }
  /**
   * @return string[]
   */
  public function getCustomResponseHeaders()
  {
    return $this->customResponseHeaders;
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
  public function setEdgeSecurityPolicy($edgeSecurityPolicy)
  {
    $this->edgeSecurityPolicy = $edgeSecurityPolicy;
  }
  /**
   * @return string
   */
  public function getEdgeSecurityPolicy()
  {
    return $this->edgeSecurityPolicy;
  }
  /**
   * @param bool
   */
  public function setEnableCdn($enableCdn)
  {
    $this->enableCdn = $enableCdn;
  }
  /**
   * @return bool
   */
  public function getEnableCdn()
  {
    return $this->enableCdn;
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
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(BackendBucket::class, 'Google_Service_Compute_BackendBucket');

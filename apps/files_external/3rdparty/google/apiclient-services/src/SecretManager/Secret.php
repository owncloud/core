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

namespace Google\Service\SecretManager;

class Secret extends \Google\Collection
{
  protected $collection_key = 'topics';
  /**
   * @var string
   */
  public $createTime;
  /**
   * @var string
   */
  public $etag;
  /**
   * @var string
   */
  public $expireTime;
  /**
   * @var string[]
   */
  public $labels;
  /**
   * @var string
   */
  public $name;
  protected $replicationType = Replication::class;
  protected $replicationDataType = '';
  protected $rotationType = Rotation::class;
  protected $rotationDataType = '';
  protected $topicsType = Topic::class;
  protected $topicsDataType = 'array';
  /**
   * @var string
   */
  public $ttl;
  /**
   * @var string[]
   */
  public $versionAliases;

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
  public function setEtag($etag)
  {
    $this->etag = $etag;
  }
  /**
   * @return string
   */
  public function getEtag()
  {
    return $this->etag;
  }
  /**
   * @param string
   */
  public function setExpireTime($expireTime)
  {
    $this->expireTime = $expireTime;
  }
  /**
   * @return string
   */
  public function getExpireTime()
  {
    return $this->expireTime;
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
   * @param Replication
   */
  public function setReplication(Replication $replication)
  {
    $this->replication = $replication;
  }
  /**
   * @return Replication
   */
  public function getReplication()
  {
    return $this->replication;
  }
  /**
   * @param Rotation
   */
  public function setRotation(Rotation $rotation)
  {
    $this->rotation = $rotation;
  }
  /**
   * @return Rotation
   */
  public function getRotation()
  {
    return $this->rotation;
  }
  /**
   * @param Topic[]
   */
  public function setTopics($topics)
  {
    $this->topics = $topics;
  }
  /**
   * @return Topic[]
   */
  public function getTopics()
  {
    return $this->topics;
  }
  /**
   * @param string
   */
  public function setTtl($ttl)
  {
    $this->ttl = $ttl;
  }
  /**
   * @return string
   */
  public function getTtl()
  {
    return $this->ttl;
  }
  /**
   * @param string[]
   */
  public function setVersionAliases($versionAliases)
  {
    $this->versionAliases = $versionAliases;
  }
  /**
   * @return string[]
   */
  public function getVersionAliases()
  {
    return $this->versionAliases;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(Secret::class, 'Google_Service_SecretManager_Secret');

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
  public $createTime;
  public $etag;
  public $expireTime;
  public $labels;
  public $name;
  protected $replicationType = Replication::class;
  protected $replicationDataType = '';
  protected $rotationType = Rotation::class;
  protected $rotationDataType = '';
  protected $topicsType = Topic::class;
  protected $topicsDataType = 'array';
  public $ttl;

  public function setCreateTime($createTime)
  {
    $this->createTime = $createTime;
  }
  public function getCreateTime()
  {
    return $this->createTime;
  }
  public function setEtag($etag)
  {
    $this->etag = $etag;
  }
  public function getEtag()
  {
    return $this->etag;
  }
  public function setExpireTime($expireTime)
  {
    $this->expireTime = $expireTime;
  }
  public function getExpireTime()
  {
    return $this->expireTime;
  }
  public function setLabels($labels)
  {
    $this->labels = $labels;
  }
  public function getLabels()
  {
    return $this->labels;
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
  public function setTtl($ttl)
  {
    $this->ttl = $ttl;
  }
  public function getTtl()
  {
    return $this->ttl;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(Secret::class, 'Google_Service_SecretManager_Secret');

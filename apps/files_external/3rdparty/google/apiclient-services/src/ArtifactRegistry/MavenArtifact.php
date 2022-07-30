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

namespace Google\Service\ArtifactRegistry;

class MavenArtifact extends \Google\Model
{
  /**
   * @var string
   */
  public $artifactId;
  /**
   * @var string
   */
  public $createTime;
  /**
   * @var string
   */
  public $groupId;
  /**
   * @var string
   */
  public $name;
  /**
   * @var string
   */
  public $pomUri;
  /**
   * @var string
   */
  public $updateTime;
  /**
   * @var string
   */
  public $version;

  /**
   * @param string
   */
  public function setArtifactId($artifactId)
  {
    $this->artifactId = $artifactId;
  }
  /**
   * @return string
   */
  public function getArtifactId()
  {
    return $this->artifactId;
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
  public function setGroupId($groupId)
  {
    $this->groupId = $groupId;
  }
  /**
   * @return string
   */
  public function getGroupId()
  {
    return $this->groupId;
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
  public function setPomUri($pomUri)
  {
    $this->pomUri = $pomUri;
  }
  /**
   * @return string
   */
  public function getPomUri()
  {
    return $this->pomUri;
  }
  /**
   * @param string
   */
  public function setUpdateTime($updateTime)
  {
    $this->updateTime = $updateTime;
  }
  /**
   * @return string
   */
  public function getUpdateTime()
  {
    return $this->updateTime;
  }
  /**
   * @param string
   */
  public function setVersion($version)
  {
    $this->version = $version;
  }
  /**
   * @return string
   */
  public function getVersion()
  {
    return $this->version;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(MavenArtifact::class, 'Google_Service_ArtifactRegistry_MavenArtifact');

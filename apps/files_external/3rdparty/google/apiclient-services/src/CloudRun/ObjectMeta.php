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

namespace Google\Service\CloudRun;

class ObjectMeta extends \Google\Collection
{
  protected $collection_key = 'ownerReferences';
  /**
   * @var string[]
   */
  public $annotations;
  /**
   * @var string
   */
  public $clusterName;
  /**
   * @var string
   */
  public $creationTimestamp;
  /**
   * @var int
   */
  public $deletionGracePeriodSeconds;
  /**
   * @var string
   */
  public $deletionTimestamp;
  /**
   * @var string[]
   */
  public $finalizers;
  /**
   * @var string
   */
  public $generateName;
  /**
   * @var int
   */
  public $generation;
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
  public $namespace;
  protected $ownerReferencesType = OwnerReference::class;
  protected $ownerReferencesDataType = 'array';
  /**
   * @var string
   */
  public $resourceVersion;
  /**
   * @var string
   */
  public $selfLink;
  /**
   * @var string
   */
  public $uid;

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
  public function setClusterName($clusterName)
  {
    $this->clusterName = $clusterName;
  }
  /**
   * @return string
   */
  public function getClusterName()
  {
    return $this->clusterName;
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
   * @param int
   */
  public function setDeletionGracePeriodSeconds($deletionGracePeriodSeconds)
  {
    $this->deletionGracePeriodSeconds = $deletionGracePeriodSeconds;
  }
  /**
   * @return int
   */
  public function getDeletionGracePeriodSeconds()
  {
    return $this->deletionGracePeriodSeconds;
  }
  /**
   * @param string
   */
  public function setDeletionTimestamp($deletionTimestamp)
  {
    $this->deletionTimestamp = $deletionTimestamp;
  }
  /**
   * @return string
   */
  public function getDeletionTimestamp()
  {
    return $this->deletionTimestamp;
  }
  /**
   * @param string[]
   */
  public function setFinalizers($finalizers)
  {
    $this->finalizers = $finalizers;
  }
  /**
   * @return string[]
   */
  public function getFinalizers()
  {
    return $this->finalizers;
  }
  /**
   * @param string
   */
  public function setGenerateName($generateName)
  {
    $this->generateName = $generateName;
  }
  /**
   * @return string
   */
  public function getGenerateName()
  {
    return $this->generateName;
  }
  /**
   * @param int
   */
  public function setGeneration($generation)
  {
    $this->generation = $generation;
  }
  /**
   * @return int
   */
  public function getGeneration()
  {
    return $this->generation;
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
  public function setNamespace($namespace)
  {
    $this->namespace = $namespace;
  }
  /**
   * @return string
   */
  public function getNamespace()
  {
    return $this->namespace;
  }
  /**
   * @param OwnerReference[]
   */
  public function setOwnerReferences($ownerReferences)
  {
    $this->ownerReferences = $ownerReferences;
  }
  /**
   * @return OwnerReference[]
   */
  public function getOwnerReferences()
  {
    return $this->ownerReferences;
  }
  /**
   * @param string
   */
  public function setResourceVersion($resourceVersion)
  {
    $this->resourceVersion = $resourceVersion;
  }
  /**
   * @return string
   */
  public function getResourceVersion()
  {
    return $this->resourceVersion;
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
  /**
   * @param string
   */
  public function setUid($uid)
  {
    $this->uid = $uid;
  }
  /**
   * @return string
   */
  public function getUid()
  {
    return $this->uid;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(ObjectMeta::class, 'Google_Service_CloudRun_ObjectMeta');

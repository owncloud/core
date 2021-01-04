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

class Google_Service_CloudRun_ObjectMeta extends Google_Collection
{
  protected $collection_key = 'ownerReferences';
  public $annotations;
  public $clusterName;
  public $creationTimestamp;
  public $deletionGracePeriodSeconds;
  public $deletionTimestamp;
  public $finalizers;
  public $generateName;
  public $generation;
  public $labels;
  public $name;
  public $namespace;
  protected $ownerReferencesType = 'Google_Service_CloudRun_OwnerReference';
  protected $ownerReferencesDataType = 'array';
  public $resourceVersion;
  public $selfLink;
  public $uid;

  public function setAnnotations($annotations)
  {
    $this->annotations = $annotations;
  }
  public function getAnnotations()
  {
    return $this->annotations;
  }
  public function setClusterName($clusterName)
  {
    $this->clusterName = $clusterName;
  }
  public function getClusterName()
  {
    return $this->clusterName;
  }
  public function setCreationTimestamp($creationTimestamp)
  {
    $this->creationTimestamp = $creationTimestamp;
  }
  public function getCreationTimestamp()
  {
    return $this->creationTimestamp;
  }
  public function setDeletionGracePeriodSeconds($deletionGracePeriodSeconds)
  {
    $this->deletionGracePeriodSeconds = $deletionGracePeriodSeconds;
  }
  public function getDeletionGracePeriodSeconds()
  {
    return $this->deletionGracePeriodSeconds;
  }
  public function setDeletionTimestamp($deletionTimestamp)
  {
    $this->deletionTimestamp = $deletionTimestamp;
  }
  public function getDeletionTimestamp()
  {
    return $this->deletionTimestamp;
  }
  public function setFinalizers($finalizers)
  {
    $this->finalizers = $finalizers;
  }
  public function getFinalizers()
  {
    return $this->finalizers;
  }
  public function setGenerateName($generateName)
  {
    $this->generateName = $generateName;
  }
  public function getGenerateName()
  {
    return $this->generateName;
  }
  public function setGeneration($generation)
  {
    $this->generation = $generation;
  }
  public function getGeneration()
  {
    return $this->generation;
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
  public function setNamespace($namespace)
  {
    $this->namespace = $namespace;
  }
  public function getNamespace()
  {
    return $this->namespace;
  }
  /**
   * @param Google_Service_CloudRun_OwnerReference[]
   */
  public function setOwnerReferences($ownerReferences)
  {
    $this->ownerReferences = $ownerReferences;
  }
  /**
   * @return Google_Service_CloudRun_OwnerReference[]
   */
  public function getOwnerReferences()
  {
    return $this->ownerReferences;
  }
  public function setResourceVersion($resourceVersion)
  {
    $this->resourceVersion = $resourceVersion;
  }
  public function getResourceVersion()
  {
    return $this->resourceVersion;
  }
  public function setSelfLink($selfLink)
  {
    $this->selfLink = $selfLink;
  }
  public function getSelfLink()
  {
    return $this->selfLink;
  }
  public function setUid($uid)
  {
    $this->uid = $uid;
  }
  public function getUid()
  {
    return $this->uid;
  }
}

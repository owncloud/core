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

namespace Google\Service\CloudDeploy;

class Release extends \Google\Collection
{
  protected $collection_key = 'targetSnapshots';
  /**
   * @var bool
   */
  public $abandoned;
  /**
   * @var string[]
   */
  public $annotations;
  protected $buildArtifactsType = BuildArtifact::class;
  protected $buildArtifactsDataType = 'array';
  /**
   * @var string
   */
  public $createTime;
  protected $deliveryPipelineSnapshotType = DeliveryPipeline::class;
  protected $deliveryPipelineSnapshotDataType = '';
  /**
   * @var string
   */
  public $description;
  /**
   * @var string
   */
  public $etag;
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
  public $renderEndTime;
  /**
   * @var string
   */
  public $renderStartTime;
  /**
   * @var string
   */
  public $renderState;
  /**
   * @var string
   */
  public $skaffoldConfigPath;
  /**
   * @var string
   */
  public $skaffoldConfigUri;
  /**
   * @var string
   */
  public $skaffoldVersion;
  protected $targetArtifactsType = TargetArtifact::class;
  protected $targetArtifactsDataType = 'map';
  protected $targetRendersType = TargetRender::class;
  protected $targetRendersDataType = 'map';
  protected $targetSnapshotsType = Target::class;
  protected $targetSnapshotsDataType = 'array';
  /**
   * @var string
   */
  public $uid;

  /**
   * @param bool
   */
  public function setAbandoned($abandoned)
  {
    $this->abandoned = $abandoned;
  }
  /**
   * @return bool
   */
  public function getAbandoned()
  {
    return $this->abandoned;
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
   * @param BuildArtifact[]
   */
  public function setBuildArtifacts($buildArtifacts)
  {
    $this->buildArtifacts = $buildArtifacts;
  }
  /**
   * @return BuildArtifact[]
   */
  public function getBuildArtifacts()
  {
    return $this->buildArtifacts;
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
   * @param DeliveryPipeline
   */
  public function setDeliveryPipelineSnapshot(DeliveryPipeline $deliveryPipelineSnapshot)
  {
    $this->deliveryPipelineSnapshot = $deliveryPipelineSnapshot;
  }
  /**
   * @return DeliveryPipeline
   */
  public function getDeliveryPipelineSnapshot()
  {
    return $this->deliveryPipelineSnapshot;
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
  public function setRenderEndTime($renderEndTime)
  {
    $this->renderEndTime = $renderEndTime;
  }
  /**
   * @return string
   */
  public function getRenderEndTime()
  {
    return $this->renderEndTime;
  }
  /**
   * @param string
   */
  public function setRenderStartTime($renderStartTime)
  {
    $this->renderStartTime = $renderStartTime;
  }
  /**
   * @return string
   */
  public function getRenderStartTime()
  {
    return $this->renderStartTime;
  }
  /**
   * @param string
   */
  public function setRenderState($renderState)
  {
    $this->renderState = $renderState;
  }
  /**
   * @return string
   */
  public function getRenderState()
  {
    return $this->renderState;
  }
  /**
   * @param string
   */
  public function setSkaffoldConfigPath($skaffoldConfigPath)
  {
    $this->skaffoldConfigPath = $skaffoldConfigPath;
  }
  /**
   * @return string
   */
  public function getSkaffoldConfigPath()
  {
    return $this->skaffoldConfigPath;
  }
  /**
   * @param string
   */
  public function setSkaffoldConfigUri($skaffoldConfigUri)
  {
    $this->skaffoldConfigUri = $skaffoldConfigUri;
  }
  /**
   * @return string
   */
  public function getSkaffoldConfigUri()
  {
    return $this->skaffoldConfigUri;
  }
  /**
   * @param string
   */
  public function setSkaffoldVersion($skaffoldVersion)
  {
    $this->skaffoldVersion = $skaffoldVersion;
  }
  /**
   * @return string
   */
  public function getSkaffoldVersion()
  {
    return $this->skaffoldVersion;
  }
  /**
   * @param TargetArtifact[]
   */
  public function setTargetArtifacts($targetArtifacts)
  {
    $this->targetArtifacts = $targetArtifacts;
  }
  /**
   * @return TargetArtifact[]
   */
  public function getTargetArtifacts()
  {
    return $this->targetArtifacts;
  }
  /**
   * @param TargetRender[]
   */
  public function setTargetRenders($targetRenders)
  {
    $this->targetRenders = $targetRenders;
  }
  /**
   * @return TargetRender[]
   */
  public function getTargetRenders()
  {
    return $this->targetRenders;
  }
  /**
   * @param Target[]
   */
  public function setTargetSnapshots($targetSnapshots)
  {
    $this->targetSnapshots = $targetSnapshots;
  }
  /**
   * @return Target[]
   */
  public function getTargetSnapshots()
  {
    return $this->targetSnapshots;
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
class_alias(Release::class, 'Google_Service_CloudDeploy_Release');

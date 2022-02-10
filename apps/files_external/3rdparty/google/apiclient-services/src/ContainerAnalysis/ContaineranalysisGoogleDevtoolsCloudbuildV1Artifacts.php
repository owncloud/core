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

namespace Google\Service\ContainerAnalysis;

class ContaineranalysisGoogleDevtoolsCloudbuildV1Artifacts extends \Google\Collection
{
  protected $collection_key = 'images';
  /**
   * @var string[]
   */
  public $images;
  protected $objectsType = ContaineranalysisGoogleDevtoolsCloudbuildV1ArtifactsArtifactObjects::class;
  protected $objectsDataType = '';

  /**
   * @param string[]
   */
  public function setImages($images)
  {
    $this->images = $images;
  }
  /**
   * @return string[]
   */
  public function getImages()
  {
    return $this->images;
  }
  /**
   * @param ContaineranalysisGoogleDevtoolsCloudbuildV1ArtifactsArtifactObjects
   */
  public function setObjects(ContaineranalysisGoogleDevtoolsCloudbuildV1ArtifactsArtifactObjects $objects)
  {
    $this->objects = $objects;
  }
  /**
   * @return ContaineranalysisGoogleDevtoolsCloudbuildV1ArtifactsArtifactObjects
   */
  public function getObjects()
  {
    return $this->objects;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(ContaineranalysisGoogleDevtoolsCloudbuildV1Artifacts::class, 'Google_Service_ContainerAnalysis_ContaineranalysisGoogleDevtoolsCloudbuildV1Artifacts');

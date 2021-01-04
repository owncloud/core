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

class Google_Service_CloudBuild_Results extends Google_Collection
{
  protected $collection_key = 'images';
  public $artifactManifest;
  protected $artifactTimingType = 'Google_Service_CloudBuild_TimeSpan';
  protected $artifactTimingDataType = '';
  public $buildStepImages;
  public $buildStepOutputs;
  protected $imagesType = 'Google_Service_CloudBuild_BuiltImage';
  protected $imagesDataType = 'array';
  public $numArtifacts;

  public function setArtifactManifest($artifactManifest)
  {
    $this->artifactManifest = $artifactManifest;
  }
  public function getArtifactManifest()
  {
    return $this->artifactManifest;
  }
  /**
   * @param Google_Service_CloudBuild_TimeSpan
   */
  public function setArtifactTiming(Google_Service_CloudBuild_TimeSpan $artifactTiming)
  {
    $this->artifactTiming = $artifactTiming;
  }
  /**
   * @return Google_Service_CloudBuild_TimeSpan
   */
  public function getArtifactTiming()
  {
    return $this->artifactTiming;
  }
  public function setBuildStepImages($buildStepImages)
  {
    $this->buildStepImages = $buildStepImages;
  }
  public function getBuildStepImages()
  {
    return $this->buildStepImages;
  }
  public function setBuildStepOutputs($buildStepOutputs)
  {
    $this->buildStepOutputs = $buildStepOutputs;
  }
  public function getBuildStepOutputs()
  {
    return $this->buildStepOutputs;
  }
  /**
   * @param Google_Service_CloudBuild_BuiltImage[]
   */
  public function setImages($images)
  {
    $this->images = $images;
  }
  /**
   * @return Google_Service_CloudBuild_BuiltImage[]
   */
  public function getImages()
  {
    return $this->images;
  }
  public function setNumArtifacts($numArtifacts)
  {
    $this->numArtifacts = $numArtifacts;
  }
  public function getNumArtifacts()
  {
    return $this->numArtifacts;
  }
}

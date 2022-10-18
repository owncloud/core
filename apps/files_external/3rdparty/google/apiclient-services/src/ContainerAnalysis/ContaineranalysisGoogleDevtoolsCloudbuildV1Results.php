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

class ContaineranalysisGoogleDevtoolsCloudbuildV1Results extends \Google\Collection
{
  protected $collection_key = 'pythonPackages';
  /**
   * @var string
   */
  public $artifactManifest;
  protected $artifactTimingType = ContaineranalysisGoogleDevtoolsCloudbuildV1TimeSpan::class;
  protected $artifactTimingDataType = '';
  /**
   * @var string[]
   */
  public $buildStepImages;
  /**
   * @var string[]
   */
  public $buildStepOutputs;
  protected $imagesType = ContaineranalysisGoogleDevtoolsCloudbuildV1BuiltImage::class;
  protected $imagesDataType = 'array';
  protected $mavenArtifactsType = ContaineranalysisGoogleDevtoolsCloudbuildV1UploadedMavenArtifact::class;
  protected $mavenArtifactsDataType = 'array';
  /**
   * @var string
   */
  public $numArtifacts;
  protected $pythonPackagesType = ContaineranalysisGoogleDevtoolsCloudbuildV1UploadedPythonPackage::class;
  protected $pythonPackagesDataType = 'array';

  /**
   * @param string
   */
  public function setArtifactManifest($artifactManifest)
  {
    $this->artifactManifest = $artifactManifest;
  }
  /**
   * @return string
   */
  public function getArtifactManifest()
  {
    return $this->artifactManifest;
  }
  /**
   * @param ContaineranalysisGoogleDevtoolsCloudbuildV1TimeSpan
   */
  public function setArtifactTiming(ContaineranalysisGoogleDevtoolsCloudbuildV1TimeSpan $artifactTiming)
  {
    $this->artifactTiming = $artifactTiming;
  }
  /**
   * @return ContaineranalysisGoogleDevtoolsCloudbuildV1TimeSpan
   */
  public function getArtifactTiming()
  {
    return $this->artifactTiming;
  }
  /**
   * @param string[]
   */
  public function setBuildStepImages($buildStepImages)
  {
    $this->buildStepImages = $buildStepImages;
  }
  /**
   * @return string[]
   */
  public function getBuildStepImages()
  {
    return $this->buildStepImages;
  }
  /**
   * @param string[]
   */
  public function setBuildStepOutputs($buildStepOutputs)
  {
    $this->buildStepOutputs = $buildStepOutputs;
  }
  /**
   * @return string[]
   */
  public function getBuildStepOutputs()
  {
    return $this->buildStepOutputs;
  }
  /**
   * @param ContaineranalysisGoogleDevtoolsCloudbuildV1BuiltImage[]
   */
  public function setImages($images)
  {
    $this->images = $images;
  }
  /**
   * @return ContaineranalysisGoogleDevtoolsCloudbuildV1BuiltImage[]
   */
  public function getImages()
  {
    return $this->images;
  }
  /**
   * @param ContaineranalysisGoogleDevtoolsCloudbuildV1UploadedMavenArtifact[]
   */
  public function setMavenArtifacts($mavenArtifacts)
  {
    $this->mavenArtifacts = $mavenArtifacts;
  }
  /**
   * @return ContaineranalysisGoogleDevtoolsCloudbuildV1UploadedMavenArtifact[]
   */
  public function getMavenArtifacts()
  {
    return $this->mavenArtifacts;
  }
  /**
   * @param string
   */
  public function setNumArtifacts($numArtifacts)
  {
    $this->numArtifacts = $numArtifacts;
  }
  /**
   * @return string
   */
  public function getNumArtifacts()
  {
    return $this->numArtifacts;
  }
  /**
   * @param ContaineranalysisGoogleDevtoolsCloudbuildV1UploadedPythonPackage[]
   */
  public function setPythonPackages($pythonPackages)
  {
    $this->pythonPackages = $pythonPackages;
  }
  /**
   * @return ContaineranalysisGoogleDevtoolsCloudbuildV1UploadedPythonPackage[]
   */
  public function getPythonPackages()
  {
    return $this->pythonPackages;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(ContaineranalysisGoogleDevtoolsCloudbuildV1Results::class, 'Google_Service_ContainerAnalysis_ContaineranalysisGoogleDevtoolsCloudbuildV1Results');

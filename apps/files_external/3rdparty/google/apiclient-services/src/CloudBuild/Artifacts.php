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

namespace Google\Service\CloudBuild;

class Artifacts extends \Google\Collection
{
  protected $collection_key = 'pythonPackages';
  /**
   * @var string[]
   */
  public $images;
  protected $mavenArtifactsType = MavenArtifact::class;
  protected $mavenArtifactsDataType = 'array';
  protected $objectsType = ArtifactObjects::class;
  protected $objectsDataType = '';
  protected $pythonPackagesType = PythonPackage::class;
  protected $pythonPackagesDataType = 'array';

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
   * @param MavenArtifact[]
   */
  public function setMavenArtifacts($mavenArtifacts)
  {
    $this->mavenArtifacts = $mavenArtifacts;
  }
  /**
   * @return MavenArtifact[]
   */
  public function getMavenArtifacts()
  {
    return $this->mavenArtifacts;
  }
  /**
   * @param ArtifactObjects
   */
  public function setObjects(ArtifactObjects $objects)
  {
    $this->objects = $objects;
  }
  /**
   * @return ArtifactObjects
   */
  public function getObjects()
  {
    return $this->objects;
  }
  /**
   * @param PythonPackage[]
   */
  public function setPythonPackages($pythonPackages)
  {
    $this->pythonPackages = $pythonPackages;
  }
  /**
   * @return PythonPackage[]
   */
  public function getPythonPackages()
  {
    return $this->pythonPackages;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(Artifacts::class, 'Google_Service_CloudBuild_Artifacts');

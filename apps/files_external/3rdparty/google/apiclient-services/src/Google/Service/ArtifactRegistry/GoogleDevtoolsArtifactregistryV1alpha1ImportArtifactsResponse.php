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

class Google_Service_ArtifactRegistry_GoogleDevtoolsArtifactregistryV1alpha1ImportArtifactsResponse extends Google_Collection
{
  protected $collection_key = 'packages';
  protected $errorsType = 'Google_Service_ArtifactRegistry_GoogleDevtoolsArtifactregistryV1alpha1ErrorInfo';
  protected $errorsDataType = 'array';
  protected $packagesType = 'Google_Service_ArtifactRegistry_GoogleDevtoolsArtifactregistryV1alpha1Package';
  protected $packagesDataType = 'array';

  /**
   * @param Google_Service_ArtifactRegistry_GoogleDevtoolsArtifactregistryV1alpha1ErrorInfo[]
   */
  public function setErrors($errors)
  {
    $this->errors = $errors;
  }
  /**
   * @return Google_Service_ArtifactRegistry_GoogleDevtoolsArtifactregistryV1alpha1ErrorInfo[]
   */
  public function getErrors()
  {
    return $this->errors;
  }
  /**
   * @param Google_Service_ArtifactRegistry_GoogleDevtoolsArtifactregistryV1alpha1Package[]
   */
  public function setPackages($packages)
  {
    $this->packages = $packages;
  }
  /**
   * @return Google_Service_ArtifactRegistry_GoogleDevtoolsArtifactregistryV1alpha1Package[]
   */
  public function getPackages()
  {
    return $this->packages;
  }
}

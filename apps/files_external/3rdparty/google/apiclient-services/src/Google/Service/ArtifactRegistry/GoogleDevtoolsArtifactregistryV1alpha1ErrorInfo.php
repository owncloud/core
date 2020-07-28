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

class Google_Service_ArtifactRegistry_GoogleDevtoolsArtifactregistryV1alpha1ErrorInfo extends Google_Model
{
  protected $errorType = 'Google_Service_ArtifactRegistry_Status';
  protected $errorDataType = '';
  protected $gcsSourceType = 'Google_Service_ArtifactRegistry_GoogleDevtoolsArtifactregistryV1alpha1GcsSource';
  protected $gcsSourceDataType = '';

  /**
   * @param Google_Service_ArtifactRegistry_Status
   */
  public function setError(Google_Service_ArtifactRegistry_Status $error)
  {
    $this->error = $error;
  }
  /**
   * @return Google_Service_ArtifactRegistry_Status
   */
  public function getError()
  {
    return $this->error;
  }
  /**
   * @param Google_Service_ArtifactRegistry_GoogleDevtoolsArtifactregistryV1alpha1GcsSource
   */
  public function setGcsSource(Google_Service_ArtifactRegistry_GoogleDevtoolsArtifactregistryV1alpha1GcsSource $gcsSource)
  {
    $this->gcsSource = $gcsSource;
  }
  /**
   * @return Google_Service_ArtifactRegistry_GoogleDevtoolsArtifactregistryV1alpha1GcsSource
   */
  public function getGcsSource()
  {
    return $this->gcsSource;
  }
}

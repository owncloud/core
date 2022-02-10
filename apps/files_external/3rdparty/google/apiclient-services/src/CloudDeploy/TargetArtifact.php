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

class TargetArtifact extends \Google\Model
{
  /**
   * @var string
   */
  public $artifactUri;
  /**
   * @var string
   */
  public $manifestPath;
  /**
   * @var string
   */
  public $skaffoldConfigPath;

  /**
   * @param string
   */
  public function setArtifactUri($artifactUri)
  {
    $this->artifactUri = $artifactUri;
  }
  /**
   * @return string
   */
  public function getArtifactUri()
  {
    return $this->artifactUri;
  }
  /**
   * @param string
   */
  public function setManifestPath($manifestPath)
  {
    $this->manifestPath = $manifestPath;
  }
  /**
   * @return string
   */
  public function getManifestPath()
  {
    return $this->manifestPath;
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
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(TargetArtifact::class, 'Google_Service_CloudDeploy_TargetArtifact');

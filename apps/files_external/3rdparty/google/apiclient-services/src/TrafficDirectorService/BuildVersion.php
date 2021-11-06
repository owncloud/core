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

namespace Google\Service\TrafficDirectorService;

class BuildVersion extends \Google\Model
{
  public $metadata;
  protected $versionType = SemanticVersion::class;
  protected $versionDataType = '';

  public function setMetadata($metadata)
  {
    $this->metadata = $metadata;
  }
  public function getMetadata()
  {
    return $this->metadata;
  }
  /**
   * @param SemanticVersion
   */
  public function setVersion(SemanticVersion $version)
  {
    $this->version = $version;
  }
  /**
   * @return SemanticVersion
   */
  public function getVersion()
  {
    return $this->version;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(BuildVersion::class, 'Google_Service_TrafficDirectorService_BuildVersion');

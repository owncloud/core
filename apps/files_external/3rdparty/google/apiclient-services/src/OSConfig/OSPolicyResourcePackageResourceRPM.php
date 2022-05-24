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

namespace Google\Service\OSConfig;

class OSPolicyResourcePackageResourceRPM extends \Google\Model
{
  /**
   * @var bool
   */
  public $pullDeps;
  protected $sourceType = OSPolicyResourceFile::class;
  protected $sourceDataType = '';

  /**
   * @param bool
   */
  public function setPullDeps($pullDeps)
  {
    $this->pullDeps = $pullDeps;
  }
  /**
   * @return bool
   */
  public function getPullDeps()
  {
    return $this->pullDeps;
  }
  /**
   * @param OSPolicyResourceFile
   */
  public function setSource(OSPolicyResourceFile $source)
  {
    $this->source = $source;
  }
  /**
   * @return OSPolicyResourceFile
   */
  public function getSource()
  {
    return $this->source;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(OSPolicyResourcePackageResourceRPM::class, 'Google_Service_OSConfig_OSPolicyResourcePackageResourceRPM');

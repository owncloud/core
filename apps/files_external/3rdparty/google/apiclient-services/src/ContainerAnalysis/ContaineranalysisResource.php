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

class ContaineranalysisResource extends \Google\Model
{
  protected $contentHashType = Hash::class;
  protected $contentHashDataType = '';
  public $name;
  public $uri;

  /**
   * @param Hash
   */
  public function setContentHash(Hash $contentHash)
  {
    $this->contentHash = $contentHash;
  }
  /**
   * @return Hash
   */
  public function getContentHash()
  {
    return $this->contentHash;
  }
  public function setName($name)
  {
    $this->name = $name;
  }
  public function getName()
  {
    return $this->name;
  }
  public function setUri($uri)
  {
    $this->uri = $uri;
  }
  public function getUri()
  {
    return $this->uri;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(ContaineranalysisResource::class, 'Google_Service_ContainerAnalysis_ContaineranalysisResource');

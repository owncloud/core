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

namespace Google\Service\AccessContextManager;

class IngressFrom extends \Google\Collection
{
  protected $collection_key = 'sources';
  public $identities;
  public $identityType;
  protected $sourcesType = IngressSource::class;
  protected $sourcesDataType = 'array';

  public function setIdentities($identities)
  {
    $this->identities = $identities;
  }
  public function getIdentities()
  {
    return $this->identities;
  }
  public function setIdentityType($identityType)
  {
    $this->identityType = $identityType;
  }
  public function getIdentityType()
  {
    return $this->identityType;
  }
  /**
   * @param IngressSource[]
   */
  public function setSources($sources)
  {
    $this->sources = $sources;
  }
  /**
   * @return IngressSource[]
   */
  public function getSources()
  {
    return $this->sources;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(IngressFrom::class, 'Google_Service_AccessContextManager_IngressFrom');

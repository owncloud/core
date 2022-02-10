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

namespace Google\Service\DeploymentManager;

class GlobalSetPolicyRequest extends \Google\Collection
{
  protected $collection_key = 'bindings';
  protected $bindingsType = Binding::class;
  protected $bindingsDataType = 'array';
  /**
   * @var string
   */
  public $etag;
  protected $policyType = Policy::class;
  protected $policyDataType = '';

  /**
   * @param Binding[]
   */
  public function setBindings($bindings)
  {
    $this->bindings = $bindings;
  }
  /**
   * @return Binding[]
   */
  public function getBindings()
  {
    return $this->bindings;
  }
  /**
   * @param string
   */
  public function setEtag($etag)
  {
    $this->etag = $etag;
  }
  /**
   * @return string
   */
  public function getEtag()
  {
    return $this->etag;
  }
  /**
   * @param Policy
   */
  public function setPolicy(Policy $policy)
  {
    $this->policy = $policy;
  }
  /**
   * @return Policy
   */
  public function getPolicy()
  {
    return $this->policy;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(GlobalSetPolicyRequest::class, 'Google_Service_DeploymentManager_GlobalSetPolicyRequest');

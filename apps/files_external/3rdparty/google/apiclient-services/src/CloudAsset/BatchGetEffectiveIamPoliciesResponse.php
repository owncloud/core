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

namespace Google\Service\CloudAsset;

class BatchGetEffectiveIamPoliciesResponse extends \Google\Collection
{
  protected $collection_key = 'policyResults';
  protected $policyResultsType = EffectiveIamPolicy::class;
  protected $policyResultsDataType = 'array';

  /**
   * @param EffectiveIamPolicy[]
   */
  public function setPolicyResults($policyResults)
  {
    $this->policyResults = $policyResults;
  }
  /**
   * @return EffectiveIamPolicy[]
   */
  public function getPolicyResults()
  {
    return $this->policyResults;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(BatchGetEffectiveIamPoliciesResponse::class, 'Google_Service_CloudAsset_BatchGetEffectiveIamPoliciesResponse');

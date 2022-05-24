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

namespace Google\Service\CloudSecurityToken;

class GoogleIdentityStsV1betaAccessBoundary extends \Google\Collection
{
  protected $collection_key = 'accessBoundaryRules';
  protected $accessBoundaryRulesType = GoogleIdentityStsV1betaAccessBoundaryRule::class;
  protected $accessBoundaryRulesDataType = 'array';

  /**
   * @param GoogleIdentityStsV1betaAccessBoundaryRule[]
   */
  public function setAccessBoundaryRules($accessBoundaryRules)
  {
    $this->accessBoundaryRules = $accessBoundaryRules;
  }
  /**
   * @return GoogleIdentityStsV1betaAccessBoundaryRule[]
   */
  public function getAccessBoundaryRules()
  {
    return $this->accessBoundaryRules;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(GoogleIdentityStsV1betaAccessBoundary::class, 'Google_Service_CloudSecurityToken_GoogleIdentityStsV1betaAccessBoundary');

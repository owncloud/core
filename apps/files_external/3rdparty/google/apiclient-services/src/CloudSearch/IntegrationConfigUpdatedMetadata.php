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

namespace Google\Service\CloudSearch;

class IntegrationConfigUpdatedMetadata extends \Google\Collection
{
  protected $collection_key = 'mutations';
  protected $initiatorIdType = UserId::class;
  protected $initiatorIdDataType = '';
  protected $mutationsType = IntegrationConfigMutation::class;
  protected $mutationsDataType = 'array';

  /**
   * @param UserId
   */
  public function setInitiatorId(UserId $initiatorId)
  {
    $this->initiatorId = $initiatorId;
  }
  /**
   * @return UserId
   */
  public function getInitiatorId()
  {
    return $this->initiatorId;
  }
  /**
   * @param IntegrationConfigMutation[]
   */
  public function setMutations($mutations)
  {
    $this->mutations = $mutations;
  }
  /**
   * @return IntegrationConfigMutation[]
   */
  public function getMutations()
  {
    return $this->mutations;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(IntegrationConfigUpdatedMetadata::class, 'Google_Service_CloudSearch_IntegrationConfigUpdatedMetadata');

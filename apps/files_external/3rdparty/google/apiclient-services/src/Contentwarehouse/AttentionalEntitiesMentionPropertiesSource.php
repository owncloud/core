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

namespace Google\Service\Contentwarehouse;

class AttentionalEntitiesMentionPropertiesSource extends \Google\Model
{
  protected $clientType = AttentionalEntitiesMentionPropertiesSourceClient::class;
  protected $clientDataType = '';
  protected $systemType = AttentionalEntitiesMentionPropertiesSourceSystem::class;
  protected $systemDataType = '';
  protected $userType = AttentionalEntitiesMentionPropertiesSourceUser::class;
  protected $userDataType = '';

  /**
   * @param AttentionalEntitiesMentionPropertiesSourceClient
   */
  public function setClient(AttentionalEntitiesMentionPropertiesSourceClient $client)
  {
    $this->client = $client;
  }
  /**
   * @return AttentionalEntitiesMentionPropertiesSourceClient
   */
  public function getClient()
  {
    return $this->client;
  }
  /**
   * @param AttentionalEntitiesMentionPropertiesSourceSystem
   */
  public function setSystem(AttentionalEntitiesMentionPropertiesSourceSystem $system)
  {
    $this->system = $system;
  }
  /**
   * @return AttentionalEntitiesMentionPropertiesSourceSystem
   */
  public function getSystem()
  {
    return $this->system;
  }
  /**
   * @param AttentionalEntitiesMentionPropertiesSourceUser
   */
  public function setUser(AttentionalEntitiesMentionPropertiesSourceUser $user)
  {
    $this->user = $user;
  }
  /**
   * @return AttentionalEntitiesMentionPropertiesSourceUser
   */
  public function getUser()
  {
    return $this->user;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(AttentionalEntitiesMentionPropertiesSource::class, 'Google_Service_Contentwarehouse_AttentionalEntitiesMentionPropertiesSource');

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

namespace Google\Service\ServiceConsumerManagement;

class V1Beta1GenerateServiceIdentityResponse extends \Google\Model
{
  protected $identityType = V1Beta1ServiceIdentity::class;
  protected $identityDataType = '';

  /**
   * @param V1Beta1ServiceIdentity
   */
  public function setIdentity(V1Beta1ServiceIdentity $identity)
  {
    $this->identity = $identity;
  }
  /**
   * @return V1Beta1ServiceIdentity
   */
  public function getIdentity()
  {
    return $this->identity;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(V1Beta1GenerateServiceIdentityResponse::class, 'Google_Service_ServiceConsumerManagement_V1Beta1GenerateServiceIdentityResponse');

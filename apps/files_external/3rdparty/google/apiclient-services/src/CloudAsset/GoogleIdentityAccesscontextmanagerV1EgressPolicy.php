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

class GoogleIdentityAccesscontextmanagerV1EgressPolicy extends \Google\Model
{
  protected $egressFromType = GoogleIdentityAccesscontextmanagerV1EgressFrom::class;
  protected $egressFromDataType = '';
  protected $egressToType = GoogleIdentityAccesscontextmanagerV1EgressTo::class;
  protected $egressToDataType = '';

  /**
   * @param GoogleIdentityAccesscontextmanagerV1EgressFrom
   */
  public function setEgressFrom(GoogleIdentityAccesscontextmanagerV1EgressFrom $egressFrom)
  {
    $this->egressFrom = $egressFrom;
  }
  /**
   * @return GoogleIdentityAccesscontextmanagerV1EgressFrom
   */
  public function getEgressFrom()
  {
    return $this->egressFrom;
  }
  /**
   * @param GoogleIdentityAccesscontextmanagerV1EgressTo
   */
  public function setEgressTo(GoogleIdentityAccesscontextmanagerV1EgressTo $egressTo)
  {
    $this->egressTo = $egressTo;
  }
  /**
   * @return GoogleIdentityAccesscontextmanagerV1EgressTo
   */
  public function getEgressTo()
  {
    return $this->egressTo;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(GoogleIdentityAccesscontextmanagerV1EgressPolicy::class, 'Google_Service_CloudAsset_GoogleIdentityAccesscontextmanagerV1EgressPolicy');

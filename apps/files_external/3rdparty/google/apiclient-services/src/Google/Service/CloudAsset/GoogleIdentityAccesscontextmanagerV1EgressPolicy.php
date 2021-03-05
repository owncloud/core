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

class Google_Service_CloudAsset_GoogleIdentityAccesscontextmanagerV1EgressPolicy extends Google_Model
{
  protected $egressFromType = 'Google_Service_CloudAsset_GoogleIdentityAccesscontextmanagerV1EgressFrom';
  protected $egressFromDataType = '';
  protected $egressToType = 'Google_Service_CloudAsset_GoogleIdentityAccesscontextmanagerV1EgressTo';
  protected $egressToDataType = '';

  /**
   * @param Google_Service_CloudAsset_GoogleIdentityAccesscontextmanagerV1EgressFrom
   */
  public function setEgressFrom(Google_Service_CloudAsset_GoogleIdentityAccesscontextmanagerV1EgressFrom $egressFrom)
  {
    $this->egressFrom = $egressFrom;
  }
  /**
   * @return Google_Service_CloudAsset_GoogleIdentityAccesscontextmanagerV1EgressFrom
   */
  public function getEgressFrom()
  {
    return $this->egressFrom;
  }
  /**
   * @param Google_Service_CloudAsset_GoogleIdentityAccesscontextmanagerV1EgressTo
   */
  public function setEgressTo(Google_Service_CloudAsset_GoogleIdentityAccesscontextmanagerV1EgressTo $egressTo)
  {
    $this->egressTo = $egressTo;
  }
  /**
   * @return Google_Service_CloudAsset_GoogleIdentityAccesscontextmanagerV1EgressTo
   */
  public function getEgressTo()
  {
    return $this->egressTo;
  }
}

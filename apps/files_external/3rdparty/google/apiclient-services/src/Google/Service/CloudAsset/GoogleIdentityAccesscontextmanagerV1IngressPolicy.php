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

class Google_Service_CloudAsset_GoogleIdentityAccesscontextmanagerV1IngressPolicy extends Google_Model
{
  protected $ingressFromType = 'Google_Service_CloudAsset_GoogleIdentityAccesscontextmanagerV1IngressFrom';
  protected $ingressFromDataType = '';
  protected $ingressToType = 'Google_Service_CloudAsset_GoogleIdentityAccesscontextmanagerV1IngressTo';
  protected $ingressToDataType = '';

  /**
   * @param Google_Service_CloudAsset_GoogleIdentityAccesscontextmanagerV1IngressFrom
   */
  public function setIngressFrom(Google_Service_CloudAsset_GoogleIdentityAccesscontextmanagerV1IngressFrom $ingressFrom)
  {
    $this->ingressFrom = $ingressFrom;
  }
  /**
   * @return Google_Service_CloudAsset_GoogleIdentityAccesscontextmanagerV1IngressFrom
   */
  public function getIngressFrom()
  {
    return $this->ingressFrom;
  }
  /**
   * @param Google_Service_CloudAsset_GoogleIdentityAccesscontextmanagerV1IngressTo
   */
  public function setIngressTo(Google_Service_CloudAsset_GoogleIdentityAccesscontextmanagerV1IngressTo $ingressTo)
  {
    $this->ingressTo = $ingressTo;
  }
  /**
   * @return Google_Service_CloudAsset_GoogleIdentityAccesscontextmanagerV1IngressTo
   */
  public function getIngressTo()
  {
    return $this->ingressTo;
  }
}

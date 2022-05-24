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

class GoogleIdentityAccesscontextmanagerV1IngressPolicy extends \Google\Model
{
  protected $ingressFromType = GoogleIdentityAccesscontextmanagerV1IngressFrom::class;
  protected $ingressFromDataType = '';
  protected $ingressToType = GoogleIdentityAccesscontextmanagerV1IngressTo::class;
  protected $ingressToDataType = '';

  /**
   * @param GoogleIdentityAccesscontextmanagerV1IngressFrom
   */
  public function setIngressFrom(GoogleIdentityAccesscontextmanagerV1IngressFrom $ingressFrom)
  {
    $this->ingressFrom = $ingressFrom;
  }
  /**
   * @return GoogleIdentityAccesscontextmanagerV1IngressFrom
   */
  public function getIngressFrom()
  {
    return $this->ingressFrom;
  }
  /**
   * @param GoogleIdentityAccesscontextmanagerV1IngressTo
   */
  public function setIngressTo(GoogleIdentityAccesscontextmanagerV1IngressTo $ingressTo)
  {
    $this->ingressTo = $ingressTo;
  }
  /**
   * @return GoogleIdentityAccesscontextmanagerV1IngressTo
   */
  public function getIngressTo()
  {
    return $this->ingressTo;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(GoogleIdentityAccesscontextmanagerV1IngressPolicy::class, 'Google_Service_CloudAsset_GoogleIdentityAccesscontextmanagerV1IngressPolicy');

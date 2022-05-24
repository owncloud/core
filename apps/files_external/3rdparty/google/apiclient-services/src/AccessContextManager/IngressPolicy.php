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

namespace Google\Service\AccessContextManager;

class IngressPolicy extends \Google\Model
{
  protected $ingressFromType = IngressFrom::class;
  protected $ingressFromDataType = '';
  protected $ingressToType = IngressTo::class;
  protected $ingressToDataType = '';

  /**
   * @param IngressFrom
   */
  public function setIngressFrom(IngressFrom $ingressFrom)
  {
    $this->ingressFrom = $ingressFrom;
  }
  /**
   * @return IngressFrom
   */
  public function getIngressFrom()
  {
    return $this->ingressFrom;
  }
  /**
   * @param IngressTo
   */
  public function setIngressTo(IngressTo $ingressTo)
  {
    $this->ingressTo = $ingressTo;
  }
  /**
   * @return IngressTo
   */
  public function getIngressTo()
  {
    return $this->ingressTo;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(IngressPolicy::class, 'Google_Service_AccessContextManager_IngressPolicy');

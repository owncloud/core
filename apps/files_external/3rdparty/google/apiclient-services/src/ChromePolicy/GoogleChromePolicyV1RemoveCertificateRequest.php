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

namespace Google\Service\ChromePolicy;

class GoogleChromePolicyV1RemoveCertificateRequest extends \Google\Model
{
  /**
   * @var string
   */
  public $networkId;
  /**
   * @var string
   */
  public $targetResource;

  /**
   * @param string
   */
  public function setNetworkId($networkId)
  {
    $this->networkId = $networkId;
  }
  /**
   * @return string
   */
  public function getNetworkId()
  {
    return $this->networkId;
  }
  /**
   * @param string
   */
  public function setTargetResource($targetResource)
  {
    $this->targetResource = $targetResource;
  }
  /**
   * @return string
   */
  public function getTargetResource()
  {
    return $this->targetResource;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(GoogleChromePolicyV1RemoveCertificateRequest::class, 'Google_Service_ChromePolicy_GoogleChromePolicyV1RemoveCertificateRequest');

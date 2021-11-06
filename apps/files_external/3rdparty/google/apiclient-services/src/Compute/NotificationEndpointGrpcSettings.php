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

namespace Google\Service\Compute;

class NotificationEndpointGrpcSettings extends \Google\Model
{
  public $authority;
  public $endpoint;
  public $payloadName;
  protected $resendIntervalType = Duration::class;
  protected $resendIntervalDataType = '';
  public $retryDurationSec;

  public function setAuthority($authority)
  {
    $this->authority = $authority;
  }
  public function getAuthority()
  {
    return $this->authority;
  }
  public function setEndpoint($endpoint)
  {
    $this->endpoint = $endpoint;
  }
  public function getEndpoint()
  {
    return $this->endpoint;
  }
  public function setPayloadName($payloadName)
  {
    $this->payloadName = $payloadName;
  }
  public function getPayloadName()
  {
    return $this->payloadName;
  }
  /**
   * @param Duration
   */
  public function setResendInterval(Duration $resendInterval)
  {
    $this->resendInterval = $resendInterval;
  }
  /**
   * @return Duration
   */
  public function getResendInterval()
  {
    return $this->resendInterval;
  }
  public function setRetryDurationSec($retryDurationSec)
  {
    $this->retryDurationSec = $retryDurationSec;
  }
  public function getRetryDurationSec()
  {
    return $this->retryDurationSec;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(NotificationEndpointGrpcSettings::class, 'Google_Service_Compute_NotificationEndpointGrpcSettings');

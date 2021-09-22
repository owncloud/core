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

class HttpFaultInjection extends \Google\Model
{
  protected $abortType = HttpFaultAbort::class;
  protected $abortDataType = '';
  protected $delayType = HttpFaultDelay::class;
  protected $delayDataType = '';

  /**
   * @param HttpFaultAbort
   */
  public function setAbort(HttpFaultAbort $abort)
  {
    $this->abort = $abort;
  }
  /**
   * @return HttpFaultAbort
   */
  public function getAbort()
  {
    return $this->abort;
  }
  /**
   * @param HttpFaultDelay
   */
  public function setDelay(HttpFaultDelay $delay)
  {
    $this->delay = $delay;
  }
  /**
   * @return HttpFaultDelay
   */
  public function getDelay()
  {
    return $this->delay;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(HttpFaultInjection::class, 'Google_Service_Compute_HttpFaultInjection');

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

class Google_Service_Pagespeedonline_LighthouseResultV5Environment extends Google_Model
{
  public $benchmarkIndex;
  public $hostUserAgent;
  public $networkUserAgent;

  public function setBenchmarkIndex($benchmarkIndex)
  {
    $this->benchmarkIndex = $benchmarkIndex;
  }
  public function getBenchmarkIndex()
  {
    return $this->benchmarkIndex;
  }
  public function setHostUserAgent($hostUserAgent)
  {
    $this->hostUserAgent = $hostUserAgent;
  }
  public function getHostUserAgent()
  {
    return $this->hostUserAgent;
  }
  public function setNetworkUserAgent($networkUserAgent)
  {
    $this->networkUserAgent = $networkUserAgent;
  }
  public function getNetworkUserAgent()
  {
    return $this->networkUserAgent;
  }
}

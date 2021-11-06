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

namespace Google\Service\WebRisk;

class GoogleCloudWebriskV1Submission extends \Google\Collection
{
  protected $collection_key = 'threatTypes';
  public $threatTypes;
  public $uri;

  public function setThreatTypes($threatTypes)
  {
    $this->threatTypes = $threatTypes;
  }
  public function getThreatTypes()
  {
    return $this->threatTypes;
  }
  public function setUri($uri)
  {
    $this->uri = $uri;
  }
  public function getUri()
  {
    return $this->uri;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(GoogleCloudWebriskV1Submission::class, 'Google_Service_WebRisk_GoogleCloudWebriskV1Submission');

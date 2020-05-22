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

class Google_Service_CloudRun_TrafficTarget extends Google_Model
{
  public $configurationName;
  public $latestRevision;
  public $percent;
  public $revisionName;
  public $tag;
  public $url;

  public function setConfigurationName($configurationName)
  {
    $this->configurationName = $configurationName;
  }
  public function getConfigurationName()
  {
    return $this->configurationName;
  }
  public function setLatestRevision($latestRevision)
  {
    $this->latestRevision = $latestRevision;
  }
  public function getLatestRevision()
  {
    return $this->latestRevision;
  }
  public function setPercent($percent)
  {
    $this->percent = $percent;
  }
  public function getPercent()
  {
    return $this->percent;
  }
  public function setRevisionName($revisionName)
  {
    $this->revisionName = $revisionName;
  }
  public function getRevisionName()
  {
    return $this->revisionName;
  }
  public function setTag($tag)
  {
    $this->tag = $tag;
  }
  public function getTag()
  {
    return $this->tag;
  }
  public function setUrl($url)
  {
    $this->url = $url;
  }
  public function getUrl()
  {
    return $this->url;
  }
}

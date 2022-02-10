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

namespace Google\Service\CloudRun;

class TrafficTarget extends \Google\Model
{
  /**
   * @var string
   */
  public $configurationName;
  /**
   * @var bool
   */
  public $latestRevision;
  /**
   * @var int
   */
  public $percent;
  /**
   * @var string
   */
  public $revisionName;
  /**
   * @var string
   */
  public $tag;
  /**
   * @var string
   */
  public $url;

  /**
   * @param string
   */
  public function setConfigurationName($configurationName)
  {
    $this->configurationName = $configurationName;
  }
  /**
   * @return string
   */
  public function getConfigurationName()
  {
    return $this->configurationName;
  }
  /**
   * @param bool
   */
  public function setLatestRevision($latestRevision)
  {
    $this->latestRevision = $latestRevision;
  }
  /**
   * @return bool
   */
  public function getLatestRevision()
  {
    return $this->latestRevision;
  }
  /**
   * @param int
   */
  public function setPercent($percent)
  {
    $this->percent = $percent;
  }
  /**
   * @return int
   */
  public function getPercent()
  {
    return $this->percent;
  }
  /**
   * @param string
   */
  public function setRevisionName($revisionName)
  {
    $this->revisionName = $revisionName;
  }
  /**
   * @return string
   */
  public function getRevisionName()
  {
    return $this->revisionName;
  }
  /**
   * @param string
   */
  public function setTag($tag)
  {
    $this->tag = $tag;
  }
  /**
   * @return string
   */
  public function getTag()
  {
    return $this->tag;
  }
  /**
   * @param string
   */
  public function setUrl($url)
  {
    $this->url = $url;
  }
  /**
   * @return string
   */
  public function getUrl()
  {
    return $this->url;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(TrafficTarget::class, 'Google_Service_CloudRun_TrafficTarget');

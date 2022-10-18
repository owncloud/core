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

namespace Google\Service\Contentwarehouse;

class QualityNavboostCrapsCrapsClickSignals extends \Google\Model
{
  public $absoluteImpressions;
  public $badClicks;
  public $clicks;
  public $goodClicks;
  public $impressions;
  public $lastLongestClicks;
  public $unsquashedClicks;
  public $unsquashedImpressions;
  public $unsquashedLastLongestClicks;

  public function setAbsoluteImpressions($absoluteImpressions)
  {
    $this->absoluteImpressions = $absoluteImpressions;
  }
  public function getAbsoluteImpressions()
  {
    return $this->absoluteImpressions;
  }
  public function setBadClicks($badClicks)
  {
    $this->badClicks = $badClicks;
  }
  public function getBadClicks()
  {
    return $this->badClicks;
  }
  public function setClicks($clicks)
  {
    $this->clicks = $clicks;
  }
  public function getClicks()
  {
    return $this->clicks;
  }
  public function setGoodClicks($goodClicks)
  {
    $this->goodClicks = $goodClicks;
  }
  public function getGoodClicks()
  {
    return $this->goodClicks;
  }
  public function setImpressions($impressions)
  {
    $this->impressions = $impressions;
  }
  public function getImpressions()
  {
    return $this->impressions;
  }
  public function setLastLongestClicks($lastLongestClicks)
  {
    $this->lastLongestClicks = $lastLongestClicks;
  }
  public function getLastLongestClicks()
  {
    return $this->lastLongestClicks;
  }
  public function setUnsquashedClicks($unsquashedClicks)
  {
    $this->unsquashedClicks = $unsquashedClicks;
  }
  public function getUnsquashedClicks()
  {
    return $this->unsquashedClicks;
  }
  public function setUnsquashedImpressions($unsquashedImpressions)
  {
    $this->unsquashedImpressions = $unsquashedImpressions;
  }
  public function getUnsquashedImpressions()
  {
    return $this->unsquashedImpressions;
  }
  public function setUnsquashedLastLongestClicks($unsquashedLastLongestClicks)
  {
    $this->unsquashedLastLongestClicks = $unsquashedLastLongestClicks;
  }
  public function getUnsquashedLastLongestClicks()
  {
    return $this->unsquashedLastLongestClicks;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(QualityNavboostCrapsCrapsClickSignals::class, 'Google_Service_Contentwarehouse_QualityNavboostCrapsCrapsClickSignals');

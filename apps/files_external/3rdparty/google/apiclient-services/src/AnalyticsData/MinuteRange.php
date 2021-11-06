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

namespace Google\Service\AnalyticsData;

class MinuteRange extends \Google\Model
{
  public $endMinutesAgo;
  public $name;
  public $startMinutesAgo;

  public function setEndMinutesAgo($endMinutesAgo)
  {
    $this->endMinutesAgo = $endMinutesAgo;
  }
  public function getEndMinutesAgo()
  {
    return $this->endMinutesAgo;
  }
  public function setName($name)
  {
    $this->name = $name;
  }
  public function getName()
  {
    return $this->name;
  }
  public function setStartMinutesAgo($startMinutesAgo)
  {
    $this->startMinutesAgo = $startMinutesAgo;
  }
  public function getStartMinutesAgo()
  {
    return $this->startMinutesAgo;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(MinuteRange::class, 'Google_Service_AnalyticsData_MinuteRange');

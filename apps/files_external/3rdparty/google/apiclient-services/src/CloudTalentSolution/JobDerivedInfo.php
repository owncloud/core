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

namespace Google\Service\CloudTalentSolution;

class JobDerivedInfo extends \Google\Collection
{
  protected $collection_key = 'locations';
  /**
   * @var string[]
   */
  public $jobCategories;
  protected $locationsType = Location::class;
  protected $locationsDataType = 'array';

  /**
   * @param string[]
   */
  public function setJobCategories($jobCategories)
  {
    $this->jobCategories = $jobCategories;
  }
  /**
   * @return string[]
   */
  public function getJobCategories()
  {
    return $this->jobCategories;
  }
  /**
   * @param Location[]
   */
  public function setLocations($locations)
  {
    $this->locations = $locations;
  }
  /**
   * @return Location[]
   */
  public function getLocations()
  {
    return $this->locations;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(JobDerivedInfo::class, 'Google_Service_CloudTalentSolution_JobDerivedInfo');

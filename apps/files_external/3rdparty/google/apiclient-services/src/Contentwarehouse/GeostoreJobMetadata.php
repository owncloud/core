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

class GeostoreJobMetadata extends \Google\Collection
{
  protected $collection_key = 'jobRelatedCategories';
  /**
   * @var string
   */
  public $duration;
  protected $jobRelatedCategoriesType = GeostoreJobRelatedCategory::class;
  protected $jobRelatedCategoriesDataType = 'array';
  /**
   * @var string
   */
  public $jobTypeId;
  /**
   * @var string
   */
  public $jobTypeMid;

  /**
   * @param string
   */
  public function setDuration($duration)
  {
    $this->duration = $duration;
  }
  /**
   * @return string
   */
  public function getDuration()
  {
    return $this->duration;
  }
  /**
   * @param GeostoreJobRelatedCategory[]
   */
  public function setJobRelatedCategories($jobRelatedCategories)
  {
    $this->jobRelatedCategories = $jobRelatedCategories;
  }
  /**
   * @return GeostoreJobRelatedCategory[]
   */
  public function getJobRelatedCategories()
  {
    return $this->jobRelatedCategories;
  }
  /**
   * @param string
   */
  public function setJobTypeId($jobTypeId)
  {
    $this->jobTypeId = $jobTypeId;
  }
  /**
   * @return string
   */
  public function getJobTypeId()
  {
    return $this->jobTypeId;
  }
  /**
   * @param string
   */
  public function setJobTypeMid($jobTypeMid)
  {
    $this->jobTypeMid = $jobTypeMid;
  }
  /**
   * @return string
   */
  public function getJobTypeMid()
  {
    return $this->jobTypeMid;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(GeostoreJobMetadata::class, 'Google_Service_Contentwarehouse_GeostoreJobMetadata');

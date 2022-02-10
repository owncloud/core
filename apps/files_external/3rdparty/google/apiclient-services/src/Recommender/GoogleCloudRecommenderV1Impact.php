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

namespace Google\Service\Recommender;

class GoogleCloudRecommenderV1Impact extends \Google\Model
{
  /**
   * @var string
   */
  public $category;
  protected $costProjectionType = GoogleCloudRecommenderV1CostProjection::class;
  protected $costProjectionDataType = '';
  protected $securityProjectionType = GoogleCloudRecommenderV1SecurityProjection::class;
  protected $securityProjectionDataType = '';

  /**
   * @param string
   */
  public function setCategory($category)
  {
    $this->category = $category;
  }
  /**
   * @return string
   */
  public function getCategory()
  {
    return $this->category;
  }
  /**
   * @param GoogleCloudRecommenderV1CostProjection
   */
  public function setCostProjection(GoogleCloudRecommenderV1CostProjection $costProjection)
  {
    $this->costProjection = $costProjection;
  }
  /**
   * @return GoogleCloudRecommenderV1CostProjection
   */
  public function getCostProjection()
  {
    return $this->costProjection;
  }
  /**
   * @param GoogleCloudRecommenderV1SecurityProjection
   */
  public function setSecurityProjection(GoogleCloudRecommenderV1SecurityProjection $securityProjection)
  {
    $this->securityProjection = $securityProjection;
  }
  /**
   * @return GoogleCloudRecommenderV1SecurityProjection
   */
  public function getSecurityProjection()
  {
    return $this->securityProjection;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(GoogleCloudRecommenderV1Impact::class, 'Google_Service_Recommender_GoogleCloudRecommenderV1Impact');

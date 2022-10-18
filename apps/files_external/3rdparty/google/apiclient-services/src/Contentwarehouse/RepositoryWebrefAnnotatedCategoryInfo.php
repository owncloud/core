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

class RepositoryWebrefAnnotatedCategoryInfo extends \Google\Model
{
  /**
   * @var string
   */
  public $debugString;
  /**
   * @var float
   */
  public $listiness;
  /**
   * @var string
   */
  public $mid;

  /**
   * @param string
   */
  public function setDebugString($debugString)
  {
    $this->debugString = $debugString;
  }
  /**
   * @return string
   */
  public function getDebugString()
  {
    return $this->debugString;
  }
  /**
   * @param float
   */
  public function setListiness($listiness)
  {
    $this->listiness = $listiness;
  }
  /**
   * @return float
   */
  public function getListiness()
  {
    return $this->listiness;
  }
  /**
   * @param string
   */
  public function setMid($mid)
  {
    $this->mid = $mid;
  }
  /**
   * @return string
   */
  public function getMid()
  {
    return $this->mid;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(RepositoryWebrefAnnotatedCategoryInfo::class, 'Google_Service_Contentwarehouse_RepositoryWebrefAnnotatedCategoryInfo');

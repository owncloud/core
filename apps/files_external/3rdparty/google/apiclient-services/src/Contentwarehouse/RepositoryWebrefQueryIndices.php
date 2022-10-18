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

class RepositoryWebrefQueryIndices extends \Google\Collection
{
  protected $collection_key = 'featuresIndex';
  /**
   * @var int[]
   */
  public $featuresIndex;
  /**
   * @var int
   */
  public $queriesIndex;

  /**
   * @param int[]
   */
  public function setFeaturesIndex($featuresIndex)
  {
    $this->featuresIndex = $featuresIndex;
  }
  /**
   * @return int[]
   */
  public function getFeaturesIndex()
  {
    return $this->featuresIndex;
  }
  /**
   * @param int
   */
  public function setQueriesIndex($queriesIndex)
  {
    $this->queriesIndex = $queriesIndex;
  }
  /**
   * @return int
   */
  public function getQueriesIndex()
  {
    return $this->queriesIndex;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(RepositoryWebrefQueryIndices::class, 'Google_Service_Contentwarehouse_RepositoryWebrefQueryIndices');

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

class QualitySitemapTwoLevelTarget extends \Google\Collection
{
  protected $collection_key = 'secondLevelTarget';
  protected $firstLevelTargetType = QualitySitemapTarget::class;
  protected $firstLevelTargetDataType = '';
  protected $secondLevelTargetType = QualitySitemapTarget::class;
  protected $secondLevelTargetDataType = 'array';

  /**
   * @param QualitySitemapTarget
   */
  public function setFirstLevelTarget(QualitySitemapTarget $firstLevelTarget)
  {
    $this->firstLevelTarget = $firstLevelTarget;
  }
  /**
   * @return QualitySitemapTarget
   */
  public function getFirstLevelTarget()
  {
    return $this->firstLevelTarget;
  }
  /**
   * @param QualitySitemapTarget[]
   */
  public function setSecondLevelTarget($secondLevelTarget)
  {
    $this->secondLevelTarget = $secondLevelTarget;
  }
  /**
   * @return QualitySitemapTarget[]
   */
  public function getSecondLevelTarget()
  {
    return $this->secondLevelTarget;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(QualitySitemapTwoLevelTarget::class, 'Google_Service_Contentwarehouse_QualitySitemapTwoLevelTarget');

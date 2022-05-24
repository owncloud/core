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

namespace Google\Service\BigtableAdmin;

class GcRule extends \Google\Model
{
  protected $intersectionType = Intersection::class;
  protected $intersectionDataType = '';
  /**
   * @var string
   */
  public $maxAge;
  /**
   * @var int
   */
  public $maxNumVersions;
  protected $unionType = Union::class;
  protected $unionDataType = '';

  /**
   * @param Intersection
   */
  public function setIntersection(Intersection $intersection)
  {
    $this->intersection = $intersection;
  }
  /**
   * @return Intersection
   */
  public function getIntersection()
  {
    return $this->intersection;
  }
  /**
   * @param string
   */
  public function setMaxAge($maxAge)
  {
    $this->maxAge = $maxAge;
  }
  /**
   * @return string
   */
  public function getMaxAge()
  {
    return $this->maxAge;
  }
  /**
   * @param int
   */
  public function setMaxNumVersions($maxNumVersions)
  {
    $this->maxNumVersions = $maxNumVersions;
  }
  /**
   * @return int
   */
  public function getMaxNumVersions()
  {
    return $this->maxNumVersions;
  }
  /**
   * @param Union
   */
  public function setUnion(Union $union)
  {
    $this->union = $union;
  }
  /**
   * @return Union
   */
  public function getUnion()
  {
    return $this->union;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(GcRule::class, 'Google_Service_BigtableAdmin_GcRule');

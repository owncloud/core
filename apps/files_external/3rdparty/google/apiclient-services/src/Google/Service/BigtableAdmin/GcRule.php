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

class Google_Service_BigtableAdmin_GcRule extends Google_Model
{
  protected $intersectionType = 'Google_Service_BigtableAdmin_Intersection';
  protected $intersectionDataType = '';
  public $maxAge;
  public $maxNumVersions;
  protected $unionType = 'Google_Service_BigtableAdmin_Union';
  protected $unionDataType = '';

  /**
   * @param Google_Service_BigtableAdmin_Intersection
   */
  public function setIntersection(Google_Service_BigtableAdmin_Intersection $intersection)
  {
    $this->intersection = $intersection;
  }
  /**
   * @return Google_Service_BigtableAdmin_Intersection
   */
  public function getIntersection()
  {
    return $this->intersection;
  }
  public function setMaxAge($maxAge)
  {
    $this->maxAge = $maxAge;
  }
  public function getMaxAge()
  {
    return $this->maxAge;
  }
  public function setMaxNumVersions($maxNumVersions)
  {
    $this->maxNumVersions = $maxNumVersions;
  }
  public function getMaxNumVersions()
  {
    return $this->maxNumVersions;
  }
  /**
   * @param Google_Service_BigtableAdmin_Union
   */
  public function setUnion(Google_Service_BigtableAdmin_Union $union)
  {
    $this->union = $union;
  }
  /**
   * @return Google_Service_BigtableAdmin_Union
   */
  public function getUnion()
  {
    return $this->union;
  }
}

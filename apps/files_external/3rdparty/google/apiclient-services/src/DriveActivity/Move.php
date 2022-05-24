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

namespace Google\Service\DriveActivity;

class Move extends \Google\Collection
{
  protected $collection_key = 'removedParents';
  protected $addedParentsType = TargetReference::class;
  protected $addedParentsDataType = 'array';
  protected $removedParentsType = TargetReference::class;
  protected $removedParentsDataType = 'array';

  /**
   * @param TargetReference[]
   */
  public function setAddedParents($addedParents)
  {
    $this->addedParents = $addedParents;
  }
  /**
   * @return TargetReference[]
   */
  public function getAddedParents()
  {
    return $this->addedParents;
  }
  /**
   * @param TargetReference[]
   */
  public function setRemovedParents($removedParents)
  {
    $this->removedParents = $removedParents;
  }
  /**
   * @return TargetReference[]
   */
  public function getRemovedParents()
  {
    return $this->removedParents;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(Move::class, 'Google_Service_DriveActivity_Move');

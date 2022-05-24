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

namespace Google\Service\TagManager;

class MergeConflict extends \Google\Model
{
  protected $entityInBaseVersionType = Entity::class;
  protected $entityInBaseVersionDataType = '';
  protected $entityInWorkspaceType = Entity::class;
  protected $entityInWorkspaceDataType = '';

  /**
   * @param Entity
   */
  public function setEntityInBaseVersion(Entity $entityInBaseVersion)
  {
    $this->entityInBaseVersion = $entityInBaseVersion;
  }
  /**
   * @return Entity
   */
  public function getEntityInBaseVersion()
  {
    return $this->entityInBaseVersion;
  }
  /**
   * @param Entity
   */
  public function setEntityInWorkspace(Entity $entityInWorkspace)
  {
    $this->entityInWorkspace = $entityInWorkspace;
  }
  /**
   * @return Entity
   */
  public function getEntityInWorkspace()
  {
    return $this->entityInWorkspace;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(MergeConflict::class, 'Google_Service_TagManager_MergeConflict');

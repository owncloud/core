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

namespace Google\Service\OnDemandScanning;

class RepoId extends \Google\Model
{
  protected $projectRepoIdType = ProjectRepoId::class;
  protected $projectRepoIdDataType = '';
  /**
   * @var string
   */
  public $uid;

  /**
   * @param ProjectRepoId
   */
  public function setProjectRepoId(ProjectRepoId $projectRepoId)
  {
    $this->projectRepoId = $projectRepoId;
  }
  /**
   * @return ProjectRepoId
   */
  public function getProjectRepoId()
  {
    return $this->projectRepoId;
  }
  /**
   * @param string
   */
  public function setUid($uid)
  {
    $this->uid = $uid;
  }
  /**
   * @return string
   */
  public function getUid()
  {
    return $this->uid;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(RepoId::class, 'Google_Service_OnDemandScanning_RepoId');

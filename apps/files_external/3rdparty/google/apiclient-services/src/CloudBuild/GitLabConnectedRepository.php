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

namespace Google\Service\CloudBuild;

class GitLabConnectedRepository extends \Google\Model
{
  /**
   * @var string
   */
  public $parent;
  protected $repoType = GitLabRepositoryId::class;
  protected $repoDataType = '';
  protected $statusType = Status::class;
  protected $statusDataType = '';

  /**
   * @param string
   */
  public function setParent($parent)
  {
    $this->parent = $parent;
  }
  /**
   * @return string
   */
  public function getParent()
  {
    return $this->parent;
  }
  /**
   * @param GitLabRepositoryId
   */
  public function setRepo(GitLabRepositoryId $repo)
  {
    $this->repo = $repo;
  }
  /**
   * @return GitLabRepositoryId
   */
  public function getRepo()
  {
    return $this->repo;
  }
  /**
   * @param Status
   */
  public function setStatus(Status $status)
  {
    $this->status = $status;
  }
  /**
   * @return Status
   */
  public function getStatus()
  {
    return $this->status;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(GitLabConnectedRepository::class, 'Google_Service_CloudBuild_GitLabConnectedRepository');

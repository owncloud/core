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

namespace Google\Service\CloudSourceRepositories;

class UpdateRepoRequest extends \Google\Model
{
  protected $repoType = Repo::class;
  protected $repoDataType = '';
  /**
   * @var string
   */
  public $updateMask;

  /**
   * @param Repo
   */
  public function setRepo(Repo $repo)
  {
    $this->repo = $repo;
  }
  /**
   * @return Repo
   */
  public function getRepo()
  {
    return $this->repo;
  }
  /**
   * @param string
   */
  public function setUpdateMask($updateMask)
  {
    $this->updateMask = $updateMask;
  }
  /**
   * @return string
   */
  public function getUpdateMask()
  {
    return $this->updateMask;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(UpdateRepoRequest::class, 'Google_Service_CloudSourceRepositories_UpdateRepoRequest');

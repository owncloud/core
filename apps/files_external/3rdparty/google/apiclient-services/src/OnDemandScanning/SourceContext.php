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

class SourceContext extends \Google\Model
{
  protected $cloudRepoType = CloudRepoSourceContext::class;
  protected $cloudRepoDataType = '';
  protected $gerritType = GerritSourceContext::class;
  protected $gerritDataType = '';
  protected $gitType = GitSourceContext::class;
  protected $gitDataType = '';
  /**
   * @var string[]
   */
  public $labels;

  /**
   * @param CloudRepoSourceContext
   */
  public function setCloudRepo(CloudRepoSourceContext $cloudRepo)
  {
    $this->cloudRepo = $cloudRepo;
  }
  /**
   * @return CloudRepoSourceContext
   */
  public function getCloudRepo()
  {
    return $this->cloudRepo;
  }
  /**
   * @param GerritSourceContext
   */
  public function setGerrit(GerritSourceContext $gerrit)
  {
    $this->gerrit = $gerrit;
  }
  /**
   * @return GerritSourceContext
   */
  public function getGerrit()
  {
    return $this->gerrit;
  }
  /**
   * @param GitSourceContext
   */
  public function setGit(GitSourceContext $git)
  {
    $this->git = $git;
  }
  /**
   * @return GitSourceContext
   */
  public function getGit()
  {
    return $this->git;
  }
  /**
   * @param string[]
   */
  public function setLabels($labels)
  {
    $this->labels = $labels;
  }
  /**
   * @return string[]
   */
  public function getLabels()
  {
    return $this->labels;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(SourceContext::class, 'Google_Service_OnDemandScanning_SourceContext');

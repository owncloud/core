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

namespace Google\Service\ContainerAnalysis;

class ContaineranalysisGoogleDevtoolsCloudbuildV1RepoSource extends \Google\Model
{
  /**
   * @var string
   */
  public $branchName;
  /**
   * @var string
   */
  public $commitSha;
  /**
   * @var string
   */
  public $dir;
  /**
   * @var bool
   */
  public $invertRegex;
  /**
   * @var string
   */
  public $projectId;
  /**
   * @var string
   */
  public $repoName;
  /**
   * @var string[]
   */
  public $substitutions;
  /**
   * @var string
   */
  public $tagName;

  /**
   * @param string
   */
  public function setBranchName($branchName)
  {
    $this->branchName = $branchName;
  }
  /**
   * @return string
   */
  public function getBranchName()
  {
    return $this->branchName;
  }
  /**
   * @param string
   */
  public function setCommitSha($commitSha)
  {
    $this->commitSha = $commitSha;
  }
  /**
   * @return string
   */
  public function getCommitSha()
  {
    return $this->commitSha;
  }
  /**
   * @param string
   */
  public function setDir($dir)
  {
    $this->dir = $dir;
  }
  /**
   * @return string
   */
  public function getDir()
  {
    return $this->dir;
  }
  /**
   * @param bool
   */
  public function setInvertRegex($invertRegex)
  {
    $this->invertRegex = $invertRegex;
  }
  /**
   * @return bool
   */
  public function getInvertRegex()
  {
    return $this->invertRegex;
  }
  /**
   * @param string
   */
  public function setProjectId($projectId)
  {
    $this->projectId = $projectId;
  }
  /**
   * @return string
   */
  public function getProjectId()
  {
    return $this->projectId;
  }
  /**
   * @param string
   */
  public function setRepoName($repoName)
  {
    $this->repoName = $repoName;
  }
  /**
   * @return string
   */
  public function getRepoName()
  {
    return $this->repoName;
  }
  /**
   * @param string[]
   */
  public function setSubstitutions($substitutions)
  {
    $this->substitutions = $substitutions;
  }
  /**
   * @return string[]
   */
  public function getSubstitutions()
  {
    return $this->substitutions;
  }
  /**
   * @param string
   */
  public function setTagName($tagName)
  {
    $this->tagName = $tagName;
  }
  /**
   * @return string
   */
  public function getTagName()
  {
    return $this->tagName;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(ContaineranalysisGoogleDevtoolsCloudbuildV1RepoSource::class, 'Google_Service_ContainerAnalysis_ContaineranalysisGoogleDevtoolsCloudbuildV1RepoSource');

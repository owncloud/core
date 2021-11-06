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

namespace Google\Service\CloudSecurityToken;

class GoogleIdentityStsV1betaOptions extends \Google\Collection
{
  protected $collection_key = 'audiences';
  protected $accessBoundaryType = GoogleIdentityStsV1betaAccessBoundary::class;
  protected $accessBoundaryDataType = '';
  public $audiences;
  public $userProject;

  /**
   * @param GoogleIdentityStsV1betaAccessBoundary
   */
  public function setAccessBoundary(GoogleIdentityStsV1betaAccessBoundary $accessBoundary)
  {
    $this->accessBoundary = $accessBoundary;
  }
  /**
   * @return GoogleIdentityStsV1betaAccessBoundary
   */
  public function getAccessBoundary()
  {
    return $this->accessBoundary;
  }
  public function setAudiences($audiences)
  {
    $this->audiences = $audiences;
  }
  public function getAudiences()
  {
    return $this->audiences;
  }
  public function setUserProject($userProject)
  {
    $this->userProject = $userProject;
  }
  public function getUserProject()
  {
    return $this->userProject;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(GoogleIdentityStsV1betaOptions::class, 'Google_Service_CloudSecurityToken_GoogleIdentityStsV1betaOptions');

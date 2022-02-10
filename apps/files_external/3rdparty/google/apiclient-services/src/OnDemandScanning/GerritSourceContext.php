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

class GerritSourceContext extends \Google\Model
{
  protected $aliasContextType = AliasContext::class;
  protected $aliasContextDataType = '';
  /**
   * @var string
   */
  public $gerritProject;
  /**
   * @var string
   */
  public $hostUri;
  /**
   * @var string
   */
  public $revisionId;

  /**
   * @param AliasContext
   */
  public function setAliasContext(AliasContext $aliasContext)
  {
    $this->aliasContext = $aliasContext;
  }
  /**
   * @return AliasContext
   */
  public function getAliasContext()
  {
    return $this->aliasContext;
  }
  /**
   * @param string
   */
  public function setGerritProject($gerritProject)
  {
    $this->gerritProject = $gerritProject;
  }
  /**
   * @return string
   */
  public function getGerritProject()
  {
    return $this->gerritProject;
  }
  /**
   * @param string
   */
  public function setHostUri($hostUri)
  {
    $this->hostUri = $hostUri;
  }
  /**
   * @return string
   */
  public function getHostUri()
  {
    return $this->hostUri;
  }
  /**
   * @param string
   */
  public function setRevisionId($revisionId)
  {
    $this->revisionId = $revisionId;
  }
  /**
   * @return string
   */
  public function getRevisionId()
  {
    return $this->revisionId;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(GerritSourceContext::class, 'Google_Service_OnDemandScanning_GerritSourceContext');

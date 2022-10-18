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

namespace Google\Service\Contentwarehouse;

class RepositoryWebrefToprefListMembershipListMember extends \Google\Model
{
  protected $idType = RepositoryWebrefWebrefEntityId::class;
  protected $idDataType = '';
  /**
   * @var string
   */
  public $isMember;

  /**
   * @param RepositoryWebrefWebrefEntityId
   */
  public function setId(RepositoryWebrefWebrefEntityId $id)
  {
    $this->id = $id;
  }
  /**
   * @return RepositoryWebrefWebrefEntityId
   */
  public function getId()
  {
    return $this->id;
  }
  /**
   * @param string
   */
  public function setIsMember($isMember)
  {
    $this->isMember = $isMember;
  }
  /**
   * @return string
   */
  public function getIsMember()
  {
    return $this->isMember;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(RepositoryWebrefToprefListMembershipListMember::class, 'Google_Service_Contentwarehouse_RepositoryWebrefToprefListMembershipListMember');

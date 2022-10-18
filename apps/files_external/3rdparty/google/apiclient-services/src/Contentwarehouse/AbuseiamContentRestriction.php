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

class AbuseiamContentRestriction extends \Google\Collection
{
  protected $collection_key = 'userVerdict';
  protected $adminVerdictType = AbuseiamVerdict::class;
  protected $adminVerdictDataType = 'array';
  protected $userVerdictType = AbuseiamVerdict::class;
  protected $userVerdictDataType = 'array';

  /**
   * @param AbuseiamVerdict[]
   */
  public function setAdminVerdict($adminVerdict)
  {
    $this->adminVerdict = $adminVerdict;
  }
  /**
   * @return AbuseiamVerdict[]
   */
  public function getAdminVerdict()
  {
    return $this->adminVerdict;
  }
  /**
   * @param AbuseiamVerdict[]
   */
  public function setUserVerdict($userVerdict)
  {
    $this->userVerdict = $userVerdict;
  }
  /**
   * @return AbuseiamVerdict[]
   */
  public function getUserVerdict()
  {
    return $this->userVerdict;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(AbuseiamContentRestriction::class, 'Google_Service_Contentwarehouse_AbuseiamContentRestriction');

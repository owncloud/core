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

namespace Google\Service\AndroidEnterprise;

class AppRestrictionsSchema extends \Google\Collection
{
  protected $collection_key = 'restrictions';
  public $kind;
  protected $restrictionsType = AppRestrictionsSchemaRestriction::class;
  protected $restrictionsDataType = 'array';

  public function setKind($kind)
  {
    $this->kind = $kind;
  }
  public function getKind()
  {
    return $this->kind;
  }
  /**
   * @param AppRestrictionsSchemaRestriction[]
   */
  public function setRestrictions($restrictions)
  {
    $this->restrictions = $restrictions;
  }
  /**
   * @return AppRestrictionsSchemaRestriction[]
   */
  public function getRestrictions()
  {
    return $this->restrictions;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(AppRestrictionsSchema::class, 'Google_Service_AndroidEnterprise_AppRestrictionsSchema');

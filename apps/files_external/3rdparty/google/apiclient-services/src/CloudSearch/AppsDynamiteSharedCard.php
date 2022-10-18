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

namespace Google\Service\CloudSearch;

class AppsDynamiteSharedCard extends \Google\Collection
{
  protected $collection_key = 'sections';
  protected $cardActionsType = AppsDynamiteSharedCardCardAction::class;
  protected $cardActionsDataType = 'array';
  protected $headerType = AppsDynamiteSharedCardCardHeader::class;
  protected $headerDataType = '';
  /**
   * @var string
   */
  public $name;
  protected $sectionsType = AppsDynamiteSharedCardSection::class;
  protected $sectionsDataType = 'array';

  /**
   * @param AppsDynamiteSharedCardCardAction[]
   */
  public function setCardActions($cardActions)
  {
    $this->cardActions = $cardActions;
  }
  /**
   * @return AppsDynamiteSharedCardCardAction[]
   */
  public function getCardActions()
  {
    return $this->cardActions;
  }
  /**
   * @param AppsDynamiteSharedCardCardHeader
   */
  public function setHeader(AppsDynamiteSharedCardCardHeader $header)
  {
    $this->header = $header;
  }
  /**
   * @return AppsDynamiteSharedCardCardHeader
   */
  public function getHeader()
  {
    return $this->header;
  }
  /**
   * @param string
   */
  public function setName($name)
  {
    $this->name = $name;
  }
  /**
   * @return string
   */
  public function getName()
  {
    return $this->name;
  }
  /**
   * @param AppsDynamiteSharedCardSection[]
   */
  public function setSections($sections)
  {
    $this->sections = $sections;
  }
  /**
   * @return AppsDynamiteSharedCardSection[]
   */
  public function getSections()
  {
    return $this->sections;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(AppsDynamiteSharedCard::class, 'Google_Service_CloudSearch_AppsDynamiteSharedCard');

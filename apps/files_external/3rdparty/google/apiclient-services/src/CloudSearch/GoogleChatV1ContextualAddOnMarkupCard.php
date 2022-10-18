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

class GoogleChatV1ContextualAddOnMarkupCard extends \Google\Collection
{
  protected $collection_key = 'sections';
  protected $cardActionsType = GoogleChatV1ContextualAddOnMarkupCardCardAction::class;
  protected $cardActionsDataType = 'array';
  protected $headerType = GoogleChatV1ContextualAddOnMarkupCardCardHeader::class;
  protected $headerDataType = '';
  /**
   * @var string
   */
  public $name;
  protected $sectionsType = GoogleChatV1ContextualAddOnMarkupCardSection::class;
  protected $sectionsDataType = 'array';

  /**
   * @param GoogleChatV1ContextualAddOnMarkupCardCardAction[]
   */
  public function setCardActions($cardActions)
  {
    $this->cardActions = $cardActions;
  }
  /**
   * @return GoogleChatV1ContextualAddOnMarkupCardCardAction[]
   */
  public function getCardActions()
  {
    return $this->cardActions;
  }
  /**
   * @param GoogleChatV1ContextualAddOnMarkupCardCardHeader
   */
  public function setHeader(GoogleChatV1ContextualAddOnMarkupCardCardHeader $header)
  {
    $this->header = $header;
  }
  /**
   * @return GoogleChatV1ContextualAddOnMarkupCardCardHeader
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
   * @param GoogleChatV1ContextualAddOnMarkupCardSection[]
   */
  public function setSections($sections)
  {
    $this->sections = $sections;
  }
  /**
   * @return GoogleChatV1ContextualAddOnMarkupCardSection[]
   */
  public function getSections()
  {
    return $this->sections;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(GoogleChatV1ContextualAddOnMarkupCard::class, 'Google_Service_CloudSearch_GoogleChatV1ContextualAddOnMarkupCard');

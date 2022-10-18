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

class AppsDynamiteSharedOriginAppSuggestion extends \Google\Model
{
  protected $appIdType = AppId::class;
  protected $appIdDataType = '';
  protected $cardClickSuggestionType = AppsDynamiteSharedCardClickSuggestion::class;
  protected $cardClickSuggestionDataType = '';

  /**
   * @param AppId
   */
  public function setAppId(AppId $appId)
  {
    $this->appId = $appId;
  }
  /**
   * @return AppId
   */
  public function getAppId()
  {
    return $this->appId;
  }
  /**
   * @param AppsDynamiteSharedCardClickSuggestion
   */
  public function setCardClickSuggestion(AppsDynamiteSharedCardClickSuggestion $cardClickSuggestion)
  {
    $this->cardClickSuggestion = $cardClickSuggestion;
  }
  /**
   * @return AppsDynamiteSharedCardClickSuggestion
   */
  public function getCardClickSuggestion()
  {
    return $this->cardClickSuggestion;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(AppsDynamiteSharedOriginAppSuggestion::class, 'Google_Service_CloudSearch_AppsDynamiteSharedOriginAppSuggestion');

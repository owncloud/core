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

namespace Google\Service\Texttospeech\Resource;

use Google\Service\Texttospeech\ListVoicesResponse;

/**
 * The "voices" collection of methods.
 * Typical usage is:
 *  <code>
 *   $texttospeechService = new Google\Service\Texttospeech(...);
 *   $voices = $texttospeechService->voices;
 *  </code>
 */
class Voices extends \Google\Service\Resource
{
  /**
   * Returns a list of Voice supported for synthesis. (voices.listVoices)
   *
   * @param array $optParams Optional parameters.
   *
   * @opt_param string languageCode Optional. Recommended. [BCP-47](https://www
   * .rfc-editor.org/rfc/bcp/bcp47.txt) language tag. If not specified, the API
   * will return all supported voices. If specified, the ListVoices call will only
   * return voices that can be used to synthesize this language_code. E.g. when
   * specifying "en-NZ", you will get supported "en-NZ" voices; when specifying
   * "no", you will get supported "no-" (Norwegian) and "nb-" (Norwegian Bokmal)
   * voices; specifying "zh" will also get supported "cmn-" voices; specifying
   * "zh-hk" will also get supported "yue-hk" voices.
   * @return ListVoicesResponse
   */
  public function listVoices($optParams = [])
  {
    $params = [];
    $params = array_merge($params, $optParams);
    return $this->call('list', [$params], ListVoicesResponse::class);
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(Voices::class, 'Google_Service_Texttospeech_Resource_Voices');

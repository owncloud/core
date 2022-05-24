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

use Google\Service\Texttospeech\SynthesizeSpeechRequest;
use Google\Service\Texttospeech\SynthesizeSpeechResponse;

/**
 * The "text" collection of methods.
 * Typical usage is:
 *  <code>
 *   $texttospeechService = new Google\Service\Texttospeech(...);
 *   $text = $texttospeechService->text;
 *  </code>
 */
class Text extends \Google\Service\Resource
{
  /**
   * Synthesizes speech synchronously: receive results after all text input has
   * been processed. (text.synthesize)
   *
   * @param SynthesizeSpeechRequest $postBody
   * @param array $optParams Optional parameters.
   * @return SynthesizeSpeechResponse
   */
  public function synthesize(SynthesizeSpeechRequest $postBody, $optParams = [])
  {
    $params = ['postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('synthesize', [$params], SynthesizeSpeechResponse::class);
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(Text::class, 'Google_Service_Texttospeech_Resource_Text');

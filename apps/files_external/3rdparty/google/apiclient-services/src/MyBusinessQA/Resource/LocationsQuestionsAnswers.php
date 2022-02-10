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

namespace Google\Service\MyBusinessQA\Resource;

use Google\Service\MyBusinessQA\Answer;
use Google\Service\MyBusinessQA\ListAnswersResponse;
use Google\Service\MyBusinessQA\UpsertAnswerRequest;

/**
 * The "answers" collection of methods.
 * Typical usage is:
 *  <code>
 *   $mybusinessqandaService = new Google\Service\MyBusinessQA(...);
 *   $answers = $mybusinessqandaService->answers;
 *  </code>
 */
class LocationsQuestionsAnswers extends \Google\Service\Resource
{
  /**
   * Returns the paginated list of answers for a specified question.
   * (answers.listLocationsQuestionsAnswers)
   *
   * @param string $parent Required. The name of the question to fetch answers
   * for.
   * @param array $optParams Optional parameters.
   *
   * @opt_param string orderBy Optional. The order to return the answers. Valid
   * options include 'update_time desc' and 'upvote_count desc', which will return
   * the answers sorted descendingly by the requested field. The default sort
   * order is 'update_time desc'.
   * @opt_param int pageSize Optional. How many answers to fetch per page. The
   * default and maximum `page_size` values are 10.
   * @opt_param string pageToken Optional. If specified, the next page of answers
   * is retrieved.
   * @return ListAnswersResponse
   */
  public function listLocationsQuestionsAnswers($parent, $optParams = [])
  {
    $params = ['parent' => $parent];
    $params = array_merge($params, $optParams);
    return $this->call('list', [$params], ListAnswersResponse::class);
  }
  /**
   * Creates an answer or updates the existing answer written by the user for the
   * specified question. A user can only create one answer per question.
   * (answers.upsert)
   *
   * @param string $parent Required. The name of the question to write an answer
   * for.
   * @param UpsertAnswerRequest $postBody
   * @param array $optParams Optional parameters.
   * @return Answer
   */
  public function upsert($parent, UpsertAnswerRequest $postBody, $optParams = [])
  {
    $params = ['parent' => $parent, 'postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('upsert', [$params], Answer::class);
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(LocationsQuestionsAnswers::class, 'Google_Service_MyBusinessQA_Resource_LocationsQuestionsAnswers');

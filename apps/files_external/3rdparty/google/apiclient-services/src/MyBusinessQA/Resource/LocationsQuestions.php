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

use Google\Service\MyBusinessQA\ListQuestionsResponse;
use Google\Service\MyBusinessQA\MybusinessqandaEmpty;
use Google\Service\MyBusinessQA\Question;

/**
 * The "questions" collection of methods.
 * Typical usage is:
 *  <code>
 *   $mybusinessqandaService = new Google\Service\MyBusinessQA(...);
 *   $questions = $mybusinessqandaService->questions;
 *  </code>
 */
class LocationsQuestions extends \Google\Service\Resource
{
  /**
   * Adds a question for the specified location. (questions.create)
   *
   * @param string $parent Required. The name of the location to write a question
   * for.
   * @param Question $postBody
   * @param array $optParams Optional parameters.
   * @return Question
   */
  public function create($parent, Question $postBody, $optParams = [])
  {
    $params = ['parent' => $parent, 'postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('create', [$params], Question::class);
  }
  /**
   * Deletes a specific question written by the current user. (questions.delete)
   *
   * @param string $name Required. The name of the question to delete.
   * @param array $optParams Optional parameters.
   * @return MybusinessqandaEmpty
   */
  public function delete($name, $optParams = [])
  {
    $params = ['name' => $name];
    $params = array_merge($params, $optParams);
    return $this->call('delete', [$params], MybusinessqandaEmpty::class);
  }
  /**
   * Deletes the answer written by the current user to a question.
   * (questions.deleteAnswers)
   *
   * @param string $name Required. The name of the question to delete an answer
   * for.
   * @param array $optParams Optional parameters.
   * @return MybusinessqandaEmpty
   */
  public function deleteAnswers($name, $optParams = [])
  {
    $params = ['name' => $name];
    $params = array_merge($params, $optParams);
    return $this->call('deleteAnswers', [$params], MybusinessqandaEmpty::class);
  }
  /**
   * Returns the paginated list of questions and some of its answers for a
   * specified location. This operation is only valid if the specified location is
   * verified. (questions.listLocationsQuestions)
   *
   * @param string $parent Required. The name of the location to fetch questions
   * for.
   * @param array $optParams Optional parameters.
   *
   * @opt_param int answersPerQuestion Optional. How many answers to fetch per
   * question. The default and maximum `answers_per_question` values are 10.
   * @opt_param string filter Optional. A filter constraining the questions to
   * return. The only filter currently supported is "ignore_answered=true"
   * @opt_param string orderBy Optional. The order to return the questions. Valid
   * options include 'update_time desc' and 'upvote_count desc', which will return
   * the questions sorted descendingly by the requested field. The default sort
   * order is 'update_time desc'.
   * @opt_param int pageSize Optional. How many questions to fetch per page. The
   * default and maximum `page_size` values are 10.
   * @opt_param string pageToken Optional. If specified, the next page of
   * questions is retrieved.
   * @return ListQuestionsResponse
   */
  public function listLocationsQuestions($parent, $optParams = [])
  {
    $params = ['parent' => $parent];
    $params = array_merge($params, $optParams);
    return $this->call('list', [$params], ListQuestionsResponse::class);
  }
  /**
   * Updates a specific question written by the current user. (questions.patch)
   *
   * @param string $name Immutable. The unique name for the question.
   * locations/questions This field will be ignored if set during question
   * creation.
   * @param Question $postBody
   * @param array $optParams Optional parameters.
   *
   * @opt_param string updateMask Required. The specific fields to update. Only
   * question text can be updated.
   * @return Question
   */
  public function patch($name, Question $postBody, $optParams = [])
  {
    $params = ['name' => $name, 'postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('patch', [$params], Question::class);
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(LocationsQuestions::class, 'Google_Service_MyBusinessQA_Resource_LocationsQuestions');

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

namespace Google\Service\DataLabeling\Resource;

use Google\Service\DataLabeling\GoogleCloudDatalabelingV1beta1FeedbackMessage;
use Google\Service\DataLabeling\GoogleCloudDatalabelingV1beta1ListFeedbackMessagesResponse;
use Google\Service\DataLabeling\GoogleLongrunningOperation;
use Google\Service\DataLabeling\GoogleProtobufEmpty;

/**
 * The "feedbackMessages" collection of methods.
 * Typical usage is:
 *  <code>
 *   $datalabelingService = new Google\Service\DataLabeling(...);
 *   $feedbackMessages = $datalabelingService->feedbackMessages;
 *  </code>
 */
class ProjectsDatasetsAnnotatedDatasetsFeedbackThreadsFeedbackMessages extends \Google\Service\Resource
{
  /**
   * Create a FeedbackMessage object. (feedbackMessages.create)
   *
   * @param string $parent Required. FeedbackMessage resource parent, format: proj
   * ects/{project_id}/datasets/{dataset_id}/annotatedDatasets/{annotated_dataset_
   * id}/feedbackThreads/{feedback_thread_id}.
   * @param GoogleCloudDatalabelingV1beta1FeedbackMessage $postBody
   * @param array $optParams Optional parameters.
   * @return GoogleLongrunningOperation
   */
  public function create($parent, GoogleCloudDatalabelingV1beta1FeedbackMessage $postBody, $optParams = [])
  {
    $params = ['parent' => $parent, 'postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('create', [$params], GoogleLongrunningOperation::class);
  }
  /**
   * Delete a FeedbackMessage. (feedbackMessages.delete)
   *
   * @param string $name Required. Name of the FeedbackMessage that is going to be
   * deleted. Format: 'projects/{project_id}/datasets/{dataset_id}/annotatedDatase
   * ts/{annotated_dataset_id}/feedbackThreads/{feedback_thread_id}/feedbackMessag
   * es/{feedback_message_id}'.
   * @param array $optParams Optional parameters.
   * @return GoogleProtobufEmpty
   */
  public function delete($name, $optParams = [])
  {
    $params = ['name' => $name];
    $params = array_merge($params, $optParams);
    return $this->call('delete', [$params], GoogleProtobufEmpty::class);
  }
  /**
   * Get a FeedbackMessage object. (feedbackMessages.get)
   *
   * @param string $name Required. Name of the feedback. Format: 'projects/{projec
   * t_id}/datasets/{dataset_id}/annotatedDatasets/{annotated_dataset_id}/feedback
   * Threads/{feedback_thread_id}/feedbackMessages/{feedback_message_id}'.
   * @param array $optParams Optional parameters.
   * @return GoogleCloudDatalabelingV1beta1FeedbackMessage
   */
  public function get($name, $optParams = [])
  {
    $params = ['name' => $name];
    $params = array_merge($params, $optParams);
    return $this->call('get', [$params], GoogleCloudDatalabelingV1beta1FeedbackMessage::class);
  }
  /**
   * List FeedbackMessages with pagination. (feedbackMessages.listProjectsDatasets
   * AnnotatedDatasetsFeedbackThreadsFeedbackMessages)
   *
   * @param string $parent Required. FeedbackMessage resource parent. Format: "pro
   * jects/{project_id}/datasets/{dataset_id}/annotatedDatasets/{annotated_dataset
   * _id}/feedbackThreads/{feedback_thread_id}"
   * @param array $optParams Optional parameters.
   *
   * @opt_param int pageSize Optional. Requested page size. Server may return
   * fewer results than requested. Default value is 100.
   * @opt_param string pageToken Optional. A token identifying a page of results
   * for the server to return. Typically obtained by
   * ListFeedbackMessages.next_page_token of the previous
   * [DataLabelingService.ListFeedbackMessages] call. Return first page if empty.
   * @return GoogleCloudDatalabelingV1beta1ListFeedbackMessagesResponse
   */
  public function listProjectsDatasetsAnnotatedDatasetsFeedbackThreadsFeedbackMessages($parent, $optParams = [])
  {
    $params = ['parent' => $parent];
    $params = array_merge($params, $optParams);
    return $this->call('list', [$params], GoogleCloudDatalabelingV1beta1ListFeedbackMessagesResponse::class);
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(ProjectsDatasetsAnnotatedDatasetsFeedbackThreadsFeedbackMessages::class, 'Google_Service_DataLabeling_Resource_ProjectsDatasetsAnnotatedDatasetsFeedbackThreadsFeedbackMessages');

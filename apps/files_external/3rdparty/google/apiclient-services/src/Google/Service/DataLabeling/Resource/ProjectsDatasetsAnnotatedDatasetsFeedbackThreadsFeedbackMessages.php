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

/**
 * The "feedbackMessages" collection of methods.
 * Typical usage is:
 *  <code>
 *   $datalabelingService = new Google_Service_DataLabeling(...);
 *   $feedbackMessages = $datalabelingService->feedbackMessages;
 *  </code>
 */
class Google_Service_DataLabeling_Resource_ProjectsDatasetsAnnotatedDatasetsFeedbackThreadsFeedbackMessages extends Google_Service_Resource
{
  /**
   * Create a FeedbackMessage object. (feedbackMessages.create)
   *
   * @param string $parent Required. FeedbackMessage resource parent, format: proj
   * ects/{project_id}/datasets/{dataset_id}/annotatedDatasets/{annotated_dataset_
   * id}/feedbackThreads/{feedback_thread_id}.
   * @param Google_Service_DataLabeling_GoogleCloudDatalabelingV1beta1FeedbackMessage $postBody
   * @param array $optParams Optional parameters.
   * @return Google_Service_DataLabeling_GoogleLongrunningOperation
   */
  public function create($parent, Google_Service_DataLabeling_GoogleCloudDatalabelingV1beta1FeedbackMessage $postBody, $optParams = array())
  {
    $params = array('parent' => $parent, 'postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('create', array($params), "Google_Service_DataLabeling_GoogleLongrunningOperation");
  }
  /**
   * Delete a FeedbackMessage. (feedbackMessages.delete)
   *
   * @param string $name Required. Name of the FeedbackMessage that is going to be
   * deleted. Format: 'projects/{project_id}/datasets/{dataset_id}/annotatedDatase
   * ts/{annotated_dataset_id}/feedbackThreads/{feedback_thread_id}/feedbackMessag
   * es/{feedback_message_id}'.
   * @param array $optParams Optional parameters.
   * @return Google_Service_DataLabeling_GoogleProtobufEmpty
   */
  public function delete($name, $optParams = array())
  {
    $params = array('name' => $name);
    $params = array_merge($params, $optParams);
    return $this->call('delete', array($params), "Google_Service_DataLabeling_GoogleProtobufEmpty");
  }
  /**
   * Get a FeedbackMessage object. (feedbackMessages.get)
   *
   * @param string $name Required. Name of the feedback. Format: 'projects/{projec
   * t_id}/datasets/{dataset_id}/annotatedDatasets/{annotated_dataset_id}/feedback
   * Threads/{feedback_thread_id}/feedbackMessages/{feedback_message_id}'.
   * @param array $optParams Optional parameters.
   * @return Google_Service_DataLabeling_GoogleCloudDatalabelingV1beta1FeedbackMessage
   */
  public function get($name, $optParams = array())
  {
    $params = array('name' => $name);
    $params = array_merge($params, $optParams);
    return $this->call('get', array($params), "Google_Service_DataLabeling_GoogleCloudDatalabelingV1beta1FeedbackMessage");
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
   * @return Google_Service_DataLabeling_GoogleCloudDatalabelingV1beta1ListFeedbackMessagesResponse
   */
  public function listProjectsDatasetsAnnotatedDatasetsFeedbackThreadsFeedbackMessages($parent, $optParams = array())
  {
    $params = array('parent' => $parent);
    $params = array_merge($params, $optParams);
    return $this->call('list', array($params), "Google_Service_DataLabeling_GoogleCloudDatalabelingV1beta1ListFeedbackMessagesResponse");
  }
}

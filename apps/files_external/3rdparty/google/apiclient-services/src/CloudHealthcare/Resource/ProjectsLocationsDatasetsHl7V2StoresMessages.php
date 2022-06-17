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

namespace Google\Service\CloudHealthcare\Resource;

use Google\Service\CloudHealthcare\CreateMessageRequest;
use Google\Service\CloudHealthcare\HealthcareEmpty;
use Google\Service\CloudHealthcare\IngestMessageRequest;
use Google\Service\CloudHealthcare\IngestMessageResponse;
use Google\Service\CloudHealthcare\ListMessagesResponse;
use Google\Service\CloudHealthcare\Message;

/**
 * The "messages" collection of methods.
 * Typical usage is:
 *  <code>
 *   $healthcareService = new Google\Service\CloudHealthcare(...);
 *   $messages = $healthcareService->messages;
 *  </code>
 */
class ProjectsLocationsDatasetsHl7V2StoresMessages extends \Google\Service\Resource
{
  /**
   * Parses and stores an HL7v2 message. This method triggers an asynchronous
   * notification to any Pub/Sub topic configured in
   * Hl7V2Store.Hl7V2NotificationConfig, if the filtering matches the message. If
   * an MLLP adapter is configured to listen to a Pub/Sub topic, the adapter
   * transmits the message when a notification is received. (messages.create)
   *
   * @param string $parent The name of the dataset this message belongs to.
   * @param CreateMessageRequest $postBody
   * @param array $optParams Optional parameters.
   * @return Message
   */
  public function create($parent, CreateMessageRequest $postBody, $optParams = [])
  {
    $params = ['parent' => $parent, 'postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('create', [$params], Message::class);
  }
  /**
   * Deletes an HL7v2 message. (messages.delete)
   *
   * @param string $name The resource name of the HL7v2 message to delete.
   * @param array $optParams Optional parameters.
   * @return HealthcareEmpty
   */
  public function delete($name, $optParams = [])
  {
    $params = ['name' => $name];
    $params = array_merge($params, $optParams);
    return $this->call('delete', [$params], HealthcareEmpty::class);
  }
  /**
   * Gets an HL7v2 message. (messages.get)
   *
   * @param string $name The resource name of the HL7v2 message to retrieve.
   * @param array $optParams Optional parameters.
   *
   * @opt_param string view Specifies which parts of the Message resource to
   * return in the response. When unspecified, equivalent to FULL.
   * @return Message
   */
  public function get($name, $optParams = [])
  {
    $params = ['name' => $name];
    $params = array_merge($params, $optParams);
    return $this->call('get', [$params], Message::class);
  }
  /**
   * Parses and stores an HL7v2 message. This method triggers an asynchronous
   * notification to any Pub/Sub topic configured in
   * Hl7V2Store.Hl7V2NotificationConfig, if the filtering matches the message. If
   * an MLLP adapter is configured to listen to a Pub/Sub topic, the adapter
   * transmits the message when a notification is received. If the method is
   * successful, it generates a response containing an HL7v2 acknowledgment
   * (`ACK`) message. If the method encounters an error, it returns a negative
   * acknowledgment (`NACK`) message. This behavior is suitable for replying to
   * HL7v2 interface systems that expect these acknowledgments. (messages.ingest)
   *
   * @param string $parent The name of the HL7v2 store this message belongs to.
   * @param IngestMessageRequest $postBody
   * @param array $optParams Optional parameters.
   * @return IngestMessageResponse
   */
  public function ingest($parent, IngestMessageRequest $postBody, $optParams = [])
  {
    $params = ['parent' => $parent, 'postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('ingest', [$params], IngestMessageResponse::class);
  }
  /**
   * Lists all the messages in the given HL7v2 store with support for filtering.
   * Note: HL7v2 messages are indexed asynchronously, so there might be a slight
   * delay between the time a message is created and when it can be found through
   * a filter. (messages.listProjectsLocationsDatasetsHl7V2StoresMessages)
   *
   * @param string $parent Name of the HL7v2 store to retrieve messages from.
   * @param array $optParams Optional parameters.
   *
   * @opt_param string filter Restricts messages returned to those matching a
   * filter. The following syntax is available: * A string field value can be
   * written as text inside quotation marks, for example `"query text"`. The only
   * valid relational operation for text fields is equality (`=`), where text is
   * searched within the field, rather than having the field be equal to the text.
   * For example, `"Comment = great"` returns messages with `great` in the comment
   * field. * A number field value can be written as an integer, a decimal, or an
   * exponential. The valid relational operators for number fields are the
   * equality operator (`=`), along with the less than/greater than operators
   * (`<`, `<=`, `>`, `>=`). Note that there is no inequality (`!=`) operator. You
   * can prepend the `NOT` operator to an expression to negate it. * A date field
   * value must be written in `yyyy-mm-dd` form. Fields with date and time use the
   * RFC3339 time format. Leading zeros are required for one-digit months and
   * days. The valid relational operators for date fields are the equality
   * operator (`=`) , along with the less than/greater than operators (`<`, `<=`,
   * `>`, `>=`). Note that there is no inequality (`!=`) operator. You can prepend
   * the `NOT` operator to an expression to negate it. * Multiple field query
   * expressions can be combined in one query by adding `AND` or `OR` operators
   * between the expressions. If a boolean operator appears within a quoted
   * string, it is not treated as special, it's just another part of the character
   * string to be matched. You can prepend the `NOT` operator to an expression to
   * negate it. Fields/functions available for filtering are: * `message_type`,
   * from the MSH-9.1 field. For example, `NOT message_type = "ADT"`. *
   * `send_date` or `sendDate`, the YYYY-MM-DD date the message was sent in the
   * dataset's time_zone, from the MSH-7 segment. For example, `send_date <
   * "2017-01-02"`. * `send_time`, the timestamp when the message was sent, using
   * the RFC3339 time format for comparisons, from the MSH-7 segment. For example,
   * `send_time < "2017-01-02T00:00:00-05:00"`. * `create_time`, the timestamp
   * when the message was created in the HL7v2 store. Use the RFC3339 time format
   * for comparisons. For example, `create_time < "2017-01-02T00:00:00-05:00"`. *
   * `send_facility`, the care center that the message came from, from the MSH-4
   * segment. For example, `send_facility = "ABC"`. * `PatientId(value, type)`,
   * which matches if the message lists a patient having an ID of the given value
   * and type in the PID-2, PID-3, or PID-4 segments. For example,
   * `PatientId("123456", "MRN")`. * `labels.x`, a string value of the label with
   * key `x` as set using the Message.labels map. For example,
   * `labels."priority"="high"`. The operator `:*` can be used to assert the
   * existence of a label. For example, `labels."priority":*`.
   * @opt_param string orderBy Orders messages returned by the specified order_by
   * clause. Syntax:
   * https://cloud.google.com/apis/design/design_patterns#sorting_order Fields
   * available for ordering are: * `send_time`
   * @opt_param int pageSize Limit on the number of messages to return in a single
   * response. If not specified, 100 is used. May not be larger than 1000.
   * @opt_param string pageToken The next_page_token value returned from the
   * previous List request, if any.
   * @opt_param string view Specifies the parts of the Message to return in the
   * response. When unspecified, equivalent to BASIC. Setting this to anything
   * other than BASIC with a `page_size` larger than the default can generate a
   * large response, which impacts the performance of this method.
   * @return ListMessagesResponse
   */
  public function listProjectsLocationsDatasetsHl7V2StoresMessages($parent, $optParams = [])
  {
    $params = ['parent' => $parent];
    $params = array_merge($params, $optParams);
    return $this->call('list', [$params], ListMessagesResponse::class);
  }
  /**
   * Update the message. The contents of the message in Message.data and data
   * extracted from the contents such as Message.create_time cannot be altered.
   * Only the Message.labels field is allowed to be updated. The labels in the
   * request are merged with the existing set of labels. Existing labels with the
   * same keys are updated. (messages.patch)
   *
   * @param string $name Resource name of the Message, of the form `projects/{proj
   * ect_id}/locations/{location_id}/datasets/{dataset_id}/hl7V2Stores/{hl7_v2_sto
   * re_id}/messages/{message_id}`. Assigned by the server.
   * @param Message $postBody
   * @param array $optParams Optional parameters.
   *
   * @opt_param string updateMask The update mask applies to the resource. For the
   * `FieldMask` definition, see https://developers.google.com/protocol-
   * buffers/docs/reference/google.protobuf#fieldmask
   * @return Message
   */
  public function patch($name, Message $postBody, $optParams = [])
  {
    $params = ['name' => $name, 'postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('patch', [$params], Message::class);
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(ProjectsLocationsDatasetsHl7V2StoresMessages::class, 'Google_Service_CloudHealthcare_Resource_ProjectsLocationsDatasetsHl7V2StoresMessages');

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

namespace Google\Service;

use Google\Client;

/**
 * Service definition for Gmail (v1).
 *
 * <p>
 * The Gmail API lets you view and manage Gmail mailbox data like threads,
 * messages, and labels.</p>
 *
 * <p>
 * For more information about this service, see the API
 * <a href="https://developers.google.com/gmail/api/" target="_blank">Documentation</a>
 * </p>
 *
 * @author Google, Inc.
 */
class Gmail extends \Google\Service
{
  /** Read, compose, send, and permanently delete all your email from Gmail. */
  const MAIL_GOOGLE_COM =
      "https://mail.google.com/";
  /** Manage drafts and send emails when you interact with the add-on. */
  const GMAIL_ADDONS_CURRENT_ACTION_COMPOSE =
      "https://www.googleapis.com/auth/gmail.addons.current.action.compose";
  /** View your email messages when you interact with the add-on. */
  const GMAIL_ADDONS_CURRENT_MESSAGE_ACTION =
      "https://www.googleapis.com/auth/gmail.addons.current.message.action";
  /** View your email message metadata when the add-on is running. */
  const GMAIL_ADDONS_CURRENT_MESSAGE_METADATA =
      "https://www.googleapis.com/auth/gmail.addons.current.message.metadata";
  /** View your email messages when the add-on is running. */
  const GMAIL_ADDONS_CURRENT_MESSAGE_READONLY =
      "https://www.googleapis.com/auth/gmail.addons.current.message.readonly";
  /** Manage drafts and send emails. */
  const GMAIL_COMPOSE =
      "https://www.googleapis.com/auth/gmail.compose";
  /** Add emails into your Gmail mailbox. */
  const GMAIL_INSERT =
      "https://www.googleapis.com/auth/gmail.insert";
  /** See and edit your email labels. */
  const GMAIL_LABELS =
      "https://www.googleapis.com/auth/gmail.labels";
  /** View your email message metadata such as labels and headers, but not the email body. */
  const GMAIL_METADATA =
      "https://www.googleapis.com/auth/gmail.metadata";
  /** Read, compose, and send emails from your Gmail account. */
  const GMAIL_MODIFY =
      "https://www.googleapis.com/auth/gmail.modify";
  /** View your email messages and settings. */
  const GMAIL_READONLY =
      "https://www.googleapis.com/auth/gmail.readonly";
  /** Send email on your behalf. */
  const GMAIL_SEND =
      "https://www.googleapis.com/auth/gmail.send";
  /** See, edit, create, or change your email settings and filters in Gmail. */
  const GMAIL_SETTINGS_BASIC =
      "https://www.googleapis.com/auth/gmail.settings.basic";
  /** Manage your sensitive mail settings, including who can manage your mail. */
  const GMAIL_SETTINGS_SHARING =
      "https://www.googleapis.com/auth/gmail.settings.sharing";

  public $users;
  public $users_drafts;
  public $users_history;
  public $users_labels;
  public $users_messages;
  public $users_messages_attachments;
  public $users_settings;
  public $users_settings_delegates;
  public $users_settings_filters;
  public $users_settings_forwardingAddresses;
  public $users_settings_sendAs;
  public $users_settings_sendAs_smimeInfo;
  public $users_threads;

  /**
   * Constructs the internal representation of the Gmail service.
   *
   * @param Client|array $clientOrConfig The client used to deliver requests, or a
   *                                     config array to pass to a new Client instance.
   * @param string $rootUrl The root URL used for requests to the service.
   */
  public function __construct($clientOrConfig = [], $rootUrl = null)
  {
    parent::__construct($clientOrConfig);
    $this->rootUrl = $rootUrl ?: 'https://gmail.googleapis.com/';
    $this->servicePath = '';
    $this->batchPath = 'batch';
    $this->version = 'v1';
    $this->serviceName = 'gmail';

    $this->users = new Gmail\Resource\Users(
        $this,
        $this->serviceName,
        'users',
        [
          'methods' => [
            'getProfile' => [
              'path' => 'gmail/v1/users/{userId}/profile',
              'httpMethod' => 'GET',
              'parameters' => [
                'userId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
              ],
            ],'stop' => [
              'path' => 'gmail/v1/users/{userId}/stop',
              'httpMethod' => 'POST',
              'parameters' => [
                'userId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
              ],
            ],'watch' => [
              'path' => 'gmail/v1/users/{userId}/watch',
              'httpMethod' => 'POST',
              'parameters' => [
                'userId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
              ],
            ],
          ]
        ]
    );
    $this->users_drafts = new Gmail\Resource\UsersDrafts(
        $this,
        $this->serviceName,
        'drafts',
        [
          'methods' => [
            'create' => [
              'path' => 'gmail/v1/users/{userId}/drafts',
              'httpMethod' => 'POST',
              'parameters' => [
                'userId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
              ],
            ],'delete' => [
              'path' => 'gmail/v1/users/{userId}/drafts/{id}',
              'httpMethod' => 'DELETE',
              'parameters' => [
                'userId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'id' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
              ],
            ],'get' => [
              'path' => 'gmail/v1/users/{userId}/drafts/{id}',
              'httpMethod' => 'GET',
              'parameters' => [
                'userId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'id' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'format' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
              ],
            ],'list' => [
              'path' => 'gmail/v1/users/{userId}/drafts',
              'httpMethod' => 'GET',
              'parameters' => [
                'userId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'includeSpamTrash' => [
                  'location' => 'query',
                  'type' => 'boolean',
                ],
                'maxResults' => [
                  'location' => 'query',
                  'type' => 'integer',
                ],
                'pageToken' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
                'q' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
              ],
            ],'send' => [
              'path' => 'gmail/v1/users/{userId}/drafts/send',
              'httpMethod' => 'POST',
              'parameters' => [
                'userId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
              ],
            ],'update' => [
              'path' => 'gmail/v1/users/{userId}/drafts/{id}',
              'httpMethod' => 'PUT',
              'parameters' => [
                'userId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'id' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
              ],
            ],
          ]
        ]
    );
    $this->users_history = new Gmail\Resource\UsersHistory(
        $this,
        $this->serviceName,
        'history',
        [
          'methods' => [
            'list' => [
              'path' => 'gmail/v1/users/{userId}/history',
              'httpMethod' => 'GET',
              'parameters' => [
                'userId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'historyTypes' => [
                  'location' => 'query',
                  'type' => 'string',
                  'repeated' => true,
                ],
                'labelId' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
                'maxResults' => [
                  'location' => 'query',
                  'type' => 'integer',
                ],
                'pageToken' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
                'startHistoryId' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
              ],
            ],
          ]
        ]
    );
    $this->users_labels = new Gmail\Resource\UsersLabels(
        $this,
        $this->serviceName,
        'labels',
        [
          'methods' => [
            'create' => [
              'path' => 'gmail/v1/users/{userId}/labels',
              'httpMethod' => 'POST',
              'parameters' => [
                'userId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
              ],
            ],'delete' => [
              'path' => 'gmail/v1/users/{userId}/labels/{id}',
              'httpMethod' => 'DELETE',
              'parameters' => [
                'userId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'id' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
              ],
            ],'get' => [
              'path' => 'gmail/v1/users/{userId}/labels/{id}',
              'httpMethod' => 'GET',
              'parameters' => [
                'userId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'id' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
              ],
            ],'list' => [
              'path' => 'gmail/v1/users/{userId}/labels',
              'httpMethod' => 'GET',
              'parameters' => [
                'userId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
              ],
            ],'patch' => [
              'path' => 'gmail/v1/users/{userId}/labels/{id}',
              'httpMethod' => 'PATCH',
              'parameters' => [
                'userId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'id' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
              ],
            ],'update' => [
              'path' => 'gmail/v1/users/{userId}/labels/{id}',
              'httpMethod' => 'PUT',
              'parameters' => [
                'userId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'id' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
              ],
            ],
          ]
        ]
    );
    $this->users_messages = new Gmail\Resource\UsersMessages(
        $this,
        $this->serviceName,
        'messages',
        [
          'methods' => [
            'batchDelete' => [
              'path' => 'gmail/v1/users/{userId}/messages/batchDelete',
              'httpMethod' => 'POST',
              'parameters' => [
                'userId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
              ],
            ],'batchModify' => [
              'path' => 'gmail/v1/users/{userId}/messages/batchModify',
              'httpMethod' => 'POST',
              'parameters' => [
                'userId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
              ],
            ],'delete' => [
              'path' => 'gmail/v1/users/{userId}/messages/{id}',
              'httpMethod' => 'DELETE',
              'parameters' => [
                'userId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'id' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
              ],
            ],'get' => [
              'path' => 'gmail/v1/users/{userId}/messages/{id}',
              'httpMethod' => 'GET',
              'parameters' => [
                'userId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'id' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'format' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
                'metadataHeaders' => [
                  'location' => 'query',
                  'type' => 'string',
                  'repeated' => true,
                ],
              ],
            ],'import' => [
              'path' => 'gmail/v1/users/{userId}/messages/import',
              'httpMethod' => 'POST',
              'parameters' => [
                'userId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'deleted' => [
                  'location' => 'query',
                  'type' => 'boolean',
                ],
                'internalDateSource' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
                'neverMarkSpam' => [
                  'location' => 'query',
                  'type' => 'boolean',
                ],
                'processForCalendar' => [
                  'location' => 'query',
                  'type' => 'boolean',
                ],
              ],
            ],'insert' => [
              'path' => 'gmail/v1/users/{userId}/messages',
              'httpMethod' => 'POST',
              'parameters' => [
                'userId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'deleted' => [
                  'location' => 'query',
                  'type' => 'boolean',
                ],
                'internalDateSource' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
              ],
            ],'list' => [
              'path' => 'gmail/v1/users/{userId}/messages',
              'httpMethod' => 'GET',
              'parameters' => [
                'userId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'includeSpamTrash' => [
                  'location' => 'query',
                  'type' => 'boolean',
                ],
                'labelIds' => [
                  'location' => 'query',
                  'type' => 'string',
                  'repeated' => true,
                ],
                'maxResults' => [
                  'location' => 'query',
                  'type' => 'integer',
                ],
                'pageToken' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
                'q' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
              ],
            ],'modify' => [
              'path' => 'gmail/v1/users/{userId}/messages/{id}/modify',
              'httpMethod' => 'POST',
              'parameters' => [
                'userId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'id' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
              ],
            ],'send' => [
              'path' => 'gmail/v1/users/{userId}/messages/send',
              'httpMethod' => 'POST',
              'parameters' => [
                'userId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
              ],
            ],'trash' => [
              'path' => 'gmail/v1/users/{userId}/messages/{id}/trash',
              'httpMethod' => 'POST',
              'parameters' => [
                'userId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'id' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
              ],
            ],'untrash' => [
              'path' => 'gmail/v1/users/{userId}/messages/{id}/untrash',
              'httpMethod' => 'POST',
              'parameters' => [
                'userId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'id' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
              ],
            ],
          ]
        ]
    );
    $this->users_messages_attachments = new Gmail\Resource\UsersMessagesAttachments(
        $this,
        $this->serviceName,
        'attachments',
        [
          'methods' => [
            'get' => [
              'path' => 'gmail/v1/users/{userId}/messages/{messageId}/attachments/{id}',
              'httpMethod' => 'GET',
              'parameters' => [
                'userId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'messageId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'id' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
              ],
            ],
          ]
        ]
    );
    $this->users_settings = new Gmail\Resource\UsersSettings(
        $this,
        $this->serviceName,
        'settings',
        [
          'methods' => [
            'getAutoForwarding' => [
              'path' => 'gmail/v1/users/{userId}/settings/autoForwarding',
              'httpMethod' => 'GET',
              'parameters' => [
                'userId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
              ],
            ],'getImap' => [
              'path' => 'gmail/v1/users/{userId}/settings/imap',
              'httpMethod' => 'GET',
              'parameters' => [
                'userId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
              ],
            ],'getLanguage' => [
              'path' => 'gmail/v1/users/{userId}/settings/language',
              'httpMethod' => 'GET',
              'parameters' => [
                'userId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
              ],
            ],'getPop' => [
              'path' => 'gmail/v1/users/{userId}/settings/pop',
              'httpMethod' => 'GET',
              'parameters' => [
                'userId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
              ],
            ],'getVacation' => [
              'path' => 'gmail/v1/users/{userId}/settings/vacation',
              'httpMethod' => 'GET',
              'parameters' => [
                'userId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
              ],
            ],'updateAutoForwarding' => [
              'path' => 'gmail/v1/users/{userId}/settings/autoForwarding',
              'httpMethod' => 'PUT',
              'parameters' => [
                'userId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
              ],
            ],'updateImap' => [
              'path' => 'gmail/v1/users/{userId}/settings/imap',
              'httpMethod' => 'PUT',
              'parameters' => [
                'userId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
              ],
            ],'updateLanguage' => [
              'path' => 'gmail/v1/users/{userId}/settings/language',
              'httpMethod' => 'PUT',
              'parameters' => [
                'userId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
              ],
            ],'updatePop' => [
              'path' => 'gmail/v1/users/{userId}/settings/pop',
              'httpMethod' => 'PUT',
              'parameters' => [
                'userId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
              ],
            ],'updateVacation' => [
              'path' => 'gmail/v1/users/{userId}/settings/vacation',
              'httpMethod' => 'PUT',
              'parameters' => [
                'userId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
              ],
            ],
          ]
        ]
    );
    $this->users_settings_delegates = new Gmail\Resource\UsersSettingsDelegates(
        $this,
        $this->serviceName,
        'delegates',
        [
          'methods' => [
            'create' => [
              'path' => 'gmail/v1/users/{userId}/settings/delegates',
              'httpMethod' => 'POST',
              'parameters' => [
                'userId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
              ],
            ],'delete' => [
              'path' => 'gmail/v1/users/{userId}/settings/delegates/{delegateEmail}',
              'httpMethod' => 'DELETE',
              'parameters' => [
                'userId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'delegateEmail' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
              ],
            ],'get' => [
              'path' => 'gmail/v1/users/{userId}/settings/delegates/{delegateEmail}',
              'httpMethod' => 'GET',
              'parameters' => [
                'userId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'delegateEmail' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
              ],
            ],'list' => [
              'path' => 'gmail/v1/users/{userId}/settings/delegates',
              'httpMethod' => 'GET',
              'parameters' => [
                'userId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
              ],
            ],
          ]
        ]
    );
    $this->users_settings_filters = new Gmail\Resource\UsersSettingsFilters(
        $this,
        $this->serviceName,
        'filters',
        [
          'methods' => [
            'create' => [
              'path' => 'gmail/v1/users/{userId}/settings/filters',
              'httpMethod' => 'POST',
              'parameters' => [
                'userId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
              ],
            ],'delete' => [
              'path' => 'gmail/v1/users/{userId}/settings/filters/{id}',
              'httpMethod' => 'DELETE',
              'parameters' => [
                'userId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'id' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
              ],
            ],'get' => [
              'path' => 'gmail/v1/users/{userId}/settings/filters/{id}',
              'httpMethod' => 'GET',
              'parameters' => [
                'userId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'id' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
              ],
            ],'list' => [
              'path' => 'gmail/v1/users/{userId}/settings/filters',
              'httpMethod' => 'GET',
              'parameters' => [
                'userId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
              ],
            ],
          ]
        ]
    );
    $this->users_settings_forwardingAddresses = new Gmail\Resource\UsersSettingsForwardingAddresses(
        $this,
        $this->serviceName,
        'forwardingAddresses',
        [
          'methods' => [
            'create' => [
              'path' => 'gmail/v1/users/{userId}/settings/forwardingAddresses',
              'httpMethod' => 'POST',
              'parameters' => [
                'userId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
              ],
            ],'delete' => [
              'path' => 'gmail/v1/users/{userId}/settings/forwardingAddresses/{forwardingEmail}',
              'httpMethod' => 'DELETE',
              'parameters' => [
                'userId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'forwardingEmail' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
              ],
            ],'get' => [
              'path' => 'gmail/v1/users/{userId}/settings/forwardingAddresses/{forwardingEmail}',
              'httpMethod' => 'GET',
              'parameters' => [
                'userId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'forwardingEmail' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
              ],
            ],'list' => [
              'path' => 'gmail/v1/users/{userId}/settings/forwardingAddresses',
              'httpMethod' => 'GET',
              'parameters' => [
                'userId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
              ],
            ],
          ]
        ]
    );
    $this->users_settings_sendAs = new Gmail\Resource\UsersSettingsSendAs(
        $this,
        $this->serviceName,
        'sendAs',
        [
          'methods' => [
            'create' => [
              'path' => 'gmail/v1/users/{userId}/settings/sendAs',
              'httpMethod' => 'POST',
              'parameters' => [
                'userId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
              ],
            ],'delete' => [
              'path' => 'gmail/v1/users/{userId}/settings/sendAs/{sendAsEmail}',
              'httpMethod' => 'DELETE',
              'parameters' => [
                'userId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'sendAsEmail' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
              ],
            ],'get' => [
              'path' => 'gmail/v1/users/{userId}/settings/sendAs/{sendAsEmail}',
              'httpMethod' => 'GET',
              'parameters' => [
                'userId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'sendAsEmail' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
              ],
            ],'list' => [
              'path' => 'gmail/v1/users/{userId}/settings/sendAs',
              'httpMethod' => 'GET',
              'parameters' => [
                'userId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
              ],
            ],'patch' => [
              'path' => 'gmail/v1/users/{userId}/settings/sendAs/{sendAsEmail}',
              'httpMethod' => 'PATCH',
              'parameters' => [
                'userId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'sendAsEmail' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
              ],
            ],'update' => [
              'path' => 'gmail/v1/users/{userId}/settings/sendAs/{sendAsEmail}',
              'httpMethod' => 'PUT',
              'parameters' => [
                'userId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'sendAsEmail' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
              ],
            ],'verify' => [
              'path' => 'gmail/v1/users/{userId}/settings/sendAs/{sendAsEmail}/verify',
              'httpMethod' => 'POST',
              'parameters' => [
                'userId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'sendAsEmail' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
              ],
            ],
          ]
        ]
    );
    $this->users_settings_sendAs_smimeInfo = new Gmail\Resource\UsersSettingsSendAsSmimeInfo(
        $this,
        $this->serviceName,
        'smimeInfo',
        [
          'methods' => [
            'delete' => [
              'path' => 'gmail/v1/users/{userId}/settings/sendAs/{sendAsEmail}/smimeInfo/{id}',
              'httpMethod' => 'DELETE',
              'parameters' => [
                'userId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'sendAsEmail' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'id' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
              ],
            ],'get' => [
              'path' => 'gmail/v1/users/{userId}/settings/sendAs/{sendAsEmail}/smimeInfo/{id}',
              'httpMethod' => 'GET',
              'parameters' => [
                'userId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'sendAsEmail' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'id' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
              ],
            ],'insert' => [
              'path' => 'gmail/v1/users/{userId}/settings/sendAs/{sendAsEmail}/smimeInfo',
              'httpMethod' => 'POST',
              'parameters' => [
                'userId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'sendAsEmail' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
              ],
            ],'list' => [
              'path' => 'gmail/v1/users/{userId}/settings/sendAs/{sendAsEmail}/smimeInfo',
              'httpMethod' => 'GET',
              'parameters' => [
                'userId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'sendAsEmail' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
              ],
            ],'setDefault' => [
              'path' => 'gmail/v1/users/{userId}/settings/sendAs/{sendAsEmail}/smimeInfo/{id}/setDefault',
              'httpMethod' => 'POST',
              'parameters' => [
                'userId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'sendAsEmail' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'id' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
              ],
            ],
          ]
        ]
    );
    $this->users_threads = new Gmail\Resource\UsersThreads(
        $this,
        $this->serviceName,
        'threads',
        [
          'methods' => [
            'delete' => [
              'path' => 'gmail/v1/users/{userId}/threads/{id}',
              'httpMethod' => 'DELETE',
              'parameters' => [
                'userId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'id' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
              ],
            ],'get' => [
              'path' => 'gmail/v1/users/{userId}/threads/{id}',
              'httpMethod' => 'GET',
              'parameters' => [
                'userId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'id' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'format' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
                'metadataHeaders' => [
                  'location' => 'query',
                  'type' => 'string',
                  'repeated' => true,
                ],
              ],
            ],'list' => [
              'path' => 'gmail/v1/users/{userId}/threads',
              'httpMethod' => 'GET',
              'parameters' => [
                'userId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'includeSpamTrash' => [
                  'location' => 'query',
                  'type' => 'boolean',
                ],
                'labelIds' => [
                  'location' => 'query',
                  'type' => 'string',
                  'repeated' => true,
                ],
                'maxResults' => [
                  'location' => 'query',
                  'type' => 'integer',
                ],
                'pageToken' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
                'q' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
              ],
            ],'modify' => [
              'path' => 'gmail/v1/users/{userId}/threads/{id}/modify',
              'httpMethod' => 'POST',
              'parameters' => [
                'userId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'id' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
              ],
            ],'trash' => [
              'path' => 'gmail/v1/users/{userId}/threads/{id}/trash',
              'httpMethod' => 'POST',
              'parameters' => [
                'userId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'id' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
              ],
            ],'untrash' => [
              'path' => 'gmail/v1/users/{userId}/threads/{id}/untrash',
              'httpMethod' => 'POST',
              'parameters' => [
                'userId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'id' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
              ],
            ],
          ]
        ]
    );
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(Gmail::class, 'Google_Service_Gmail');

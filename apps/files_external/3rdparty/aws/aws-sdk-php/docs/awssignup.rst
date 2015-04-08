==================
Signing Up for AWS
==================

.. important:: This page is obsolete. Please see `About Access Keys <http://aws.amazon.com/developers/access-keys/>`_.

Creating an AWS account
-----------------------

Before you begin, you need to create an account. When you sign up for AWS, AWS signs your account up for all services.
You are charged only for the services you use.

To sign up for AWS
~~~~~~~~~~~~~~~~~~

#. Go to http://aws.amazon.com and click **Sign Up Now**.

#. Follow the on-screen instructions.

AWS sends you a confirmation email after the sign-up process is complete. At any time, you can view your current account
activity and manage your account at http://aws.amazon.com/account. From the **My Account** page, you can view current
charges and account activity and download usage reports.

To view your AWS credentials
~~~~~~~~~~~~~~~~~~~~~~~~~~~~

#. Go to http://aws.amazon.com/.

#. Click **My Account/Console**, and then click **Security Credentials**.

#. Under **Your Account**, click **Security Credentials**.

#. In the spaces provided, type your user name and password, and then click **Sign in using our secure server**.

#. Under **Access Credentials**, on the **Access Keys** tab, your access key ID is displayed. To view your secret key,
   under **Secret Access Key**, click **Show**.

Your secret key must remain a secret that is known only by you and AWS. Keep it confidential in order to protect your
account. Store it securely in a safe place, and never email it. Do not share it outside your organization, even if an
inquiry appears to come from AWS or Amazon.com. No one who legitimately represents Amazon will ever ask you for your
secret key.

Getting your AWS credentials
----------------------------

In order to use the AWS SDK for PHP, you need your AWS Access Key ID and Secret Access Key.

To get your AWS Access Key ID and Secret Access Key

-  Go to http://aws.amazon.com/.
-  Click **Account** and then click **Security Credentials**. The Security Credentials page displays (you might be
   prompted to log in).
-  Scroll down to Access Credentials and make sure the **Access Keys** tab is selected. The AWS Access Key ID appears in
   the Access Key column.
-  To view the Secret Access Key, click **Show**.

.. note::

    **Important: Your Secret Access Key is a secret**, which only you and AWS should know. It is important to keep it confidential
    to protect your account. Store it securely in a safe place. Never include it in your requests to AWS, and never
    e-mail it to anyone. Do not share it outside your organization, even if an inquiry appears to come from AWS or
    Amazon.com. No one who legitimately represents Amazon will ever ask you for your Secret Access Key.
